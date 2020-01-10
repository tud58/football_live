<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <meta name="csrf-param" content="_csrf-backend">
    <meta name="csrf-token" content="BzOomFjMJ8SI37qT0QwVaDGRfJ8uYUpj26-JDxyr2QJIasrHHaR3hf-0zduzfndRXuYbrFoXOQqj7b1QT_2hOg==">

    <link href="/assets/e8dea343/css/bootstrap.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">
    <link href="/css/jquery-confirm.min.css" rel="stylesheet">
    <link href="/css/jquery.toast.css" rel="stylesheet">
</head>
<body>
<div class="container site-login">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <div class="center mb-5">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group center">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</body>
</html>
