<?php

namespace backend\controllers;

use Yii;
use backend\models\League;
use backend\models\search\LeagueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        return $this->render('view', [
            'model' => $model,
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
     * Updates an existing League model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
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
                $model->delete();
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
