<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Match */

$this->title = 'Match';

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
        'label' => Yii::t('cms', 'Update'),
        'link' => null,
        'active' => true
    ]
];

?>
<div class="match-update">
    <?= $this->render('_form', [
        'model' => $model,
        'leagues' => $leagues,
        'clubs' => $clubs,
        'stadiums' => $stadiums,
    ]) ?>

</div>
