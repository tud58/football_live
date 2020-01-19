<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Ads;
use common\Utility;

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
<?php
    $ads_fix_left = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>8]);
    $ads_fix_right = Ads::findAll(['status'=>1,'deleted'=>0,'ads_location_id'=>9]);
    $ads_fix_down_left = Ads::findOne(['status'=>1,'deleted'=>0,'ads_location_id'=>10]);
    $ads_fix_down_right = Ads::findOne(['status'=>1,'deleted'=>0,'ads_location_id'=>11]);
    $ads_top_nav = Ads::findOne(['status'=>1,'deleted'=>0,'ads_location_id'=>1]);
?>

<?php if (!empty($ads_fix_left)) { ?>
    <div class="ads BannerSticky BannerStickyLeft hidden-sm-down" style="top: 200px;">
        <div class="BannerStickyLeft_content" style="position: fixed;">
        <?php foreach ($ads_fix_left as $afl) { ?>
            <a href="<?=$afl->url?>" target="_blank" class="d-block mb-10">
                <img width="120px" class="img-fluid" src="<?=Utility::getUrlAds($afl->id)?>" title="<?=$afl->title?>" alt="<?=$afl->description?>">
            </a>
        <?php } ?>
        </div>
    </div>
<?php } ?>

<div class="wrap">
    <?php if (!empty($ads_top_nav)) { ?>
    <div class="container ads ads-top-nav" style="padding: 0;">
        <a class="" href="<?=$ads_top_nav->url?>">
            <img src="<?=Utility::getUrlAds($ads_top_nav->id)?>" style="width: 100%">
        </a>
    </div>
    <?php } ?>
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
                        <a href="/"><i class="glyphicon glyphicon-th-list mr-2"></i> Lịch trực tiếp</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/"><i class="glyphicon glyphicon-list-alt mr-2"></i> Tỉ số</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/"><i class="glyphicon glyphicon-file mr-2"></i> Tin tức</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/"><i class="glyphicon glyphicon-facetime-video mr-2"></i> Video bàn thắng</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/"><i class="glyphicon glyphicon-edit mr-2"></i> Soi kèo</a>
                    </li>
                    <li class="col-sm-2">
                        <a href="/"><i class="glyphicon glyphicon-globe mr-2"></i> Link Sopcast</a>
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

<?php if (!empty($ads_fix_right)) { ?>
<div class="ads BannerSticky BannerStickyRight hidden-sm-down" style="top: 200px;">
    <div class="BannerStickyRight_content" style="position: fixed;">
        <?php foreach ($ads_fix_right as $afr) { ?>
            <a href="<?=$afr->url?>" target="_blank" class="d-block mb-10">
                <img width="120px" class="img-fluid" src="<?=Utility::getUrlAds($afr->id)?>" title="<?=$afr->title?>" alt="<?=$afr->description?>">
            </a>
        <?php } ?>
    </div>
</div>
<?php } ?>

<?php if (!empty($ads_fix_down_left)) { ?>
<div class="ads BannerFixed BannerFixedLeft ad_c1 hidden-sm-down">
    <div class="BannerFixedLeft_content">
        <a href="<?=$ads_fix_down_left->url?>" target="_blank" class="d-block mb-10">
            <img width="360px" class="img-fluid" src="<?=Utility::getUrlAds($ads_fix_down_left->id)?>" alt="banner">
        </a>
        <a class="close-banner" onclick="closeBanner('BannerFixedLeft')"><i class="glyphicon glyphicon-remove-sign"></i></a>
    </div>
</div>
<?php } ?>
<?php if (!empty($ads_fix_down_right)) { ?>
<div class="ads BannerFixed BannerFixedRight ad_c2 hidden-sm-down">
    <div class="BannerFixedRight_content">

        <a href="<?=$ads_fix_down_right->url?>" target="_blank" class="d-block mb-10">
            <img width="360px" class="img-fluid" src="<?=Utility::getUrlAds($ads_fix_down_right->id)?>" alt="banner">
        </a>
        <a class="close-banner" onclick="closeBanner('BannerFixedRight')"><i class="glyphicon glyphicon-remove-sign"></i></a>
    </div>
</div>
<?php } ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
