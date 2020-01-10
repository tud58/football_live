<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\Utility;

/* @var $this yii\web\View */
/* @var $model backend\models\Club */

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
    'label' => 'Club',
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
<div class="detail-view club-view">
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
				'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data['status']==1?Utility::showLabel('success','Active'):Utility::showLabel('danger','DeActive');
                },
			],
			[
				'attribute' => 'logo',
                'format' => ['image',['width'=>'200','height'=>'200']],
                'value' => function ($data) {
                    return Utility::getUrlClub($data["id"]);
                },
			],
            [
                'attribute' => 'stadium_id',
                'value' => function ($data) use ($stadiums) {
                    return !empty($stadiums[$data['stadium_id']])?$stadiums[$data['stadium_id']]:'';
                },
            ],
            [
                'attribute' => 'league',
                'value' => function ($data) use ($leagues) {
                    return $leagues;
                },
            ],
			[
				'attribute' => 'created_by',
					'value' => function ($data) use ($users) {
						return $users[$data['created_by']];
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
						return $users[$data['updated_by']];
					},
			],
			[
				'attribute' => 'updated_time',
					'value' => function ($data) {
						return Utility::format_datetime_vn($data['updated_time']);
					},
			],
        ],
    ]) ?>

</div>
