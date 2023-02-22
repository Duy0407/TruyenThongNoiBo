<?
$array_nguon_dk = array(
    1 => 'timviec365.com',
    2 => 'nhatro.timviec365.com',
    3 => 'vieclamtheogio.timviec365.com',
    4 => 'freelancer.timviec365.com',
    5 => 'khoahoc.timviec365.com',
    6 => 'giasu.timviec365.com',
);
function getmail($string)
{
    $emails = '';
    foreach (preg_split('/\s/', $string) as $token) {
        $email = filter_var(filter_var($token, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        if ($email !== false) {
            $emails[] = $email;
        }
    }
    return $emails;
}

function resize_avatar($url)
{
    if (file_exists($url)) {
        if (filesize($url) / 1024 > 310) {
            require_once("lib_image.php");
            $imageThumb = new Image($url);
            $fs_filepath_re = explode('/', $url);
            $name = array_pop($fs_filepath_re);
            $fs_filepath_re = implode('/', $fs_filepath_re);
            $temp = explode('.', $name);
            if ($imageThumb->getWidth() > 310) {
                $imageThumb->resize(310, 'resize');
                $imageThumb->save($temp[0], $fs_filepath_re, $temp[1]);
            }
        }
    } else {
        $url = '/images/no-image.png';
    }
    return $url;
}

function generate_name($filename, $prefix = "")
{
    $name = "";
    for ($i = 0; $i < 3; $i++) {
        $name .= chr(rand(97, 122));
    }
    $today = getdate();
    if ($prefix == "")
        $name .= $today[0];
    else
        $name = $prefix . $name . $today[0];
    $ext = substr($filename, (strrpos($filename, ".") + 1));
    return $name . "." . $ext;
}
function clean_space($str)
{
    $str = utf8_decode($str);
    $str = str_replace("&nbsp;", "", $str);
    $str = preg_replace('/\s+/', ' ', $str);
    $str = trim($str);
    return $str;
}
function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1) {
        return '0 giây';
    }

    $a = array(
        365 * 24 * 60 * 60  =>  'năm',
        30 * 24 * 60 * 60  =>  'tháng',
        24 * 60 * 60  =>  'ngày',
        60 * 60  =>  'giờ',
        60  =>  'phút',
        1  =>  'giây'
    );
    $a_plural = array(
        'năm'  => 'năm',
        'tháng' => 'tháng',
        'ngày' => 'ngày',
        'giờ'  => 'giờ',
        'phút' => 'phút',
        'giây' => 'giây'
    );

    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' trước';
        }
    }
}

function time_elapsed_string2($ptime, $cre_time = '')
{
    $etime = $ptime - time();

    if ($cre_time != '' && $ptime - $cre_time > 31556926) {
        return '';
    }

    if ($etime < 1) {
        return '';
    }

    $a = array(
        365 * 24 * 60 * 60  =>  'năm',
        30 * 24 * 60 * 60  =>  'tháng',
        24 * 60 * 60  =>  'ngày',
        60 * 60  =>  'giờ',
        60  =>  'phút',
        1  =>  'giây'
    );
    $a_plural = array(
        'năm'  => 'năm',
        'tháng' => 'tháng',
        'ngày' => 'ngày',
        'giờ'  => 'giờ',
        'phút' => 'phút',
        'giây' => 'giây'
    );

    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return '(Còn ' . $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ')';
        }
    }
}

function time_elapsed_after($ptime, $cre_time = '')
{
    $etime = $ptime - time();

    if ($cre_time != '' && $ptime - $cre_time > 31556926) {
        return '';
    }

    if ($etime < 1) {
        return '';
    }

    $a = array(
        365 * 24 * 60 * 60  =>  'năm',
        30 * 24 * 60 * 60  =>  'tháng',
        24 * 60 * 60  =>  'ngày',
        60 * 60  =>  'giờ',
        60  =>  'phút',
        1  =>  'giây'
    );
    $a_plural = array(
        'năm'  => 'năm',
        'tháng' => 'tháng',
        'ngày' => 'ngày',
        'giờ'  => 'giờ',
        'phút' => 'phút',
        'giây' => 'giây'
    );

    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return 'Sau ' . $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' nữa';
        }
    }
}

function geturlimageAvatar($timeimage)
{
    $month  = date('m', $timeimage);
    $year   = date('Y', $timeimage);
    $day    = date('d', $timeimage);
    $dir        = "../pictures/" . $year . "/" . $month . "/" . $day . "/"; // Full Path
    is_dir($dir) || @mkdir($dir, 0777, true) || die("Can't Create folder");
    return $dir;
}
function getlogo($timeimage)
{
    $img_first     = explode(',', $timeimage);
    $img_f_name    = $img_first[0];
    $time_img      = intval(preg_replace("/[^0-9]/i", "", $img_f_name));
    $day           = date("d", $time_img);
    $month         = date("m", $time_img);
    $year          = date("Y", $time_img);
    $get_full_path = "/pictures/vip/" . $year . "/" . $month . "/" . $day . "/" . $img_f_name;
    return $get_full_path;
}
function getimagemeta($timeimage)
{
    $month  = date('m', $timeimage);
    $year   = date('Y', $timeimage);
    $day    = date('d', $timeimage);
    $dir        = "../pictures/" . $year . "/" . $month . "/" . $day . "/"; // Full Path
    is_dir($dir) || @mkdir($dir, 0777, true) || die("Can't Create folder");
    return $dir;
}
function decodeHtmlEnt($str)
{
    $ret = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
    $p2 = -1;
    for (;;) {
        $p = strpos($ret, '&#', $p2 + 1);
        if ($p === FALSE)
            break;
        $p2 = strpos($ret, ';', $p);
        if ($p2 === FALSE)
            break;

        if (substr($ret, $p + 2, 1) == 'x')
            $char = hexdec(substr($ret, $p + 3, $p2 - $p - 3));
        else
            $char = intval(substr($ret, $p + 2, $p2 - $p - 2));

        //echo "$char\n";
        $newchar = iconv(
            'UCS-4',
            'UTF-8',
            chr(($char >> 24) & 0xFF) . chr(($char >> 16) & 0xFF) . chr(($char >> 8) & 0xFF) . chr($char & 0xFF)
        );
        //echo "$newchar<$p<$p2<<\n";
        $ret = substr_replace($ret, $newchar, $p, 1 + $p2 - $p);
        $p2 = $p + strlen($newchar);
    }
    return $ret;
}
function mb_ucfirst($string, $encoding)
{
    $strlen = mb_strlen($string, $encoding);
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, $strlen - 1, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}
function base64_url_encode($input)
{
    return strtr(base64_encode($input), '+/=', '_,-');
}

