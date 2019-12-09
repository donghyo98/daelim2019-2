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
    echo "<input type='hidden' name='button1' value='$button2' />";
	  echo "데이터 검색 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
	  echo "<button type='submit' class='btn btn-warning'>초기화면</button>";
    echo "</form>";
	  exit();
  }   
  $row = mysqli_fetch_array($ret);
  $userID = $row['userID'];
  $userName = $row["userName"];
  $birthYear = $row["birthYear"];
  $addr = $row["addr"];
  $mobile1 = $row["mobile1"];
  $mobile2 = $row["mobile2"];
  $height = $row["height"];   
  $mDate = $row["mDate"];      
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=euc-kr">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</HEAD>
<BODY>

<FORM METHOD="post"  ACTION="update_result.php">
<svg id="ryan" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,150 C0,65 120,65 120,150" fill="#e0a243" stroke="#000" stroke-width="2.5" />
      <g class="ears">
        <path d="M46,32 L46,30 C46,16 26,16 26,30 L26,32" fill="#e0a243" stroke="#000" stroke-width="2.5"stroke-linecap="round" transform="rotate(-10,38,24)" />
        <path d="M74,32 L74,30 C74,16 94,16 94,30 L94,32" fill="#e0a243" stroke="#000" stroke-width="2.5"stroke-linecap="round" transform="rotate(10,82,24)" />
      </g>
      <circle cx="60" cy="60" r="40" fill="#e0a243" stroke="#000" stroke-width="2.5" />
      <g class="eyes">
      <!-- left eye and eyebrow-->
        <line x1="37" x2="50" y1="46" y2="46" stroke="#000" stroke-width="3" stroke-linecap="round" />
          <circle cx="44" cy="55" r="3" fill="#000" />
          <!-- right eye and eyebrow -->
          <line x1="70" x2="83" y1="46" y2="46" stroke="#000" stroke-width="3" stroke-linecap="round" />
          <circle cx="76" cy="55" r="3" fill="#000" />
        </g>
        <g class="muzzle">
          <path d="M60,66 C58.5,61 49,63 49,69 C49,75 58,77 60,71 M60,66 C61.5,61 71,63 71,69 C71,75 62,77 60,71" fill="#fff" />
          <path d="M60,66 C58.5,61 49,63 49,69 C49,75 58,77 60,71 M60,66 C61.5,61 71,63 71,69 C71,75 62,77 60,71" fill="#fff" stroke="#000" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round" />
          <polygon points="59,63.5,60,63.4,61,63.5,60,65" fill="#000" stroke="#000" stroke-width="5" stroke-linejoin="round" />
        </g>
        <path d="M40,105 C10,140 110,140 80,105 L80,105 L70,111 L60,105 L50,111 L40,105" fill="#fff" />
			</svg>
			<h1> 회원 정보 수정 </h1>
	아이디 : <INPUT TYPE ="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
	이름 : <INPUT TYPE ="text" NAME="userName" VALUE=<?php echo $userName ?>> <br> 
	출생연도 : <INPUT TYPE ="text" NAME="birthYear" VALUE=<?php echo $birthYear ?>> <br>
	지역 : <INPUT TYPE ="text" NAME="addr" VALUE=<?php echo $addr ?>> <br>
	휴대폰 국번 : <INPUT TYPE ="text" NAME="mobile1" VALUE=<?php echo $mobile1 ?>> <br>
	휴대폰 전화번호 : <INPUT TYPE ="text" NAME="mobile2" VALUE=<?php echo $mobile2 ?>> <br>
	신장 : <INPUT TYPE ="text" NAME="height" VALUE=<?php echo $height ?>> <br>
	회원가입일 : <INPUT TYPE ="text" NAME="mDate" VALUE=<?php echo $mDate ?> READONLY><br>
	<BR><BR>
	<button type="submit" class="btn btn-warning" aria-pressed="true">수정하기</button>
</FORM>

</BODY>
</HTML>