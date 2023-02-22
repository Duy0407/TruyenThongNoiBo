<?php
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
$randomString = "";
for( $i = 0; $i < 6; $i++ ) {
$randomString .= $chars[ rand( 0, $size - 1 ) ];
}
?>