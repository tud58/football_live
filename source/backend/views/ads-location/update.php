<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\AdsLocation */

$this->title = 'Ads Location';

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
        'label' => Yii::t('cms', 'Update'),
        'link' => null,
        'active' => true
    ]
];

?>
<div class="ads-location-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
