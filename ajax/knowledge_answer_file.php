<?php
require '../config/config.php';

$content = getValue('content','str','POST','');
$id_user_tag = getValue('id_user_tag','str','POST','');
$data['content'] = $content;
if ($content == "") {
  header("Location: /");
}else{
  $string_img = "";
  $string_file = "";
  $string_img_name = "";
  $string_file_name = "";
  $folder_image = "../img/knowledge/" .$_SESSION['login']['id']. "/image";
  if (!is_dir($folder_image)) {
		mkdir($folder_image, 0777, true);
	}

  $folder_video = "../img/knowledge/". $_SESSION['login']['id'] ."/video";
  if (!is_dir($folder_video)) {
    mkdir($folder_video, 0777, true);
  }

  if (isset($_FILES['image_video'])) {
    for ($i=0; $i < count($_FILES['image_video']['name']); $i++) { 
      $duoi = explode(".",$_FILES['image_video']['name'][$i]);
      $duoi = $duoi[count($duoi) - 1];
      $name_file = rand() . "." . $duoi;
      $name_tmp = $_FILES['image_video']['tmp_name'][$i];
      if (preg_match("/image/", $_FILES['image_video']['type'][$i]) == true) {
        $dir = $folder_image . "/" . $name_file;
        move_uploaded_file($name_tmp, $dir);
      }else{
        $dir = $folder_video . "/" . $name_file;
        move_uploaded_file($name_tmp, $dir);
      }
      if ($i < count($_FILES['image_video']['name']) - 1) {
        $string_img = $string_img . $dir . "||";
        $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i] . "||";
      }else{
        $string_img = $string_img . $dir;
        $string_img_name = $string_img_name . $_FILES['image_video']['name'][$i];
      }
    }
  }

  $folder_file = "../img/knowledge/file/" . $_SESSION['login']['id'];
  if (!is_dir($folder_file)) {
    mkdir($folder_file, 0777, true);
  }
  if (isset($_FILES['file']['name'])) {
    for ($i=0; $i < count($_FILES['file']['name']); $i++) { 
      $duoi = explode(".",$_FILES['file']['name'][$i]);
      $duoi = $duoi[count($duoi) - 1];
      $name_file = rand() . "." . $duoi;
      $name_tmp = $_FILES['file']['tmp_name'][$i];
      $dir = $folder_file . "/" . $name_file;
      move_uploaded_file($name_tmp, $dir);
      if ($i < count($_FILES['file']['name']) - 1) {
        $string_file = $string_file . $dir . "||";
        $string_file_name = $string_file_name . $_FILES['file']['name'][$i] . "||";
      }else{
        $string_file = $string_file . $dir;
        $string_file_name = $string_file_name . $_FILES['file']['name'][$i];
      }
    }
  }

  if ($string_file != "" && $string_img != "") {
    $data['file'] = $string_file . "||" . $string_img;
    $data['name_file'] = $string_file_name . "||" . $string_img_name;
  }else{
    if ($string_file != "") {
      $data['file'] = $string_file;
      $data['name_file'] = $string_file_name;
    }else{
      $data['file'] = $string_img;
      $data['name_file'] = $string_img_name;
    }
  }

  if ($_SESSION['login']['user_type'] == 1) {
		$id_user = $_SESSION['login']['id'];
		$id_company = $_SESSION['login']['id'];
	}else{
		require_once '../api/api_ep.php';
		$id_user = $data_ep[$_SESSION['login']['id']]->ep_id;
		$id_company = $data_ep[$_SESSION['login']['id']]->com_id;
	}
  $data['id_user'] = $id_user;
  $data['id_company'] = $id_company;
  $data['user_type'] = $_SESSION['login']['user_type'];
  $data['created_at'] = time();
  $data['updated_at'] = time();
  $data['id_user_tag'] = $id_user_tag;
  add('knowledge_answer', $data);
  echo json_encode([
    'result' => true
  ]);
}
?>