function base64_url_decode($input)
{
    return base64_decode(strtr($input, '_,-', '+/='));
}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function arrss($item1, $item2)
{
    $abc = '';
    if ($item2 <= 3) {
        $abc = 2;
    } else if ($item2 > 3 && $item2 <= 5) {
        $abc = 3;
    } else if ($item2 > 5 && $item2 <= 7) {
        $abc = 4;
    } else if ($item2 > 7 && $item2 <= 10) {
        $abc = 5;
    } else if ($item2 > 10 && $item2 <= 15) {
        $abc = 6;
    } else if ($item2 > 15 && $item2 <= 20) {
        $abc = 7;
    } else if ($item2 > 20 && $item2 <= 30) {
        $abc = 8;
    } else if ($item2 > 30) {
        $abc = 9;
    }
    return $abc;
}
function getmoney222($string)
{
    $value = '';
    $string = trim($string);
    $string = removeHTML($string);
    $string = removeAccent($string);
    if (preg_match("/trieu/", $string) == true) {
        if (preg_match("/Hon/", $string) == true) {
            if (preg_match("VND", $string) == true) {
                $string = str_replace("VND", "", $string);
            }
            $string = str_replace("Hon", "", $string);
            $string = explode(",", $string);
            $string = $string[0];
            $value = arrss(0, $string);
        } else {
            $string = str_replace("trieu", "", $string);
            $string = trim($string);
            if (preg_match("/-/", $string) == true) {
                $arrmn = explode("-", $string);
                $onearr = explode(",", $arrmn[0]);
                $onearr = $onearr[0];
                $onearr = trim($onearr);
                $twoarr = explode(",", $arrmn[1]);
                $twoarr = $twoarr[0];
                $twoarr = trim($twoarr);
                $value =  arrss($onearr, $twoarr);
            } else {
                $onearr = explode(",", $string);
                $onearr = $onearr[0];
                $value = arrss(0, $onearr);
            }
        }
    } else if (preg_match("/VND/", $string) == true) {
        if (preg_match("/Hon/", $string) == true) {
            if (preg_match("VND", $string) == true) {
                $string = str_replace("VND", "", $string);
            }
            $string = str_replace("Hon", "", $string);
            $string = explode(",", $string);
            $string = $string[0];
            $value = arrss(0, $string + 1);
        } else {
            $string = str_replace("VND", "", $string);
            $string = trim($string);
            if (preg_match("/-/", $string) == true) {
                $arrmn = explode("-", $string);
                $onearr = explode(",", $arrmn[0]);
                $onearr = $onearr[0];
                $onearr = trim($onearr);
                $twoarr = explode(",", $arrmn[1]);
                $twoarr = $twoarr[0];
                $twoarr = trim($twoarr);
                $value =  arrss($onearr, $twoarr);
            } else {
                $onearr = explode(",", $string);
                $onearr = $onearr[0];
                $value = arrss(0, $onearr);
            }
        }
    } else if (preg_match("/Thuong luong/", $string) == true) {
        echo "Thỏa thuận";
        $value = 1;
    } else if (preg_match("/Canh tranh/", $string) == true) {
        echo "Thỏa thuận";
        $value = 1;
    } else if (preg_match("/USD/", $string) == true) {
        if (preg_match("/Hon/", $string) == true) {
            $string = str_replace("USD", "", $string);
            $string = str_replace("Hon", "", $string);
            $string = str_replace(",", "", $string);
            $string = $string * 22000;
            $string = number_format($string);
            $string = explode(",", $string);
            $string = $string[0];
            $value = arrss(0, $string + 2);
        } else {
            $string = str_replace("USD", "", $string);
            $string = str_replace(",", "", $string);
            if (preg_match("/-/", $string) == true) {
                $arrmn  = explode("-", $string);
                $oneusd = $arrmn[0] * 22000;
                $oneusd = number_format($oneusd);
                $onearr = explode(",", $oneusd);
                $onedola = $onearr[0];
                $twousd = $arrmn[1] * 22000;
                $twousd = number_format($twousd);
                $twoarr = explode(",", $twousd);
                $twodola = $twoarr[0];
                $value = arrss($onedola, $twodola);
            } else {
                $string = $string * 22000;
                $string = number_format($string);
                $string = explode(",", $string);
                $string = $string[0];
                $value = arrss(0, $string);
            }
        }
    }
    return $value;
}
function getforderimgone($img_name)
{
    $img_first     = explode(',', $img_name);
    $img_f_name    = $img_first[0];
    $time_img      = intval(preg_replace("/[^0-9]/i", "", $img_f_name));
    $day           = date("d", $time_img);
    $month         = date("m", $time_img);
    $year          = date("Y", $time_img);
    $get_full_path = "/pictures/pickfullsize/" . $year . "/" . $month . "/" . $day . "/" . $img_f_name;
    return $get_full_path;
}
function getforderimgmedium($img_name)
{
    $img_first     = explode(',', $img_name);
    $img_f_name    = $img_first[0];
    $time_img      = intval(preg_replace("/[^0-9]/i", "", $img_f_name));
    $day           = date("d", $time_img);
    $month         = date("m", $time_img);
    $year          = date("Y", $time_img);
    $get_full_path = "/pictures/pickmediumsize/" . $year . "/" . $month . "/" . $day . "/medium_" . $img_f_name;
    return $get_full_path;
}
function getforderimgtiny($img_name)
{
    $img_first     = explode(',', $img_name);
    $img_f_name    = $img_first[0];
    $time_img      = intval(preg_replace("/[^0-9]/i", "", $img_f_name));
    $day           = date("d", $time_img);
    $month         = date("m", $time_img);
    $year          = date("Y", $time_img);
    $get_full_path = "/pictures/picktinysize/" . $year . "/" . $month . "/" . $day . "/tiny_" . $img_f_name;
    return $get_full_path;
}
function getmoney($price, $type_pr)
{
    if ($type_pr == 1) {
        $price   = intval($price);
    }
    if ($type_pr == 0) {
        $price   = intval($price) * 22;
    }
    if ($type_pr == 1) {
        if (strlen($price) >= 4) {
            $res  = substr($price, 0, 1);
            $ris  = substr($price, strlen($price) - 3);
            $ras  = substr($ris, 0, 1);
            $ras1 = substr($ris, 1, 2);
            $ras2 = substr($ris, 2, 3);
            if ($ras == 0) {
                $ris = str_replace("0", "", $ris);
            }
            if ($ras1 == 0 && $ras == 0) {
                $ris = str_replace("0", "", $ris);
                $ris = str_replace("0", "");
            }
            if ($ras2 == 0 && $ras == 0 && $ras1 == 0) {
                $ris = str_replace("0", "", $ris);
                $ris = str_replace("0", "", $ris);
                $ris = str_replace("0", "", $ris);
            }
            return $res . " tỷ " . $ris . " triệu";
        } else {
            return $price . " triệu";
        }
    }
}
function cut_string2($str, $length, $char = "...")
{
    //Nếu chuỗi cần cắt nhỏ hơn $length thì return luôn
    $strlen    = mb_strlen($str, "UTF-8");
    if ($strlen <= $length) return $str;

    //Cắt chiều dài chuỗi $str tới đoạn cần lấy
    $substr    = mb_substr($str, 0, $length, "UTF-8");
    if (mb_substr($str, $length, 1, "UTF-8") == " ") return $substr . $char;

    //Xác định dấu " " cuối cùng trong chuỗi $substr vừa cắt
    $strPoint = mb_strrpos($substr, " ", "UTF-8");

    //Return string
    if ($strPoint < $length - 20) return $substr . $char;
    else return mb_substr($substr, 0, $strPoint, "UTF-8") . $char;
}

function getDomain($url)
{
    $url    = trim($url);
    if ($url == "") return "";

    $domain_return    = "";
    //$nowww			= ereg_replace('www\.', '', $url);
    /**
     * Edit 26/03/2014
     * Sửa hàm ereg_replace thành str_replace để cho khỏi lỗi
     */
    $nowww            = str_replace('www.', '', $url);
    $domain            = @parse_url($nowww);

    if ($domain !== false) {
        if (isset($domain["host"]) && $domain["host"] != "") $domain_return    = $domain["host"];
        elseif (isset($domain["path"]) && $domain["path"] != "") $domain_return    = $domain["path"];
    }

    return $domain_return;
}
function sw_get_current_weekday()
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date("l");
    $weekday = strtolower($weekday);
    switch ($weekday) {
        case 'monday':
            $weekday = 'Thứ hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ tư';
            break;
        case 'thursday':
            $weekday = 'Thứ năm';
            break;
        case 'friday':
            $weekday = 'Thứ sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    return $weekday . ', ' . date('d/m/Y H:i') . " GTM+7";
}
function array_currency()
{
    $arrReturn    = array(0 => "USD", 1 => "EUR");
    return $arrReturn;
}

function array_language()
{
    $db_language    = new db_query("SELECT * FROM languages ORDER BY lang_id ASC");
    $arrReturn        = array();
    while ($row = mysql_fetch_array($db_language->result)) {
        $arrReturn[$row["lang_id"]] = array($row["lang_code"], $row["lang_name"]);
    }
    return $arrReturn;
}

function array_length_of_stay_tour()
{
    $arrReturn    = array(
        1 => "1 " . tdt("day"),
        2 => "2 - 5 " . tdt("days"),
        3 => "6 - 9 " . tdt("days"),
        4 => "10 - 16 " . tdt("days"),
        5 => "17 " . tdt("and_more_days"),
    );
    return $arrReturn;
}

function array_star_rating_hotel()
{
    $arrReturn    = array(
        2 => "2 " . tdt("stars"),
        3 => "3 " . tdt("stars"),
        4 => "4 " . tdt("stars"),
        5 => "5 " . tdt("stars"),
    );
    return $arrReturn;
}

function array_service()
{
    $arrReturn    = array(
        1 => tdt("Air_ticket"),
        2 => tdt("Train_ticket"),
        3 => tdt("Visa"),
        4 => tdt("Car_for_rent"),
    );
    return $arrReturn;
}

function callback($buffer)
{
    $str        = array("   ", chr(9), chr(10));
    $buffer    = str_replace($str, "", $buffer);
    return $buffer;
}

function check_email_address($email)
{
    //First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        //Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    //Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
            return false;
        }
    }
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
        //Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}

function check_session_security($security_code)
{
    $return = 1;
    if (!isset($_SESSION["session_security_code"])) $_SESSION["session_security_code"] = generate_security_code();
    if ($security_code != $_SESSION["session_security_code"]) {
        $return = 0;
    }
    // Reset lại session security code
    $_SESSION["session_security_code"] = generate_security_code();
    return $return;
}

