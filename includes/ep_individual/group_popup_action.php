<div class="modal" id="popup_send_via_chat365">
    <div class="modal_content">
        <div class="modal_header">
            <span class="modal_header_title">Gửi bằng Chat 365</span>
            <span data-dimiss="modal">&#10006</span>
        </div>
        <div class="modal_body">
            <div class="modal_header">
                <img class="avt-x" style="--x:48px;" src="/img/photo-1506773090264-ac0b07293a64.jfif" alt="">
                <input type="text" name="" id="" class="ip_sendtxt" placeholder="Hãy nói gì đó về nội dung này">
            </div>
            <div class="list_friends">
                <?php for ($i=0; $i < 15; $i++) { ?>
                    <div class="a-friend">
                        <img class="avt-x" style="--x:30px;" src="/img/photo-1506773090264-ac0b07293a64.jfif" alt="">
                        <p class="a-friend-txt">Nguyễn Văn Minh</p>
                        <button class="a-friend-btn">Gửi</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>