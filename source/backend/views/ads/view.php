<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\Utility;

/* @var $this yii\web\View */
/* @var $model backend\models\Ads */

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
    'label' => 'Ads',
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
<div class="detail-view ads-view">
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
				'attribute' => 'description',
					'value' => function ($data) {
						return $data['description'];
					},
			],
			[
				'attribute' => 'ads_location_id',
                'value' => function ($data) use ($ads_location) {
                    return $ads_location[$data['ads_location_id']];
                },
			],
            [
                'attribute' => 'type',
                'value' => function ($data) use ($ads_type) {
                    return $ads_type[$data['type']];
                },
            ],
			[
				'attribute' => 'url',
					'value' => function ($data) {
						return $data['url'];
					},
			],
			[
				'attribute' => 'img',
                'format' => ['image',['width'=>'300','height'=>'100']],
                'value' => function ($data) {
                    return Utility::getUrlAds($data["id"]);
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
			[
				'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data['status']==1?Utility::showLabel('success','Active'):Utility::showLabel('danger','DeActive');
                },
			],
        ],
    ]) ?>

</div>