function count_online()
{
    $visited_timeout        = 10 * 60;
    $last_visited_time    = time();
    //Kiem tra co session_id hay ko, neu co
    if (session_id() != "") {
        $db_exec    = new db_execute("REPLACE INTO active_users(au_session_id, au_last_visit) VALUES('" . session_id() . "', " . $last_visited_time . ")");
        unset($db_exec);
    }
    // Delete timeout
    $db_exec    = new db_execute("DELETE FROM active_users WHERE au_last_visit < " . ($last_visited_time - $visited_timeout));
    unset($db_exec);
    // Select Count
    $db_count = new db_query("SELECT count(*) AS count FROM active_users");
    $row        = mysql_fetch_array($db_count->result);
    unset($db_count);
    // Return value
    return $row["count"];
}

function count_visited()
{
    $db_count    = new db_query("SELECT vis_counter FROM visited");
    $row = mysql_fetch_array($db_count->result);
    unset($db_count);
    return $row["vis_counter"];
}

function cut_string($str, $length, $char = " ...")
{
    //Nếu chuỗi cần cắt nhỏ hơn $length thì return luôn
    $strlen    = mb_strlen($str, "UTF-8");
    if ($strlen <= $length) return $str;

    //Cắt chiều dài chuỗi $str tới đoạn cần lấy
    $substr    = mb_substr($str, 0, $length, "UTF-8");
    if (mb_substr($str, $length, 1, "UTF-8") == " ") return $substr . $char;

    //Xác định dấu " " cuối cùng trong chuỗi $substr vừa cắt
    $strPoint = mb_strrpos($substr, " ", "UTF-8");

    //Return string
    if ($strPoint < $length - 20) return $substr . $char;
    else return mb_substr($substr, 0, $strPoint, "UTF-8") . $char;
}

function format_number($number, $num_decimal = 2, $edit = 0)
{
    if ($edit == 0) {
        $return    = number_format($number, $num_decimal, ",", ".");
        $stt    = -1;
        for ($i = $num_decimal; $i > 0; $i--) {
            $stt++;
            if (intval(substr($return, -$i, $i)) == 0) {
                $return = number_format($number, $stt, ",", ".");
                break;
            }
        }
        return $return;
    } else {
        $return    = number_format($number, 2, ".", ",");
        if (intval(substr($return, -2, 2)) == 0) $return = number_format($number, 0, ".", ",");
        return $return;
    }
}

function format_currency($value = "")
{
    $str        =    $value;
    if ($value != "") {
        $str        =    number_format(round($value / 1000) * 1000, 0, "", ",");
    }
    return $str;
}

function generate_array_variable($variable)
{
    $list            = tdt($variable);
    $arrTemp        = explode("{-break-}", $list);
    $arrReturn    = array();
    for ($i = 0; $i < count($arrTemp); $i++) $arrReturn[$i] = trim($arrTemp[$i]);
    return $arrReturn;
}

function generate_security_code()
{
    $code    = rand(1000, 9999);
    return $code;
}

