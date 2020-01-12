<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/01/2020
 * Time: 10:56 CH
 */
foreach ($matchs as $m) {
?>
<div class="item-match" style="width: 46%; height: 115px; background-color: #2F382F; border-radius: 15px; margin: 5px 2%; float: left;">
    <div class="left-content" style="float: left; width: 40%; text-align: center; margin-top: 20px">
        <img src="/img/ac.png" height="70">
        <span style="color: #fff">0 - 0</span>
        <img src="/img/ac.png" height="70">
    </div>
    <div class="right-content" style="float: right; width: 60%;">
        <div class="info-match" style="margin-top: 15px">
            <div class="league" style="font-size: 17px; margin-bottom: 3px">
                <span style="color: #fff;">Serie A</span>
            </div>
            <div class="club" style="font-size: 20px; margin-bottom: 3px"><span style="color: #fff;"><?=$m->title?></span></div>
            <div class="league"><span class="label label-danger" style="color: #fff;">Sắp bắt đầu</span> <span style="color: #fff;">00:30 Chủ nhật, 12/01</span></div>
        </div>
    </div>
</div>
<?php } ?>