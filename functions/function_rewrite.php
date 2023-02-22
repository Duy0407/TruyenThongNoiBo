<?
function replaceTitle($title)
{
    $title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
    $title  = remove_accent($title);
    $title = str_replace('/', '', $title);
    $title = preg_replace('/[^\00-\255]+/u', '', $title);

    if (preg_match("/[\p{Han}]/simu", $title)) {
        $title = str_replace(' ', '-', $title);
    } else {
        $arr_str  = array("&lt;", "&gt;", "/", " / ", "\\", "&apos;", "&quot;", "&amp;", "lt;", "gt;", "apos;", "quot;", "amp;", "&lt", "&gt", "&apos", "&quot", "&amp", "&#34;", "&#39;", "&#38;", "&#60;", "&#62;");

        $title  = str_replace($arr_str, " ", $title);
        $title  = preg_replace('/\p{P}|\p{S}/u', ' ', $title);
        $title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);

        //Remove double space
        $array = array(
        '    ' => ' ',
        '   ' => ' ',
        '  ' => ' ',
        );
        $title = trim(strtr($title, $array));
        $title  = str_replace(" ", "-", $title);
        $title  = urlencode($title);
        // remove cac ky tu dac biet sau khi urlencode
        $array_apter = array("%0D%0A", "%", "&");
        $title  = str_replace($array_apter, "-", $title);
        $title  = strtolower($title);
    }
    return $title;
}
//Loại bỏ dấu
function remove_accent($mystring)
{
    $marTViet = array(
        "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ",
        "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
        "ì", "í", "ị", "ỉ", "ĩ",
        "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
        "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
        "ỳ", "ý", "ỵ", "ỷ", "ỹ",
        "đ",
        "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
        "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
        "Ì", "Í", "Ị", "Ỉ", "Ĩ",
        "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
        "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
        "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
        "Đ",
        "'"
    );

    $marKoDau = array(
        "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
        "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
        "i", "i", "i", "i", "i",
        "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
        "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
        "y", "y", "y", "y", "y",
        "d",
        "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
        "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
        "I", "I", "I", "I", "I",
        "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
        "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
        "Y", "Y", "Y", "Y", "Y",
        "D",
        ""
    );

    return str_replace($marTViet, $marKoDau, $mystring);
}

function getEmployee($ep_id)
{
    $curl   = curl_init();
    $header[]       = 'Authorization: ' . $_SESSION['login']['acc_token'] . '';
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://chamcong.24hpay.vn/service/get_list_employee_from_company.php?filter_by[ep_id]=' . $ep_id,
        CURLOPT_USERAGENT => 'https://chamcong.24hpay.vn/',
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
    $info_ep = json_decode($resp);
    return $info_ep;
}

function checkPost($check = [])
{
    $value = 0;
    for ($i = 0; $i < count($check); $i++) {
        if ((string)$check[$i] == "") {
        $value = 1;
        break;
        }
    }
    return $value;
}

function checkAuthor($new_id)
{
    $qr = new db_query("SELECT * FROM new_feed WHERE new_id = $new_id AND author = " . $_SESSION['login']['id']);
    if (mysql_num_rows($qr->result) == 0) {
        $value = 0;
    } else {
        $value = 1;
    }
    return $value;
}

function checkImages($str)
{
    if (preg_match('/image/', $str)) {
        $check = 1;
    } else {
        $check = 0;
    }
    return $check;
}

function checkVideo($str)
{
    if (preg_match('/image/', $str)) {
        $check = 1;
    } else {
        $check = 0;
    }
    return $check;
}

function check_config($user_id, $id_module, $name_config)
{
    $db_config = new db_query("SELECT * FROM config WHERE id_employee = $user_id");
    if (mysql_num_rows($db_config->result) > 0) {
        $row_config = mysql_fetch_array($db_config->result);
        if ($row_config[$name_config] == 1) {
        return 1;
        } else {
        return 0;
        }
    } else {
        return 0;
    }
}

function info_com()
{
    if (isset($_SESSION['login']['acc_token'])) {
        $curl           = curl_init();
        $header[]       = 'Authorization: ' . $_SESSION['login']['acc_token'] . '';
        curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://chamcong.24hpay.vn/service/detail_company.php?id_com=' . $_SESSION['login']['id_com'],
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        $responsive = json_decode($resp);
        return $responsive->data->detail_company;
    }
}

