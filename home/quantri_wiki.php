<?php 
include("config.php");
require_once '../includes/check_login.php';
require_once '../api/api_all_info.php';
require_once '../api/api_nv.php';
require_once '../api/api_ct.php';

$key_knowledge = getValue('k','str','GET','');
// if ($_SESSION['login']['user_type'] == 2) {
//     check_module(4);
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_create = 1;
// }else if(check_module(4)['create'] == 1){
//     $type_create = 1;
// }else{
//     $type_create = 0;
// }

// if ($_SESSION['login']['user_type'] == 1) {
//     $type_delete = 1;
// }else if(check_module(4)['delete'] == 1){
//     $type_delete = 1;
// }else{
//     $type_delete = 0;
// }

$type_delete = 1;
$type_create = 1;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" type="text/css" href="../css/caidat.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/tung.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/new_feed.css?v=<?=$ver?>">
    <link rel="stylesheet" href="../css/vanhoadoanhnghiep.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_header.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/quantri_wiki.css?v=<?= $version ?>">
    <link rel="stylesheet" href="../css/cd_sidebar.css?v=<?= $version ?>">
    <title>Wiki</title>
</head>
<body>
    <div id="quantri-trithuc">
        <div class="wapper">
            <!--  sidebar -->
            <?php include '../includes/cd_sidebar.php'?>
            <!-- end side bar -->
            <div id="cdnhanvienc" class="cdnhanvienc">
                <!--     header -->
                <?php include '../includes/cd_header.php'?>
                <!-- end header -->
                <div id="nkt1">
                    <div id="centr-quantri-trithuc">
                        <div class="seach">
                            <form class="seach-book">
                                <input type="text" name="sechbook" class="searchbook" placeholder="t??m ki???m s??ch">
                                <div class="img-seach-book"><input type="" name="" class="searchbook" placeholder="T??m ki???m t??i li???u "></div>
                                <button class="timkiem-sach"><img class="imgtimkiem-sach" src="../img/seachbook.png" alt="???nh l???i"></button>
                            </form>
                            <div class="wiki-all">
                                <div class="wiki hover1 quantri1">
                                    <div class="img-item-wiki"><img src="../img/wiki.png" alt="???nh l???i"></div>
                                    <div class="text-wiki">Wiki</div>
                                </div>
                                <div class="hove an1">
                                    <a class="hove1 hv1 hover2 hover-traodoi" href="qttt-trao-doi-cau-hoi.html" >
                                        <div class="img-traodoi"><img src="../img/question3.png" alt="???nh l???i"></div>
                                        <div class="tetx-hv trao-doi">Trao ?????i - ?????t c??u h???i</div>
                                    </a>
                                    <a class="hove1 hv2 ct3 hover3 hover-cauhoi" href="qttt-cau-hoi-cua-toi.html">
                                        <div class="img-cauhoi"><img src="../img/question2.png" alt="???nh l???i"></div>
                                        <div class="tetx-hv cau-hoi">C??u h???i c???a t??i</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="them-tai-lieu">
                            <?php
                            if ($type_create == 1) {
                            ?>
                            <div class="tai-lieu">
                                <div class="img-tai-lieu"><img src="../img/themtailieu.png" alt="???nh l???i"></div>
                                <div class="add-tai-lieu"> Th??m t??i li???u</div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="select-list-bok">
                            <div class="list-book1 v_list-book1">
                                <?php
                                if ($_SESSION['login']['user_type'] == 1) {
                                    $id_com = $_SESSION['login']['id'];
                                }else{
                                    $id_com = $data_ep[$_SESSION['login']['id']]->com_id;
                                }

                                if ($key_knowledge == "") {
                                    $qr_key_knowledge = "";
                                }else{
                                    $qr_key_knowledge = " AND name LIKE '%$key_knowledge%' ";
                                }
                                $db_doc = new db_query("SELECT * FROM knowledge WHERE id_company = $id_com AND `delete` = 0 ".$qr_key_knowledge." ORDER BY id DESC");
                                $j = 1;
                                while($row_doc = mysql_fetch_array($db_doc->result)){
                                    if ($j == 1) {
                                        $img = "../img/listbook3.png";
                                    }else if ($j == 2) {
                                        $img = "../img/listbook4.png";
                                    }else if ($j == 3) {
                                        $img = "../img/listbook1.png";
                                    }else if ($j == 4) {
                                        $img = "../img/listbook2.png";
                                    }
                                    if ($row_doc['user_type'] == 1) {
                                        if ($_SESSION['login']['user_type'] == 1) {
                                            $name_author = $_SESSION['login']['name'];
                                        }else{
                                            $name_author = $data_ep[$_SESSION['login']['id']]->com_name; 
                                        }
                                    }else if ($row_doc['user_type'] == 2){
                                        $name_author = $data_ep[$_SESSION['login']['id']]->ep_name; 
                                    }
                                ?>
                                <div class="book">
                                    <div class="book-img"><img src="<?=$img?>" alt="???nh l???i"></div>
                                    <div class="text-book">
                                        <div class="item-file">
                                            <p class="item-name-file">T??n t??i li???u: <span class="item-name-file-span"><?=$row_doc['name']?></span></p>
                                            <div class="box_cha_model_tung_1">
                                                <img src="../img/3itemfile.png" alt="???nh l???i" class="show_tung1" onclick="show_document(this)">
                                                <div class="model_tung_1">
                                                    <div class="ul_model">
                                                        <a class="li_model" download href="../img/knowledge/<?=$row_doc['id_user']?>/<?=$row_doc['file']?>">
                                                            <img class="imgtung" src="../img/tung1.png" alt="???nh l???i">
                                                            <p class="p_model">T???i xu???ng</p>
                                                        </a>
                                                        <?php
                                                        if ($type_create == 1) {
                                                        ?>
                                                        <div class="li_model  model2" data-id="<?=$row_doc['id']?>" onclick="edit_document(this)">
                                                            <img class="imgtung" src="../img/tung2.png" alt="???nh l???i">
                                                            <p class="p_model">Ch???nh s???a th??ng tin t??i li???u</p>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="li_model model3" data-id="<?=$row_doc['id']?>" onclick="knowledge_answer(this)">
                                                            <img class="imgtung" src="../img/tung3.png" alt="???nh l???i">
                                                            <p class="p_model">Trao ?????i - ?????t c??u h???i</p>
                                                        </div>
                                                        <?php
                                                        if ($type_delete == 1) {
                                                        ?>
                                                        <div class="li_model  model4" data-id="<?=$row_doc['id']?>" onclick="delele_document(this)">
                                                            <img class="imgtung" src="../img/tung4.png" alt="???nh l???i">
                                                            <p class="p_model">X??a th??ng tin t??i li???u</p>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>T??c gi???: <span class="item-name-file-span"><?=$row_doc['author']?></span></p>
                                        <p>Ng??y t???o: <span class="item-name-file-span"><?=date("d/m/Y",$row_doc['created_at'])?></span></p>
                                        <p>L??nh v???c ????? c???p: <span class="item-name-file-span"><?=$row_doc['field']?></span></p>
                                        <div class="div_spin"><?=$row_doc['name_file']?></div>
                                    </div>
                                </div>
                                <?php
                                    if ($j == 4) {
                                        $j = 1;
                                    }else{
                                        $j++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // -->
                <!-- trao doi -->
    </div>
 
</div>
<?php include('../includes/quantri_popup.php'); ?>
<?php include('../includes/popup_nt.php') ?>
</div>




</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js" ></script>
<script src="../js/validate_quantri.js"></script>
<script src="../js/caidat.js"></script>
<script src="../js/quantri.js"></script>
<script type="text/javascript">
    $('.active4').css('background',' #2E3994');
</script>
</html>

