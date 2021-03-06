<?php

namespace backend\controllers;

use backend\models\User;
use common\Utility;
use Yii;
use backend\models\Stadium;
use backend\models\search\StadiumSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * StadiumController implements the CRUD actions for Stadium model.
 */
class StadiumController extends Controller
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
     * Lists all Stadium models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StadiumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $users = ArrayHelper::map(User::find()->All(),'id', 'username');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'users' => $users
        ]);
    }

    /**
     * Displays a single Stadium model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $users = ArrayHelper::map(User::find()->All(),'id', 'username');
        return $this->render('view', [
            'model' => $model,
            'users' => $users
        ]);
    }

    /**
     * Creates a new Stadium model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Stadium();

        if ($model->load(Yii::$app->request->post())) {
            $slug = Utility::convert_vi_to_en(Yii::$app->request->post('Stadium')['name']);
            $model->slug = $slug;
            $model->created_time = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->id;
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            if ($model->save()) {
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
     * Updates an existing Stadium model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $slug = Utility::convert_vi_to_en(Yii::$app->request->post('Stadium')['name']);
            $model->slug = $slug;
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
            Yii::$app->session->setFlash('error', json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                goto c;
            }
        }
        c:
        return $this->render('update', [
            'model' => $model,
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
     * Finds the Stadium model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stadium the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stadium::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
