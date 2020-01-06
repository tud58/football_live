<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

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
					'value' => function ($data) {
						return $data['league_id'];
					},
			],
			[
				'attribute' => 'club1_id',
					'value' => function ($data) {
						return $data['club1_id'];
					},
			],
			[
				'attribute' => 'club2_id',
					'value' => function ($data) {
						return $data['club2_id'];
					},
			],
			[
				'attribute' => 'start_time',
					'value' => function ($data) {
						return $data['start_time'];
					},
			],
			[
				'attribute' => 'stadium_id',
					'value' => function ($data) {
						return $data['stadium_id'];
					},
			],
			[
				'attribute' => 'url',
					'value' => function ($data) {
						return $data['url'];
					},
			],
			[
				'attribute' => 'status',
					'value' => function ($data) {
						return $data['status'];
					},
			],
			[
				'attribute' => 'deleted',
					'value' => function ($data) {
						return $data['deleted'];
					},
			],
			[
				'attribute' => 'thumb',
					'value' => function ($data) {
						return $data['thumb'];
					},
			],
			[
				'attribute' => 'created_by',
					'value' => function ($data) {
						return $data['created_by'];
					},
			],
			[
				'attribute' => 'created_time',
					'value' => function ($data) {
						return $data['created_time'];
					},
			],
			[
				'attribute' => 'updated_by',
					'value' => function ($data) {
						return $data['updated_by'];
					},
			],
			[
				'attribute' => 'updated_time',
					'value' => function ($data) {
						return $data['updated_time'];
					},
			],
			[
				'attribute' => 'sort',
					'value' => function ($data) {
						return $data['sort'];
					},
			],
        ],
    ]) ?>

</div>
