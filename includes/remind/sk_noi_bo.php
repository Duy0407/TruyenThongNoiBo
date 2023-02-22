<li class="mau">
  <div class="tren">
    <div class="caidat-info">
      <div class="img">
        <img src="../img/v_event_remind.svg" alt="ẢNh lỗi">
      </div>
      <div class="cont v_notify_tren">
        <p>[Sự kiện] </p>
        <p><span class="name">Hôm nay có bạn có sự kiện nội bộ <?=$row_newfeed['new_title']?></p>
      </div>
    </div>

  </div>
  <div class="duoi">
    <div class="ngay">
      <p><?php
          echo date("H:i", $row_newfeed['time']) . ", " . date("d/m/Y", $row_newfeed['time']);
          ?></p>
    </div>
  </div>
</li>