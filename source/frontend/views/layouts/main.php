<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">

    <script src="https://use.fontawesome.com/20603b964f.js"></script>
    <script type="text/javascript" src="https://cdn.jwplayer.com/libraries/gaqdEdUp.js"></script>
    <script type="text/javascript">jwplayer.key = 'ypdL3Acgwp4Uh2/LDE9dYh3W/EPwDMuA2yid4ytssfI=';</script>

    <script src="https://unpkg.com/swiper/js/swiper.js"></script>
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="BannerStickyLeft hidden-sm-down" style="top: 100px;">
    <div class="BannerStickyLeft_content" style="position: fixed;">

        <a href="https://11met.live/uploads/banner/yo88-float-left.html" target="_blank" class="d-block mb-10">
            <img width="120px" class="img-fluid" src="https://i.imgur.com/U45AKcZ.gif" title="game bài đổi thưởng" alt="game bài đổi thưởng nhiều người chơi nhất">
        </a>
        <a href="https://11met.live/uploads/banner/go88-B2-float-left.html" target="_blank" class="d-block mb-10">
            <img width="120px" class="img-fluid" src="https://i.imgur.com/6pmzNRs.gif" title="game bài đổi thưởng go88" alt="game bài đổi thưởng go88">
        </a>
    </div>
</div>

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

    <div class="container" style="padding: 60px 0; background-color: #000;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<div class="BannerStickyRight hidden-sm-down" style="top: 100px;">
    <div class="BannerStickyRight_content" style="position: fixed;">

        <a href="https://11met.live/uploads/banner/nhatvip-B3-float-right.html" target="_blank" class="d-block mb-10">
            <img width="120px" class="img-fluid" src="https://i.imgur.com/W7Sb6eB.gif" title="game bài đổi thưởng go88" alt="game bài đổi thưởng go88">
        </a>
        <a href="https://11met.live/uploads/banner/zbet-B4-float-right.html" target="_blank" class="d-block mb-10">
            <img width="120px" class="img-fluid" src="https://i.imgur.com/5pp2K7F.gif" alt="banner">
        </a>
    </div>
</div>

<div class="BannerFixed BannerFixedLeft ad_c1 hidden-sm-down">
    <div class="BannerFixedLeft_content">

        <a href="https://11met.live/uploads/banner/C1bong99.html" target="_blank" class="d-block mb-10">
            <img width="360px" class="img-fluid" src="https://i.imgur.com/9BugJH4.gif" alt="banner">
        </a>
        <div class="close-banner"><i class="glyphicon glyphicon-remove-sign"></i></div>
    </div>
</div>
<div class="BannerFixed BannerFixedRight ad_c2 hidden-sm-down">
    <div class="BannerFixedRight_content">

        <a href="https://11met.live/uploads/banner/C28live.html" target="_blank" class="d-block mb-10">
            <img width="360px" class="img-fluid" src="https://i.imgur.com/9BugJH4.gif" alt="banner">
        </a>
        <div class="close-banner"><i class="glyphicon glyphicon-remove-sign"></i></div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
