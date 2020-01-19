<?php

namespace backend\controllers;

use backend\models\League;
use backend\models\LeagueClub;
use backend\models\Stadium;
use backend\models\User;
use common\Utility;
use Yii;
use backend\models\Club;
use backend\models\search\ClubSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * ClubController implements the CRUD actions for Club model.
 */
class ClubController extends Controller
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
     * Lists all Club models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $users = ArrayHelper::map(User::find()->All(),'id','username');
        $league_club = (New LeagueClub())->getLeagueClubArr();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'users' => $users,
            'league_club' => ArrayHelper::map($league_club,'club_id','league_id'),
        ]);
    }

    /**
     * Displays a single Club model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $leagues = ArrayHelper::map((New LeagueClub())->getLeagueClubArr($id),'club_id','league_id');
        $users = ArrayHelper::map(User::find()->All(),'id','username');
        $stadiums = ArrayHelper::map(Stadium::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        return $this->render('view', [
            'model' => $model,
            'leagues' => !empty($leagues[$id])?$leagues[$id]:'',
            'users' => $users,
            'stadiums' => $stadiums,
        ]);
    }

    /**
     * Creates a new Club model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Club();
        $leagues = League::findAll(['status'=>1, 'deleted'=>0]);
        $stadiums = ArrayHelper::map(Stadium::findAll(['status'=>1, 'deleted'=>0]),'id','name');

        if ($model->load(Yii::$app->request->post())) {
            $slug = Utility::convert_vi_to_en(Yii::$app->request->post('Club')['name']);
            $model->slug = $slug;
            $model->created_time = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->id;
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            $request = Yii::$app->request->post();
            if ($model->save()) {
                $file = UploadedFile::getInstance($model, 'logo');
                if (!empty($file)) {
                    $file->saveAs(PATH_STORAGE . 'clubs/' . $model->id. '.' . $file->extension);
//                    $file->saveAs(PATH_STORAGE . 'clubs/' . $model->id . '_real.' . $file->extension);
//                    Utility::resize_crop_image(200, 200, PATH_STORAGE . 'clubs/' . $model->id . '_real.' . $file->extension, PATH_STORAGE . 'clubs/' . $model->id . '.' . $file->extension, 100);

                    $model->logo = $model->id . '.' . $file->extension;
                }
                $model->save(false);

                foreach ($leagues as $l) {
                    $league = 'league_'.$l->id;
                    if (!empty($request[$league]) && $request[$league] == 'on') {
                        $map = New LeagueClub();
                        $map->club_id = $model->id;
                        $map->league_id = $l->id;
                        $map->created_time = date('Y-m-d H:i:s');
                        $map->created_by = Yii::$app->user->id;
                        $map->updated_time = date('Y-m-d H:i:s');
                        $map->updated_by = Yii::$app->user->id;
                        $map->save(false);
                    }
                }

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
            'stadiums' => $stadiums,
        ]);
    }

    /**
     * Updates an existing Club model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $leagues = League::findAll(['status'=>1, 'deleted'=>0]);
        $stadiums = ArrayHelper::map(Stadium::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $league_club = ArrayHelper::map(LeagueClub::findAll(['club_id'=>$id, 'status'=>1,'deleted'=>0]),'league_id', 'club_id');

        $img = Utility::getUrlClub($id);
        $logo = $model->logo;

        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post();
            $slug = Utility::convert_vi_to_en(Yii::$app->request->post('Club')['name']);
            $model->slug = $slug;
            $model->updated_time = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->id;
            $model->logo = $logo;
            if ($model->save()) {
                $file = UploadedFile::getInstance($model, 'logo');
                if (!empty($file)) {
                    $file->saveAs(PATH_STORAGE.'clubs/' . $model->id. '.' . $file->extension);
//                    $file->saveAs(PATH_STORAGE.'clubs/' . $model->id . '_real.' . $file->extension);
//                    Utility::resize_crop_image(200,200, PATH_STORAGE.'clubs/' . $model->id . '_real.' . $file->extension, PATH_STORAGE.'clubs/' . $model->id . '.' . $file->extension,100);

                    $model->logo = $model->id.'.'.$file->extension;
                    $model->save(false);
                }

                $maps = LeagueClub::deleteAll(['club_id'=>$id]);
                foreach ($leagues as $l) {
                    $league = 'league_'.$l->id;
                    if (!empty($request[$league]) && $request[$league] == 'on') {
                        $map = New LeagueClub();
                        $map->club_id = $model->id;
                        $map->league_id = $l->id;
                        $map->created_time = date('Y-m-d H:i:s');
                        $map->created_by = Yii::$app->user->id;
                        $map->updated_time = date('Y-m-d H:i:s');
                        $map->updated_by = Yii::$app->user->id;
                        $map->save(false);
                    }
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
            'leagues' => $leagues,
            'stadiums' => $stadiums,
            'img' => $img,
            'league_club' => $league_club,
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
     * Finds the Club model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Club the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Club::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
