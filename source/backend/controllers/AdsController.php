<?php

namespace backend\controllers;

use backend\models\AdsLocation;
use backend\models\AdsType;
use backend\models\User;
use common\Utility;
use Yii;
use backend\models\Ads;
use backend\models\search\AdsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * AdsController implements the CRUD actions for Ads model.
 */
class AdsController extends Controller
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
     * Lists all Ads models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $ads_type = ArrayHelper::map(AdsType::find()->all(),'id','name');
        $ads_location = ArrayHelper::map(AdsLocation::find()->where(['status'=>1,'deleted'=>0])->all(),'id','name');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ads_type' => $ads_type,
            'ads_location' => $ads_location,
        ]);
    }

    /**
     * Displays a single Ads model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $ads_type = ArrayHelper::map(AdsType::find()->all(),'id','name');
        $ads_location = ArrayHelper::map(AdsLocation::find()->where(['status'=>1,'deleted'=>0])->all(),'id','name');
        $users = ArrayHelper::map(User::find()->All(),'id','username');

        return $this->render('view', [
            'model' => $model,
            'ads_type' => $ads_type,
            'ads_location' => $ads_location,
            'users' => $users,
        ]);
    }

    /**
     * Creates a new Ads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ads();
        $ads_type = ArrayHelper::map(AdsType::find()->all(),'id','name');
        $ads_location = ArrayHelper::map(AdsLocation::find()->where(['status'=>1,'deleted'=>0])->all(),'id','name');

        if ($model->load(Yii::$app->request->post())) {
            $model->created_time = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->id;
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            if ($model->save()) {
                $file = UploadedFile::getInstance($model, 'img');
                if (!empty($file)) {
                    $file->saveAs(PATH_STORAGE . 'ads/' . $model->id . $file->extension);
//                    $file->saveAs(PATH_STORAGE . 'ads/' . $model->id . '_real.' . $file->extension);
//                    Utility::resize_crop_image(300, 100, PATH_STORAGE . 'ads/' . $model->id . '_real.' . $file->extension, PATH_STORAGE . 'ads/' . $model->id . '.' . $file->extension, 100);

                    $model->img = $model->id . '.' . $file->extension;
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
            'ads_type' => $ads_type,
            'ads_location' => $ads_location,
        ]);
    }

    /**
     * Updates an existing Ads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ads_type = ArrayHelper::map(AdsType::find()->all(),'id','name');
        $ads_location = ArrayHelper::map(AdsLocation::find()->where(['status'=>1,'deleted'=>0])->all(),'id','name');
        $imgx = Utility::getUrlAds($id);
        $img = $model->img;

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            $model->img = $img;
            if ($model->save()) {
                $file = UploadedFile::getInstance($model, 'img');
                if (!empty($file)) {
                    $file->saveAs(PATH_STORAGE.'ads/' . $model->id . $file->extension);
//                    $file->saveAs(PATH_STORAGE.'ads/' . $model->id . '_real.' . $file->extension);
//                    Utility::resize_crop_image(300,100, PATH_STORAGE.'ads/' . $model->id . '_real.' . $file->extension, PATH_STORAGE.'ads/' . $model->id . '.' . $file->extension,100);

                    $model->img = $model->id.'.'.$file->extension;
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
            'ads_type' => $ads_type,
            'ads_location' => $ads_location,
            'img' => $imgx,
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
     * Finds the Ads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
