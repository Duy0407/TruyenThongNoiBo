<?php
require_once "../config/config.php";
$album_id = getValue('album_id', 'int', 'POST', 0);
$index = getValue('index', 'int', 'POST', 0);

if ($album_id > 0) {
    $sql = "SELECT * FROM album WHERE id = ".$album_id." AND user_id = ".$_SESSION['login']['id']." AND user_type = ".$_SESSION['login']['user_type'];
    $db_check_exists = new db_query($sql);
    if (mysql_num_rows($db_check_exists->result) > 0){
        $db_check_exists = mysql_fetch_array($db_check_exists->result);
        $file = json_decode($db_check_exists['file']);
        if (isset($_POST['index'])){
            if ($index > 0 && array_key_exists($index,$file)){
                unlink($file[$index]->file);
                \array_splice($file, $index, 1);
                $file = json_encode($file);
                $data['file'] = $file;
                update('album', $data, ['id' => $album_id, 'user_id' => $_SESSION['login']['id'], 'user_type' => $_SESSION['login']['user_type']]);
                
                echo json_encode([
                    'result' => true,
                ]);
            }else{
                echo json_encode([
                    'result' => false,
                    'msg' => 'Thông tin nhập vào không hợp lệ'
                ]);
            }
        }else{
            foreach ($file as $key => $value) {
                unlink($value->file);
            }

            $sql = "DELETE FROM album WHERE id = ".$album_id." AND user_id = ".$_SESSION['login']['id']." AND user_type = ".$_SESSION['login']['user_type'];
            $db_bgi = new db_query($sql);

            echo json_encode(['result'=>$db_bgi->result,'msg'=>(!$db_bgi->result)?"Xóa album không thành công":""]);
        }
    }else{
        echo json_encode([
            'result' => false,
            'msg' => 'Album không tồn tại'
        ]);
    }    
}else{
    echo json_encode([
        'result' => false,
        'msg' => 'Thông tin nhập vào không hợp lệ'
    ]);
}
