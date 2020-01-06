<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<p>
    <?= "<?= Html::a('<i class=\"fa fa-reply\"></i> ' . Yii::t('cms', 'Back'), ['index'], ['class' => 'btn btn-b btn-primary']) ?>" ?>
</p>

<div class="portlet box">
    <div class="portlet-body form portlet-body-form">
        <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

            <?= "<?php " ?>$form = ActiveForm::begin([
                'id' => 'form-horizontal',
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
            ]); ?>


            <?= "<?php if (Yii::\$app->session->hasFlash('error')) { ?>" ?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span><?= "<?php echo Yii::\$app->session->getFlash('error') ?>" ?></span>
                </div>
            <?= "<?php } elseif (Yii::\$app->session->hasFlash('success')) { ?>" ?>
                <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>
                    <span><?= "<?php echo Yii::\$app->session->getFlash('success') ?>" ?></span>
                </div>
            <?= "<?php } ?>" ?>


            <?php foreach ($generator->getColumnNames() as $attribute) {
                if (in_array($attribute, ['created', 'updated', 'created_by', 'updated_by', 'created_time', 'updated_time', 'deleted'])) {
                    continue;
                }
                if (in_array($attribute, $safeAttributes)) {
                    echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
                }
            } ?>
            <div class="form-group" style="text-align: center">
                <?= "<?= " ?>Html::submitButton('<i class="fa fa-save"></i> ' . <?= $generator->generateString('Save') ?>, ['class' => 'btn btn-primary']) ?>
                <?= "<?= " ?>Html::resetButton('<i class="fa fa-refresh"></i> ' . <?= $generator->generateString('Reset') ?>, ['class' => 'btn btn-default']) ?>
            </div>

            <?= "<?php " ?>ActiveForm::end(); ?>

        </div>
    </div>
</div>