function getURL($serverName = 0, $scriptName = 0, $fileName = 1, $queryString = 1, $varDenied = '')
{
    $url     = '';
    $slash = '/';
    if ($scriptName != 0) $slash    = "";
    if ($serverName != 0) {
        if (isset($_SERVER['SERVER_NAME'])) {
            $url .= 'http://' . $_SERVER['SERVER_NAME'];
            if (isset($_SERVER['SERVER_PORT'])) $url .= ":" . $_SERVER['SERVER_PORT'];
            $url .= $slash;
        }
    }
    if ($scriptName != 0) {
        if (isset($_SERVER['SCRIPT_NAME']))    $url .= substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
    }
    if ($fileName    != 0) {
        if (isset($_SERVER['SCRIPT_NAME']))    $url .= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
    }
    if ($queryString != 0) {
        $url .= '?';
        reset($_GET);
        $i = 0;
        if ($varDenied != '') {
            $arrVarDenied = explode('|', $varDenied);
            while (list($k, $v) = each($_GET)) {
                if (array_search($k, $arrVarDenied) === false) {
                    $i++;
                    if ($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
                    else $url .= $k . '=' . @urlencode($v);
                }
            }
        } else {
            while (list($k, $v) = each($_GET)) {
                $i++;
                if ($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
                else $url .= $k . '=' . @urlencode($v);
            }
        }
    }
    $url = str_replace('"', '&quot;', strval($url));
    return $url;
}

function getURLhoakhoi($serverName = 0, $scriptName = 0, $fileName = 1, $queryString = 1, $varDenied = '')
{
    $url     = '';
    $slash = '/';
    if ($scriptName != 0) $slash    = "";
    if ($serverName != 0) {
        if (isset($_SERVER['SERVER_NAME'])) {
            $url .= 'http://' . $_SERVER['SERVER_NAME'];
            if (isset($_SERVER['SERVER_PORT'])) $url .= ":" . $_SERVER['SERVER_PORT'];
            $url .= $slash;
        }
    }
    if ($scriptName != 0) {
        if (isset($_SERVER['SCRIPT_NAME']))    $url .= substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
    }
    if ($fileName    != 0) {
        if (isset($_SERVER['SCRIPT_NAME']))    $url .= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
    }
    if ($queryString != 0) {
        $url .= '?';
        reset($_GET);
        $i = 0;
        if ($varDenied != '') {
            $arrVarDenied = explode('|', $varDenied);
            while (list($k, $v) = each($_GET)) {
                if (array_search($k, $arrVarDenied) === false) {
                    $i++;
                    if ($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
                    else $url .= $k . '=' . @urlencode($v);
                }
            }
        } else {
            while (list($k, $v) = each($_GET)) {
                $i++;
                if ($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
                else $url .= $k . '=' . @urlencode($v);
            }
        }
    }
    $url = str_replace('"', '&quot;', strval($url));
    return $url;
}

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
    /*   
	$valueArray	= array("int" => intval($value), "str" => trim(strval($value)), "flo" => floatval($value), "dbl" => doubleval($value), "arr" => $value);
	foreach($valueArray as $key => $returnValue){
		if($data_type == $key){
			if($advance != 0){
				switch($advance){
					case 1:
						$returnValue = replaceMQ($returnValue);
						break;
					case 2:
						$returnValue = htmlspecialbo($returnValue);
						break;
				}
			}
			//Do số quá lớn nên phải kiểm tra trước khi trả về giá trị
			if((strval($returnValue) == "INF") && ($data_type != "str")) return 0;
			return $returnValue;
			break;
		}
	}
	return (intval($value));
   */
}

function get_server_name()
{
    $server = $_SERVER['SERVER_NAME'];
    if (strpos($server, "asiaqueentour.com") !== false) return "http://www.asiaqueentour.com";
    else return "http://" . $server . ":" . $_SERVER['SERVER_PORT'];
}

function htmlspecialbo($str)
{
    $arrDenied    = array('<', '>', '\"', '"');
    $arrReplace    = array('&lt;', '&gt;', '&quot;', '&quot;');
    $str = str_replace($arrDenied, $arrReplace, $str);
    return $str;
}

function javascript_writer($str)
{
    $mytextencode = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $mytextencode .= ord(substr($str, $i, 1)) . ",";
    }
    if ($mytextencode != "") $mytextencode .= "32";
    return "<script language='javascript'>document.write(String.fromCharCode(" . $mytextencode . "));</script>";
}

function lang_path()
{
    global $lang_id;
    global $array_lang;
    global $con_root_path;
    $default_lang = 1;
    $path    = ($lang_id == $default_lang) ? $con_root_path : $con_root_path . $array_lang[$lang_id][0] . "/";
    return $path;
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function random()
{
    $rand_value = "";
    $rand_value .= rand(1000, 9999);
    $rand_value .= chr(rand(65, 90));
    $rand_value .= rand(1000, 9999);
    $rand_value .= chr(rand(97, 122));
    $rand_value .= rand(1000, 9999);
    $rand_value .= chr(rand(97, 122));
    $rand_value .= rand(1000, 9999);
    return $rand_value;
}

function redirect($url)
{
    $url    = htmlspecialbo($url);
    echo '<script type="text/javascript">window.location.href = "' . $url . '";</script>';
    exit();
}

function removeAccent($mystring)
{
    $marTViet = array(
        // Chữ thường
        "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ",
        "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
        "ì", "í", "ị", "ỉ", "ĩ",
        "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
        "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
        "ỳ", "ý", "ỵ", "ỷ", "ỹ",
        "đ", "Đ", "'",
        // Chữ hoa
        "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
        "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
        "Ì", "Í", "Ị", "Ỉ", "Ĩ",
        "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
        "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
        "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
        "Đ", "Đ", "'"
    );
    $marKoDau = array(
        /// Chữ thường
        "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
        "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
        "i", "i", "i", "i", "i",
        "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
        "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
        "y", "y", "y", "y", "y",
        "d", "D", "",
        //Chữ hoa
        "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
        "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
        "I", "I", "I", "I", "I",
        "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
        "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
        "Y", "Y", "Y", "Y", "Y",
        "D", "D", "",
    );
    return str_replace($marTViet, $marKoDau, $mystring);
}

function removeHTML($string)
{
    $string = preg_replace('/<script.*?\>.*?<\/script>/si', ' ', $string);
    $string = preg_replace('/<style.*?\>.*?<\/style>/si', ' ', $string);
    $string = preg_replace('/<.*?\>/si', ' ', $string);
    $string = str_replace('&nbsp;', ' ', $string);
    $string = mb_convert_encoding($string, "UTF-8", "UTF-8");
    $string = str_replace(array(chr(9), chr(10), chr(13)), ' ', $string);
    for ($i = 0; $i <= 5; $i++) $string = str_replace('  ', ' ', $string);
    return $string;
}

function removeLink($string)
{
    $string = preg_replace('/<a.*?\>/si', '', $string);
    $string = preg_replace('/<\/a>/si', '', $string);
    return $string;
}

function replaceFCK($string, $type = 0)
{
    $array_fck    = array(
        "&Agrave;", "&Aacute;", "&Acirc;", "&Atilde;", "&Egrave;", "&Eacute;", "&Ecirc;", "&Igrave;", "&Iacute;", "&Icirc;",
        "&Iuml;", "&ETH;", "&Ograve;", "&Oacute;", "&Ocirc;", "&Otilde;", "&Ugrave;", "&Uacute;", "&Yacute;", "&agrave;",
        "&aacute;", "&acirc;", "&atilde;", "&egrave;", "&eacute;", "&ecirc;", "&igrave;", "&iacute;", "&ograve;", "&oacute;",
        "&ocirc;", "&otilde;", "&ugrave;", "&uacute;", "&ucirc;", "&yacute;",
    );
    $array_text    = array(
        "À", "Á", "Â", "Ã", "È", "É", "Ê", "Ì", "Í", "Î",
        "Ï", "Ð", "Ò", "Ó", "Ô", "Õ", "Ù", "Ú", "Ý", "à",
        "á", "â", "ã", "è", "é", "ê", "ì", "í", "ò", "ó",
        "ô", "õ", "ù", "ú", "û", "ý",
    );
    if ($type == 1) $string = str_replace($array_fck, $array_text, $string);
    else $string = str_replace($array_text, $array_fck, $string);
    return $string;
}

function replaceJS($text)
{
    $arr_str = array("\'", "'", '"', "&#39", "&#39;", chr(10), chr(13), "\n");
    $arr_rep = array(" ", " ", '&quot;', " ", " ", " ", " ");
    $text        = str_replace($arr_str, $arr_rep, $text);
    $text        = str_replace("    ", " ", $text);
    $text        = str_replace("   ", " ", $text);
    $text        = str_replace("  ", " ", $text);
    return $text;
}

function replace_keyword_search($keyword, $lower = 1)
{
    if ($lower == 1) $keyword    = mb_strtolower($keyword, "UTF-8");
    $keyword    = replaceMQ($keyword);
    $arrRep    = array("'", '"', "-", "+", "=", "*", "?", "/", "!", "~", "#", "@", "%", "$", "^", "&", "(", ")", ";", ":", "\\", ".", ",", "[", "]", "{", "}", "‘", "’", '“', '”');
    $keyword    = str_replace($arrRep, " ", $keyword);
    $keyword    = str_replace("  ", " ", $keyword);
    $keyword    = str_replace("  ", " ", $keyword);
    return $keyword;
}

function replaceMQ($text)
{
    $text    = str_replace("\'", "'", $text);
    $text    = str_replace("'", "", $text);
    $text    = str_replace("\\", "", $text);
    //$text = str_replace('"',"",$text);
    return $text;
}

function remove_magic_quote($str)
{
    $str = str_replace("\'", "'", $str);
    $str = str_replace("\&quot;", "&quot;", $str);
    $str = str_replace("\\\\", "\\", $str);
    return $str;
}

function tdt($variable)
{
    global $lang_display;
    if (isset($lang_display[$variable])) {
        if (trim($lang_display[$variable]) == "") {
            return "#" . $variable . "#";
        } else {
            $arrStr    = array("\\\\'", '\"');
            $arrRep    = array("\\'", '"');
            return str_replace($arrStr, $arrRep, $lang_display[$variable]);
        }
    } else {
        return "_@" . $variable . "@_";
    }
}

function isIE6()
{
    if (preg_match('/\bmsie 6/i', $_SERVER['HTTP_USER_AGENT'])) {
        return true;
    } else {
        return false;
    }
}

function check_overflow_description($description, $width, $class_add = "description_overflow", $maxChar = 40)
{
    $count    = mb_strlen($description, "UTF-8");
    for ($i = 120; $i < 900; $i += 40) {
        if ($width < $i) break;
        $maxChar += 10;
    }
    $class    = ($count > $maxChar ? " " . $class_add : '');
    return $class;
}

function checktextlower($content = "")
{
    $content    =    str_replace(" ", "", $content);
    $array    =    str_split($content);
    $count    =    0;
    foreach ($array as $key => $value) {
        $asc    =    ord($value);
        if ($asc >= 65 && $asc <= 90)    $count++;
    }
    return $count;
}

//Replace " -> &quot; (chống phá ngoặc)
function removeQ($string)
{
    $string = str_replace('\"', '"', $string);
    $string = str_replace("\'", "'", $string);
    $string = str_replace("\&quot;", "&quot;", $string);
    $string = str_replace("\\\\", "\\", $string);
    return str_replace('"', "&quot;", $string);
}




function show_page($total, $item_per_page, $current_page, $href = "/home/tintuc/")
{
    $str     =     '';
    if ($total <= 1) {
        return '';
    }
    if ($current_page == 1) {
        $str .= '<li class="onpage"><a>1</a></li>';
    } elseif ($current_page > 3) {
        $str .= '<li class="" ><a data-pjax="#page" href="' . $href . '1">1</a></li> ...';
    } else {
        $str .= '<li class=""><a data-pjax="#page" href="' . $href . '1">1</a></li>';
    }
    for ($i = 2; $i <= $total; $i++) {
        if ($i >= $current_page - 1 && $i <= $current_page + 2) {
            if ($i == $current_page) {
                $str .= '<li class="onpage"><a>' . $i . '</a></li>';
            } else {
                $str .= '<li class="" ><a data-pjax="#page" href="' . $href . $i . '">' . $i . '</a></li>';
            }
        }
    }
    if ($total >  $current_page + 2) {
        $str .= '... <li class=""><a data-pjax="#page" href="' . $href . $total . '">' . $total . '</a></li>';
    }
    return $str;
}
function winPromptLogin($myuser)
{
    $str = '';
    if ($myuser->logged == 0) {
        $str .= 'onclick="windowPrompt({ href: \'/includes_v2/inc_login.php\', ajax: true, width: 500, height: 200, });"';
    }
    return $str;
}
function inputCheckbox($number = 4)
{
    $str = '';
    for ($i = 1; $i <= $number; $i++) {
        $str .= '<input class="check" type="checkbox" checked="true" />';
        $str .= '<img class="checkimg" src="/themes/v2/img/checked.jpg" />';
    }
    return $str;
}





function average($arr_1, $arr_2, $edit = 0)
{
    $arrNew = array();
    foreach ($arr_1 as $key => $value) {
        if ($arr_2[$key] > 0) {
            if ($edit != 0) {
                $value = $value * 100;
            }
            $temp = format_number($value / $arr_2[$key], 2, 1);
            $temp = floatval($temp);
        } else {
            $temp = 0;
        }
        array_push($arrNew, $temp);
    }
    return $arrNew;
}

/*
function get_total_click($start, $end){
    $clicks = array();
    for( $i = 0; $i < 100; $i++ ){
        $sql = '
            SELECT
                aus_website,
                count(aus_id) as total_click,
                sum(aus_money) as total_money
            FROM
                ads_user_spent_' . $i . '
            WHERE
                aus_time >= ' . $start . '
                AND aus_time <= ' . $end . '
            GROUP BY
                aus_website
        ';
        $re = new db_query($sql, __FILE__.__LINE__, 'USE_SLAVE');

        while( $row = mysql_fetch_assoc( $re->result ) ){
            //debug( $row );
            if( !isset( $clicks[$row['aus_website']] ) ){
                $clicks[$row['aus_website']]['website_id'] = $row['aus_website'];
                $clicks[$row['aus_website']]['click'] = 0;
                $clicks[$row['aus_website']]['money'] = 0;
            }
            $clicks[$row['aus_website']]['click'] += $row['total_click'];
            $clicks[$row['aus_website']]['money'] += $row['total_money'];
        }
    }
    return $clicks;
}
*/
function cate(&$cats, $parrent_id = 0, $id = 0)
{
    if (is_array($cats) && !empty($cats)) {
        if ($parrent_id == 0) {
            foreach ($cats as $id => $cat) {
                if ($cat['cat_parent_id'] > 0) {
                    cate($cats, $cat['cat_parent_id'], $id);
                }
            }
        } else {
            if (isset($cats[$parrent_id])) {
                $cats[$parrent_id]['childs'][$id] = $cats[$id];
                unset($cats[$id]);
            }
        }
    } else {
    }
}


function remove_http($link)
{
    $str = explode('/', $link);
    if ($str[0] == 'http:' || $str[0] == 'https:' || $str[0] == 'ftp:' || $str[0] == 'ftps:') {
        return $str[2];
    }
    return $str[0];
}
function is_first_time()
{
    if (isset($_SESSION['userloginhits']) && $_SESSION['userloginhits'] <= 3) {
        if (!isset($_COOKIE['view_tut'])) {
            //$_COOKIE['view_tut'] = 1;
            setcookie('view_tut', 1, time() + 86400 * 100, '/');
            //echo $_SESSION['userloginhits'];
            return true;
        }
    }
    return false;
}

function check_box_filter($arr_value, $value_check, $data_group = '', $input_name = '', $noncheck = 0)
{
    $str = '';
    if ($data_group != '') $data_group = 'data-group="' . $data_group . '"';
    foreach ($arr_value as $key => $value) {
        $active = '';
        $checked = '';
        $onclick = '';
        if ($key & $value_check || (is_array($value_check) && in_array($key, $value_check))) {
            $active = 'active';
            $checked = 'checked="true"';
        }
        if ($noncheck == 1) {
            $active = '';
            $checked = '';
        }
        if ($value == 'Đấu giá click')
            $onclick = 'onclick="show_price_click(this)"';
        $str .= '<a ' . $onclick . 'class="toggle-btn toggle-btn-small ' . $active . '" ' . $data_group . '>';
        $str .= $value;
        $str .= '<input name="' . $input_name . '[' . $key . ']" type="checkbox" value="' . $key . '" class="' . $input_name . ' hidden web-filter" ' . $checked . '/>';
        $str .= '</a>';
    }
    return $str;
}


function convert_bb_code($string)
{
    $arry_source = array(
        '[b]',
        '[color=red]',
        '[b][color=red]',
        '[/b]',
        '[/color]',
        '[/color][/b]'
    );
    $arry_replace = array(
        '<span style="font-weight: bold">',
        '<span style="color: red">',
        '<span style="font-weight: bold; color: red;">',
        '</span>',
        '</span>',
        '</span>'
    );
    return str_replace($arry_source, $arry_replace, $string);
}

function remove_bb_code($string)
{
    $arry_source = array(
        '[b]',
        '[color=red]',
        '[b][color=red]',
        '[/b]',
        '[/color]',
        '[/color][/b]'
    );
    $arry_replace = array(
        '', '', '', '', '', ''
    );
    return str_replace($arry_source, $arry_replace, $string);
}

function check_length_special($str)
{
    $length = 0;
    $reg_b = '/\[b\](.*?)\[\/b\]/';
    $reg_color = '/\[color=red\](.*?)\[\/color\]/';

    if (preg_match($reg_color, $str) != 0)
        preg_match_all($reg_color, $str, $matches_color);
    else
        $matches_color[1] = array();

    foreach ($matches_color[1] as $key => $value) {
        $length += strlen(removeAccent($value));
    }

    if (preg_match($reg_b, $str) != 0)
        preg_match_all($reg_b, $str, $matches_b);
    else
        $matches_b[1] = array();

    foreach ($matches_b[1] as $key => $value) {
        if (preg_match($reg_color, $value) == 0)
            $length += strlen(removeAccent($value));
    }
    return $length;
}

function show_adv_filter($arr_filter, $arr_value)
{
    $str = '';
    foreach ($arr_filter as $id => $value) {
        if ($arr_value & $id) {
            $str .= ',' . $value;
        }
    }
    return substr($str, 1);
}

function dump_log($data = array(), $path = '../../logs/log.txt')
{
    $handle = @fopen($path, 'a+');
    $data   = var_export($data, true);
    $data   = date('H:i:s d/m/Y') . ' - ' . $data;
    if ($handle) {
        fwrite($handle, $data);
        fclose($handle);
    }
}

function savelog1($filename, $content)
{
    $log_path     =   $_SERVER["DOCUMENT_ROOT"] . "/ipstore/";
    $handle       =   @fopen($log_path . $filename, "a");
    //Neu handle chua co mo thêm ../
    if (!$handle) $handle = @fopen($filename, "a");
    //Neu ko mo dc lan 2 thi exit luon
    if (!$handle) exit();
    fwrite($handle, gmdate("d/m/Y h:i:s A") . " " . $content . " " . @$_SERVER["REQUEST_URI"] . "\n");
    fclose($handle);
}

function get_message($user_id, $start_time = 0, $end_time = 0, $limit = 5, $unread = true)
{
    $sql = '
        SELECT
            *
        FROM
            user_message_receive
            INNER JOIN user_message ON umr_message_id = usm_id
        WHERE
            umr_user_id = ' . $user_id . '
            AND ' . ($unread ? 'umr_read = 0' : '1') . '
    ';
    if ($start_time && $end_time) {
        $sql .= ' AND umr_time >= ' . $start_time . ' AND umr_time <= ' . $end_time;
    }
    $sql .= ' ORDER BY umr_time DESC LIMIT ' . $limit;
    $db = new db_query($sql, __FILE__ . __LINE__, 'USE_SLAVE');
    $user_message = array();
    if (mysql_num_rows($db->result) > 0) {
        while ($row = mysql_fetch_assoc($db->result)) {
            $user_message[$row['usm_id']] = $row;
        }
    }
    return $user_message;
}

function total_message($user_id, $start_time = 0, $end_time = 0, $unread = true)
{
    $sql = '
        SELECT
            count(*) as count
        FROM
            user_message_receive
            INNER JOIN user_message ON umr_message_id = usm_id
        WHERE
            umr_user_id = ' . $user_id . '
            AND ' . ($unread ? 'umr_read = 0' : '1') . '
    ';
    if ($start_time && $end_time) {
        $sql .= ' AND umr_time >= ' . $start_time . ' AND umr_time <= ' . $end_time;
    }
    $count = new db_query($sql);
    $count = mysql_fetch_assoc($count->result);
    return $count['count'];
}

function send_message($array_user_id, $content)
{
    if ($content) {
        $form = new generate_form();
        $form->addTable('user_message');
        $form->add('usm_content', 'content', 0, 1, $content);
        $time = time();
        $form->add('usm_time', 'time', 1, 1, time());
        $form->evaluate();
        $db = new db_execute_return();
        $last_mess_id = $db->db_execute($form->generate_insert_SQL());
        unset($db);
        unset($form);
        foreach ($array_user_id as $user_id) {
            $form = new generate_form();
            $form->addTable('user_message_receive');
            $form->add('umr_user_id', 'user_id', 1, 1, $user_id);
            $form->add('umr_message_id', 'last_mess_id', 1, 1, $last_mess_id);
            $form->add('umr_time', 'time', 1, 1, time());
            $form->evaluate();
            $db = new db_execute($form->generate_insert_SQL());
            unset($db);
            unset($form);
        }
    }
}

//Hàm format thông báo lỗi
//Click vào focus vào trường tương ứng
function err_focus($element_id, $mess, $class_err_mess = 'err_mess')
{
    return '<a class="' . $class_err_mess . '" href="javascript:void(0);" onclick="$(\'#' . $element_id . '\').focus();">' . $mess . '</a>';
}

//Hàm lấy ip của máy khách
function client_ip()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                    return $ip;
                }
            }
        }
    }
}

