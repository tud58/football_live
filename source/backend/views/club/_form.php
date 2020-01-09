<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Club */
/* @var $form yii\widgets\ActiveForm */
?>

<p>
    <?= Html::a('<i class="fa fa-reply"></i> ' . Yii::t('cms', 'Back'), ['index'], ['class' => 'btn btn-b btn-primary']) ?></p>

<div class="portlet box">
    <div class="portlet-body form portlet-body-form">
        <div class="club-form">

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

            <?= $form->field($model, 'name')->textInput(['maxlength' => 255])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('name'))) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => 255])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('description'))) ?>

            <?= $form->field($model, 'stadium_id')->dropDownList($stadiums,['prompt'=>'Chọn sân nhà']) ?>

            <div class="form-group">
                <label class="control-label has-star col-sm-3">Giải đấu</label>
                <div class="col-sm-9 checkbox_element pl-0 l-3">
                    <?php foreach ($leagues as  $l) { ?>
                        <div class="col-sm-3"><input type="checkbox" name="league_<?=$l->id?>" id="league_<?=$l->id?>" <?=!empty($league_club[$l->id])?'checked':'xx'?>> <?=$l->name?></div>
                    <?php } ?>
                </div>
            </div>

            <?= $form->field($model, 'logo',['template' => '<div>{label}<div class="col-sm-9 checkbox_element pl-0">{input}</div></div>'])->fileInput(['accept'=>"image/png,image/jpg,image/jpeg", 'onchange'=>"showImg(event)",'class' => 'ml-3'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('source'))) ?>

            <div class="form-group">
                <label class="control-label has-star col-sm-3"></label>
                <div class="col-sm-9 checkbox_element pl-0 l-3">
                    <?php if (!empty($img)) { ?>
                        <img id="show_img" src="<?=$img?>" height="200" width="200">
                    <?php } else { ?>
                        <img id="show_img" src="https://via.placeholder.com/200x200.png" height="200" width="200">
                    <?php } ?>
                </div>
            </div>

            <?= $form->field($model, 'status', [
                'template' => '<div>{label}<div class="col-sm-9 checkbox_element">{input}</div></div>'
            ])->checkbox([])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('status'))) ?>


            <div class="form-group" style="text-align: center">
                <?= Html::submitButton('<i class="fa fa-save"></i> ' . 'Save', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('<i class="fa fa-refresh"></i> ' . 'Reset', ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>