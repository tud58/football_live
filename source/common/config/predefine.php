<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 19/12/11
 * Time: 08:34 AM
 */

if (in_array($_SERVER['HTTP_HOST'],['cms.football.abc','football.abc'])) {
    defined('PATH_STORAGE') or define('PATH_STORAGE', "D:/Developers19092018/football_live_storage/");
    defined('URL_STORAGE') or define('URL_STORAGE', "http://static.football.abc/");
} else {
    defined('PATH_STORAGE') or define('PATH_STORAGE', "/storage/");
    defined('URL_STORAGE') or define('URL_STORAGE', "http://static.tructiep.x19tv.club/");
}

defined('TYPE_TIME') or define('TYPE_TIME', 1);
defined('TYPE_LEAGUE') or define('TYPE_LEAGUE', 2);

defined('ALL_TIME') or define('ALL_TIME', 0);
defined('HOT_TIME') or define('HOT_TIME', 1);
defined('NOW_TIME') or define('NOW_TIME', 2);
defined('DATE_TIME') or define('DATE_TIME', 3);
defined('NEXT_TIME') or define('NEXT_TIME', 4);
defined('WEEK_TIME') or define('WEEK_TIME', 5);

