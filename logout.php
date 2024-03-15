<?php
session_cache_limiter('');	
session_start();

$dbid = 'root';
$dbpw = '620328';
$dbname = 'bulletin';
$dbhost = '127.0.0.1';
$conn = mysqli_connect($dbhost, $dbid, $dbpw, $dbname);

$id = $_SESSION['id'];	
$pw = $_SESSION['pw'];
//세션에 등록된 토큰 파기	
$_SESSION['token'] = null;	
//세션에 등록된 아이디 파기	
$_SESSION['id'] = null;	
$_SESSION['pw'] = null;	
//데이터베이스에서 토큰 초기화	
$tokenKill = "UPDATE user SET token=0 WHERE id='$id' AND pw='$pw'";		
$tokenKill = mysqli_query($conn, $tokenKill);

//세션기록 전부 파기
unset($_SESSION['id']);
unset($_SESSION['pw']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['token']);




echo "<script>
alert(\"로그아웃 되었습니다.\");
window.location.href='index.html';
</script>"
?>