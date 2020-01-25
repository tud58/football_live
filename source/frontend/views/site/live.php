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
                    <div class="box-hot" style="width: 100%; min-height: 450px;">
                        <div id="myElement1" class="element"></div>
                        <div class="list-link">
                            <button class="btn btn-primary" href="javascript:void(0)" id="url1" name="url1" data-url="<?=$match->url1?>" onclick="loadVideo(this)">Link 1</button>
                            <button class="btn btn-primary" href="javascript:void(0)" id="url2" name="url2" data-url="<?=$match->url2?>" onclick="loadVideo(this)">Link 2</button>
                            <button class="btn btn-primary" href="javascript:void(0)" id="url3" name="url3" data-url="<?=$match->url1?>" onclick="loadVideo(this)">Link 3</button>
                        </div>
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
