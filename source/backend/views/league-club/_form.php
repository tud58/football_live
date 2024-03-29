<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LeagueClub */
/* @var $form yii\widgets\ActiveForm */
?>

<p>
    <?= Html::a('<i class="fa fa-reply"></i> ' . Yii::t('cms', 'Back'), ['index'], ['class' => 'btn btn-b btn-primary']) ?></p>

<div class="portlet box">
    <div class="portlet-body form portlet-body-form">
        <div class="league-club-form">

            <?php $form = ActiveForm::begin([
                'id' => 'form-horizontal',
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
            ]); ?>


            <?php if (Yii::$app->session->hasFlash('error')) { ?>                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo Yii::$app->session->getFlash('error') ?></span>
                </div>
            <?php } elseif (Yii::$app->session->hasFlash('success')) { ?>                <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo Yii::$app->session->getFlash('success') ?></span>
                </div>
            <?php } ?>

                <?= $form->field($model, 'id')->textInput()->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('id'))) ?>

    <?= $form->field($model, 'club_id')->textInput()->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('club_id'))) ?>

    <?= $form->field($model, 'league_id')->textInput()->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('league_id'))) ?>

    <?= $form->field($model, 'status', [
                        'template' => '<div>{label}<div class="col-sm-9 checkbox_element">{input}</div></div>'
                    ])->checkbox(['label' => false])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('status'))) ?>

            <div class="form-group" style="text-align: center">
                <?= Html::submitButton('<i class="fa fa-save"></i> ' . 'Save', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('<i class="fa fa-refresh"></i> ' . 'Reset', ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>