/** CHECK IP REDIS **/
function checkIp_redis()
{
    require_once('../classes/redis_store.php');
    $ip = $_SERVER['REMOTE_ADDR'];
    $redis    = new redis_store();
    //Nếu connect được thì OK
    if (!$redis->test_connect())
        exit;

    $list_ip     =     $redis->keys('banner_ip:*');
    if (!empty($list_ip)) {
        foreach ($list_ip as $key) {
            $ext    =    explode(':', $key);
            $ip_set    =    (isset($ext[1])) ? $ext[1] : 0;
            if ($ip == $ip_set) {
                return true;
            }
        }
    } else {
        return false;
    }
    return false;
}


/** Hàm lấy tooltip **/
function get_tooltip()
{
    $sql            =    "SELECT * FROM tooltip";
    $db_query    =    new db_query($sql, __FILE__ . __LINE__, "USE_SLAVE");
    $arr_return    =    array();
    while ($row    =    mysql_fetch_assoc($db_query->result)) {
        $row['tt_element']        =    html_entity_decode($row['tt_element']);
        $arr_return[$row['tt_element']]    =    array(
            'position'    =>    $row['tt_position'],
            'content'    =>    html_entity_decode($row['tt_content'])
        );
    }
    unset($db_query);
    return $arr_return;
}

