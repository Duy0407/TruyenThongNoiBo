$(document).ready(function() {
	$(".btn_serach_see_more").click(function() {
		$(this).next().toggle();
	});
	$(".sidebar_index_body_div_btn").click(function(){
		$(this).parents(".sidebar_index_body_div").find(".sidebar_index_body_year").toggle();
	});
	$(document).mouseup(function(e) {
		var container = $(".popup_search_indi");
		if (!container.is(e.target) && container.has(e.target).length === 0){
			container.hide();
		}
	});
});