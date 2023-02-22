<div class="create_gr">
	<div class="create_gr_detail">
			<div class="create_gr_header">
					Tạo nhóm
					<img class="turnoff_popup" src="../img/turnoff_popup.svg" alt="Ảnh lỗi">
			</div>
			<div class="create_gr_body">
				<form class="create_gr_form" method="post">
					<div class="form_group">
						<label class="form_group_label">Tên nhóm <span class="require">*</span></label>
						<input class="form_group_input" type="text" placeholder="Nhập tên nhóm" name="name_group">
					</div>
					<div class="form_group ">
						<label class="form_group_label">Quyền riêng tư</label>
						<select class="form_group_input form_group_select" name="value_select">
							<option value="0">Công khai</option>
							<option value="1">Riêng tư</option>
						</select>
					</div>
					<div class="form_group form_d_fig">
						<label class="form_group_label">Mời bạn bè</label>
						<select class="form_group_input form_group_select" multiple name="friend_group">
							<?php foreach ($my_friend as $value) { ?>
								<option value="<?=$value['id365']?>">
									<div>
										<div>
											<img class="option_img" src="../img/demo.jfif" alt="Ảnh lỗi" sytle="display: inline-block; height: 30px;width: 30px;object-fit:cover;border-radius:50%" > 
											<span class="form_group_select_span"><?=$value['userName']?></span>
										</div>
									</div>
								</option>
							<?}?>
							
							
						</select>
					</div>
					<div class="form_group_btn">
						<button class="form_group_btn_cancel" type="button">Hủy</button>
						<div class="form_group_btn_create create_group">Tạo</div>
					</div>
				</form>
			</div>
	</div>
</div>