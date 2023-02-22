<?php
$arr_duoifile = ['png', 'jpg', 'jpeg', 'gif'];
if (isset($_FILES['file'])) {
    $list_file = $list_image = $infor_image = $infor_file = array();
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $file_name = $_FILES['file']['name'][$i];
        $file_type = $_FILES['file']['type'][$i];
        $file_tmp_name = $_FILES['file']['tmp_name'][$i];
        $file_error = $_FILES['file']['error'][$i];
        $file_size = $_FILES['file']['size'][$i];

        $duoifile = pathinfo($file_name, PATHINFO_EXTENSION);
        strtolower($duoifile);
        if (in_array($duoifile, $arr_duoifile)) {
            $list_image[$i] = curl_file_create($file_tmp_name, $file_type, $file_name);
        } else {
            $list_file[$i] = curl_file_create($file_tmp_name, $file_type, $file_name);
        }
    }

    $apiUploadFile = "http://43.239.223.142:9000/api/file/UploadFile";
    // http://43.239.223.142:9000/api/file/UploadFile
    // https://mess.timviec365.vn/File/UploadFile
    // gửi file
    if (count($list_file) > 0) {
        $curl = curl_init();
        $data = $list_file;
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $apiUploadFile);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $response = curl_exec($curl);
        curl_close($curl);
    }
    // gửi ảnh
    if (count($list_image) > 0) {
        $curl = curl_init();
        $data = $list_image;
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $apiUploadFile);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $response = curl_exec($curl);
        curl_close($curl);
    }

    echo $response;
}
