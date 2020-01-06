<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LeagueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'League';

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
                        <a href="<?php echo Url::toRoute(['create']) ?>" id="sample_editable_1_new" class="btn green">
                            <?php echo Yii::t('cms', 'Add New') ?> <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
<?php Pjax::begin(['id' => 'admin-grid-view']);?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'options' => ['width' => '40px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;']
            ],
			[
			'attribute' => 'id',
			'value' => function ($data) { 
				return $data['id'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
			[
			'attribute' => 'name',
			'value' => function ($data) { 
				return $data['name'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
			[
			'attribute' => 'description',
			'value' => function ($data) { 
				return $data['description'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
			[
			'attribute' => 'status',
			'value' => function ($data) { 
				return $data['status'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
			[
			'attribute' => 'deleted',
			'value' => function ($data) { 
				return $data['deleted'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		/*
		[
			'attribute' => 'logo',
			'value' => function ($data) { 
				return $data['logo'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		*/
		/*
		[
			'attribute' => 'created_by',
			'value' => function ($data) { 
				return $data['created_by'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		*/
		/*
		[
			'attribute' => 'created_time',
			'value' => function ($data) { 
				return $data['created_time'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		*/
		/*
		[
			'attribute' => 'updated_by',
			'value' => function ($data) { 
				return $data['updated_by'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		*/
		/*
		[
			'attribute' => 'updated_time',
			'value' => function ($data) { 
				return $data['updated_time'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		*/
		/*
		[
			'attribute' => 'sort',
			'value' => function ($data) { 
				return $data['sort'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		*/
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
                            'title' => 'View',
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => '0',
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => 'Update',
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
<?php Pjax::end();?>         </div>
    </div>
</div>