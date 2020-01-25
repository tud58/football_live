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
                        <?php if (!empty($match_hot)) { ?>
                        <div class="home-flag uk-first-column" style="width: 35%; float: left; text-align: center; margin-top: 115px;">
                            <img class="tv-img1" alt="" src="<?=Utility::getUrlClub($match_hot->club1_id)?>">
                        </div>
                        <div class="hot-match-info" style="width: 20%; float: left; margin-left: 4%; margin-right: 4%; text-align: center; margin-top: 115px;">
                            <div class="tv-box-5 uk-text-center" style="padding-top: 20px;">
                                <div class="c1" style="font-size: 15px;  color: #ccc"><?=$leagues[$match_hot->league_id]?></div>
                                <div class="c2" style="font-size: 50px;  color: #fff; font-weight: bold;"><?=Utility::format_time_vn($match_hot->start_time)?></div>
                                <div class="c3" style="font-size: 20px;  color: #ccc; font-weight: bold;"><?=Utility::format_date_vn($match_hot->start_time)?></div>
                            </div>
                        </div>
                        <div class="guest-flag" style="width: 35%; float: left; text-align: center; margin-top: 115px;">
                            <img class="tv-img1" alt="" src="<?=Utility::getUrlClub($match_hot->club2_id)?>">
                        </div>
                        <div class="box-hot-main-info">
                            <div class="f-left">
                                <p class="live">Trực tiếp</p>
                                <p class="name-match"><?=$match_hot->title?></p>
                            </div>
                            <div class="f-right" style="margin-top: 25px;">
                                <a class="btn btn-success" style="border-radius: 20px; padding: 8px 20px; font-weight: bold;" href="/truc-tiep/<?=Utility::encodeMatch($match_hot->id)?>.io">Xem Ngay</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-container">
                        <ul class="swiper-wrapper" style="list-style-type:none;">
                            <?php if (!empty($match_feature)) { ?>
                                <?php foreach ($match_feature as $fm) { ?>
                                    <li class="swiper-slide">
                                        <a class="box-slide-hot" href="/truc-tiep/<?=Utility::encodeMatch($fm->id)?>.io">
                                            <div class="box-hot" style="background-image: url('/img/img2.png'); min-height: 150px;">
                                                <div class="home-flag uk-first-column" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                                    <img class="tv-img1" alt="" src="<?=Utility::getUrlClub($fm->club1_id)?>" style="width: 100%">
                                                </div>
                                                <div class="" style="width: 30%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                                    <div class="tv-box-5 uk-text-center" style="padding-top: 5px;">
                                                        <div class="c2" style="font-size: 20px;  color: #fff; font-weight: bold;"><?=Utility::format_time_vn($fm->start_time)?></div>
                                                        <div class="c3" style="font-size: 13px;  color: #ccc; font-weight: bold;"><?=Utility::format_date_vn($fm->start_time)?></div>
                                                    </div>
                                                </div>
                                                <div class="guest-flag" style="width: 35%; float: left; text-align: center; margin-top: 35px; max-height: 70px;">
                                                    <img class="tv-img1" alt="" src="<?=Utility::getUrlClub($fm->club2_id)?>" style="width: 100%">
                                                </div>
                                                <div class="button-live">
                                                    <div class="f-left" style="margin-top: 35px;">
                                                        <button class="btn btn-success" style="border-radius: 20px; padding: 0px 10px; font-size: 12px">Đang diễn ra</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-hot-info">
                                                <p class="name-match"><?=$fm->title?></p>
                                                <p class="name-league"><?=$leagues[$fm->league_id]?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php if (!empty($list_match)) { ?>
                    <div class="list-match">
                        <?php for ($i=0; $i<count($list_match);$i++) { ?>
                            <?php if ($i%5 == 0) { ?>
                                <?php if (!empty($ads_down_hot[(int)$i/5])) { ?>
                                    <div style="margin-top: 30px;">
                                        <a href="<?=$ads_down_hot[(int)$i/5]->url?>" class="ads-content" style="margin-top: 30px">
                                            <img src="<?=Utility::getUrlAds($ads_down_hot[(int)$i/5]->id)?>" style="width: 100%; margin-top: 10px;">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="matches">
                                    <div class="matches__bg"></div>
                                    <div class="matches__column matches__column--left">
                                        <div class="matches__logo">
                                            <div id="hmImgListLeft" class="">
                                                <div class="" style="transform: translate3d(6px, 5px, 0px); transition-duration: 0ms;">
                                                    <div class="" style="height: 70px;">
                                                        <img src="<?=Utility::getUrlClub($list_match[$i]->club1_id)?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="hmTeamNameListLeft" class="matches__team-name">
                                            <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                                <div class="" style="height: 25px;">
                                                    <p><?=$clubs[$list_match[$i]->club1_id]?></p>
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
                                        <a href="/truc-tiep/<?=Utility::encodeMatch($list_match[$i]->id)?>.io" class="matches__play-now">
                                            <span>Xem ngay</span>
                                        </a>
                                        <div id="hmTimeList" class="matches__date-time">
                                            <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                                <div class="" style="height: 25px;">
                                                    <span><?=date("d/m H:i",strtotime($list_match[$i]->start_time))?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="matches__wrap-main-slide">
                                            <div id="hmMainSlider" class="matches__type">
                                                <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                                    <div class="" style="height: 15px;">
                                                        <p><?=$leagues[$list_match[$i]->league_id]?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="matches__column matches__column--right">
                                        <div class="matches__logo">
                                            <div id="hmImgListRight" class="">
                                                <div class="" style="transform: translate3d(6px, 5px, 0px); transition-duration: 0ms;">
                                                    <div class="" style="height: 70px;">
                                                        <img src="<?=Utility::getUrlClub($list_match[$i]->club2_id)?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="hmTeamNameListRight" class="matches__team-name">
                                            <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                                <div class="" style="height: 25px;">
                                                    <p><?=$clubs[$list_match[$i]->club2_id]?></p>
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
                            <?php } else { ?>
                                <div class="matches">
                                    <div class="matches__bg"></div>
                                    <div class="matches__column matches__column--left">
                                        <div class="matches__logo">
                                            <div id="hmImgListLeft" class="">
                                                <div class="" style="transform: translate3d(6px, 5px, 0px); transition-duration: 0ms;">
                                                    <div class="" style="height: 70px;">
                                                        <img src="<?=Utility::getUrlClub($list_match[$i]->club1_id)?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="hmTeamNameListLeft" class="matches__team-name">
                                            <div class="" style="transition-duration: 0ms; transform: translate3d(40px, 10px, 0px);">
                                                <div class="" style="height: 25px;">
                                                    <p><?=$clubs[$list_match[$i]->club1_id]?></p>
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
                                        <a href="/truc-tiep/<?=Utility::encodeMatch($list_match[$i]->id)?>.io" class="matches__play-now">
                                            <span>Xem ngay</span>
                                        </a>
                                        <div id="hmTimeList" class="matches__date-time">
                                            <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                                <div class="" style="height: 25px;">
                                                    <span><?=date("d/m H:i",strtotime($list_match[$i]->start_time))?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="matches__wrap-main-slide">
                                            <div id="hmMainSlider" class="matches__type">
                                                <div class="" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                                    <div class="" style="height: 15px;">
                                                        <p><?=$leagues[$list_match[$i]->league_id]?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="matches__column matches__column--right">
                                        <div class="matches__logo">
                                            <div id="hmImgListRight" class="">
                                                <div class="" style="transform: translate3d(6px, 5px, 0px); transition-duration: 0ms;">
                                                    <div class="" style="height: 70px;">
                                                        <img src="<?=Utility::getUrlClub($list_match[$i]->club2_id)?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="hmTeamNameListRight" class="matches__team-name">
                                            <div class="" style="transition-duration: 0ms; transform: translate3d(-30px, 10px, 0px);">
                                                <div class="" style="height: 25px;">
                                                    <p><?=$clubs[$list_match[$i]->club2_id]?></p>
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
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <?php } ?>
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
