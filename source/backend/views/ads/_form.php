<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ads */
/* @var $form yii\widgets\ActiveForm */
?>

<p>
    <?= Html::a('<i class="fa fa-reply"></i> ' . Yii::t('cms', 'Back'), ['index'], ['class' => 'btn btn-b btn-primary']) ?></p>

<div class="portlet box">
    <div class="portlet-body form portlet-body-form">
        <div class="ads-form">

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

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('title'))) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 255])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('description'))) ?>

    <?= $form->field($model, 'ads_location_id')->textInput()->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('ads_location_id'))) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 500])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('url'))) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => 500])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('img'))) ?>

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