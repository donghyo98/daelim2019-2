<?php
  header('Content-Type: text/html; charset=utf-8');
  $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL 접속 실패!!");

  $sql ="
    CREATE TABLE IF NOT EXISTS moinTable
    (userID CHAR(8) NOT NULL PRIMARY KEY,
     userName VARCHAR(10) NOT NULL,
     birthYear INT NOT NULL,
     addr CHAR(2) NOT NULL,
     mobile1 CHAR(3),
     mobile2 CHAR(8),
     height SMALLINT,
     mDate DATE
     )
  ";

  $ret = mysqli_query($con, $sql);201

  if($ret) {
    echo "moinTable이 성공적으로 생성됨..";
  }
  else {
    echo "moinTable 생성 실패!!!","<BR>";
    echo "실패 원인 :".mysqli_error($con);
  }

  mysqli_close($con);
?>
