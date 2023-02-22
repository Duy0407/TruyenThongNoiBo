<?php
require_once "../config/config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$album_id = getValue('album_id', 'int', 'POST', 0);

$link = getValue('link', 'str', 'POST', '');
$link = trim($link);

if ($album_id > 0){
    $sql = "SELECT * FROM album WHERE id = ".$album_id." AND user_id = ".$_SESSION['login']['id']." AND user_type = ".$_SESSION['login']['user_type'];
    $sql = new db_query($sql);
    if (mysql_num_rows($sql->result) > 0){
        $sql = mysql_fetch_array($sql->result);
        //instantiate the class
        $zip = new ZipArchive;
        // make direction to save zip file
        $folder_zip = "../ziparchive";
        if (!is_dir($folder_zip)) {
            mkdir($folder_zip, 0777, true);
        }
        //Set Zip file name
        $time = time();
        $zip_name = $folder_zip."/".$time."_".$album_id.".zip";
        //Now open to create the zip file 
        if ($zip->open($zip_name, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE) === TRUE){
            //now add the file into the zip archive
            $files = json_decode($sql['file']);
            foreach ($files as $key => $value) {
                $newname = explode('/',$value->file);
                $newname = $newname[count($newname) - 1];
                $zip->addFile($value->file, $newname);
            }
            //now save the archive using the close function
            if ($zip->close()){
                echo json_encode([
                    'result' => true,
                    'link' => $zip_name,
                    'name' => $time."_".$album_id.".zip",
                ]);
            }else{
                echo json_encode([
                    'result' => false,
                    'msg' => 'Có lỗi xảy ra khi lưu file',
                ]);
            }
        } else {
            echo json_encode([
                'result' => false,
                'msg' => 'Có lỗi xảy ra khi nén file',
            ]);
        }
        
        // echo json_encode(['result'=>$db_bgi->result,'msg'=>(!$db_bgi->result)?"Xóa album không thành công":""]);
    }else{

    }
}elseif ($link != ''){
    // echo rmdir($link);
    echo unlink($link);
}else{
    echo json_encode([
        'result' => false,
        'msg' => 'Thông tin nhập vào không hợp lệ'
    ]);
}