/**
 * Hàm check debug
 */
function show_debug()
{
    $dump    =  getValue("dump", "int", "GET", 0);
    if ($dump == 1  && $_SERVER['REMOTE_ADDR'] == '118.70.233.70') {
        return true;
    }
    return false;
}

function getList($strquery)
{
    $query =  new db_query($strquery);
    $return = $query->objectList();
    $query->close();
    return $return;
}

function getItem($strquery)
{
    $query =  new db_query($strquery);
    $return = $query->objectItems();
    $query->close();
    return $return;
}

function getRow($strquery)
{
    $query =  new db_query($strquery);
    $return = mysql_fetch_row($query->result);
    $query->close();
    return $return;
}

function getnumRow($strquery)
{
    $query =  new db_query($strquery);
    $return = mysql_num_rows($query->result);
    $query->close();
    return $return;
}



function button_file($mystring)
{
    $typefile = array('.docx"', '.doc"', '.pdf"', '.xlsx"', '.xls"', '.rar"', '.zip"');

    $replace = array('.docx" class="download"', '.doc" class="download"', '.pdf" class="download"', '.xlsx" class="download"', '.xls" class="download"', '.rar" class="download"', '.zip" class="download"');

    return str_replace($typefile, $replace, $mystring);
}

function makeML($content, $search, $replace, $amp = '')
{
    if ($content != '') {
        require_once("simple_html_dom.php");
        $html = str_get_html($content);
        $h2s = $html->find("h2,h3,h4");
        $img = ($amp != '') ? '<amp-img width=40 height=40 layout="intrinsic" src="/images/img_light.png"></amp-img>' : "<img src='/images/load.gif' class='lazyload' data-src='/images/img_light.png' />";
        $patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
        $ml = "<nav role='navigation' class='table-of-contents'>
            <div class='box_title_pl'>
                <p class='tt_phu_luc'><span class = 'mucluc'>Mục lục</span></p>
            </div>
            <ul>";
        $i = $u = $j = 0;
        foreach ($h2s as $h2) {
            $text = preg_replace($patterns, '', $h2->plaintext, 1);
            $id = replaceTitle($text);
            if ($id == $search) {
                $id = $replace;
            }
            $h2->id = $id;
            if ($h2->tag == 'h2') {
                $i++;
                $ml .= "<li><a class=ul_h2 href='#" . $id . "'>" . $i . ". " . $text . "</a></li>";
                $j = 0;
            }
            if ($h2->tag == 'h3') {
                $j++;
                $ml .= "<li><a class=ul_h3 href='#" . $id . "'>" . $i . "." . $j . ". " . $text . "</a></li>";
                $u = 0;
            }
            if ($h2->tag == 'h4') {
                $u++;
                $ml .= "<li><a class=ul_h4 href='#" . $id . "'>" . $i . "." . $j . "." . $u . ". " . $text . "</a></li>";
            }
        }
        $ml .= '</ul>';
        echo $ml;
    }
}
function makeMLBlog($content, $search, $replace)
{
    if ($content != '') {
        require_once("simple_html_dom.php");
        $html = str_get_html($content);
        $h2s = $html->find("h2,h3,h4");
        $patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
        $ml = "<nav role='navigation' class='table-of-contents'>
            <div class='box_title_pl'>
                <p class='tt_phu_luc'><span>Mục lục</span></p>
            </div>
            <ul>";
        $i = $u = $j = 0;
        foreach ($h2s as $h2) {
            $text = preg_replace($patterns, '', $h2->plaintext, 1);
            $id = replaceTitle($text);
            if ($id == $search) {
                $id = $replace;
            }
            $h2->id = $id;
            if ($h2->tag == 'h2') {
                $i++;
                $ml .= "<li><a class=ul_h2 href='#" . $id . "'>" . $text . "</a></li>";
                $j = 0;
            }
            if ($h2->tag == 'h3') {
                $j++;
                $ml .= "<li><a class=ul_h3 href='#" . $id . "'>" . $text . "</a></li>";
                $u = 0;
            }
            if ($h2->tag == 'h4') {
                $u++;
                $ml .= "<li><a class=ul_h4 href='#" . $id . "'>" . $text . "</a></li>";
            }
        }
        $ml .= '</ul>';
        echo $ml;
    }
}
function makeML_content($content, $search, $replace)
{
    if ($content != '') {
        require_once("simple_html_dom.php");
        $html = str_get_html($content);
        $h2s = $html->find("h2,h3,h4");
        $patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
        foreach ($h2s as $h2) {
            $text = preg_replace($patterns, '', str_replace('&nbsp;', ' ', $h2->plaintext));
            $id = replaceTitle($text);
            if ($id == $search) {
                $id = $replace;
            }
            $h2->id = $id;
        }
        $html = $html->save();
        return $html;
    }
}

function locdau_xemthem($key)
{
    $array = array("?", "-", ",", ".", "~", "'", '"', "(", ")", "*", "/", "+", "-", "!", "@", "#", "$", "%", "^", "&", "*");
    $key = trim($key);
    $key = str_replace($array, '', $key);

    return $key;
}

function makeXemthem($content, $search = array(), $html_lq = '')
{
    if ($content != '') {
        $html = str_get_html($content);

        $h2s = $html->find('h2');
        $i = 1;
        foreach ($h2s as $h2) {
            if ($i == 2 && $html_lq != '') {
                $h2->outertext = $html_lq . $h2->outertext;
            }
            if ($i > 1) {
                $h2->outertext = array_shift($search) . $h2->outertext;
            }

            if ($i > 8) {
                break;
            }
            $i++;
        }
        $html = $html->save();
        return $html;
    } else {
        return $content;
    }
}

function makeVLNN($arr = array(), $title, $db_cat)
{
    $html = "<fieldset>";
    $html .= "<legend>" . $title . "</legend>";
    $html .= "<ul>";
    foreach ($arr as $key => $value) {
        $html .= "<li><a href=" . rewriteCate(0, 0, $db_cat[$value]['cat_id'], $db_cat[$value]['cat_name']) . ">" . $db_cat[$value]['cat_name'] . "  <span>(" . $db_cat[$value]['cat_count'] . ")</span></a></li>";
    }
    $html .= "</ul>";
    $html .= "</fieldset>";
    return $html;
}

function mkCVNN($arr = array(), $title, $db_cat)
{
    $html = "<div class='item'>";
    $html .= "<p class='tt'>" . $title . "</p>";
    $html .= "<ul>";

    foreach ($arr as $key => $value) {
        $html .= "<li><a href=" . rewriteNNCV($db_cat[$value]['alias']) . ">" . $db_cat[$value]['name'] . "</a></li>";
    }
    $html .= "</ul>";
    $html .= "</div>";
    return $html;
}

function add($tbl_name, $data = array())
{
    $columns = $value = [];
    if (!empty($data) && $tbl_name != '') {
        foreach ($data as $key => $val) {
            $columns[]  = "`" . $key . "`";
            $value[]    = "'" . $val . "'";
        }
        $columns = implode(',', $columns);
        $value = implode(',', $value);
        $sql = "INSERT INTO `" . $tbl_name . "`(" . $columns . ") VALUES (" . $value . ") ";
        $db = new db_query($sql);
    }
}

function update($tbl_name, $data = array(), $condition = array())
{
    $txt_column = '';
    $where = '';
    if ($tbl_name != '' && !empty($data)) {
        foreach ($data as $key => $value) {
            $txt_column .= "`" . $key . "` = " . "'" . $value . "',";
        }
        $txt_column = rtrim($txt_column, ',');
        if (!empty($condition)) {
            foreach ($condition as $key => $val) {
                $where .= "AND `" . $key . "` = '" . $val . "'";
            }
        }
        $result = "UPDATE " . $tbl_name . " SET " . $txt_column . " WHERE 1 " . $where . " ";
        $db = new db_query($result);
    }
}

function delete($tbl, $condition) 
{
    $sql = "DELETE FROM ".$tbl." WHERE ";
    if (is_array($condition)) {
        foreach ($condition as $k => $v) {
            $arrConditinon[] = $k . ' = ' . "'" . $v . "'";
        }
        $sql .= implode(' AND ', $arrConditinon);
    } else {
        $sql .= $condition;
    }  
    $qr = new db_query($sql);
}

