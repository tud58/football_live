<?php

namespace backend\controllers;

use backend\models\User;
use common\Utility;
use Yii;
use backend\models\League;
use backend\models\search\LeagueSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * LeagueController implements the CRUD actions for League model.
 */
class LeagueController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all League models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeagueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $users = ArrayHelper::map(User::find()->All(),'id', 'username');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'users' => $users,
        ]);
    }

    /**
     * Displays a single League model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $users = ArrayHelper::map(User::find()->All(),'id', 'username');
        return $this->render('view', [
            'model' => $model,
            'users' => $users,
        ]);
    }

    /**
     * Creates a new League model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new League();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_time = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->id;
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            if ($model->save()) {
                $file = UploadedFile::getInstance($model, 'logo');
                if (!empty($file)) {
                    $file->saveAs(PATH_STORAGE . 'leagues/' . $model->id . '_real.' . $file->extension);
                    Utility::resize_crop_image(200, 200, PATH_STORAGE . 'leagues/' . $model->id . '_real.' . $file->extension, PATH_STORAGE . 'leagues/' . $model->id . '.' . $file->extension, 100);

                    $model->logo = $model->id . '.' . $file->extension;
                }
                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                goto c;
            }
        }
        c:
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing League model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = Utility::getUrlLeague($id);
        $logo = $model->logo;

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            $model->logo = $logo;
            if ($model->save()) {
                $file = UploadedFile::getInstance($model, 'logo');
                if (!empty($file)) {
                    $file->saveAs(PATH_STORAGE.'leagues/' . $model->id . '_real.' . $file->extension);
                    Utility::resize_crop_image(200,200, PATH_STORAGE.'leagues/' . $model->id . '_real.' . $file->extension, PATH_STORAGE.'leagues/' . $model->id . '.' . $file->extension,100);

                    $model->logo = $model->id.'.'.$file->extension;
                    $model->save(false);
                }

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                goto c;
            }
        }
        c:
        return $this->render('update', [
            'model' => $model,
            'img' => $img,
        ]);
    }


    public function actionChangeStatusObject()
    {
        $request = Yii::$app->request->post();

        $obj_id = isset($request['obj_id']) ? trim($request['obj_id']) : "";
        $obj_type = isset($request['obj_type']) ? trim($request['obj_type']) : "";

        if (empty($obj_id) || empty($obj_type)) {
            echo json_encode(['status' => 1, 'message' => Yii::t('cms', 'Param invalid')]);
            exit;
        }

        try {
            $model = $this->findModel($obj_id);
            if ($obj_type == 'delete') {
                $model->deleted = 1;
                $model->save(false);
            } else {
                throw new \Exception("{obj_type} invalid");
            }
            echo json_encode(['status' => 1, 'message' => Yii::t('cms', 'Save Success')]);
            exit;
        } catch (\Exception $e) {
            echo json_encode(['status' => 0, 'message' => $e->getMessage()]);
            exit;
        } catch (\Throwable $e) {
            echo json_encode(['status' => 0, 'message' => $e->getMessage()]);
            exit;
        }
    }

    /**
     * Finds the League model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return League the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = League::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
