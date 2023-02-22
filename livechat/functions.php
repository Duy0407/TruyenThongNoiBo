<?php
function getValue($value_name, $data_type = "int", $method = "GET", $default_value = 0, $advance = 0)
{
    $value = $default_value;
    switch ($method) {
        case "GET":
            if (isset($_GET[$value_name])) $value = $_GET[$value_name];
            break;
        case "POST":
            if (isset($_POST[$value_name])) $value = $_POST[$value_name];
            break;
        case "COOKIE":
            if (isset($_COOKIE[$value_name])) $value = $_COOKIE[$value_name];
            break;
        case "SESSION":
            if (isset($_SESSION[$value_name])) $value = $_SESSION[$value_name];
            break;
        default:
            if (isset($_GET[$value_name])) $value = $_GET[$value_name];
            break;
    }
    /**
     * Edit 26/03/2014
     * - Sửa lại để không dính lỗi trên PHP 5.4 với hàm strval khi get arr
     */
    $data_type = trim(strtolower($data_type));
    switch ($data_type) {
        case 'int':
            $returnValue = intval($value);
            break;
        case 'str':
            $returnValue = strval($value);
            $obj = json_decode($returnValue);
            if (!is_object($obj) || $advance == 1) {
                $returnValue = sql_injection_rp($returnValue);
            }
            break;
        case 'flo':
            $returnValue = floatval($value);
            break;
        case 'dbl':
            $returnValue = doubleval($value);
            break;
        case 'arr':
            $returnValue = $value;
            break;
        default:
            //Nếu mặc định ko truyền data_type thì là kiểu int
            $returnValue = intval($value);
            break;
    }
    //Check xem có cần format giá trị trả về hay không??
    if ($advance != 0 && is_string($returnValue)) {
        switch ($advance) {
            case 1:
                $returnValue = replaceMQ($returnValue);
                break;
            case 2:
                $returnValue = htmlspecialbo($returnValue);
                break;
        }
    }
    //Do số quá lớn nên phải kiểm tra trước khi trả về giá trị
    if (($data_type != "str") && !is_array($returnValue) && (strval($returnValue) == "INF")) return 0;
    return $returnValue;
}

function sql_injection_rp($string)
{
    $arr_s = array('UNION', 'CASE', 'echo', '$', '"', 'script', 'drop', 'delete', '*', "'");
    $str = str_replace($arr_s, '', $string);
    return $str;
}

function replaceMQ($text)
{
    $text    = str_replace("\'", "'", $text);
    $text    = str_replace("'", "", $text);
    $text    = str_replace("\\", "", $text);
    $text = str_replace('"', "", $text);
    return $text;
}

function htmlspecialbo($str)
{
    $arrDenied    = array('<', '>', '\"', '"');
    $arrReplace    = array('&lt;', '&gt;', '&quot;', '&quot;');
    $str = str_replace($arrDenied, $arrReplace, $str);
    return $str;
}
