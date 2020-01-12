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
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.php">FootBall Live</a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-right nav">
                    <?php foreach ($times as $key=>$value) { ?>
                        <li class="menu_<?=$key?>"><a href="javascript:void(0);" onclick="loadMatch(1,<?=$key?>)"><?=$value?></a></li>
                    <?php } ?>
                    <li style="margin-top: 10px; margin-left: 20px">
                        <select class="form-control" onchange="loadMatch(2,1)" id="league" name="league">
                            <option value="0">Tất cả giải đấu</option>
                            <?php if (!empty($leagues)) { ?>
                                <?php foreach ($leagues as $l) { ?>
                                    <option value="<?=$l->id?>"><?=$l->name?></option>
                                <?php }?>
                            <?php } ?>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
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
