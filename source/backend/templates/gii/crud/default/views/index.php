<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>;

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
        'label' => $this->title,
        'link' => null,
        'active' => true
    ]
];

?>

<div class="portlet light">
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <a href="<?= "<?php echo Url::toRoute(['create']) ?>" ?>" id="sample_editable_1_new" class="btn green">
                            <?= "<?php echo Yii::t('cms', 'Add New') ?>" ?> <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
<?php if ($generator->indexWidgetType === 'grid'): ?>
<?= "<?php " ?>Pjax::begin(['id' => 'admin-grid-view']);<?= "?> \n" ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
            [
                'class' => 'yii\grid\SerialColumn',
                'options' => ['width' => '40px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;']
            ],
<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "\t\t[\n";
            echo "\t\t\t'attribute' => '{$name}',\n";
            echo "\t\t\t'value' => function (\$data) { \n";
            echo "\t\t\t\treturn \$data['{$name}'];\n";
            echo "\t\t\t},\n";
            echo "\t\t\t'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],\n";
            echo "\t\t\t'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],\n";
            echo "],\n";
        } else {
            echo "\t\t/*\n";
            echo "\t\t[\n";
            echo "\t\t\t'attribute' => '{$name}',\n";
            echo "\t\t\t'value' => function (\$data) { \n";
            echo "\t\t\t\treturn \$data['{$name}'];\n";
            echo "\t\t\t},\n";
            echo "\t\t\t'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],\n";
            echo "\t\t\t'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],\n";
            echo "\t\t],\n";
            echo "\t\t*/";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "\t\t\t[\n";
            echo "\t\t\t'attribute' => '{$column->name}',\n";
            echo "\t\t\t'value' => function (\$data) { \n";
            echo "\t\t\t\treturn \$data['{$column->name}'];\n";
            echo "\t\t\t},\n";
            echo "\t\t\t'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],\n";
            echo "\t\t\t'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],\n";
            echo "\t\t],\n";
        } else {
            echo "\t\t/*\n";
            echo "\t\t[\n";
            echo "\t\t\t'attribute' => '{$column->name}',\n";
            echo "\t\t\t'value' => function (\$data) { \n";
            echo "\t\t\t\treturn \$data['{$column->name}'];\n";
            echo "\t\t\t},\n";
            echo "\t\t\t'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],\n";
            echo "\t\t\t'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],\n";
            echo "\t\t],\n";
            echo "\t\t*/\n";
        }
    }
}
?>
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'header' => Yii::t('cms', '#'),
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
                'options' => ['width' => '120px'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => <?= $generator->generateString('View') ?>,
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => '0',
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => <?= $generator->generateString('Update') ?>,
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        $obj_id = $model->primaryKey;
                        $obj_type = 'delete';
                        $message = Yii::t('cms', 'Are you sure delete this item') . '?';
                        $url = Url::toRoute(['change-status-object']);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:void(0);', [
                            'title' => Yii::t('cms', 'Delete'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => 'w0',
                            'onclick' => 'changeStatusItem("' . $obj_id . '", "' . $obj_type . '", "' . $message . '", "' . $url . '")',
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>
<?= "<?php " ?>Pjax::end();<?= "?> " ?>
        </div>
    </div>
</div>