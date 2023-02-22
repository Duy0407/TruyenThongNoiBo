<?php
require_once '../config/config.php';
$content = getValue('content', 'str', 'POST' , '');
$data = [
  'id_user' => $_SESSION['login']['id'],
  'id_company' => $_SESSION['login']['id_com'],
  'content' => $content,
  'user_type' => $_SESSION['login']['user_type'],
  'created_at' => time(),
  'updated_at' => time()
];

add('knowledge_answer',$data);
echo json_encode([
  'result' => true
]);
?>