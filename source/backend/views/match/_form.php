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


            <?php if (Yii::$app->session->hasFlash('error')) { ?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo Yii::$app->session->getFlash('error') ?></span>
                </div>
            <?php } elseif (Yii::$app->session->hasFlash('success')) { ?>
                <div class="alert alert-success">
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

            <?= $form->field($model, 'url1')->textInput(['maxlength' => 500])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('url1'))) ?>
            <?= $form->field($model, 'url2')->textInput(['maxlength' => 500])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('url2'))) ?>
            <?= $form->field($model, 'url3')->textInput(['maxlength' => 500])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('url3'))) ?>

            <?= $form->field($model, 'status', [
                                'template' => '<div>{label}<div class="col-sm-9 checkbox_element">{input}</div></div>'
                            ])->checkbox(['label' => 'Trạng thái trận đấu'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('status'))) ?>

            <?= $form->field($model, 'feature_match', [
                'template' => '<div>{label}<div class="col-sm-9 checkbox_element">{input}</div></div>'
            ])->checkbox(['label' => 'Trận đấu nổi bật'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('feature_match'))) ?>

            <?= $form->field($model, 'hot_match', [
                'template' => '<div>{label}<div class="col-sm-9 checkbox_element">{input}</div></div>'
            ])->checkbox(['label' => 'Trận đấu hot nhất'])->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('hot_match'))) ?>

            <?= $form->field($model, 'sort')->textInput()->label('<i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . Yii::t('cms', $model->getAttributeLabel('sort'))) ?>

            <div class="form-group" style="text-align: center">
                <?= Html::submitButton('<i class="fa fa-save"></i> ' . 'Save', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('<i class="fa fa-refresh"></i> ' . 'Reset', ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>