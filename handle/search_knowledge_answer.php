<?php
require_once '../config/config.php';
$exchange = getValue('exchange','str','POST','');
$url = $_SERVER["HTTP_REFERER"];
$arr = explode("?",$url);
header("Location: ".$arr[0]."?keyword=" . $exchange);
?>