function info_company()
{
    if (isset($_SESSION['login']['acc_token'])) {
        return $_SESSION['login']['acc_token'];
        // $curl           = curl_init();
        // $header[]       = 'Authorization: ' . $_SESSION['login']['acc_token'] . '';
        // curl_setopt_array($curl, array(
        //   CURLOPT_RETURNTRANSFER => 1,
        //   CURLOPT_URL => 'https://chamcong.24hpay.vn/service/detail_company.php?id_com=' . $_SESSION['login']['id_com'],
        //   CURLOPT_HTTPHEADER => $header,
        //   CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        // ));
        // $resp = curl_exec($curl);
        // curl_close($curl);
        // $responsive = json_decode($resp);
        // return $responsive->data->detail_company;
    }
}

function list_ep(){
    if (isset($_SESSION['login']['acc_token'])) {
        $curl           = curl_init();
        $header[]       = 'Authorization: ' . $_SESSION['login']['acc_token'] . '';
        
        curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_all_employee_of_company.php?id_com=' . $_SESSION['login']['id_com'],
        CURLOPT_USERAGENT => 'https://chamcong.24hpay.vn/',
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        $responsive = json_decode($resp);
        $result = $responsive->data->items;
        $list_emp = [];
        foreach ($result as $item) {
            $list_emp[$item->ep_id] = [
                'ep_id' => $item->ep_id,
                'ep_name' => $item->ep_name,
                'ep_image' => $item->ep_image,
                'ep_birth_day' => $item->ep_birth_day,
                'dep_name' => $item->dep_name,
                'ep_phone' => $item->ep_phone,
                'ep_address' => $item->ep_address,
                'ep_education' => $item->ep_education,
                'ep_exp' => $item->ep_exp,
                'ep_email' => $item->ep_email,
                'ep_gender' => $item->ep_gender,
                'ep_married' => $item->ep_married,
            ];
        }
        return $list_emp;
    }else return [];
}

// function check_module($id_module)
// {
    //   if ($_SESSION['login']['user_type'] == 2) {
    //     $db_config = new db_query("SELECT * FROM config WHERE seen = 1 AND id_module = $id_module AND id_employee = " . $_SESSION['login']['id']);
    //     if (mysql_num_rows($db_config->result) == 0) {
    //       $db_check = new db_query("SELECT * FROM config WHERE seen = 1 AND id_employee = " . $_SESSION['login']['id']);
    //       $arr_default = [];
    //       while ($row_check = mysql_fetch_array($db_check->result)) {
    //         $arr_default[] = $row_check['id_module'];
    //       }
    //       sort($arr_default);
    //       $db_link_default = new db_query("SELECT * FROM module WHERE id = " . $arr_default[0]);
    //       $row_link_default = mysql_fetch_array($db_link_default->result);
    //       header("Location: " . $row_link_default['module_url']);
    //     } else {
    //       $data_permisson = [];
    //       $row_config = mysql_fetch_array($db_config->result);
    //       $data_permisson['delete'] = $row_config['delete'];
    //       $data_permisson['create'] = $row_config['create'];
    //       return $data_permisson;
    //     }
    //   } else {
    //     return true;
    //   }
// }

function list_department()
{
    if (isset($_SESSION['login']['acc_token'])) {
        $curl   = curl_init();
        $header[]       = 'Authorization: ' . $_SESSION['login']['acc_token'] . '';
        curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_department.php?id_com=' . $_SESSION['login']['id_com'],
        CURLOPT_USERAGENT => 'https://chamcong.24hpay.vn/',
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        ));
        $resp2 = curl_exec($curl);
        curl_close($curl);
        $resp2 = json_decode($resp2);
        return $resp2->data->items;
    }
}
function delete_data()
{
    $time = time();
    $qr_del_knowledge = new db_query("DELETE FROM knowledge WHERE `delete` = 1 AND  $time - `updated_at` >= 86400*3");
    $qr_mail_from_ceo = new db_query("DELETE FROM mail_from_ceo WHERE `delete` = 1 AND  $time - `updated_at` >= 86400*3");
    $qr_target = new db_query("DELETE FROM `target` WHERE `delete` = 1 AND  $time - `updated_at` >= 86400*3");
    $qr_core_value = new db_query("DELETE FROM `core_value` WHERE `delete` = 1 AND  $time - `updated_at` >= 86400*3");
    $qr_ttnb = new db_query("DELETE FROM `new_feed` WHERE `delete` = 1 AND  $time - `updated_at` >= 86400*3");
    unset($qr_del_knowledge, $qr_mail_from_ceo, $qr_target, $qr_core_value, $qr_ttnb);
}
function rewrite_group($id)
{
    return "/truyen-thong-noi-bo-nhom-thao-luan-b" . $id;
}

