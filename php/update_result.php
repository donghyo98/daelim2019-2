<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel=stylesheet href='style.css' type='text/css'>
<?php
  header('Content-Type: text/html; charset=EUC-KR');
  $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL ���� ����!!");

  $userID = $_POST["userID"];
  $userName = $_POST["userName"];
  $birthYear = $_POST["birthYear"];
  $addr = $_POST["addr"];
  $mobile1 = $_POST["mobile1"];
  $mobile2 = $_POST["mobile2"];
  $height = $_POST["height"];   
  $mDate = $_POST["mDate"]; 
   
  $sql ="UPDATE moinTable SET userName='".$userName."', birthYear=".$birthYear;
  $sql = $sql.", addr='".$addr."', mobile1='".$mobile1."',mobile2='".$mobile2;
  $sql = $sql."', height=".$height.", mDate='".$mDate."' WHERE userID='".$userID."'";
   
  $ret = mysqli_query($con, $sql);
 
  session_start();
  $_SESSION["button1"] = $button2;

  echo "<form action='index.html' method='post'>";
  echo "<input type='hidden' name='button1' value='$button2' />";
  
  echo "<h3> ȸ�� ���� ���� ��� </h3>";
  if($ret) {
	  echo "�����Ͱ� ���������� ������.";
  }
  else {
	  echo "������ ���� ����!!!"."<br>";
	  echo "���� ���� :".mysqli_error($con);
  } 

  echo "<button type='submit' class='btn btn-warning'>�ʱ�ȭ��</button>";
  echo "</form>";
  mysqli_close($con);
?>
