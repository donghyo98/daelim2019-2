<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel=stylesheet href='style.css' type='text/css'>
<?php
   header('Content-Type: text/html; charset=EUC-KR');
	 $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL ���� ����!!");
   $sql ="SELECT * FROM moinTable WHERE userID='".$_GET['userID']."'";

   $ret = mysqli_query($con, $sql);  
   session_start();
   $_SESSION["button1"] = $button2; 
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		echo "<form action='index.html' method='post'>";
		echo "<input type='hidden' name='button1' value='$button2' />"."<br>";
		echo $_GET['userID']." ���̵��� ȸ���� ����!!!"."<br>"."<br>";
		echo "<button type='submit' class='btn btn-warning'>�ʱ�ȭ��</button>";
      	echo "</form>";
		exit();	
	   }		   
   }
   else {
	echo "<form action='index.html' method='post'>";
	echo "<input type='hidden' name='button1' value='$button2' />"."<br>";
	   echo "������ �˻� ����!!!"."<br>"."<br>";
	   echo "���� ���� :".mysqli_error($con);
	   echo "<button type='submit' class='btn btn-warning'>�ʱ�ȭ��</button>";
      	echo "</form>";
	   exit();
   }   
   $row = mysqli_fetch_array($ret);
   $userID = $row['userID'];
   $userName = $row["userName"];
   
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</HEAD>
<BODY>

<FORM METHOD="post"  ACTION="delete_result.php">
<h1 style="text-align:center"> ȸ�� ���� </h1>
���̵� : <INPUT TYPE ="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
�̸�   : <INPUT TYPE ="text" NAME="userName" VALUE=<?php echo $userName ?> READONLY> <br> 
	<BR><BR>
	�� ȸ���� �����ϰڽ��ϱ�?	
	<button type="submit" class="btn btn-warning" aria-pressed="true">ȸ�� ����</button>
</FORM>

</BODY>
</HTML>