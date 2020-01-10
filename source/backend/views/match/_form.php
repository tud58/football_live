<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use common\Utility;

/* @var $this yii\web\View */
/* @var $model backend\models\Match */
/* @var $form yii\widgets\ActiveForm */
?>

<p>
    <?= Html::a('<i class="fa fa-reply"></i> ' . Yii::t('cms', 'Back'), ['index'], ['class' => 'btn btn-b btn-primary']) ?></p>

<div class="portlet box">
    <div class="portlet-body form portlet-body-form">
        <div class="match-form">

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

            <?= $form->field($model, 'title')->textInput(['maxlength' => 500])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('title'))) ?>

            <?= $form->field($model, 'league_id')->dropDownList($leagues,['prompt'=>'Chọn giải đấu', 'onchange'=>'loadClubByLeage()'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('league_id'))) ?>

            <?= $form->field($model, 'club1_id')->dropDownList($clubs,['prompt'=>'Chọn đội bóng chủ nhà'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('club1_id'))) ?>

            <?= $form->field($model, 'club2_id')->dropDownList($clubs,['prompt'=>'Chọn đội bóng sân khách'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('club2_id'))) ?>

            <?= $form->field($model, 'start_time')->Input('datetime-local',['value'=>!empty($model->start_time)?Utility::format_datetime_local($model->start_time):''])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('start_time'))) ?>

            <?= $form->field($model, 'stadium_id')->dropDownList($stadiums,['prompt'=>'Chọn sân bóng'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('stadium_id'))) ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => 500])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('url'))) ?>

            <?= $form->field($model, 'status', [
                                'template' => '<div>{label}<div class="col-sm-9 checkbox_element">{input}</div></div>'
                            ])->checkbox(['label' => 'Trạng thái trận đấu'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('status'))) ?>

            <?= $form->field($model, 'url_status', [
                'template' => '<div>{label}<div class="col-sm-9 checkbox_element">{input}</div></div>'
            ])->checkbox(['label' => 'Trạng thái link'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('url_status'))) ?>

            <?= $form->field($model, 'hot', [
                'template' => '<div>{label}<div class="col-sm-9 checkbox_element">{input}</div></div>'
            ])->checkbox(['label' => 'Trận đấu nổi bật'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('hot'))) ?>

            <?= $form->field($model, 'thumb',['template' => '<div>{label}<div class="col-sm-9 checkbox_element pl-0">{input}</div></div>'])->fileInput(['accept'=>"image/png,image/jpg,image/jpeg", 'onchange'=>"showImg(event)",'class' => 'ml-3'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('thumb'))) ?>

            <div class="form-group">
                <label class="control-label has-star col-sm-3"></label>
                <div class="col-sm-9 checkbox_element pl-0 l-3">
                    <?php if (!empty($img)) { ?>
                        <img id="show_img" src="<?=$img?>" height="200" width="350">
                    <?php } else { ?>
                        <img id="show_img" src="https://via.placeholder.com/200x350.png" height="200" width="350">
                    <?php } ?>
                </div>
            </div>

            <?= $form->field($model, 'sort')->textInput()->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('sort'))) ?>

            <div class="form-group" style="text-align: center">
                <?= Html::submitButton('<i class="fa fa-save"></i> ' . 'Save', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('<i class="fa fa-refresh"></i> ' . 'Reset', ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>