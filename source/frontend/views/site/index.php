<?php
use common\Utility;

/* @var $this yii\web\View */

$this->title = 'FootBall Live';
?>
<div class="site-index">
    <div class="body-content">

        <div class="col-sm-12">
            <div class="ads ads-down-nav" style="width: 100%">
                <?php if (!empty($ads_down_nav)) { ?>
                    <?php foreach ($ads_down_nav as $adn) { ?>
                    <div class="row" style="margin-bottom: 10px">
                        <a href="<?=$adn->url?>">
                            <img src="<?=Utility::getUrlAds($adn->id)?>" width="100%">
                        </a>
                    </div>
                    <?php } ?>
                <?php } ?>
                <?php if (!empty($ads_double)) { ?>
                    <?php for ($i=0;$i<count($ads_double);$i+=2) { ?>
                    <div class="row" style="margin-bottom: 10px">
                        <a href="<?=$ads_double[$i]->url?>">
                            <img src="<?=Utility::getUrlAds([$ads_double[$i]->id])?>" width="49%" style="float: left">
                        </a>
                        <a <?=$ads_double[$i+1]->url?>>
                            <img src="<?=Utility::getUrlAds([$ads_double[$i+1]->id])?>" width="49%" style="float: right">
                        </a>
                    </div>
                    <?php } ?>
                <?php } ?>
                <?php if (!empty($ads_down_double)) { ?>
                    <?php foreach ($ads_down_double as $add) { ?>
                        <div class="row" style="margin-bottom: 10px">
                            <a href="<?=$add->url?>">
                                <img src="<?=Utility::getUrlAds($add->id)?>" width="100%">
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="list-view" style="width: 100%">
                <?php if (!empty($ads_left_content)) {?>
                <div class="ads-left" style="float: left; width: 15%; margin-left: -15px;">
                    <?php foreach ($ads_left_content as $alc) { ?>
                    <a href="<?=$alc->url?>">
                        <img src="<?=Utility::getUrlAds($alc->id)?>" style="margin-bottom: 10px; width: 100%;">
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="main-content" style="width: 65%; float: left; margin-left: 15px">
                    <div class="box-hot-only box-hot" style="background-image: url('/img/img1.png'); width: 100%; min-height: 425px;">
                        <div class="home-flag uk-first-column" style="width: 35%; float: left; text-align: center; margin-top: 115px;">
                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9768_small.png">
                        </div>
                        <div class="hot-match-info" style="width: 20%; float: left; margin-left: 4%; margin-right: 4%; text-align: center; margin-top: 115px;">
                            <div class="tv-box-5 uk-text-center" style="padding-top: 20px;">
                                <div class="c1" style="font-size: 15px;  color: #ccc">Vô địch U23 Châu Á</div>
                                <div class="c2" style="font-size: 50px;  color: #fff; font-weight: bold;">02:45</div>
                                <div class="c3" style="font-size: 20px;  color: #ccc; font-weight: bold;">Ngày mai</div>
                            </div>
                        </div>
                        <div class="guest-flag" style="width: 35%; float: left; text-align: center; margin-top: 115px;">
                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9772_small.png">
                        </div>
                        <div class="box-hot-main-info">
                            <div class="f-left">
                                <p class="live">Trực tiếp</p>
                                <p class="name-match">Sporting - Benfica</p>
                            </div>
                            <div class="f-right" style="margin-top: 25px;">
                                <a class="btn btn-success" style="border-radius: 20px; padding: 8px 20px; font-weight: bold;" href="/site/live.io">Xem Ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container">
                        <ul class="swiper-wrapper" style="list-style-type:none;">
                            <li class="swiper-slide">
                                <div class="box-slide-hot">
                                    <div class="box-hot" style="background-image: url('https://binhluan.tv/imgs/20180726-The18-Image-How-Many-Players-On-A-Soccer-Field.png'); min-height: 150px;">
                                        <div class="home-flag uk-first-column" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9768_small.png" style="width: 100%">
                                        </div>
                                        <div class="" style="width: 30%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <div class="tv-box-5 uk-text-center" style="padding-top: 5px;">
                                                <div class="c2" style="font-size: 20px;  color: #fff; font-weight: bold;">02:45</div>
                                                <div class="c3" style="font-size: 13px;  color: #ccc; font-weight: bold;">19/01</div>
                                            </div>
                                        </div>
                                        <div class="guest-flag" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9772_small.png" style="width: 100%">
                                        </div>
                                        <div class="button-live">
                                            <div class="f-left" style="margin-top: 35px;">
                                                <button class="btn btn-success" style="border-radius: 20px; padding: 0px 10px; font-size: 12px">Đang diễn ra</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-hot-info">
                                        <p class="name-match">Sporting - Benfica</p>
                                        <p class="name-league">Giải VĐQG Bồ Đào Nha</p>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="box-slide-hot">
                                    <div class="box-hot" style="background-image: url('https://binhluan.tv/imgs/20180726-The18-Image-How-Many-Players-On-A-Soccer-Field.png'); min-height: 150px;">
                                        <div class="home-flag uk-first-column" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9768_small.png" style="width: 100%">
                                        </div>
                                        <div class="" style="width: 30%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <div class="tv-box-5 uk-text-center" style="padding-top: 5px;">
                                                <div class="c2" style="font-size: 20px;  color: #fff; font-weight: bold;">02:45</div>
                                                <div class="c3" style="font-size: 13px;  color: #ccc; font-weight: bold;">19/01</div>
                                            </div>
                                        </div>
                                        <div class="guest-flag" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9772_small.png" style="width: 100%">
                                        </div>
                                        <div class="button-live">
                                            <div class="f-left" style="margin-top: 35px;">
                                                <button class="btn btn-default" style="border-radius: 20px; padding: 0px 10px; font-size: 12px">Sắp diễn ra</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-hot-info">
                                        <p class="name-match">Sporting - Benfica</p>
                                        <p class="name-league">Giải VĐQG Bồ Đào Nha</p>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="box-slide-hot">
                                    <div class="box-hot" style="background-image: url('https://binhluan.tv/imgs/20180726-The18-Image-How-Many-Players-On-A-Soccer-Field.png'); min-height: 150px;">
                                        <div class="home-flag uk-first-column" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9768_small.png" style="width: 100%">
                                        </div>
                                        <div class="" style="width: 30%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <div class="tv-box-5 uk-text-center" style="padding-top: 5px;">
                                                <div class="c2" style="font-size: 20px;  color: #fff; font-weight: bold;">02:45</div>
                                                <div class="c3" style="font-size: 13px;  color: #ccc; font-weight: bold;">19/01</div>
                                            </div>
                                        </div>
                                        <div class="guest-flag" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9772_small.png" style="width: 100%">
                                        </div>
                                        <div class="button-live">
                                            <div class="f-left" style="margin-top: 35px;">
                                                <button class="btn btn-success" style="border-radius: 20px; padding: 0px 10px; font-size: 12px">Đang diễn ra</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-hot-info">
                                        <p class="name-match">Sporting - Benfica</p>
                                        <p class="name-league">Giải VĐQG Bồ Đào Nha</p>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="box-slide-hot">
                                    <div class="box-hot" style="background-image: url('https://binhluan.tv/imgs/20180726-The18-Image-How-Many-Players-On-A-Soccer-Field.png'); min-height: 150px;">
                                        <div class="home-flag uk-first-column" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9768_small.png" style="width: 100%">
                                        </div>
                                        <div class="" style="width: 30%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <div class="tv-box-5 uk-text-center" style="padding-top: 5px;">
                                                <div class="c2" style="font-size: 20px;  color: #fff; font-weight: bold;">02:45</div>
                                                <div class="c3" style="font-size: 13px;  color: #ccc; font-weight: bold;">19/01</div>
                                            </div>
                                        </div>
                                        <div class="guest-flag" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9772_small.png" style="width: 100%">
                                        </div>
                                        <div class="button-live">
                                            <div class="f-left" style="margin-top: 35px;">
                                                <button class="btn btn-success" style="border-radius: 20px; padding: 0px 10px; font-size: 12px">Đang diễn ra</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-hot-info">
                                        <p class="name-match">Sporting - Benfica</p>
                                        <p class="name-league">Giải VĐQG Bồ Đào Nha</p>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="box-slide-hot">
                                    <div class="box-hot" style="background-image: url('https://binhluan.tv/imgs/20180726-The18-Image-How-Many-Players-On-A-Soccer-Field.png'); min-height: 150px;">
                                        <div class="home-flag uk-first-column" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9768_small.png" style="width: 100%">
                                        </div>
                                        <div class="" style="width: 30%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <div class="tv-box-5 uk-text-center" style="padding-top: 5px;">
                                                <div class="c2" style="font-size: 20px;  color: #fff; font-weight: bold;">02:45</div>
                                                <div class="c3" style="font-size: 13px;  color: #ccc; font-weight: bold;">19/01</div>
                                            </div>
                                        </div>
                                        <div class="guest-flag" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                            <img class="tv-img1" alt="" src="https://images.fotmob.com/image_resources/logo/teamlogo/9772_small.png" style="width: 100%">
                                        </div>
                                        <div class="button-live">
                                            <div class="f-left" style="margin-top: 35px;">
                                                <button class="btn btn-success" style="border-radius: 20px; padding: 0px 10px; font-size: 12px">Đang diễn ra</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-hot-info">
                                        <p class="name-match">Sporting - Benfica</p>
                                        <p class="name-league">Giải VĐQG Bồ Đào Nha</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="ads-content">
                        <img src="/img/jcTb0Po.gif" style="width: 100%; margin-top: 10px;">
                    </div>
                    <div class="list-match" style="margin-top: 20px">
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ads-content" style="margin-top: 50px">
                        <img src="/img/jcTb0Po.gif" style="width: 100%; margin-top: 10px;">
                    </div>
                    <div class="list-match" style="margin-top: 20px">
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ads-content" style="margin-top: 50px">
                        <img src="/img/jcTb0Po.gif" style="width: 100%; margin-top: 10px;">
                    </div>
                    <div class="list-match" style="margin-top: 20px">
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ads-content" style="margin-top: 50px">
                        <img src="/img/jcTb0Po.gif" style="width: 100%; margin-top: 10px;">
                    </div>
                    <div class="list-match" style="margin-top: 20px">
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="matches">
                            <div class="matches__bg"></div>
                            <div class="matches__column matches__column--left">
                                <div class="matches__logo">
                                    <div id="hmImgListLeft" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="//d3.debet.com/img/hot_match/IUYV_ZAMxDdabQPzSpTJtg_96x96.png" alt="Vietnam U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListLeft" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>Vietnam U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListLeft" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(35px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>-1.25</span> <span>0.82</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--center">
                                <div class="matches__play-now">
                                    <span>Cược ngay</span>
                                </div>
                                <div id="hmTimeList" class="matches__date-time">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>01/16 08:15PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="matches__wrap-main-slide">
                                    <div id="hmMainSlider" class="matches__type">
                                        <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="" style="height: 15px;">
                                                <p>AFC U23 CHAMPIONSHIP 2020 (IN THAILAND)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="matches__column matches__column--right">
                                <div class="matches__logo">
                                    <div id="hmImgListRight" class="">
                                        <div class="" style="transform: translate3d(0px, 5px, 0px); transition-duration: 0ms;">
                                            <div class="" style="height: 70px;">
                                                <img src="https://d3.debet.com/img/hot_match/D-sduhUbhX3IlvlymeSyCQ_96x96.png" alt="North Korea U23">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamNameListRight" class="matches__team-name">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <p>North Korea U23</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="hmTeamOddListRight" class="matches__odds">
                                    <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                        <div class="" style="height: 25px;">
                                            <span>1.25</span> <span>-0.98</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ads-content" style="margin-top: 50px">
                        <img src="/img/jcTb0Po.gif" style="width: 100%; margin-top: 10px;">
                    </div>
                </div>
                <?php if (!empty($ads_right_content)) {?>
                    <div class="ads-right" style="float: right; width: 20%; margin-right: -15px;">
                        <?php foreach ($ads_right_content as $arc) { ?>
                            <a href="<?=$arc->url?>">
                                <img src="<?=Utility::getUrlAds($arc->id)?>" style="margin-bottom: 10px; width: 100%;">
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>
