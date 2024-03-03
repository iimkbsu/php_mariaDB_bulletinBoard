<?php

$address = '127.0.0.1'; //'localhost'
$dbuser = 'root';
$dbpw = '620328';
$dbname = 'bulletin';

$userid = $_GET['id'];

$conn = mysqli_connect($address, $dbuser, $dbpw, $dbname);
$sql = "SELECT idx FROM user WHERE id=\"{$userid}\"";

$result = mysqli_query($conn, $sql);

$arr = mysqli_fetch_array($result);
?>

<?php

if (!$arr) {
   echo "<span style='color:blue;'>$userid</span>는 사용 가능한 아이디입니다.";
   ?>
   <p><input type="button" value="이 ID 사용" onclick="opener.parent.decide(); window.close();"></p>

   <?php
   // echo "<script>alert('이미 가입된 아이디입니다.'); self.close();</script>";
} else {
   echo "<span style='color:red;'>$userid</span>는 이미 가입된 아이디입니다."; ?>
   <p><input type="button" value="다른 ID 사용" onclick="opener.parent.change(); window.close();"></p>

   <?php
   // echo "<script>alert('사용 가능한 아이디입니다.'); self.close();</script>";
}
?>