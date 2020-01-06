<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\LeagueClub */

$this->title = $model->id;


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
    'label' => 'League Club',
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
<div class="detail-view league-club-view">
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
				'attribute' => 'club_id',
					'value' => function ($data) {
						return $data['club_id'];
					},
			],
			[
				'attribute' => 'league_id',
					'value' => function ($data) {
						return $data['league_id'];
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
        ],
    ]) ?>

</div>
