<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/4/1
 * Time: 下午6:28
 */

namespace common\helpers;


use rmrevin\yii\fontawesome\FA;

class Html extends \yii\helpers\Html
{
    public static function icon($name, $options = [])
    {
        return FA::i($name, $options);
    }
    
    //截取字符串(UTF-8)的源码
    //Helper::truncate_utf8_string($content,20,false); //不显示省略号
    //Helper::truncate_utf8_string($content,20); //显示省略号
    public static function truncate_utf8_string($string, $length, $etc = '...')
    {
        $result = '';
        $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
        $strlen = strlen($string);
        for ($i = 0; (($i < $strlen) && ($length > 0)); $i++)
        {
        if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
        {
            if ($length < 1.0)
        				{
        				break;
        }
        $result .= substr($string, $i, $number);
        $length -= 1.0;
        $i += $number - 1;
        }
        else
        {
        $result .= substr($string, $i, 1);
        $length -= 0.5;
        }
        }
        $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
        if ($i < $strlen)
        {
        $result .= $etc;
        }
        return $result;
    }
    
    public static function getWeekName($data,$format = '星期')
    {
        $week   =  date( "D ",$data);
        switch($week)
        {
            case "Mon ":
                $current   =   $format."一";
                break;
            case "Tue ":
                $current   =   $format."二";
                break;
            case "Wed ":
                $current   =   $format."三";
                break;
            case "Thu ":
                $current   =   $format."四";
                break;
            case "Fri ":
                $current   =   $format."五";
                break;
            case "Sat ":
                $current   =   $format."六";
                break;
            case "Sun ":
                $current   =   $format."日";
                break;
        }
        return $current;
    }
    
    
}