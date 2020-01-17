<?php

namespace backend\controllers;

use backend\models\Club;
use backend\models\League;
use backend\models\LeagueClub;
use backend\models\Stadium;
use backend\models\User;
use common\Utility;
use Yii;
use backend\models\Match;
use backend\models\search\MatchSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * MatchController implements the CRUD actions for Match model.
 */
class MatchController extends Controller
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
     * Lists all Match models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MatchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $leagues = ArrayHelper::map(League::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $clubs = ArrayHelper::map(Club::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $stadiums = ArrayHelper::map(Stadium::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $users = ArrayHelper::map(User::find()->All(),'id','username');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'leagues' => $leagues,
            'clubs' => $clubs,
            'stadiums' => $stadiums,
            'users' => $users,
        ]);
    }

    /**
     * Displays a single Match model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $leagues = ArrayHelper::map(League::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $clubs = ArrayHelper::map(Club::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $stadiums = ArrayHelper::map(Stadium::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $users = ArrayHelper::map(User::find()->All(),'id','username');
        return $this->render('view', [
            'model' => $model,
            'leagues' => $leagues,
            'clubs' => $clubs,
            'stadiums' => $stadiums,
            'users' => $users,
        ]);
    }

    /**
     * Creates a new Match model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Match();
        $leagues = ArrayHelper::map(League::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $clubs = ArrayHelper::map(Club::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $stadiums = ArrayHelper::map(Stadium::findAll(['status'=>1, 'deleted'=>0]),'id','name');

        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('Match');
            $title = !empty($request['title'])?$request['title']:$clubs[$request['club1_id']].' vs '.$clubs[$request['club2_id']];
            $slug = Utility::convert_vi_to_en($title);
            $model->title = $title;
            $model->slug = $slug;
            $model->created_time = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->id;
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;

            if ($request['hot_match']==1) {
                Match::updateAll(['hot_match'=>0],['status'=>1,'deleted'=>0,'hot_match'=>1]);
            }

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
            'leagues' => $leagues,
            'clubs' => $clubs,
            'stadiums' => $stadiums,
        ]);
    }

    public function actionLoadClubByLeague()
    {
        $request = Yii::$app->request->post();
        if (!empty($request['league_id'])) {
            $clubs = (New LeagueClub())->getClubByLeague($request['league_id']);
            return $this->renderAjax('club_by_league', [
                'clubs' => $clubs,
            ]);
        }
    }

    /**
     * Updates an existing Match model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $leagues = ArrayHelper::map(League::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $clubs = ArrayHelper::map(Club::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $stadiums = ArrayHelper::map(Stadium::findAll(['status'=>1, 'deleted'=>0]),'id','name');

        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post('Match');
            $title = !empty($request['title'])?$request['title']:$clubs[$request['club1_id']].' vs '.$clubs[$request['club2_id']];
            $slug = Utility::convert_vi_to_en($title);
            $model->title = $title;
            $model->slug = $slug;
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            if ($request['hot_match']==1) {
                Match::updateAll(['hot_match'=>0],['status'=>1,'deleted'=>0,'hot_match'=>1]);
            }
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
            'leagues' => $leagues,
            'clubs' => $clubs,
            'stadiums' => $stadiums,
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

            if (in_array($obj_type,['status','feature_match','hot_match','deleted'])) {
                $status = !empty($model->$obj_type)?$model->$obj_type:0;
                $model->$obj_type = $status==1?0:1;
                $model->updated_by = Yii::$app->user->id;
                $model->updated_time = date('Y-m-d H:i:s');
                if ($obj_type=='hot_match' && $status==0) {
                    Match::updateAll(['hot_match'=>0],['status'=>1,'deleted'=>0,'hot_match'=>1]);
                }
                $model->save(false);
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
     * Finds the Match model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Match the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Match::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
