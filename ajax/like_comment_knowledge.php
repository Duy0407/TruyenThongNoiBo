<?php
require_once "../config/config.php";
$id = getValue('id','int','POST','');
$check[] = $id;
$val = checkPost($check);
if ($val == 1) {
    header("Location: /");
}
$db_check = new db_query("SELECT * FROM like_comment_knowledge WHERE comment_knowledge_id = $id AND id_user = " . $_SESSION['login']['id']);
if (mysql_num_rows($db_check->result) == 0) {
    $data = [
        'comment_knowledge_id'=>$id,
        'id_user'=>$_SESSION['login']['id'],
		'user_type'=>$_SESSION['login']['user_type'],
        'created_at'=>time()
    ];

    add('like_comment_knowledge',$data);
    echo json_encode([
        'result'=>true
    ]);
}else{
    $db_del = new db_query("DELETE FROM like_comment_knowledge WHERE comment_knowledge_id = $id AND id_user = " . $_SESSION['login']['id']);
    
    echo json_encode([
        'result'=>false
    ]);
}

?>