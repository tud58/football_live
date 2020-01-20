<?php
namespace frontend\controllers;

use common\Utility;
use frontend\models\Ads;
use frontend\models\Club;
use frontend\models\League;
use frontend\models\Match;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $ads_down_nav = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>2]);
        $ads_double = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>3]);
        $ads_down_double = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>4]);
        $ads_down_hot = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>7]);
        $ads_left_content = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>5]);
        $ads_right_content = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>6]);

        $match_hot = Match::findOne(['status'=>1, 'deleted'=>0, 'hot_match'=>1]);
        $match_feature = Match::find()->where(['status'=>1, 'deleted'=>0, 'feature_match'=>1])->limit(20)->all();
        $list_match = Match::find()->where(['status'=>1, 'deleted'=>0])->limit(100)->all();

        $clubs = ArrayHelper::map(Club::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $leagues = ArrayHelper::map(League::findAll(['status'=>1, 'deleted'=>0]),'id','name');

        return $this->render('index',[
            'ads_down_nav' => $ads_down_nav,
            'ads_double' => $ads_double,
            'ads_down_double' => $ads_down_double,
            'ads_down_hot' => $ads_down_hot,
            'ads_left_content' => $ads_left_content,
            'ads_right_content' => $ads_right_content,
            'match_hot' => $match_hot,
            'match_feature' => $match_feature,
            'list_match' => $list_match,
            'leagues' => $leagues,
            'clubs' => $clubs,
        ]);
    }

    public function actionLive($code)
    {
        $ads_down_nav = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>2]);
        $ads_double = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>3]);
        $ads_down_double = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>4]);
        $ads_down_hot = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>7]);
        $ads_left_content = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>5]);
        $ads_right_content = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>6]);

        $list_match = Match::find()->where(['status'=>1, 'deleted'=>0])->limit(100)->all();

        $clubs = ArrayHelper::map(Club::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $leagues = ArrayHelper::map(League::findAll(['status'=>1, 'deleted'=>0]),'id','name');
        $match_id = Utility::decodeMatch($code);
        $match = Match::findOne(['status'=>1, 'deleted'=>0,'id'=>$match_id]);

        return $this->render('live',[
            'ads_down_nav' => $ads_down_nav,
            'ads_double' => $ads_double,
            'ads_down_double' => $ads_down_double,
            'ads_down_hot' => $ads_down_hot,
            'ads_left_content' => $ads_left_content,
            'ads_right_content' => $ads_right_content,
            'list_match' => $list_match,
            'leagues' => $leagues,
            'clubs' => $clubs,
            'match' => $match,
        ]);
    }

    public function actionLoadMatch()
    {
        die('123');
        $request = Yii::$app->request->post();
        $type = !empty($request['type'])?$request['type']:1;
        $value = !empty($request['value'])?$request['value']:0;

        $matchs = (New Match())->getMatch($type,$value);

        var_dump($matchs);die;

        return $this->renderAjax('load_match', [
            'matchs' => $matchs,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
