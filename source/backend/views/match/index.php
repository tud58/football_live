<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\GridView;
use common\Utility;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'Match';

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
                    <div class="btn-group mb-3">
                        <a href="<?php echo Url::toRoute(['create']) ?>" id="sample_editable_1_new" class="btn btn-primary">
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
			'attribute' => 'title',
			'value' => function ($data) { 
				return $data['title'];
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
			[
			'attribute' => 'league_id',
			'value' => function ($data) use ($leagues) {
				return !empty($leagues[$data['league_id']])?$leagues[$data['league_id']]:"";
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
			[
			'attribute' => 'club1_id',
			'value' => function ($data) use ($clubs) {
				return !empty($clubs[$data['club1_id']])?$clubs[$data['club1_id']]:'';
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
			[
			'attribute' => 'club2_id',
			'value' => function ($data) use ($clubs) {
				return !empty($clubs[$data['club2_id']])?$clubs[$data['club2_id']]:'';
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		[
			'attribute' => 'start_time',
			'value' => function ($data) { 
				return Utility::format_datetime_vn($data['start_time']);
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],

		[
			'attribute' => 'stadium_id',
			'value' => function ($data) use ($stadiums) {
				return !empty($stadiums[$data['stadium_id']])?$stadiums[$data['stadium_id']]:'';
			},
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
		[
			'attribute' => 'status',
            'format' => 'raw',
            'value' => function ($data) {
                $class = $data->status == 1 ? 'btn btn-success btn-xs btn-app':'btn btn-danger btn-xs btn-app';
                $obj_id = $data->id;
                $obj_type = 'status';
                $message = Yii::t('cms', 'Are you sure update this item') . '?';
                $url = Url::toRoute(['change-status-object']);
                return Html::a('<span class="glyphicon glyphicon-ok-sign"></span>', 'javascript:void(0);', [
                    'title' => Yii::t('cms', 'Status'),
                    'class'=>$class,
                    'data-pjax' => 'w0',
                    'onclick' => 'changeStatusItem("' . $obj_id . '", "' . $obj_type . '", "' . $message . '", "' . $url . '")',
                ]);
            },
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
            [
                'attribute' => 'hot_match',
                'format' => 'raw',
                'value' => function ($data) {
                    $class = $data->hot_match == 1 ? 'btn btn-success btn-xs btn-app':'btn btn-danger btn-xs btn-app';
                    $obj_id = $data->id;
                    $obj_type = 'hot_match';
                    $message = Yii::t('cms', 'Are you sure update this item') . '?';
                    $url = Url::toRoute(['change-status-object']);
                    return Html::a('<span class="glyphicon glyphicon-ok-sign"></span>', 'javascript:void(0);', [
                        'title' => Yii::t('cms', 'Hot Match'),
                        'class'=>$class,
                        'data-pjax' => 'w0',
                        'onclick' => 'changeStatusItem("' . $obj_id . '", "' . $obj_type . '", "' . $message . '", "' . $url . '")',
                    ]);
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
            ],
		[
			'attribute' => 'feature_match',
            'format' => 'raw',
            'value' => function ($data) {
                $class = $data->feature_match == 1 ? 'btn btn-success btn-xs btn-app':'btn btn-danger btn-xs btn-app';
                $obj_id = $data->id;
                $obj_type = 'feature_match';
                $message = Yii::t('cms', 'Are you sure update this item') . '?';
                $url = Url::toRoute(['change-status-object']);
                return Html::a('<span class="glyphicon glyphicon-ok-sign"></span>', 'javascript:void(0);', [
                    'title' => Yii::t('cms', 'Feature Match'),
                    'class'=>$class,
                    'data-pjax' => 'w0',
                    'onclick' => 'changeStatusItem("' . $obj_id . '", "' . $obj_type . '", "' . $message . '", "' . $url . '")',
                ]);
            },
			'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
			'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
		],
            [
                'attribute' => 'sort',
                'value' => function ($data) {
                    return $data['sort'];
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle;', 'class' => 'sortable'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle;'],
            ],
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
                            'class'=>'btn btn-primary btn-xs btn-app mr-1',
                            'data-pjax' => '0',
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => 'Update',
                            'class'=>'btn btn-primary btn-xs btn-app mr-1',
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        $obj_id = $model->primaryKey;
                        $obj_type = 'deleted';
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