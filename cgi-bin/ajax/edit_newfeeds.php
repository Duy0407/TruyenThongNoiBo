<?
require_once '../config/config.php';
$id = getValue('id', 'int', 'POST', '');
$content = getValue('title', 'str', 'POST', '');
$ep_id = getValue('ep_id', 'str', 'POST', '');
$arr_del_file = getValue('arr_del_file', 'str', 'POST', '');
if ($id == 0 && $content == '' && !isset($_FILES['arr_img_nf']) && $ep_id == '' && count($arr_del_file) == 0) {
    $result = [
        'result' => false,
        'message' => 'Vui lòng nhập đủ các trườngs',
    ];
} else {
    $detail_nf = new db_query("SELECT * FROM new_feed WHERE new_id = $id");
    $detail = mysql_fetch_assoc($detail_nf->result);
    $list_file = explode('||', $detail['file']);
    $str_file = $detail['file'];
    if ($arr_del_file != '') {
        $arr_del_file = explode(',', $arr_del_file);
        $arr_file = array_diff($list_file, $arr_del_file);
        foreach ($arr_del_file as $key => $value) {
            if (is_writable($value)) {
                unlink($value);
            }
        }
        $str_file = implode('||', $arr_file);
    }
    $name_img_nf = '';
    if (isset($_FILES['arr_img_nf'])) {
        $arr_name_img = [];
        $name_file = '';
        if (count($_FILES['arr_img_nf']['name']) > 0) {
            for ($i = 0; $i < count($_FILES['arr_img_nf']['name']); $i++) {
                $duoi = explode(".", $_FILES['arr_img_nf']['name'][$i]);
                $duoi = $duoi[count($duoi) - 1];
                $name_file = rand() . "." . $duoi;
                $name_tmp = $_FILES['arr_img_nf']['tmp_name'][$i];
                $dir = "../img/new_feed/dang_tin";
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                move_uploaded_file($name_tmp, $dir . '/' . $name_file);
                $arr_name_img[] = $dir . '/' . $name_file;
            }
        }
        $name_img_nf = implode('||', $arr_name_img);
    }
    if ($name_img_nf != '' && $str_file != '') {
        $name_img_nf = $name_img_nf . '||' . $str_file;
    }else if ($name_img_nf != '' && $str_file == '') {
        $name_img_nf = $name_img_nf;
    } else  if ($name_img_nf == '' && $str_file != '') {
        $name_img_nf = $str_file;
    } else {
        $name_img_nf =  $str_file;
    }
    $data = [
        'new_type'      => 0,
        'content'       => $content,
        'id_user_tags'  => $ep_id,
        'file'          => $name_img_nf,
        'updated_at'    => time()
    ];
    $arr_id = [
        'new_id' => $id,
    ];
    update('new_feed', $data, $arr_id);
    $result = [
        'result' => true,
    ];
}

echo json_encode($result);
