<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel=stylesheet href='style.css' type='text/css'>
<?php
   header('Content-Type: text/html; charset=EUC-KR');
	 $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL 접속 실패!!");
   $sql ="SELECT * FROM moinTable WHERE userID='".$_GET['userID']."'";

   $ret = mysqli_query($con, $sql);  
   session_start();
   $_SESSION["button1"] = $button2; 
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		echo "<form action='index.html' method='post'>";
		echo "<input type='hidden' name='button1' value='$button2' />"."<br>";
		echo $_GET['userID']." 아이디의 회원이 없음!!!"."<br>"."<br>";
		echo "<button type='submit' class='btn btn-warning'>초기화면</button>";
      	echo "</form>";
		exit();	
	   }		   
   }
   else {
	echo "<form action='index.html' method='post'>";
	echo "<input type='hidden' name='button1' value='$button2' />"."<br>";
	   echo "데이터 검색 실패!!!"."<br>"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   echo "<button type='submit' class='btn btn-warning'>초기화면</button>";
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
<h1 style="text-align:center"> 회원 삭제 </h1>
아이디 : <INPUT TYPE ="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
이름   : <INPUT TYPE ="text" NAME="userName" VALUE=<?php echo $userName ?> READONLY> <br> 
	<BR><BR>
	위 회원을 삭제하겠습니까?	
	<button type="submit" class="btn btn-warning" aria-pressed="true">회원 삭제</button>
</FORM>

</BODY>
</HTML>