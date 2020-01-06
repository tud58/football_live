<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'Create';
$this->params['menu'] = [
    ['label'=>'<i class="fa fa-reply"></i> ' . 'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-b btn-primary']],
];

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
        'label' => Yii::t('cms', 'Create'),
        'link' => null,
        'active' => true
    ]
];

?>
<div class="user-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

