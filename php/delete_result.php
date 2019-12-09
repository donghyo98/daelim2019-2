<?php
   header('Content-Type: text/html; charset=EUC-KR');
   $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL 접속 실패!!");
   
   $userID = $_POST["userID"];
     
   $sql ="DELETE FROM moinTable WHERE userID='".$userID."'";
   
   $ret = mysqli_query($con, $sql);
 
   if($ret) {
   }
   else {
	   echo "데이터 삭제 실패!!!"."<br>";
      echo "실패 원인 :".mysqli_error($con);
      exit();
   } 
   mysqli_close($con);
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</HEAD>
<BODY>

<FORM METHOD="post"  ACTION="index.html">
<h1 style="text-align:center;"> 회원 삭제 결과 </h1>
<h4 style="text-align:center;"> <h4 style="color=#ff0000;"> <?php echo $userID?></h4> 회원이 정상적으로 삭제되었습니다.</h4>
	<BR><BR>	
	<button type="submit" class="btn btn-warning" aria-pressed="true">초기 화면</button>
</FORM>

</BODY>
</HTML>
