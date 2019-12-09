<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel=stylesheet href='style.css' type='text/css'>
<?php
  header('Content-Type: text/html; charset=EUC-KR');
  $con = mysqli_connect("localhost", "sma1l", "hyo7845120!", "sma1l") or die("MySQL 접속 실패!!");

  $sql ="
    SELECT * FROM moinTable
  ";

  $ret = mysqli_query($con, $sql);
  if($ret) {
    $count = mysqli_num_rows($ret);
  }
  else {
    echo "moinTable 데이터 검색 실패!!!", "<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
  }

  echo "<h1 style='text-align: center; color: #f8d348;'>회원 검색 결과</h1>";
  echo "<TABLE BORDER=1
  style='margin-left: auto;
  margin-right: auto;
  background-color: #f8d348;'>";
  echo "<TR>";
  echo "<th>아이디</th> <th>이름</th> <th>출생연도</th> <th>지역</th> <th>국번</th>";
  echo "<th>전화번호</th> <th>키</th> <th>가입일</th> <th>수정</th> <th>삭제</th>";
  echo "</tr>";
  while($row = mysqli_fetch_array($ret)) {
    echo "<tr>";
    echo "<td>", $row['userID'], "</td>";
    echo "<td>", $row['userName'], "</td>";
    echo "<td>", $row['birthYear'], "</td>";
    echo "<td>", $row['addr'], "</td>";
    echo "<td>", $row['mobile1'], "</td>";
    echo "<td>", $row['mobile2'], "</td>";
    echo "<td>", $row['height'], "</td>";
    echo "<td>", $row['mDate'], "</td>";
    echo "<td>","<a href='update.php?userID=", $row['userID'],"'>수정</a></td>";
    echo "<td>","<a href='delete.php?userID=", $row['userID'],"'>삭제</a></td>";
    echo "</tr>";
  }

  session_start();
  $_SESSION["button1"] = $button2;

  mysqli_close($con);
  echo "</table><br>";
?>
  
<form action="index.html" method="post">
  <input type="hidden" name="button1" value="$button2" />
  <button type="submit" class='btn btn-warning'>초기화면</button>
</form>