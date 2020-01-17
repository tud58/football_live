<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$leagues = \frontend\models\League::findAll(['status'=>1, 'deleted'=>0]);

$times = [
        0 => 'Tất Cả',
        1 => 'Trận HOT',
        2 => 'Đang đá',
        3 => 'Hôm nay',
        4 => 'Ngày mai',
        5 => 'Tuần này',
];

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container ads ads-top-nav" style="padding: 0;">
        <img src="/img/VFez35m.gif" style="width: 100%">
    </div>
    <div class="logo" style="width: 100%; height: 50px; text-align: center;">
        <a class="" href="/index.php" style="font-size: 25px; font-weight: bold; text-decoration: none; line-height: 50px;">FootBall Live</a>
    </div>
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" style="top: auto; position: absolute;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav nav" style="text-align: center; float: none;">
                    <li class="col-sm-2">
                        <a href="/">Lịch trực tiếp</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/">Tỉ số</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/">Tin tức</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/">Video bàn thắng</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/">Soi kèo</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/">Link Sopcast</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="padding: 60px 0;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
