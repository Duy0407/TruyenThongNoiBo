<?php 
include("../config/config.php");

$name_collection = getValue("name_collection","str","POST","");

if($name_collection != ""){
	$insert_collection = new db_query("INSERT INTO `add_collection`(`name_collection`,`id_user`,`user_type`,`created_at`) VALUES ('$name_collection','$my_id','$my_type',".time().")");
	$lats_id = mysql_insert_id();
	if ($lats_id > 0){ ?>
		<div class="save_post_item">
		<img class="save_post_img" src="https://images.unsplash.com/photo-1638969710700-f803636a3e85?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Ảnh lỗi">
		<p class="save_post_item_title"><?=$name_collection?></p>
		<input class="save_post_radio" type="radio" name="save_post_radio" value="<?=$lats_id?>" data=<?=$name_collection?>>
		</div>	
<?php }else{
	echo "False";
	}
}else{
	echo "False";
}
?>