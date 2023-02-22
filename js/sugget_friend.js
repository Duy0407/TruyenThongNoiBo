$(document).ready(function() {
	$(".center_item_success").click(function() {
		html = `<p class="center_detail_fr2">Đã gửi lời mời kết bạn</p>`;
        el = $(this).parents(".center_item");
        el.append(html);
        $(this).next().remove();
        $(this).remove();
	});
	$(".center_item_del").click(function(){
		$(this).parents(".center_item").remove();
	});
});