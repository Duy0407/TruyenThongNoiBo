<?
$user_bg = $_SESSION['login']['id'];
$type_bg = $_SESSION['login']['user_type'];
$background = '';
if (isset($_SESSION['login'])){
    $db_bg = new db_query("SELECT background FROM config_background WHERE id_user = $user_bg AND type = $type_bg");
    if (mysql_num_rows($db_bg->result) == 0) {
      add('config_background', [
        'id_user' => $user_bg,
        'background' => '',
        'type' => $type_bg
      ]);
    } else {
      $get_bg = mysql_fetch_assoc($db_bg->result);
      $background = $get_bg['background'];
    }
}
?>
<div class="side-bar side-bar-1 <?= $background ?>" id="side-bar">
    <div class="box_side_bar box_side_bar1">
        <!-- <div class="side-bar-header">
            <div class="info-nv">
                <div class="img">
                    <img src="<?= $_SESSION['login']['logo'] ?>"
                        onerror='this.onerror=null;this.src="../img/logo_com.png";' class="v_img_avatar_pc">
                </div>
                <div class="v_info_sidebar">
                    <div class="nv-name v_nv_name">
                        <p class="nv-name-p"><?= $_SESSION['login']['name'] ?></p>
                    </div>
                    <div class="nv-chuvu v_nv_chucvu">
                        <p class="v_nv_chucvu-p"><?php
            if ($_SESSION['login']['user_type'] == 1) {
              echo "Công ty";
            } else if ($_SESSION['login']['user_type'] == 2) {
              echo "Nhân viên";
            }
          ?></p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="side-bar-body">
            <ul class="side-bar-menu1 side-bar-menu">
                <?php
      if ($_SESSION['login']['user_type'] == 1) {
        $db_module = new db_query("SELECT * FROM `module`");
      } else if ($_SESSION['login']['user_type'] == 2) {
        $db_module = new db_query("SELECT * FROM `module` WHERE is_admin = 0");
      }
      
      while ($row_module = mysql_fetch_array($db_module->result)) {
        ?>
                <li class="active<?= $row_module['id'] ?>">
                    <a <?=($row_module['id'] == 8) ? 'target="_blank"' : '' ?> href="<?= $row_module['module_url'] ?>">
                        <div class="img img_sidebar">
                            <svg width="30" height="29" viewBox="0 0 30 29" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <?=$row_module['url_icon'];?>
                            </svg>
                        </div>
                        <div class="cont">
                            <p><?= $row_module['module_name'] ?></p>
                        </div>
                    </a>
                </li>
                <?php
      }
      ?>
                <li>
                    <a href="https://quanlychung.timviec365.vn/quan-ly-ung-dung-cong-ty.html" target="_blank">
                        <div class="img img_sidebar">
                            <svg width="26" height="27" viewBox="0 0 26 27" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_3417_200734)">
                                    <path d="M25.9998 2.80615H23.0098V4.36615H25.9998V2.80615Z" fill="white" />
                                    <path d="M2.99 22.6311H0V24.1911H2.99V22.6311Z" fill="white" />
                                    <path d="M26.0001 12.8916H15.0801V14.4516H26.0001V12.8916Z" fill="white" />
                                    <path
                                        d="M18.07 6.67241C18.1038 6.67501 18.135 6.67501 18.1688 6.67501C18.8564 6.67448 19.5242 6.44451 20.0663 6.02153C20.6085 5.59855 20.9939 5.00676 21.1617 4.33992C21.3294 3.67309 21.2699 2.96934 20.9924 2.34018C20.715 1.71103 20.2355 1.19245 19.63 0.866608C19.4867 0.791049 19.3381 0.725881 19.1854 0.671608C18.8587 0.557257 18.5149 0.499231 18.1688 0.500008C17.4857 0.500157 16.8218 0.726509 16.2809 1.14372C15.74 1.56093 15.3525 2.14552 15.1788 2.80621H0V4.36621H15.1788C15.3476 5.01098 15.7203 5.58391 16.2413 5.99953C16.7624 6.41514 17.4038 6.65118 18.07 6.67241ZM10.14 16.6694C10.1738 16.672 10.205 16.672 10.2388 16.672C10.7484 16.6725 11.2502 16.5474 11.7 16.308C11.7442 16.2846 11.7884 16.2586 11.83 16.2326C12.2861 15.9579 12.6635 15.57 12.9254 15.1065C13.1873 14.6429 13.325 14.1195 13.325 13.5871C13.325 13.0547 13.1873 12.5313 12.9254 12.0678C12.6635 11.6042 12.2861 11.2163 11.83 10.9416C11.7884 10.9156 11.7442 10.8896 11.7 10.8662C11.5577 10.7885 11.4089 10.7233 11.2554 10.6712C10.9288 10.556 10.5851 10.4971 10.2388 10.497C9.5558 10.4977 8.8922 10.7242 8.35138 11.1413C7.81056 11.5585 7.4229 12.1428 7.2488 12.8032C7.23999 12.832 7.2339 12.8616 7.2306 12.8916H0V14.4516H7.2748C7.45745 15.0762 7.83293 15.6271 8.34754 16.0254C8.86215 16.4238 9.48955 16.6492 10.14 16.6694ZM9.3899 20.7683C9.3483 20.7423 9.3041 20.7163 9.2599 20.6929C9.1176 20.6152 8.96884 20.55 8.8153 20.4979C8.48874 20.3827 8.14499 20.3238 7.7987 20.3237C7.1157 20.3244 6.4521 20.5509 5.91128 20.9681C5.37046 21.3852 4.9828 21.9695 4.8087 22.6299C4.79989 22.6588 4.7938 22.6884 4.7905 22.7183C4.73574 22.9448 4.70868 23.177 4.7099 23.4099C4.70908 23.6731 4.74229 23.9353 4.8087 24.1899C4.81581 24.2198 4.82449 24.2493 4.8347 24.2783C5.01735 24.9029 5.39283 25.4538 5.90744 25.8521C6.42205 26.2505 7.04945 26.4759 7.6999 26.4961C7.7337 26.4987 7.7649 26.4987 7.7987 26.4987C8.30826 26.4992 8.8101 26.3742 9.2599 26.1347C9.3041 26.1113 9.3483 26.0853 9.3899 26.0593C10.0793 25.6411 10.579 24.9712 10.7834 24.1912H26V22.6312H10.7834C10.5794 21.8524 10.0794 21.184 9.3899 20.7683Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3417_200734">
                                        <rect width="26" height="26" fill="white" transform="translate(0 0.5)" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <div class="cont">
                            <p>Cài đặt chung</p>
                        </div>
                    </a>
                </li>
                <!-- <li id="side-bar-next">
                    <div class="img img_sidebar hide_side_bar">
                        <svg width="27" height="22" viewBox="0 0 27 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M26.2515 9.65221H5.65648L13.13 2.17865L11.1335 0.182129L0.251465 11.0642L11.1335 21.9462L13.13 19.9497L5.65648 12.4761H26.2515V9.65221Z"
                                fill="white" />
                        </svg>
                    </div>
                </li> -->
            </ul>
        </div>
        <!-- <div class="side-bar-footer">
      <div class="time">
        <span class="hm"></span><span class="s"></span>
      </div>
      <div class="ngay">
        <span class="ngay_detail"></span>
      </div>
    </div> -->
    </div>
</div>