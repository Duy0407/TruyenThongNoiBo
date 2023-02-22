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
  <link rel="stylesheet" href="../css/manager_sidebar.css?v=<?=$version?>">
  <link rel="stylesheet" href="../css/manager_header.css?v=<?=$version?>">
  <title>Quản lý chung</title>
</head>
<body>
    <div class="wapper">
      <?php include '../includes/cd_sidebar.php' ?>
      <div id="cdnhanvienc" class="cdnhanvienc">
        <?php 
          include '../includes/cd_header.php';
        ?>
      </div>
    </div>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/manager_sidebar.js?v=<?=$version?>"></script>
</html>