function rewrite_group_child($id)
{
    return "/truyen-thong-noi-bo-nhom-thao-luan-c" . $id;
}


function position_user($position_id)
{
    switch ($position_id) {
        case '1':
        $position_user = "Sinh viên thực tập";
        break;
        case '2':
        $position_user = "Nhân viên thử việc";
        break;
        case '3':
        $position_user = "Nhân viên chính thức";
        break;
        case '4':
        $position_user = "Trưởng nhóm";
        break;
        case '5':
        $position_user = "Phó trưởng phòng";
        break;
        case '6':
        $position_user = "Trưởng phòng";
        break;
        case '7':
        $position_user = "Phó giám đốc";
        break;
        case '8':
        $position_user = "Giám đốc";
        break;
        case '9':
        $position_user = "Nhân viên part-time";
        break;
        case '10':
        $position_user = "Phó ban dự án";
        break;
        case '11':
        $position_user = "Trưởng ban dự án";
        break;
        case '12':
        $position_user = "Phó tổ trưởng";
        break;
        case '13':
        $position_user = "Tổ trưởng";
        break;
        case '14':
        $position_user = "Tổ trưởng";
        break;
        case '16':
        $position_user = "Tổng giám đốc";
        break;
        case '17':
        $position_user = "Thành viên hội đồng quản trị";
        break;
        case '18':
        $position_user = "Phó chủ tịc hôi đồng quản trị";
        break;
        case '19':
        $position_user = "Chủ tịch hội đồng quản trị";
        break;
        case '20':
        $position_user = "Nhóm phó";
        break;
        case '21':
        $position_user = "Tổng giám đốc tập đoàn";
        break;
        case '22':
        $position_user = "Phó tổng giám đốc tập đoàn";
        break;
    }
    return $position_user;
}
function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
        $bname = 'Opera';
        $ub = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
        $version = $matches['version'][0];
        } else {
        $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }

    // check if we have a number
    if ($version == null || $version == "") {
        $version = "?";
    }

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}



