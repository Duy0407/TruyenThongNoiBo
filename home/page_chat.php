<?php
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/sidebar_chat.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/header_chat.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/main_chat.css?v=<?=$version?>">
  <title>Page chat</title>
</head>
<body>
  <div class="wrapper">
  <?php include '../includes/page_chat/chat_sidebar.php'; ?>
  <div class="main">
    <?php include '../includes/page_chat/header_chat.php'; ?>
    <div class="chat_content">
    </div>
    <form action="" class="chat_form">
      <input type="text" class="chat_form_input" placeholder="Nhập tin nhắn">
      <img class="chat_drop_feel" src="../img/chat_drop_feel.svg" alt="chat_drop_feel.svg">
      <div class="chat_action">
        <img class="chat_action_detail" src="../img/chat_audio.svg" alt="chat_audio.svg">
        <img class="chat_action_detail" src="../img/chat_upload_file.svg" alt="chat_upload_file.svg">
        <img class="chat_action_detail" src="../img/chat_danh_thiep.svg" alt="chat_danh_thiep.svg">
      </div>
      <button class="form_chat-submit"><img src="../img/form_chat-submit.svg" alt="Ảnh lỗi"></button>
    </form>
  </div>
  </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script defer src="../js/main_chat.js?v=<?=$version?>"></script>
</html>