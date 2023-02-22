<div class="popup_archives">
	<div class="popup_archives_detail">
		<div class="popup_archives_header">
			Cài đặt
			<img class="turnoff_popup_archives" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
		</div>
		<div class="popup_archives_body">
			<div class="popup_archives_body_header">
				<button class="popup_archives_body_btn">Cài đặt kho lưu trữ tin</button>
				<button class="popup_archives_body_btn">Tin bạn đã tắt</button>
				<button class="popup_archives_body_btn">Quyền riêng tư của tin</button>
			</div>
			<div class="popup_archives_body_detail">
					<div class="archives_new2">
						<p class="archives_new2_title">
							Lưu vào Kho lưu trữ
						</p>
						<p class="archives_new2_cotent">
							Tự động lưu trữ ảnh và video sau khi chúng biến mất khỏi tin của bạn. Chỉ có bạn mới xem được kho lưu trữ tin của mình.
						</p>
				</div>
				<button class="archives_new2_btn">Tắt kho lưu trữ tin</button>
			</div>
			<div class="popup_archives_body_detail">
					<div class="box_turnoff_new">
						<?php 
						for ($i=0; $i < 6; $i++) { 
						?>
						<div class="box_turnoff_new_detail">
							<img class="box_turnoff_new_detail_avt" src="https://images.unsplash.com/photo-1638971057744-524b087f38e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=388&q=80" alt="Ảnh lỗi">
							<p class="box_turnoff_new_detail_name">Phạm Văn Minh</p>
							<button class="popup_archives_body_detail_btn">Bật lại</button>
						</div>
						<?php
						}
						?>
					</div>
			</div>
			<div class="popup_archives_body_detail">
					<div class="who_see_new">
						<p class="who_see_new_title">Ai có thể xem tin của bạn?</p>
						<p class="who_see_new_content">Tin của bạn sẽ hiển thị trong 24 giờ.</p>
						<div class="who_see_new_detail">
							<img class="who_see_new_icon" src="../img/cong-khai.svg" alt="Ảnh lỗi">
							<p class="who_see_new_title2">Công khai</p>
							<input class="radio_who" type="radio" name="radio_who">
						</div>
						<div class="who_see_new_detail">
							<img class="who_see_new_icon" src="../img/ban-be.svg" alt="Ảnh lỗi">
							<p class="who_see_new_title2">Bạn bè</p>
							<input class="radio_who" type="radio" name="radio_who">
						</div>
						<div class="who_see_new_detail">
							<img class="who_see_new_icon" src="../img/ban-be-ngoai-tru.svg" alt="Ảnh lỗi">
							<p class="who_see_new_title2">Bạn bè ngoại trừ...</p>
							<img src="../img/drop_right.svg" alt="Ảnh lỗi">
						</div>
						<div class="who_see_new_detail">
							<img class="who_see_new_icon" src="../img/chi-minh-toi.svg" alt="Ảnh lỗi">
							<p class="who_see_new_title2">Chỉ mình tôi</p>
							<input class="radio_who" type="radio" name="radio_who">
						</div>
						<div class="who_see_new_detail">
							<img class="who_see_new_icon" src="../img/ban-be-cu-the.svg" alt="Ảnh lỗi">
							<p class="who_see_new_title2">Bạn bè cụ thể</p>
							<img src="../img/drop_right.svg" alt="Ảnh lỗi">
						</div>
					</div>
			</div>
		</div>
	</div>
</div>