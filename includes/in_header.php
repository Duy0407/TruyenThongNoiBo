<div id="header-hd1">
    <div class="nav-hd">
        <a href="https://timviec365.vn/" class="nav-hd-logo">
            <img src="../img/log_hdnav.png" alt="Logo">
        </a>
        <div class="nav-hd-menu">
            <ul class="nav-hd-menu-list">
                <li class="nav-hd-menu-list-item"><a href="/" class="nav-hd-menu-item-link">Trang chủ</a></li>
                <li class="nav-hd-menu-list-item"><a href="huong-dan.html" class="nav-hd-menu-item-link">Hướng dẫn</a></li>
                <li class="nav-hd-menu-list-item"><a href="https://timviec365.vn/blog/c237/cham-cong" class="nav-hd-menu-item-link">Tin tức</a></li>
                <li class="nav-hd-menu-list-item chuyen-doi-so">
                    <a href="https://quanlychung.timviec365.vn" class="nav-hd-menu-item-link chuyen-doi-so-btn" target="_blank">Chuyển đổi số</a>
                </li>
                <?php
                if (!isset($_SESSION['login'])) {
                ?>
                    <li class="nav-hd-menu-list-item v_header_singup"><a rel="nofollow" href="https://quanlychung.timviec365.vn/lua-chon-dang-ky.html" class="nav-hd-menu-item-link">Đăng ký</a></li>
                    <li class="nav-hd-menu-list-item v_header_login"><a rel="nofollow" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html">Đăng nhập</a></li>
                <?php
                } else {
                ?>
                    <li class="nav-hd-menu-list-item v_header_logged">
                        <img class="v_header_logged_avatar" src="<?=$_SESSION['login']['logo']?>" alt="avatar_user">
                        <span class="v_header_logged_span"><?=$_SESSION['login']['name']?></span>
                        <img class="v_header_logged_dropdown" src="../img/v_header_dropdown2.svg" alt="dropdown">
                    </li>
                    <div class="v_header_logged_active">
                        <a class="v_header_logged_active-item" href="/quan-ly-chung.html">Quản lý tài khoản</a>
                        <button class="v_header_logged_active-item v_logout_index">Đăng xuất</button>
                    </div>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="nav2">
        <div class="menutranghu768"><img class="muenuh768" src="../img/muenuh768.png" alt="Ảnh lỗi"></div>
        <div class="menu-768">
            <div class="menu-trangchu">
                <img class="menu-index-img" src="../img/menu_trangchu.png" alt="Ảnh lỗi">
                <a class="pmenu" href="/">Trang chủ</a>
            </div>
            <div class="menu-huongdan">
                <img class="menu-index-img" src="../img/menu_huongdan.png" alt="Ảnh lỗi">
                <a class="pmenu" href="huong-dan.html">Hướng dẫn</a>
            </div>
            <div class="menu-tỉtuc">
                <img class="menu-index-img" src="../img/menu_tintuc.png" alt="Ảnh lỗi">
                <a class="pmenu" href="">Tin tức</a>
            </div>
            <div class="menu-chuyendoiso">
                <img class="menu-index-img" src="../img/icon-chuyen-doi-so.svg" alt="Ảnh lỗi">
                <a class="pmenu pmenu_chuyendoiso" href="https://quanlychung.timviec365.vn" target="_blank">Chuyển đổi số</a>
            </div>
            <?php
            if (!isset($_SESSION['login'])) {
            ?>
            <div class="menu-dangnhap">
                <img class="menu-index-img" src="../img/menu_dangnhap.png" alt="Ảnh lỗi">
                <a class="pmenu" rel="nofollow" href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html">Đăng nhập</a>
            </div>
            <div class="menu-dangky">
                <img class="menu-index-img" src="../img/menu_dangky.png" alt="Ảnh lỗi">
                <a class="pmenu" rel="nofollow" href="https://quanlychung.timviec365.vn/lua-chon-dang-ky.html">Đăng ký</a>
            </div>
            <?php
            }else{
            ?>
            <div class="menu-info_user">
                <img class="menu-index-img-user" src="<?=$_SESSION['login']['logo']?>" alt="Ảnh lỗi">
                <div class="pmenu pmenu_user_info"><span class="menu-info_user_span"><?=$_SESSION['login']['name']?></span> <img class="v_header_dropdown2" src="../img/v_header_dropdown2.svg" alt="dropdown"></div>
                <div class="pmenu_chuyendoiso-list">
                    <a class="pmenu_chuyendoiso-item" href="/quan-ly-chung.html">Quản lý chung</a>
                    <button class="pmenu_chuyendoiso-item pmenu_user_info-item v_mb_logout">Đăng xuất</button>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <a href="https://timviec365.vn/" class="logmenu768"><img class="lg768" src="../img/lg768.png" alt="Ảnh lỗi"></a>
    </div>
</div>
<!-- chuyen vao -->
<div class="popup" id="popup-dangxuat">
    <div class="popup-header">
        <div class="img">
            <img src="../img/logout.png">
        </div>
        <div class="cont v_popup_logout">
            <p class="v_popup_logout_p1">Đăng xuất</p>
            <p class="v_popup_logout_p2">Bạn chắc chắn muốn đăng xuất?</p>
        </div>
    </div>
    <div class="popup-body">
        <button class="btn" id="btn-huydx">Hủy</button>
        <button class="btn" id="btn-dangxuat">Đăng xuất</button>
    </div>
</div>
<!-- end popup -->