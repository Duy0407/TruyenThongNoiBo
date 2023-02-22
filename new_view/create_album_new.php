<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
check_user_empoyee();
// mảng bạn bè
$my_friend = list_friends($_SESSION['login']['id'],$_SESSION['login']['user_type']);
$arr_friend = $my_friend;

$id_album = getValue('id_album','int','GET',0);
$name = "";
$view_mode = 0;
$except = "";
$file = [];
if ($id_album > 0){
    $sql = "SELECT * FROM `album` WHERE user_id = ".$_SESSION['login']['id']." AND id = ".$id_album;
    $db_album = new db_query($sql);
    if (mysql_num_rows($db_album->result) > 0){
        $db_album = mysql_fetch_array($db_album->result);
        $file = json_decode($db_album['file']);
        $name = $db_album['album_name'];
        $view_mode = $db_album['view_mode'];
        $except = $db_album['except'];
    }else{
        header("Location: /tao-album.html");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/select2.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/slick-theme.css">
    <link rel="stylesheet" href="../css/caidat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/dat.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/popup_index_ep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/ep_detail_new_24h.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/create_story.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
    <link rel="stylesheet" href="../css/cd_header_new.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/create_album_new.css?v=<?= $version ?>">
    <title><?=($id_album > 0)?"Sửa album":"Tạo album"?></title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper">
            <div id="cdnhanvienc" class="cdnhanvienc">
                <?php include '../includes/cd_header_new.php'; ?>
                <div id="center">
                    <div class="sidebar_index">
                        <a href="/trang-ca-nhan.html?content=4" class="sidebar_index_title">
                            <img class="sidebar_index_title_icon" src="/img/standards_community_back_black.svg" alt="Ảnh lỗi">
                            <?=($id_album > 0)?"Sửa album":"Tạo album"?>
                        </a>
                        <div class="sidebar_index_body">
                            <button class="btn_upload_regime" type="button" data-view_mode="<?=$view_mode?>" data-except="<?=$except?>">
                                <img class="btn_upload_regime_img" src="<?=$data_view_mode[$view_mode]?>" alt="Ảnh lỗi">
                                <?=$data_view_mode_txt[$view_mode]?>
                                <img class="ls_dropdown_ep_index" src="../img/ls_dropdown_ep_index.svg" alt="Ảnh lỗi">
                            </button>
                            <input type="text" name="album_name" id="" class="album_name" placeholder="Tên album" value="<?=$name?>">
                            <div class="sidebar_album_bottom">
                                <label class="upload_album_content">Tải ảnh hoặc video lên
                                    <input type="file" name="upload_album_content" id="" multiple hidden>
                                </label>
                            </div>
                            <button class="sidebar_index_footer_share" data-id=<?=$id_album?>>Tạo</button>
                        </div>
                    </div>
                    <div class="center_content">
                        <div class="image_upload_box">
                            <?php if (count($file) > 0){
                                foreach ($file as $key => $value) { ?>
                                    <div class="image_upload_box_item old_item">
                                        <img class="iubi_img old_img" src="<?=$value->file?>" alt="">
                                        <textarea class="iubi_txtarea old_txtarea" name="" id="" cols="30" rows="10" placeholder="Mô tả"><?=$value->desc?></textarea>
                                        <button class="iubi_btn old_btn"><img src="/img/ep_show_cmt_del.svg" alt=""></button>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include '../includes/create_story/regime.php';
        include '../includes/create_story/cancel_new.php';
        include '../includes/popup_index_ep.php';
        include '../includes/ep_detail_new_24h/popup_setting.php';
        ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js"></script>
<script src="../js/ep_detail_new_24h.js?v=<?= $version ?>"></script>
<!-- <script src="../js/create_story.js?v=<?= $version ?>"></script> -->
<script src="../js/create_album.js?v=<?= $version ?>"></script>
<script src="../js/core.js" defer></script>
<script src="../js/ep_index.js?v=<?= $version ?>"></script>

</html>