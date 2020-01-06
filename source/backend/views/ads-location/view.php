<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\AdsLocation */

$this->title = $model->name;


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
    'label' => 'Ads Location',
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
<div class="detail-view ads-location-view">
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
				'attribute' => 'name',
					'value' => function ($data) {
						return $data['name'];
					},
			],
			[
				'attribute' => 'description',
					'value' => function ($data) {
						return $data['description'];
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
        ],
    ]) ?>

</div>
