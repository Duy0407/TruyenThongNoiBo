<?
include("../home/config.php"); 


if (isset($_GET['edit'])) {
$db_listing = new db_query("SELECT new_id, new_description, new_date FROM news WHERE new_cate_id = ".$webid." AND new_id = '".$_GET['edit']."'");
}else{
$db_listing = new db_query("SELECT new_id, new_description, new_date FROM news WHERE new_cate_id = ".$webid." AND new_d_img = '0' ORDER BY new_id DESC LIMIT 1");
}
while($row = mysql_fetch_assoc($db_listing->result)){
	$a = new db_execute("UPDATE news SET new_d_img = '1' WHERE new_id = ".$row['new_id']."");
	echo "Bài có id ".$row['new_id']." bị lỗi.".'<br/>';
	echo "Đã bỏ qua bài có id: ".$row['new_id'];
}  
?>