function select($data, $tbl, $join = '', $condition = '', $group_by = '', $order_by = '', $start = '', $limit = '')
{
    $sql = 'SELECT ' . $data . ' FROM ' . $tbl;
    // Thêm điều kiện
    if ($condition != '') {
        $sql .= ' WHERE ';
        if (is_array($condition)) {
            foreach ($condition as $k => $v) {
                $arrConditinon[] = $k . ' = ' . "'" . $v . "'";
            }
            $sql .= implode(' AND ', $arrConditinon);
        } else {
            $sql .= $condition;
        } 
    }
    // Lặp join các bảng
    if ($join != '' && is_array($join)) {
        foreach ($join as $k => $dk_join) {
            $type_join = (isset($dk_join[2])) ? $dk_join[2] : "";
            $sql .= ' ' . $type_join . ' JOIN ' . $dk_join[0] . ' ON ' . $dk_join[1];
        }
    }
    if ($group_by != '') {
        $sql .= ' GROUP BY ' . $group_by;
    }
    // Thêm sắp xếp
    if ($order_by != '') {
        $sql .= ' ORDER BY ' . $order_by; 
    }
    // Check limit phục vụ phân trang
    if ($start != '' && $limit != '') {
        $sql .= ' LIMIT ' . $start . ',' . $limit;
    }
    // Check limit lấy số lượng cụ thể
    else if ($limit != '') {
        $sql .= ' LIMIT ' . $limit;
    }
    $db = new db_query($sql); 
    $arr = [];
    if (mysql_num_rows($db->result) > 0) {
        while ($row = mysql_fetch_assoc($db->result)) { 
            $arr[] = $row;
        }   
    } 
    return $arr;
}

