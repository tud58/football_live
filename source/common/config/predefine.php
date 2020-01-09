<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 19/12/11
 * Time: 08:34 AM
 */

if ($_SERVER['HTTP_HOST'] == 'cms.football.abc') {
    defined('PATH_STORAGE') or define('PATH_STORAGE', "D:/Developers19092018/football_live_storage/");
    defined('URL_STORAGE') or define('URL_STORAGE', "http://static.football.abc/");
} else {
    defined('PATH_STORAGE') or define('PATH_STORAGE', "/u01/storage/cdn_portal/");
    defined('URL_STORAGE') or define('URL_STORAGE', "http://103.216.120.148:8081/cdn_portal/");
}