function checkLogin(){
    //Nhân viên
    if (isset($_COOKIE['role']) && $_COOKIE['role'] == 2) {
        // Đã đăng nhập và tắt trình duyệt vào lại
        if (!isset($_SESSION['login']['id'])) {
            $token = $_COOKIE['acc_token'];
            $curl = curl_init();
            $data = array();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/user_info_employee.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

            $response = curl_exec($curl);
            curl_close($curl);
            $data_tt = json_decode($response, true);

            if ($data_tt != '' && !isset($data_tt['code'])) {
                // acc_token còn hạn trả về kết quả thông tin user
                $tt_user = $data_tt['data']['user_info_result'];
                $_SESSION['login']['id'] = $tt_user['ep_id'];
                $_SESSION['login']['id_com'] = $tt_user['com_id'];
                $_SESSION['login']['user_type'] = 2;
                $_SESSION['login']['acc_token'] = $_COOKIE['acc_token'];
                $_SESSION['login']['name'] = $tt_user['ep_name'];

                if ($tt_user['dep_id'] == "") {
                    $_SESSION['login']['dep_id'] = 0;
                } else {
                    $_SESSION['login']['dep_id'] = $tt_user['dep_id'];
                }

                if ($tt_user['ep_image'] == "") {
                    $_SESSION['login']['logo'] = '../img/logo_com.png';
                } else {
                    $_SESSION['login']['logo'] = 'https://chamcong.24hpay.vn/upload/employee/' . $tt_user['ep_image'];
                }
            } else {
                // acc_token hết hạn truyền refresh_token qua api lấy thông tin nv và cập nhật acc_token , refresh_token mới
                $curl = curl_init();
                $data2 = array(
                'refresh_token' => $_COOKIE['rf_token']
                );
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

                curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
                curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/refresh_token.php');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                $response = curl_exec($curl);
                curl_close($curl);
                $data_token = json_decode($response, true);

                if ($data_token != '' && $data_token['error']['code'] != '') {
                    $tt_user = $data_token['data']['user_info'];
                    $_SESSION['login']['id'] = $tt_user['ep_id'];
                    $_SESSION['login']['id_com'] = $tt_user['com_id'];
                    $_SESSION['login']['user_type'] = 2;
                    // $_SESSION['login']['acc_token'] = $_COOKIE['acc_token'];
                    $_SESSION['login']['acc_token'] = $data_token['data']['access_token'];
                    $_SESSION['login']['name'] = $tt_user['ep_name'];

                    if ($tt_user->dep_id == "") {
                        $_SESSION['login']['dep_id'] = 0;
                    } else {
                        $_SESSION['login']['dep_id'] = $tt_user['dep_id'];
                    }

                    if ($tt_user->ep_image == "") {
                        $_SESSION['login']['logo'] = '../img/logo_com.png';
                    } else {
                        $_SESSION['login']['logo'] = 'https://chamcong.24hpay.vn/upload/employee/' . $tt_user['ep_image'];
                    }

                    setcookie("acc_token", "", time() - 3600);
                    setcookie("rf_token", "", time() - 3600);
                    setcookie("role", "", time() - 3600);
                    setcookie("user", "", time() - 3600);
                    setcookie("permission", "", time() - 3600);
                    setcookie("acc_token", $data_token['data']['access_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                    setcookie("rf_token", $data_token['data']['refresh_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                    // Lưu quyền người dùng
                    setcookie("permission", $tt_user['role_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                    // Lưu người dùng đăng nhập mục đích gì
                    setcookie("role", '2', time() + (86400 * 7), "/", ".timviec365.vn");
                    setcookie("user", $tt_user['ep_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                } else {
                    session_destroy();
                    header('Location: /');
                    exit;
                }
            }
        } else {
            // Cả 2 cùng đăng nhập sẽ lấy theo time_login lớn hơn
            if (isset($_COOKIE['user']) && ($_COOKIE['user'] != $_SESSION['login']['id'])) {
                // echo "abc";
                $token = $_COOKIE['acc_token'];
                $curl = curl_init();
                $data = array();
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/user_info_employee.php');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

                $response = curl_exec($curl);
                curl_close($curl);
                $data_tt = json_decode($response, true);

                if ($data_tt != '' && $data_tt['code'] != 401) {

                    // acc_token còn hạn trả về kết quả thông tin user
                    $tt_user = $data_tt['data']['user_info_result'];
                    $_SESSION['login']['id'] = $tt_user->ep_id;
                    $_SESSION['login']['id_com'] = $tt_user->com_id;
                    $_SESSION['login']['user_type'] = 2;
                    $_SESSION['login']['acc_token'] = $_COOKIE['acc_token'];
                    $_SESSION['login']['name'] = $tt_user->ep_name;

                    if ($tt_user->dep_id == "") {
                        $_SESSION['login']['dep_id'] = 0;
                    } else {
                        $_SESSION['login']['dep_id'] = $tt_user->dep_id;
                    }

                    if ($tt_user->ep_image == "") {
                        $_SESSION['login']['logo'] = '../img/logo_com.png';
                    } else {
                        $_SESSION['login']['logo'] = 'https://chamcong.24hpay.vn/upload/employee/' . $tt_user->ep_image;
                    }
                } else {
                    // acc_token hết hạn truyền refresh_token qua api lấy thông tin nv và cập nhật acc_token , refresh_token mới

                    $curl = curl_init();
                    $data2 = array(
                        'refresh_token' => $_COOKIE['rf_token']
                    );
                    curl_setopt($curl, CURLOPT_POST, 1);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
                    curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/refresh_token.php');
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $data_token = json_decode($response, true);
                    if ($data_token != '' && $data_token['error']['code'] != '') {
                        $tt_user = $data_token['data']['user_info'];
                        $_SESSION['login']['id'] = $tt_user->ep_id;
                        $_SESSION['login']['id_com'] = $tt_user->com_id;
                        $_SESSION['login']['user_type'] = 2;
                        $_SESSION['login']['acc_token'] = $_COOKIE['acc_token'];
                        $_SESSION['login']['name'] = $tt_user->ep_name;

                        if ($tt_user->dep_id == "") {
                            $_SESSION['login']['dep_id'] = 0;
                        } else {
                            $_SESSION['login']['dep_id'] = $tt_user->dep_id;
                        }

                        if ($tt_user->ep_image == "") {
                        $_SESSION['login']['logo'] = '../img/logo_com.png';
                        } else {
                        $_SESSION['login']['logo'] = 'https://chamcong.24hpay.vn/upload/employee/' . $tt_user->ep_image;
                        }

                        setcookie("acc_token", "", time() - 3600);
                        setcookie("rf_token", "", time() - 3600);
                        setcookie("role", "", time() - 3600);
                        setcookie("permission", "", time() - 3600);
                        setcookie("user", "", time() - 3600);
                        setcookie("acc_token", $data_token['data']['access_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                        setcookie("rf_token", $data_token['data']['refresh_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                        // Lưu quyền người dùng
                        setcookie("permission", $tt_user['role_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                        // Lưu người dùng đăng nhập mục đích gì
                        setcookie("role", '2', time() + (86400 * 7), "/", ".timviec365.vn");
                        setcookie("user", $tt_user['ep_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                    } else {
                        session_destroy();
                        header('Location: /');
                        exit;
                    }
                }
            }
        }
    }

    //Công ty
    if (isset($_COOKIE['role']) && $_COOKIE['role'] == 1) {
        if (!isset($_SESSION['login']['id'])) {
        $token = $_COOKIE['acc_token'];
        $curl = curl_init();
        $data = array();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/user_info_company.php');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

        $response = curl_exec($curl);
        curl_close($curl);
        $data_tt = json_decode($response, true);

        if ($data_tt != '' && !isset($data_tt['code'])) {

            $tt_user = $data_tt['data']['user_info_result'];
            $_SESSION['login']['id'] = $tt_user['com_id'];
            $_SESSION['login']['id_com'] = $tt_user['com_id'];
            $_SESSION['login']['phone'] = $tt_user['com_phone'];
            $_SESSION['login']['email'] = $tt_user['com_email'];
            $_SESSION['login']['address'] = $tt_user['com_address'];
            $_SESSION['login']['user_type'] = 1;
            $_SESSION['login']['acc_token'] = $_COOKIE['acc_token'];
            $_SESSION['login']['name'] = $tt_user['com_name'];
            $_SESSION['login']['dep_id'] = 0;
            $_SESSION['login']['com_create_time'] = $tt_user['com_create_time'];
            if ($tt_user['com_logo'] == "") {
            $_SESSION['login']['logo'] = '../img/logo_com.png';
            } else {
            $_SESSION['login']['logo'] = 'https://chamcong.24hpay.vn/upload/company/logo/' . $tt_user['com_logo'];
            }
        } else {
            // acc_token hết hạn truyền refresh_token qua api lấy thông tin nv và cập nhật acc_token , refresh_token mới
            $curl = curl_init();
            $data2 = array(
            'refresh_token' => $_COOKIE['rf_token']
            );
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
            curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/refresh_token.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            $response = curl_exec($curl);
            curl_close($curl);
            $data_token = json_decode($response, true);
            if ($data_token != '' && $data_token['error']['code'] != '') {

            $tt_user = $data_tt['data']['user_info'];

            $_SESSION['login']['id'] = $tt_user['com_id'];
            $_SESSION['login']['id_com'] = $tt_user['com_id'];
            $_SESSION['login']['phone'] = $tt_user['com_phone'];
            $_SESSION['login']['email'] = $tt_user['com_email'];
            $_SESSION['login']['address'] = $tt_user['com_address'];
            $_SESSION['login']['user_type'] = 1;
            $_SESSION['login']['acc_token'] = $_COOKIE['acc_token'];
            $_SESSION['login']['name'] = $tt_user['com_name'];
            $_SESSION['login']['dep_id'] = 0;
            $_SESSION['login']['com_create_time'] = $tt_user['com_create_time'];

            if ($tt_user['com_logo'] == "") {
                $_SESSION['login']['logo'] = '../img/logo_com.png';
            } else {
                $_SESSION['login']['logo'] = 'https://chamcong.24hpay.vn/upload/company/logo/' . $com_logo;
            }
            setcookie("acc_token", "", time() - 3600);
            setcookie("rf_token", "", time() - 3600);
            setcookie("role", "", time() - 3600);
            setcookie("permission", "", time() - 3600);
            setcookie("user", "", time() - 3600);
            setcookie("acc_token", $data_token['data']['access_token'], time() + (86400 * 7), "/", ".timviec365.vn");
            setcookie("rf_token", $data_token['data']['refresh_token'], time() + (86400 * 7), "/", ".timviec365.vn");
            // Lưu quyền người dùng
            setcookie("permission", $tt_user['com_role_id'], time() + (86400 * 7), "/", ".timviec365.vn");
            // Lưu người dùng đăng nhập mục đích gì
            setcookie("role", '1', time() + (86400 * 7), "/", ".timviec365.vn");
            setcookie("user", $tt_user['com_id'], time() + (86400 * 7), "/", ".timviec365.vn");
            } else {
            session_destroy();
            header('Location: /');
            exit;
            }
        }
        } else {
        if (isset($_COOKIE['user']) && $_COOKIE['user'] != $_SESSION['login']['id']) {
            $token = $_COOKIE['acc_token'];
            $curl = curl_init();
            $data = array();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/user_info_company.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));

            $response = curl_exec($curl);
            curl_close($curl);
            $data_tt = json_decode($response, true);

            if ($data_tt != '' && !isset($data_tt['code'])) {
            // acc_token còn hạn trả về kết quả thông tin user
            $tt_user = $data_tt['data']['user_info_result'];
            $_SESSION['login']['id'] = $tt_user->com_id;
            $_SESSION['login']['id_com'] = $tt_user->com_id;
            $_SESSION['login']['phone'] = $tt_user->com_phone;
            $_SESSION['login']['email'] = $tt_user->com_email;
            $_SESSION['login']['address'] = $tt_user->com_address;
            $_SESSION['login']['user_type'] = 1;
            $_SESSION['login']['acc_token'] = $_COOKIE['acc_token'];
            $_SESSION['login']['name'] = $tt_user->com_name;
            $_SESSION['login']['dep_id'] = 0;
            $_SESSION['login']['com_create_time'] = $tt_user->com_create_time;
            } else {
            // acc_token hết hạn truyền refresh_token qua api lấy thông tin nv và cập nhật acc_token , refresh_token mới
            $curl = curl_init();
            $data2 = array(
                'refresh_token' => $_COOKIE['rf_token']
            );
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
            curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/service/refresh_token.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            $response = curl_exec($curl);
            curl_close($curl);
            $data_token = json_decode($response, true);
            if ($data_token != '' && $data_token['error']['code'] != '') {
                $tt_user = $data_tt['data']['user_info'];
                $_SESSION['login']['id'] = $tt_user->com_id;
                $_SESSION['login']['id_com'] = $tt_user->com_id;
                $_SESSION['login']['phone'] = $tt_user->com_phone;
                $_SESSION['login']['email'] = $tt_user->com_email;
                $_SESSION['login']['address'] = $tt_user->com_address;
                $_SESSION['login']['user_type'] = 1;
                $_SESSION['login']['acc_token'] = $_COOKIE['acc_token'];
                $_SESSION['login']['name'] = $tt_user->com_name;
                $_SESSION['login']['dep_id'] = 0;
                $_SESSION['login']['com_create_time'] = $tt_user->com_create_time;

                setcookie("acc_token", "", time() - 3600);
                setcookie("rf_token", "", time() - 3600);
                setcookie("role", "", time() - 3600);
                setcookie("permission", "", time() - 3600);
                setcookie("user", "", time() - 3600);
                setcookie("acc_token", $data_token['data']['access_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                setcookie("rf_token", $data_token['data']['refresh_token'], time() + (86400 * 7), "/", ".timviec365.vn");
                // Lưu quyền người dùng
                setcookie("permission", $tt_user['com_role_id'], time() + (86400 * 7), "/", ".timviec365.vn");
                // Lưu người dùng đăng nhập mục đích gì
                setcookie("role", '1', time() + (86400 * 7), "/", ".timviec365.vn");
                setcookie("user", $tt_user['com_id'], time() + (86400 * 7), "/", ".timviec365.vn");
            } else {
                session_destroy();
                header('Location: /');
                exit;
            }
            }
        }
        }
    }
}

function checkLogout()
{
    if (!isset($_COOKIE['acc_token'])) {
        session_unset();
        session_destroy();
    }
}

function check_user_company()
{
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']['user_type'] != 1) {
            header("Location: /trang-chu-nhan-vien.html");
        }
    }
}

function check_user_empoyee()
{
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']['user_type'] != 2) {
            header("Location: /quan-ly-chung.html");
        }
    }
}

function  url_detail_new_feed($new_id)
{
    return 'chi-tiet-tin-dang.html?new_id=' . $new_id;
}

// danh sách bạn bè qua chat365
function list_friends($ep_id, $ep_type){
    $curl = curl_init();
    $data2 = [
        'ID365' => $ep_id,
        'Type365'=> $ep_type,
        'Offset'=> 0,
        'Limit'=> 300,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/User/GetListFriend');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == null){
        return $data_token['data']['listFriend'];
    }else{
        return [];
    }
}

// danh sách bạn bè qua chat365 (2) tk cá nhân limit 200; tk nhân viên limit 300
function list_friends_2($ep_id,$ep_type=0){
    // ep_type = 0: tk nhân viên, cá nhân; 1: tk công ty
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/TakeListFriend365/'.$ep_id.'/'.$ep_type);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == null){
        return [
            'listAccount' => $data_token['data']['listAccount'],
            'listFriend' => $data_token['data']['listFriend']
        ];
    }else{
        return [
            'listAccount' => [],
            'listFriend' => []
        ];
    }
}

// danh sách group chat365
function list_group_chat($ep_id_chat){
    $curl = curl_init();
    $data2 = [
        'message' => '',
        'senderId'=> $ep_id_chat,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/finduser/app/conversation');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == null){
        return $data_token['data']['listCoversation'];
    }else{
        return [];
    }
}

// thông tin tài khoản cá nhân chuyển đổi số 365
function list_stranger_infor($str_id){
    $curl = curl_init();
    $data2 = [
        'id'=> $str_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/api_qlc/get_infor_list_user.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token != NULL && $data_token['error'] == null){
        return $data_token['data']['items'];
    }else{
        return [];
    }
}

// thông tin tài khoản công ty chuyển đổi số 365
function list_stranger_cominfor($str_id){
    $curl = curl_init();
    $data2 = [
        'id'=> $str_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/api_qlc/get_infor_list_company.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token != [] && $data_token['error'] == null){
        return $data_token['data']['items'];
    }else{
        return [];
    }
}

// danh sách lời mời kết bạn (từ tôi -> ng khác và từ ng khác -> tôi)
function list_follow($id_chat){
    $curl = curl_init();
    $data2 = [
        'ID'=> $id_chat,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/User/GetRequestList');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == null){
        return [
            'follower' => ($data_token['data']['requestListContact']!=null)?$data_token['data']['requestListContact']:[],
            'following' => ($data_token['data']['listUserSendRequest']!=null)?$data_token['data']['listUserSendRequest']:[]
        ];
    }else{
        return [
            'follower' => [],
            'following' => []
        ];
    }
}

// kết bạn
function addfriend($my_id, $your_id){
    $curl = curl_init();
    $data2 = [
        'userId' => $my_id,
        'contactId' => $your_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/AddFriend');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
}

// xóa bạn bè
function unfriend($my_id, $your_id){
    $curl = curl_init();
    $data2 = [
        'userId' => $my_id,
        'contactId' => $your_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/DeleteContact');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    return $data_token;
    // {
    //     "data": {
    //         "resutl": true,
    //         "message": "xóa liên hệ thành công"
    //     },
    //     "error": null
    // }
    // {
    //     "data": null,
    //     "error": {
    //         "code": 200,
    //         "message": "xóa liên hệ thất bại"
    //     }
    // }
}

// chấp nhận lời mời kết bạn
function acceptInvite($my_id, $your_id){
    $curl = curl_init();
    $data2 = [
        'userId' => $my_id,
        'contactId' => $your_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/AcceptRequestAddFriend');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
}

// từ chối lời mời kết bạn
function denyInvite($my_id, $your_id){
    $curl = curl_init();
    $data2 = [
        'userId' => $my_id,
        'contactId' => $your_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/DecilineRequestAddFriend');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
}

// xóa lời mời kết bạn
function deleteInvite($my_id, $your_id){
    $curl = curl_init();
    $data2 = [
        'userId' => $my_id,
        'contactId' => $your_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/DeleteRequestAddFriend');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
}

// tạo cuộc trò chuyện
function createConversation($my_id, $your_id){
    $curl = curl_init();
    $data2 = [
        'userId' => $my_id,
        'contactId' => $your_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/conversations/CreateNewConversation');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == null){
        if ($data_token['data']['result'] == true){
            return $data_token['data']['conversationId'];
        }
    }
}

// link cuộc trò chuyện
function linkConversation($my_id, $your_id){
    // https://chat365.timviec365.vn/conversation365-c{0}-u{1} đổi sang chuỗi base64 bỏ dấu bằng phía cuối
    $c = base64_encode(createConversation($my_id,$your_id));
    $c = str_replace("=","",$c);
    $u = base64_encode($my_id);
    $u = str_replace("=","",$u);
    return "https://chat365.timviec365.vn/conversation365-c".$c."-u".$u;
}

// thông tin cuộc trò chuyện
function in4Conversation($conversation_id, $my_id){
    $curl = curl_init();
    $data2 = [
        'conversationId' => $conversation_id,
        'senderId' => $my_id,
    ];
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/conversations/GetConversation');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
}

// cập nhật thông tin tài khoản chuyển đổi số
function updateInfor365($data2){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'https://chamcong.24hpay.vn/api_web_cham_cong/update_user_info_employee.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_COOKIE['acc_token']));
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    return $data_token;
}

// chặn tin nhắn chat365
function BlockChat365($userId, $userBlocked){
    $data2 = [
        'userId' => $userId,
        'userBlocked' => $userBlocked,
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/privacy/BlockMessage');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == NULL){
        return $data_token['data']['result'];
    }else{
        return false;
    }
}

// bỏ chặn tin nhắn chat365
function unBlockChat365($userId, $userBlocked){
    $data2 = [
        'userId' => $userId,
        'userBlocked' => $userBlocked,
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/privacy/UnblockMessage');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == NULL){
        return $data_token['data']['result'];
    }else{
        return false;
    }
}

// ds tk bị chặn tin nhắn chat365 - I blocked
function listBlockChat365($userId){
    $data2 = [
        'userId' => $userId,
        'type' => 1,
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/privacy/GetListBlockMessage');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == NULL){
        return $data_token['data']['data'];
    }else{
        return [];
    }
}

// ds tk bị chặn tin nhắn chat365 - blocked me
function listBlockMeChat365($userId){
    $data2 = [
        'userId' => $userId,
        'type' => 2,
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/privacy/GetListBlockMessage');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($data_token['error'] == NULL){
        return $data_token['data']['data'];
    }else{
        return [];
    }
}

// link group
function group_link($group_name,$group_id){
    return "/".replaceTitle($group_name)."-".$group_id.".html";
}

// lấy thông tin tk từ chat365
function listUserIn4FrChat365($str_id365, $str_type365){
    $data2 = [
        'listID' => $str_id365,
        'listType' => $str_type365,
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/GetListInfoUser');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_token = json_decode($response, true);
    if ($response!='' && $data_token['error'] == NULL && $data_token['data'] != NULL){
        return $data_token['data']['listUserInfo'];
    }else{
        return [];
    }
}

function list_ep_by_dep($dep_id = ''){
    if (isset($_SESSION['login']['acc_token'])) {
        if ($dep_id != '') {
            $dep_id = $dep_id;
        }elseif ($_SESSION['login']['dep_id'] > 0){
            $dep_id = $_SESSION['login']['dep_id'];
        }else{
            $dep_id = 0;
        }
        $str_dep = "&filter_by[department]=" . $dep_id;

        $curl           = curl_init();
        $header[]       = 'Authorization: ' . $_SESSION['login']['acc_token'] . '';
        
        curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://chamcong.24hpay.vn/service/list_all_employee_of_company.php?id_com=' . $_SESSION['login']['id_com'] . $str_dep,
        CURLOPT_USERAGENT => 'https://chamcong.24hpay.vn/',
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        $responsive = json_decode($resp);
        $result = $responsive->data->items;
        $list_emp = [];
        foreach ($result as $item) {
            $list_emp[$item->ep_id] = [
                'ep_id' => $item->ep_id,
                'ep_name' => $item->ep_name,
                'ep_image' => $item->ep_image,
                'ep_birth_day' => $item->ep_birth_day,
                'dep_name' => $item->dep_name,
                'ep_phone' => $item->ep_phone,
                'ep_address' => $item->ep_address,
                'ep_education' => $item->ep_education,
                'ep_exp' => $item->ep_exp,
                'ep_email' => $item->ep_email,
                'ep_gender' => $item->ep_gender,
                'ep_married' => $item->ep_married,
            ];
        }
        return $list_emp;
    }else return [];
}