<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 19/12/09
 * Time: 08:45 AM
 */
namespace common;
use backend\models\Ads;
use backend\models\Club;
use backend\models\League;
use backend\models\Match;

class Utility {

    public static function convert_vi_to_en($str, $compositeUnicode = true)
    {
        $str = trim($str);
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);
        $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);
        $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'i', $str);
        $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);
        $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);
        $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
        $str = preg_replace('/(Đ)/', 'D', $str);
        $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        $str = preg_replace('/(—)/', '-', $str);

        $str=preg_replace('/[^A-Za-z0-9-]+/', '', $str);
//        $str = preg_replace('/[^A-Za-z0-9~!@#$%^&*()_+-[]{}|\;:"\',.<>\/?]/', '', $str);

//        $str = mb_convert_encoding($str, 'UTF-8', 'UTF-8');
//        if (function_exists('iconv')) {
//            $str = iconv("utf-8", "utf-8//ignore", $str);
//            $str = iconv("UTF-8", "UTF-8//IGNORE", $str);
//        }
//        $str = self::cleanNonAsciiCharactersInString($str);
        if ($compositeUnicode) {
            if (function_exists('iconv')) {
                $str = iconv('UTF-8', 'ISO-8859-1//IGNORE', $str);
                $str = iconv('ISO-8859-1', 'UTF-8//IGNORE', $str);
            }
        }
        return strtolower($str);
    }

    public static function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 100){
        $quality = 10;
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $mime = $imgsize['mime'];

        switch($mime){
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                $image = "imagegif";
                break;

            case 'image/png':
                $image_create = "imagecreatefrompng";
                $image = "imagepng";
                $quality = 9;
                break;

            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                $image = "imagejpeg";
                $quality = 100;
                break;
            default:
                return false;
                break;
        }

        $dst_img = imagecreatetruecolor($max_width, $max_height);
        $src_img = $image_create($source_file);

        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
        if($width_new > $width){
            //cut point by height
            $h_point = (($height - $height_new) / 2);
            //copy image
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        }else{
            //cut point by width
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }

        $image($dst_img, $dst_dir, $quality);

        if($dst_img)imagedestroy($dst_img);
        if($src_img)imagedestroy($src_img);
    }

    public static function getUrlAds($id)
    {
        $host = URL_STORAGE.'ads/';
        $model = Ads::findOne(['id'=>$id]);
        if (!empty($model->img)) {
            return $host.$model->img.'?t='.time();
        } else {
            return null;
        }
    }

    public static function getUrlClub($id)
    {
        $host = URL_STORAGE.'clubs/';
        $model = Club::findOne(['id'=>$id]);
        if (!empty($model->logo)) {
            return $host.$model->logo.'?t='.time();
        } else {
            return null;
        }
    }

    public static function getUrlLeague($id)
    {
        $host = URL_STORAGE.'leagues/';
        $model = League::findOne(['id'=>$id]);
        if (!empty($model->logo)) {
            return $host.$model->logo.'?t='.time();
        } else {
            return null;
        }
    }

    public static function getUrlMatch($id)
    {
        $host = URL_STORAGE.'matchs/';
        $model = Match::findOne(['id'=>$id]);
        if (!empty($model->thumb)) {
            return $host.$model->thumb.'?t='.time();
        } else {
            return null;
        }
    }

    public static function showLabel($type,$title)
    {
        $label = '<span class="label label-'.$type.'">'.$title.'</span>';
        return $label;
    }

    public static function time_ago( $timestamp = 0, $now = 0 ) {

        // Set up our variables.
        $minute_in_seconds = 60;
        $hour_in_seconds   = $minute_in_seconds * 60;
        $day_in_seconds    = $hour_in_seconds * 24;
        $week_in_seconds   = $day_in_seconds * 7;
        $month_in_seconds  = $day_in_seconds * 30;
        $year_in_seconds   = $day_in_seconds * 365;

        // Get the current time if a reference point has not been provided.
        if ( 0 === $now ) {
            $now = time();
        }

        // Make sure the timestamp to check is in the past.
        $timestamp = strtotime($timestamp);
        if ( $timestamp > $now ) {
            throw new Exception( 'Timestamp is in the future' );
        }

        // Calculate the time difference between the current time reference point and the timestamp we're comparing.
        $time_difference = (int) abs( $now - $timestamp );

        // Calculate the time ago using the smallest applicable unit.
        if ( $time_difference < $hour_in_seconds ) {

            $difference_value = round( $time_difference / $minute_in_seconds );
            $difference_label = 'phút';

        } elseif ( $time_difference < $day_in_seconds ) {

            $difference_value = round( $time_difference / $hour_in_seconds );
            $difference_label = 'giờ';

        } elseif ( $time_difference < $week_in_seconds ) {

            $difference_value = round( $time_difference / $day_in_seconds );
            $difference_label = 'ngày';

        } elseif ( $time_difference < $month_in_seconds ) {

            $difference_value = round( $time_difference / $week_in_seconds );
            $difference_label = 'tuần';

        } elseif ( $time_difference < $year_in_seconds ) {

            $difference_value = round( $time_difference / $month_in_seconds );
            $difference_label = 'tháng';

        } else {

            $difference_value = round( $time_difference / $year_in_seconds );
            $difference_label = 'năm';
        }

        if ( $difference_value <= 1 ) {
            $time_ago = sprintf( '1 %s trước',
                $difference_label
            );
        } else {
            $time_ago = sprintf( '%s %s trước',
                $difference_value,
                $difference_label
            );
        }

        return $time_ago;
    }

    public static function check_phone_number($phone)
    {
        $return = false;
        if (!empty($phone)) {
            if ((substr($phone,0,1) == '0' && preg_match('/^[0-9]{10}$/',$phone)) ||(substr($phone,0,2) == '84' && preg_match('/^[0-9]{11}$/',$phone))) {
                $return = true;
            }
        }
        return $return;
    }

    public static function format_phone_number($phone)
    {
        if (!empty($phone)) {
            if ((substr($phone,0,1) == '0' && preg_match('/^[0-9]{10}$/',$phone))) {
                return '84'.substr($phone,1,9);
            }

            if (substr($phone,0,2) == '84' && preg_match('/^[0-9]{11}$/',$phone)) {
                return $phone;
            }
        }
        return false;
    }

    public static function format_datetime_vn($time=null)
    {
        if (empty($time)) {
            $return = date('d/m/Y H:i:s');
        } else {
            $return = date('d/m/Y H:i:s',strtotime($time));
        }

        return $return;
    }

    public static function format_time_vn($time=null)
    {
        if (empty($time)) {
            $return = date('H:i:s');
        } else {
            $return = date('H:i:s',strtotime($time));
        }

        return $return;
    }

    public static function format_date_vn($time=null)
    {
        if (empty($time)) {
            $return = date('d/m/Y');
        } else {
            $return = date('d/m/Y',strtotime($time));
        }

        return $return;
    }

    public static function format_datetime_local($time=null)
    {
        if (empty($time)) {
            $return = date('Y-m-d').'T'.date('H:i:s');
        } else {
            $return = date('Y-m-d',strtotime($time)).'T'.date('H:i:s',strtotime($time));
        }

        return $return;
    }

}