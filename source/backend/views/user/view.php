<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

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
    'label' => 'User',
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
<div class="detail-view user-view">
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
				'attribute' => 'username',
					'value' => function ($data) {
						return $data['username'];
					},
			],
			[
				'attribute' => 'fullname',
					'value' => function ($data) {
						return $data['fullname'];
					},
			],
			[
				'attribute' => 'phone',
					'value' => function ($data) {
						return $data['phone'];
					},
			],
			[
				'attribute' => 'email',
					'value' => function ($data) {
						return $data['email'];
					},
			],
			[
				'attribute' => 'status',
					'value' => function ($data) {
						return $data['status'];
					},
			],
			[
				'attribute' => 'type',
					'value' => function ($data) {
						return $data['type'];
					},
			],
			[
				'attribute' => 'created_by',
					'value' => function ($data) {
						return $data['created_by'];
					},
			],
			[
				'attribute' => 'created_at',
					'value' => function ($data) {
						return $data['created_at'];
					},
			],
			[
				'attribute' => 'update_by',
					'value' => function ($data) {
						return $data['update_by'];
					},
			],
			[
				'attribute' => 'updated_at',
					'value' => function ($data) {
						return $data['updated_at'];
					},
			],
        ],
    ]) ?>

</div>
