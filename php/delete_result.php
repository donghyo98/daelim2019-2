<?php
   header('Content-Type: text/html; charset=EUC-KR');
   $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL ���� ����!!");
   
   $userID = $_POST["userID"];
     
   $sql ="DELETE FROM moinTable WHERE userID='".$userID."'";
   
   $ret = mysqli_query($con, $sql);
 
   if($ret) {
   }
   else {
	   echo "������ ���� ����!!!"."<br>";
      echo "���� ���� :".mysqli_error($con);
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
<h1 style="text-align:center;"> ȸ�� ���� ��� </h1>
<h4 style="text-align:center;"> <h4 style="color=#ff0000;"> <?php echo $userID?></h4> ȸ���� ���������� �����Ǿ����ϴ�.</h4>
	<BR><BR>	
	<button type="submit" class="btn btn-warning" aria-pressed="true">�ʱ� ȭ��</button>
</FORM>

</BODY>
</HTML>
