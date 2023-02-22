<?php
$id_com = $_GET['id_com'];
session_start();
  $curl   = curl_init();
  $header[]       = 'Authorization: '.$_SESSION['login']['acc_token'].'';
  curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => 'https://chamcong.24hpay.vn/service/detail_company.php?id_com=' . $id_com,
          CURLOPT_USERAGENT => 'https://hr.timviec365.vn/',
          CURLOPT_HTTPHEADER => $header,
          CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
  ));
  $resp = curl_exec($curl);
  $info_ep = json_decode($resp);
  echo "<pre>";
  print_r($info_ep->data->detail_company);
?>