<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\Utility;

/* @var $this yii\web\View */
/* @var $model backend\models\Match */

$this->title = $model->title;


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
    'label' => 'Match',
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
<div class="detail-view match-view">
    <p>
        <?= Html::a('<i class="fa fa-reply"></i> ' . 'Back', ['index'], ['class' => 'btn btn-b btn-primary']) ?>
        <?= Html::a('<i class="fa fa-edit"></i> ' . 'Update', ['update', 'id' => $model->id], ['class' => 'btn btn-b btn-primary green']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
			[
				'attribute' => 'id',
					'value' => function ($data) {
						return $data['id'];
					},
			],
			[
				'attribute' => 'title',
					'value' => function ($data) {
						return $data['title'];
					},
			],
			[
				'attribute' => 'league_id',
					'value' => function ($data) use ($leagues) {
						return !empty($leagues[$data['league_id']])?$leagues[$data['league_id']]:'';
					},
			],
			[
				'attribute' => 'club1_id',
					'value' => function ($data) use ($clubs) {
						return !empty($clubs[$data['club1_id']])?$clubs[$data['club1_id']]:'';
					},
			],
			[
				'attribute' => 'club2_id',
					'value' => function ($data) use ($clubs) {
                        return !empty($clubs[$data['club2_id']])?$clubs[$data['club2_id']]:'';
					},
			],
			[
				'attribute' => 'start_time',
					'value' => function ($data) {
						return Utility::format_datetime_vn($data['start_time']);
					},
			],
			[
				'attribute' => 'stadium_id',
					'value' => function ($data) use ($stadiums) {
						return !empty($stadiums[$data['stadium_id']])?$stadiums[$data['stadium_id']]:'';
					},
			],
			[
				'attribute' => 'url1',
					'value' => function ($data) {
						return $data['url1'];
					},
			],
            [
                'attribute' => 'url2',
                'value' => function ($data) {
                    return $data['url2'];
                },
            ],
            [
                'attribute' => 'url3',
                'value' => function ($data) {
                    return $data['url3'];
                },
            ],
			[
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data['status']==1?Utility::showLabel('success','Active'):Utility::showLabel('danger','DeActive');
                },
			],
			[
				'attribute' => 'created_by',
					'value' => function ($data) use ($users) {
						return !empty($users[$data['created_by']])?$users[$data['created_by']]:'';
					},
			],
			[
				'attribute' => 'created_time',
					'value' => function ($data) {
						return Utility::format_datetime_vn($data['created_time']);
					},
			],
			[
				'attribute' => 'updated_by',
					'value' => function ($data) use ($users) {
						return !empty($users[$data['updated_by']])?$users[$data['updated_by']]:'';
					},
			],
			[
				'attribute' => 'updated_time',
					'value' => function ($data) {
						return Utility::format_datetime_vn($data['updated_time']);
					},
			],
			[
				'attribute' => 'sort',
					'value' => function ($data) {
						return $data['sort'];
					},
			],
			[
				'attribute' => 'feature_match',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data['feature_match']==1?Utility::showLabel('success','Active'):Utility::showLabel('danger','DeActive');
                },
			],
			[
				'attribute' => 'hot_match',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data['hot_match']==1?Utility::showLabel('success','Active'):Utility::showLabel('danger','DeActive');
                },
			],
        ],
    ]) ?>

</div>
