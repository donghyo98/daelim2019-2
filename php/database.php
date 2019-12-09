<?php
header('Content-Type: text/html; charset=utf-8');
$db_host = "localhost";
$db_user = "sma1l";
$db_password = "hyo7845120!";
$db_name = "sma1l";
$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if(mysqli_connect_error($con)) {
  echo "MySQL 접속실패!!", "<BR>";
  echo "오류 원인 :", mysqli_connect_error();
  exit();
}
echo "MySQL 접속 완전히 성공!!";
mysqli_close($con);
?>