function hide_mail($data)
{
    $mail = stripos($data, '@', 0) - 3;
    $data = substr_replace($data, "*******", 3, $mail);
    return $data;
}
function GetImageOG($content)
{
    if ($content != '') {
        require_once("simple_html_dom.php");
        $html = str_get_html($content);
        $images = $html->find("img");
        $src = $images[0]->src;
        $src = "https://timviec365.com" . $src;
        return $src;
    }
}
function loclinkbaiviet($noidung)
{
    $string = trim(preg_replace('#<a.*?>(.*?)</a>#i', '$1', $noidung));
    return $string;
}
function hide_infocontact($text)
{
    $string = trim($text);
    //Xuống dòng
    $string = preg_replace('#(<br */?>\s*)+#i', '<br />', nl2br($string));

    $email_check = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
    $number_check = '/0[0-9\s.-]{9,13}/';
    preg_match_all($email_check, $string, $matches);
    preg_match_all($number_check, $string, $matches2);
    foreach ($matches[0] as $key => $value) {
        $string = str_replace($value, hide_mail($value), $string);
    }
    foreach ($matches2[0] as $key => $value2) {
        $string = str_replace($value2, "*********", $string);
    }
    return $string;
}
function ChangeToSlug($str)
{
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    $str = preg_replace('/(\-\-\-\-\-)/', '-', $str);
    $str = preg_replace('/(\-\-\-\-)/', '-', $str);
    $str = preg_replace('/(\-\-\-)/', '-', $str);
    $str = preg_replace('/(\-\-)/', '-', $str);
    $str = preg_replace('/(\-)/', '-', $str);
    return $str;
}
function call_api($url, $data = array())
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => '',
        CURLOPT_POST => 1,
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        CURLOPT_POSTFIELDS => http_build_query($data)
    ));
    $resp = curl_exec($curl);
    //     $decode = json_decode($resp);
    //     var_dump($decode->result);
    //     die;
    curl_close($curl);
}
// tính kích thước file
function convert_filesize($fileSize) {
    $i = -1;
    $byteUnits = [' kB', ' MB', ' GB', ' TB', 'PB', 'EB', 'ZB', 'YB'];
    do {
        $fileSize /= 1024;
        $i++;
    } while ($fileSize > 1024);
    return round($fileSize, 1) . $byteUnits[$i];
}
// thêm những người lạ vào mảng bạn bè
function add_strangers_to_arr_ep($arr, $arr_in4)
{
    $emp_stranger = [];
    $com_stranger = [];
    $arr_ep = [];
    $arr_com = [];
    if (isset($arr_in4[2])) {
        $arr_ep = $arr_in4[2];
    }
    if (isset($arr_in4[1])) {
        $arr_com = $arr_in4[1];
    }
    // cho nhưng người khác cty vào mảng người lạ
    foreach ($arr as $k => $v) {
        if ($v['id_user'] != '' && ($v['user_type'] == 2 || $v['user_type'] == 0) && !array_key_exists($v['id_user'],$arr_ep) && !in_array($v['id_user'],$emp_stranger) && $v['id_user'] > 0){
            $emp_stranger[] = $v['id_user'];
        }elseif ($v['id_user'] != '' && $v['user_type'] == 1 && !in_array($v['id_user'],$com_stranger) && $v['id_user'] > 0 && !array_key_exists($v['id_user'],$arr_com)){
            $com_stranger[] = $v['id_user'];
        } 
    }
    // lấy thông tin của những người lạ cho vào mảng arr_in4
    $arr_stranger = list_stranger_infor(implode(",", $emp_stranger));
    foreach ($arr_stranger as $k => $v) {
        $arr_ep[$v['ep_id']] = $v;
    }
    $arr_in4[2] = $arr_ep;
    $arr_in4[1] = $arr_com;
    $com_stranger = list_stranger_cominfor(implode(",",$com_stranger));
    foreach ($com_stranger as $k => $v) {
        $arr_in4[1][$v['com_id']] = $v;
    }
    return $arr_in4;
}
// link trang cá nhân
function render_link_profile($user_id, $user_type)
{
    if ($user_type == 1) {
        $link = '/trang-ca-nhan-c'.$user_id;
    } else {
        $link = '/trang-ca-nhan-e'.$user_id;
    }
    return $link;
}
// lấy thông tin reaction
function get_reaction($id = null)
{
    $reaction_arr = [
        [ 'text' => 'Thích', 'color' => 'blue' ],
        [ 'text' => 'Yêu thích', 'color' => 'red' ],
        [ 'text' => 'Wow', 'color' => 'yellow' ],
        [ 'text' => 'Thương thương', 'color' => 'yellow' ],
        [ 'text' => 'Phẫn nộ', 'color' => 'red' ],
        [ 'text' => 'Buồn', 'color' => 'yellow' ],
        [ 'text' => 'Ha ha', 'color' => 'yellow' ]
    ];
    if ($id) {
        return $reaction_arr[$id-1];
    } else {
        return $reaction_arr;
    } 
}
// Check quyền hiển thị nơi lm việc, trường học, người thân
function check_view_mode_info($type, $info, $type_edit, $is_friend)
{
    $check = false;
    if ($type == 1) {
        $view_mode = select('user_id, user_type', 'work_place_view_mode', '', ['work_place_id'=>$info['id']]);
    } else if ($type == 2) {
        $view_mode = select('user_id, user_type', 'school_user_view_mode', '', ['school_user_id'=>$info['id']]);
    } else {
        $view_mode = select('user_id, user_type', 'family_user_view_mode', '', ['family_user_id'=>$info['id']]);
    }
    $check_except = array_filter($view_mode, function($v) {
        return $v['user_id'] == $_SESSION['login']['id'] && $v['user_type'] == $_SESSION['login']['user_type'];  
    });
    if ((!isset($_SESSION['login']) && $info['view_mode'] == 0) || 
        (isset($_SESSION['login']) && $type_edit == 1 && (
            $info['view_mode'] == 0 ||
            ($info['view_mode'] == 2 && $is_friend == 1) || 
            ($info['view_mode'] == 3 && $is_friend == 1 && !$check_except) || 
            ($info['view_mode'] == 4 && $is_friend == 1 && $check_except)
        )) || 
        (isset($_SESSION['login']) && $type_edit == 0)) {
        $check = true;
    }
    return $check;
} 
// check và lấy thông xem bạn đã thả cảm xúc chưa
function get_info_react($lst_react)
{
    $check_react = '';
    foreach ($lst_react as $k => $v) {
        if ($v['id_user'] == $_SESSION['login']['id'] && $v['user_type'] == $_SESSION['login']['user_type']){
            $check_react = $v;
        }
    }
    return $check_react;
}
// danh sách bài viết và thông tin user + người lạ
function render_list_news($sql_lst_new, $arr_in4, $ep_id = null)
{ 
    $arr_stranger = [];
    if ($ep_id) {
        $arr_stranger[] = $ep_id;
    }
    $com_stranger = [];
    $arr_post = [];
    $arr_ep = $arr_in4[2];
    $arr_com = $arr_in4[1];
    $db_lst_new = new db_query($sql_lst_new);
    while ($row = mysql_fetch_array($db_lst_new->result)) {
        // tác giả của tin
        if ($row['author'] != '' && $row['author_type'] == 2 && !array_key_exists($row['author'],$arr_ep) && !in_array($row['author'],$arr_stranger)){
            $arr_stranger[] = $row['author'];
        }elseif ($row['author'] != '' && $row['author_type'] == 1 && !in_array($row['author'],$com_stranger) && !array_key_exists($row['author'],$arr_com)){
            $com_stranger[] = $row['author'];
        }
        // position của tin
        if ($row['position'] != '' && $row['type'] == 2 && !array_key_exists($row['position'],$arr_ep) && !in_array($row['position'],$arr_stranger)){
            $arr_stranger[] = $row['position'];
        }
        // tag của tin
        $tag = explode(",",$row['id_user_tags']);
        foreach ($tag as $key => $value) {
            if ($value != '' && !array_key_exists($value,$arr_ep) && !in_array($value,$arr_stranger) && $value > 0){
                $arr_stranger[] = $value;
            }
        }
        $lst_tags_post = select("nt_user_id, nt_user_type", 'new_tags', '', ['nt_new_id'=> $row['new_id']], '', 'nt_created_at DESC');
        foreach ($lst_tags_post as $k => $v) {
            if ($v['nt_user_id'] != '' && $v['nt_user_type'] == 2 && !array_key_exists($v['nt_user_id'],$arr_ep) && !in_array($v['nt_user_id'],$arr_stranger) && $v['nt_user_id'] > 0){
                $arr_stranger[] = $v['nt_user_id'];
            }elseif ($v['nt_user_id'] != '' && $v['nt_user_type'] == 1 && !in_array($v['nt_user_id'],$com_stranger) && $v['nt_user_id'] > 0 && !array_key_exists($row['author'],$arr_com)){
                $com_stranger[] = $v['nt_user_id'];
            }
        }
        $row['lst_tags_post'] = $lst_tags_post;
        // danh những user thả cảm xúc bài viết  
        $row['list_react_post'] = select("nr_new_id, id_user, user_type, nr_created_at, nr_type", 'new_reaction', '', ['nr_new_id'=> $row['new_id']], '', 'nr_created_at DESC');

        // tác giả, position, tag của tin được chia sẻ
        if ($row['parents_id'] > 0){
            $db_new_share = new db_query("SELECT * FROM new_feed WHERE new_id = ".$row['parents_id']);
            $db_new_share = mysql_fetch_array($db_new_share->result);
            if ($db_new_share['author'] != '' && $db_new_share['author_type'] == 2 && !array_key_exists($db_new_share['author'],$arr_ep) && !in_array($db_new_share['author'],$arr_stranger)){
                $arr_stranger[] = $db_new_share['author'];
            }elseif ($db_new_share['author'] != '' && $db_new_share['author_type'] == 1 && !in_array($db_new_share['author'],$com_stranger) && !array_key_exists($db_new_share['author'],$arr_com)){
                $com_stranger[] = $db_new_share['author'];
            }
            if ($db_new_share['position'] != '' && $db_new_share['type'] == 2 && !array_key_exists($db_new_share['position'],$arr_ep) && !in_array($db_new_share['position'],$arr_stranger)){
                $arr_stranger[] = $db_new_share['position'];
            }
            $tag = explode(",",$db_new_share['id_user_tags']);
            foreach ($tag as $key => $value) {
                if ($value != '' && !array_key_exists($value,$arr_ep) && !in_array($value,$arr_stranger) && $value > 0){
                    $arr_stranger[] = $value;
                }
            }
            // người vote của tin bình chọn
            if ($db_new_share['new_type'] == 7){
                $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $db_new_share['new_id']);
                while ($row_vote = mysql_fetch_array($db_vote->result)) {
                    $db_user_vote = new db_query("SELECT * FROM user_vote WHERE id_vote = " . $row_vote['id']);
                    
                    if (mysql_num_rows($db_user_vote->result) > 0) {
                        while ($row_user = mysql_fetch_array($db_user_vote->result)) {
                            if ($row_user['id_user'] != '' && !array_key_exists($row_user['id_user'],$arr_ep) && !in_array($row_user['id_user'],$arr_stranger)){
                                $arr_stranger[] = $row_user['id_user'];
                            }
                        }
                    }
                }
            }
        }
        // tác giả của album được chia sẻ
        if ($row['album_id'] > 0){
            $db_new_share = new db_query("SELECT * FROM album WHERE id = ".$row['album_id']);
            $db_new_share = mysql_fetch_array($db_new_share->result);

            if ($db_new_share['user_id'] != '' && $db_new_share['user_type'] == 2 && !array_key_exists($db_new_share['user_id'],$arr_ep) && !in_array($db_new_share['user_id'],$arr_stranger)){
                $arr_stranger[] = $db_new_share['user_id'];
            }
        }
        // người vote của tin bình chọn
        if ($row['new_type'] == 7){
            $db_vote = new db_query("SELECT * FROM tbl_voted WHERE id_new = " . $row['new_id']);
            while ($row_vote = mysql_fetch_array($db_vote->result)) {
                $db_user_vote = new db_query("SELECT * FROM user_vote WHERE id_vote = " . $row_vote['id']);
                
                if (mysql_num_rows($db_user_vote->result) > 0) {
                    while ($row_user = mysql_fetch_array($db_user_vote->result)) {
                        if ($row_user['id_user'] != '' && !array_key_exists($row_user['id_user'],$arr_ep) && !in_array($row_user['id_user'],$arr_stranger)){
                            $arr_stranger[] = $row_user['id_user'];
                        }
                    }
                }
            }
        }
        // số lượng share
        $count_share = new db_query("SELECT * FROM share_post WHERE id_new = " . $row['new_id']);
        $row['count_share'] = mysql_num_rows($count_share->result);
        // số lượng tất cả cmt
        $count_comment = new db_query("SELECT * FROM comment WHERE id_new = " . $row['new_id']);
        $row['count_comment'] = mysql_num_rows($count_comment->result);
        // comment của tin
        $db_comment = new db_query("SELECT comment.*
        FROM comment
        WHERE id_new = " . $row['new_id'] . " AND id_parent = 0
        GROUP BY comment.id 
        ORDER BY id DESC ");
        while ($row_comment = mysql_fetch_array($db_comment->result)) {
            if ($row_comment['id_user'] != '' && $row_comment['user_type'] == 2 && !array_key_exists($row_comment['id_user'],$arr_ep) && !in_array($row_comment['id_user'],$arr_stranger)){
                $arr_stranger[] = $row_comment['id_user'];
            } elseif ($row_comment['id_user'] != '' && $row_comment['user_type'] == 1 && !in_array($row_comment['id_user'],$com_stranger) && $row_comment['id_user'] > 0 && !array_key_exists($row_comment['id_user'],$arr_com)){
                $com_stranger[] = $row_comment['id_user'];
            }
        }
        $arr_post[] = $row;
    }
    $arr_stranger = list_stranger_infor(implode(",",$arr_stranger));
    foreach ($arr_stranger as $key => $value) {
        $arr_ep[$value['ep_id']] = $value;
    }
    $arr_in4[2] = $arr_ep;
    // $arr_in4[1] = [];
    $com_stranger = list_stranger_cominfor(implode(",",$com_stranger));
    foreach ($com_stranger as $key => $value) {
        $arr_in4[1][$value['com_id']] = $value;
    }
    return [$arr_post, $arr_in4];
}
// check xem mình là gì trong nhóm
function is_admin_group($id_group, $my_id, $my_type)
{
    $db_mem = new db_query("SELECT * FROM group_member WHERE group_id = $id_group");
    $arr_mem_admin = [];
    $arr_mem_censor = [];
    $is_follow = true;
    while ($mem = mysql_fetch_array($db_mem->result)) { 
        if ($mem['type_mem'] == 1){
            $arr_mem_admin[$mem['user_id']."-".($mem['user_type']%2)] = $mem;
        }elseif ($mem['type_mem'] == 2){
            $arr_mem_censor[$mem['user_id']."-".($mem['user_type']%2)] = $mem;
        }
        if ($mem['user_id'] == $my_id && $mem['user_type'] == $my_type && $mem['unfollow'] == 1) {
            $is_follow = false;
        }
    }
    // ds người quản lý = quản trị viên + ng kiểm duyệt
    $administrators_censor = array_merge($arr_mem_admin, $arr_mem_censor);
    $is_admin = false;
    if(array_key_exists(($my_id."-".($my_type%2)), $administrators_censor)){
        $is_admin = true;
    }
    return [
        'arr_mem_admin' => $arr_mem_admin,
        'arr_mem_censor' => $arr_mem_censor,
        'administrators_censor' => $administrators_censor,
        'is_admin' => $is_admin,
        'is_follow' => $is_follow,
    ];
}
// check xem mình đã ẩn bài viết hay chưa
function hide_posts($new_id, $my_id, $my_type)
{
    $hide = true;
    $check_hide = new db_query("SELECT * FROM new_hide_post WHERE new_id = $new_id AND user_id = $my_id AND user_type = $my_type");
    if (mysql_num_rows($check_hide->result)) {
        $hide = false;
    }
    return $hide;
}
?>