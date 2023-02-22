<div class="edit_individual">
	<div class="edit_individual_detail">
		<div class="edit_individual_header">
			Chỉnh sửa trang cá nhân
			<img class="turnoff_edit_individual" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
		</div>
		<div class="edit_individual_body">
			<div class="edit_individual_cover">
				<button class="edit_avatar edit_individual_edit_avatar">Chỉnh sửa</button>
				<p class="edit_individual_title">Ảnh đại diện</p>
				<img class="edit_individual_avatar" src="<?=$ep_avt?>" alt="Ảnh lỗi">
			</div>
			<div class="edit_individual_cover">
				<button class="edit_avatar edit_individual_edit_bgimg">Chỉnh sửa</button>
				<p class="edit_individual_title">Ảnh bìa</p>
				<img class="edit_individuala_cover_img" src="<?=$ep_bgi?>" alt="Ảnh lỗi">
			</div>
			<div class="edit_individual_cover">
				<?php $tieu_su = "";
				if ($tieu_su == ''){ ?>
					<button class="edit_avatar edit_individual_tieu_su_btn">Thêm</button>
					<p class="edit_individual_title">Tiểu sử</p>
					<p class="tieu_su_txt no_tieu_su_txt">Nhập tiểu sử</p>
				<?php }else{ ?>
					<button class="edit_avatar edit_individual_tieu_su_btn">Chỉnh sửa</button>
					<p class="edit_individual_title">Tiểu sử</p>
					<p class="tieu_su_txt"><?=$tieu_su?></p>
				<?php } ?>
				<textarea name="" id="" class="tieu_su_txtarea hide" placeholder="Nhập tiểu sử" value="<?=$tieu_su?>"></textarea>
			</div>
			<!-- <div class="edit_individual_intro">
				<button class="edit_avatar edit_individual_intro2">Chỉnh sửa</button>
				<p class="edit_individual_title">Giới thiệu về bản thân</p>
				<div class="edit_individual_intro_content">Download the SVG to use or edit.</div>
			</div> -->
			<div class="edit_individual_intro">
				<a href="/trang-ca-nhan-e<?=$ep_id?>/intro" class="edit_avatar center_nav_intro">Chỉnh sửa</a>
				<p class="edit_individual_title">Chỉnh sửa phần giới thiệu</p>
				<div class="edit_work">
					<img src="../img/lam-viec-tai.svg" alt="Ảnh lỗi">
					<p class="edit_work_content">Làm việc tại <span class="edit_work_content2">Timviec365.vn</span></p>
				</div>
				<div class="edit_work">
					<img src="../img/tung-hoc-tai.svg" alt="Ảnh lỗi">
					<p class="edit_work_content">Từng học tại <span class="edit_work_content2">Arena Muiltimedia</span></p>
				</div>
				<div class="edit_work">
					<img src="../img/song-tai.svg" alt="Ảnh lỗi">
					<p class="edit_work_content">Sống tại <span class="edit_work_content2">Hà Nội</span></p>
				</div>
				<div class="edit_work">
					<img src="../img/den-tu.svg" alt="Ảnh lỗi">
					<p class="edit_work_content">Đến từ <span class="edit_work_content2">Thái Bình, Việt Nam</span></p>
				</div>
				<!-- <div class="edit_work_btn">
					<button class="edit_work_cancel">Hủy</button>
					<button class="edit_work_save">Lưu</button>
				</div> -->
			</div>
			<div class="edit_individual_cover">
				<button class="edit_avatar introduce_so_thich_btn">Thêm</button>
				<p class="edit_individual_title">Sở thích</p>
				<?php $arr_so_thich = ['Du lịch', 'Thể thao'];
				$count_so_thich = count($arr_so_thich);
				if ($count_so_thich > 0){ ?>
					<div class="list_so_thich_box">
					<?php for ($i=0; $i < $count_so_thich; $i++){ ?>
						<p class="item_so_thich"><?=$arr_so_thich[$i]?></p>
					<?php } ?>
					</div>
				<?php } ?>
			</div>
			<div class="edit_individual_cover">
				<button class="edit_avatar introduce_bst_btn">Chỉnh sửa</button>
				<p class="edit_individual_title">Chỉnh sửa phần đáng chú ý</p>
				<div class="nv_story2">
					<?php
					for ($i = 0; $i < 10; $i++) {
					?>
					<a href="chi-tiet-tin-24h.html" class="">
						<div class="v_story_detail">
							<img class="v_story_detail_img"
								src="https://images.unsplash.com/photo-1637822412451-d5493731bef1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
								alt="Ảnh lỗi">
							<p class="v_story_username">+ 2</p>
						</div>
					</a>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="introduce_yourself">
	<div class="introduce_yourself_detail">
		<div class="introduce_yourself_header">
			Chỉnh sửa giới thiệu về bản thân
			<img class="turnoff_introduce_yourself" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
		</div>
		<div class="introduce_yourself_body">
			<p class="introduce_yourself_body_title">Giới thiệu về bản thân</p>
			<textarea class="introduce_yourself_textarea" placeholder="Nhập giới thiệu bản thân"></textarea>
			<div class="introduce_yourself_regime">
				<p class="introduce_yourself_body_title">Chế độ</p>
				<button class="introduce_yourself_btn">
					<img src="../img/cong-khai.svg" alt="Ảnh lỗi">
					<p class="introduce_yourself_regime_title">Công khai</p>
					<img src="../img/xo-xuong2.svg" alt="Ảnh lỗi">
				</button>
			</div>
			<div class="introduce_yourself_btn2">
				<button class="introduce_yourself_cancel">Hủy</button>
				<button class="introduce_yourself_save">Lưu</button>
			</div>
		</div>
	</div>
</div>

<div class="modal popup_edit_individual_avt_bgi" id="popup_edit_individual_avt_bgi">
    <div class="modal_content">
		<div class="edit_individual_header">
			<span class="edit_individual_header">
				Cập nhật ảnh đại diện
			</span>
			<img class="" data-dimiss="modal" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
		</div>
        <div class="modal_body">
			<div class="upload_avt_bgi_container">
				<label for="upload_avt_bgi">Tải ảnh lên</label>
				<input type="file" name="" id="upload_avt_bgi" hidden onchange="edit_individual_uploadAvtBgi(this)">
			</div>
			<!-- <div class="edit_individual_list_img_item">
				<p class="edit_individual_title">Ảnh gợi ý</p>
				<div class="edit_individual_list_img">
					<?php for ($i=0; $i < 4; $i++) { ?>
						<label class="edit_individual_img">
							<img src=<?=($i==1)?"https://images.unsplash.com/photo-1667226563836-59e51b59f18e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2069&q=80":"https://images.unsplash.com/photo-1666668321985-105042873ddc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80"?> alt="">
						</label>
					<?php } ?>
				</div>
				<button class="edit_individual_list_img_see_more_btn">Xem thêm</button>
			</div> -->
			<?php if (count($arr_img) > 0){ ?>
			<div class="edit_individual_list_img_item">
				<p class="edit_individual_title">Ảnh đã tải lên</p>
				<div class="edit_individual_list_img">
					<?php foreach ($arr_img as $key => $value) { ?>
						<label class="edit_individual_img">
							<img src="<?=$value['img']?>" alt="">
						</label>
					<?php if ($key > 2) break; } ?>
				</div>
				<button class="edit_individual_list_img_see_more_btn">Xem thêm</button>
			</div>
			<?php } ?>
			<!-- <div class="edit_individual_list_img_item">
				<p class="edit_individual_title">Ảnh đại diện</p>
				<div class="edit_individual_list_img">
					<label class="edit_individual_img">
						<img src="<?=$my_avt?>" alt="">
					</label>
				</div>
				<button class="edit_individual_list_img_see_more_btn">Xem thêm</button>
			</div> -->
			<?php if (count($arr_img) > 0){ ?>
			<div class="edit_individual_list_img_item">
				<p class="edit_individual_title">Ảnh bìa</p>
				<div class="edit_individual_list_img">
					<?php foreach ($arr_bgi as $key => $value) { ?>
						<label class="edit_individual_img" data-bgi_id=<?=$value['id']?>>
							<img src="<?=$value['cover_image']?>" alt="">
						</label>
					<?php if ($key > 2) break; } ?>
				</div>
				<button class="edit_individual_list_img_see_more_btn">Xem thêm</button>
			</div>
			<?php } ?>
			<div class="edit_individual_list_img_item">
				<p class="edit_individual_title">Album ảnh 1</p>
				<div class="edit_individual_list_img">
					<?php for ($i=0; $i < 4; $i++) { ?>
						<label class="edit_individual_img">
							<img src="https://images.unsplash.com/photo-1666668321985-105042873ddc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="">
						</label>
					<?php } ?>
				</div>
				<button class="edit_individual_list_img_see_more_btn">Xem thêm</button>
			</div>
        </div>
    </div>
</div>

<div class="modal popup_edit_individual_avt_bgi" id="popup_crop_avt">
    <div class="modal_content">
		<div class="edit_individual_header">
			Cập nhật ảnh đại diện
			<img class="" data-dimiss="modal" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
		</div>
        <div class="modal_body">
			<textarea name="" id="" class="edit_individual_textarea" placeholder="Mô tả"></textarea>
			<div class="canvas_avt">
				<img id="canvas_avt">
			</div>
			<div class="zoom_avt">
				<button id="zoomin_avt">-</button>
				<input type="range" name="" id="zoom_range_avt" min="0" max="5" step="0.1" value="0">
				<button id="zoomout_avt">+</button>
			</div>
		</div>
        <div class="modal_footer">
			<button class="cancel_btn">Hủy</button>
            <button class="save_btn">Lưu</button>
		</div>
	</div>
</div>

<div class="modal popup_edit_individual_avt_bgi" id="popup_crop_bgi">
    <div class="modal_content">
		<div class="edit_individual_header">
			Cập nhật ảnh bìa
			<img class="" data-dimiss="modal" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
		</div>
        <div class="modal_body">
			<textarea name="" id="" class="edit_individual_textarea" placeholder="Mô tả"></textarea>
			<div class="canvas_bgi">
				<img id="canvas_bgi">
			</div>
		</div>
        <div class="modal_footer">
			<button class="cancel_btn">Hủy</button>
            <button class="save_btn">Lưu</button>
		</div>
	</div>
</div>