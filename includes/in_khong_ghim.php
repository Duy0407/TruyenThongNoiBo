<div class="reach">
                                                    <div class="lc tren v_active_tren">
                                                        <div class="trai"> <img src="../img/like_x.png"> <img class="anh-an" src="../img/icon_reach.png"> <span class="so-like"><?= $count_like ?></span> </div>
                                                        <div class="phai"> <span id="number_comment<?= $row_newfeed['new_id'] ?>" data-value="<?= mysql_num_rows($db_num_comment->result) ?>"><?= mysql_num_rows($db_num_comment->result) ?> Bình luận</span>
                                                        </div>
                                                    </div>
                                                    <div class="lc duoi v_active_duoi">
                                                        <?php
                                                        $db_like = new db_query("SELECT * FROM `like` WHERE id_new = " . $row_newfeed['new_id'] . " AND id_user = " . $_SESSION['login']['id'] . " AND user_type = " . $_SESSION['login']['user_type']);
                                                        if (mysql_num_rows($db_like->result) > 0) {
                                                            $like_img = "../img/v_like_post.svg";
                                                            $style_like = "#4C5BD4";
                                                        } else {
                                                            $like_img = "../img/like_t.png";
                                                            $style_like = "#666666";
                                                        }
                                                        ?>
                                                        <div class="trai v_like_left v_like_post" data-id_new="<?= $row_newfeed['new_id'] ?>"> <img class='nut-like' src="<?= $like_img ?>"> <span class="v_text_like" style="color: <?= $style_like ?>">Thích</span>
                                                        </div>
                                                        <div class="ghim_post" data-new_id="<?= $row_newfeed['new_id'] ?>"><img src="../img/v_ghim.svg" alt="Ảnh lỗi"><span class="v_ghim">Ghim</span></div>
                                                        <div class="phai">
                                                            <img src="../img/icon_cmt.png">
                                                            <span>Bình luận</span>
                                                        </div>
                                                    </div>


                                                </div>