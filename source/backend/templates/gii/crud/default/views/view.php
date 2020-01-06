<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;


$this->params['pageTitleConfig'] = [
    'main_text' => $this->title,
    'note_text' => ''
];
$this->params['breadcrumb'] = [
[
    'label' => Yii::t('cms', 'Home'),
    'link' => Url::home(),
    'active' => false
],
[
    'label' => <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>,
    'link' => Url::toRoute(['index']),
    'active' => false
],
[
    'label' => $this->title,
    'link' => null,
    'active' => true
]
];


?>
<div class="detail-view <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
    <p>
        <?= "<?=" ?> Html::a('<i class="fa fa-reply"></i> ' . <?= $generator->generateString('Back') ?>, ['index'], ['class' => 'btn btn-b btn-primary']) <?= "?>" ?>

        <?= "<?= " ?>Html::a('<i class="fa fa-edit"></i> ' . <?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-b btn-primary green']) ?>
    </p>

    <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "\t\t\t[\n";
        echo "\t\t\t\t'attribute' => '{$name}',\n";
        echo "\t\t\t\t\t'value' => function (\$data) {\n";
        echo "\t\t\t\t\t\treturn \$data['{$name}'];\n";
        echo "\t\t\t\t\t},\n";
        echo "\t\t\t],\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        echo "\t\t\t[\n";
        echo "\t\t\t\t'attribute' => '{$column->name}',\n";
        echo "\t\t\t\t\t'value' => function (\$data) {\n";
        echo "\t\t\t\t\t\treturn \$data['{$column->name}'];\n";
        echo "\t\t\t\t\t},\n";
        echo "\t\t\t],\n";
    }
}
?>
        ],
    ]) ?>

</div>
