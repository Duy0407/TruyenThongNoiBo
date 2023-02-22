<?php
require_once '../config/config.php';
$type_create = 1;
$type_delete = 1;
check_user_empoyee();
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
    <link rel="stylesheet" href="../css/ep_detail_new_24h.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/create_story.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/core.css?v=<?=$version?>">
    <title>Tạo tin 24h</title>
</head>

<body>
    <div id="thongbao_tinnhan">
        <div class="wapper">
            <?php include '../includes/cd_sidebar.php' ?>
            <div class="sidebar_index">
                <div class="sidebar_index_header">
                    <img class="sidebar_index_icon" src="../img/24h_show_sidebar.svg" alt="Ảnh lỗi">
                </div>
                <div class="sidebar_index_body">
                    <button class="sidebar_setting">Cài đặt</button>
                    <p class="sidebar_index_title">Tin</p>
                    <p class="sidebar_index_title2">Tạo tin của bạn</p>
                    <div class="sidebar_index_list_item">
                        <div class="sidebar_index_item">
                            <img class="sidebar_index_avt" src="../img/demo.jfif" alt="Ảnh lỗi">
                            <div class="sidebar_index_name">Phạm Văn Minh</div>
                        </div>
                    </div>
                    <div class="sidebar_index_action">
                        <textarea name="" id="" class="sidebar_index_textarea" placeholder="Nhập văn bản"></textarea>
                        <div class="sidebar_index_background">
                            <p class="sidebar_index_background_title">Phông nền</p>
                            <div class="sidebar_index_select_item">
                                <?php
                                for ($i=0; $i < count($data_color); $i++) { 
                                ?>
                                <button class="sidebar_index_select" style="background: <?=$data_color[$i]?>;" data-color="<?=$data_color[$i]?>"></button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="sidebar_index_action_item sidebar_index_action_add_text">
                            <img class="sidebar_index_action_icon" src="../img/them-van-ban.svg" alt="Ảnh lỗi">
                            <p class="sidebar_index_action_title">Thêm văn bản</p>
                        </div>
                        <div class="sidebar_index_action_item">
                            <img class="sidebar_index_action_icon" src="../img/gan-the-ban-be.svg" alt="Ảnh lỗi">
                            <p class="sidebar_index_action_title">Gắn thẻ bạn bè</p>
                        </div>
                        <div class="sidebar_index_action_item">
                            <img class="sidebar_index_action_icon" src="../img/am-nhac.svg" alt="Ảnh lỗi">
                            <p class="sidebar_index_action_title">Âm nhạc</p>
                        </div>
                    </div>
                </div>
                <div class="sidebar_index_footer">
                    <button class="sidebar_index_footer_cancel">Bỏ</button>
                    <button class="sidebar_index_footer_share" onclick="window.location.href='/chi-tiet-tin-24h.html'">Chia sẻ lên tin</button>
                </div>
            </div>
            <div id="cdnhanvienc" class="cdnhanvienc">
                <?php
                include '../includes/cd_header.php';
                ?>
                <div id="center">
                    <button class="setting_768">Cài đặt</button>
                    <div class="center_create_story">
                        <button class="create_new_img">
                            <img src="../img/tao-tin-anh.svg" alt="Ảnh lỗi">
                            <p class="create_title">Tạo tin ảnh</p>
                        </button>
                        <input class="create_new_img_input" type="file" hidden>
                        <button class="create_new_text">
                            <img src="../img/tao-tin-van-ban.svg" alt="Ảnh lỗi">
                            <p class="create_title">Tạo tin văn bản</p>
                        </button>
                    </div>
                    <div class="preview">
                        <p class="preview_title">Xem trước</p>
                        <div class="preview_detail">
                            <div class="preview_detail_item">
                                <div class="preview_detail2">
                                    <img class="preview_detail_img" src="../img/demo.jfif" alt="Ảnh lỗi">
                                    <div class="preview_detail_input" contenteditable="true" cvo-placeholder="Bắt đầu nhập"></div>
                                    <div class="preview_detail2_color">
                                        <?php
                                        for ($i=0; $i < count($data_color); $i++) { 
                                        ?>
                                        <button class="preview_select" style="background: <?=$data_color[$i]?>;" data-color="<?=$data_color[$i]?>"></button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <p class="preview_title2">Chọn ảnh để cắt và xoay</p>
                                <div class="preview_range_box">
                                    <div class="preview_range_detail1">
                                        <button class="preview_range_span preview_range_span_giam">-</button>
                                        <input class="preview_range" value="0" type="range">
                                        <button class="preview_range_span preview_range_tang">+</button>
                                    </div>
                                    <div class="preview_range_detail2">
                                        <img class="preview_range_icon" src="../img/xoay.svg" alt="Ảnh lỗi">
                                        <span class="preview_range_xoay">Xoay</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="preview2">
                        <p class="preview_title">Xem trước</p>
                        <div class="preview2_detail">
                            <div class="preview2_item">
                                <div class="preview2_item_input" contenteditable="true" cvo-placeholder="Bắt đầu nhập"></div>
                                <div class="preview_detail2_color">
                                    <?php
                                    for ($i=0; $i < count($data_color); $i++) { 
                                    ?>
                                    <button class="preview_select2" style="background: <?=$data_color[$i]?>;" data-color="<?=$data_color[$i]?>"></button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include '../includes/create_story/regime.php';
        include '../includes/create_story/cancel_new.php';
        include '../includes/ep_detail_new_24h/popup_setting.php';
        ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/caidat.js"></script>
<script src="../js/ep_detail_new_24h.js?v=<?= $version ?>"></script>
<script src="../js/create_story.js?v=<?= $version ?>"></script>
<script src="../js/core.js" defer></script>

</html>