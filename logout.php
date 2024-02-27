<?php
session_cache_limiter('');	
session_start();

$dbid = 'root';
$dbpw = '620328';
$dbname = 'bulletin';
$dbhost = '127.0.0.1';
$conn = mysqli_connect($dbhost, $dbid, $dbpw, $dbname);

$id = $_SESSION['id'];	
//세션에 등록된 토큰 파기	
$_SESSION['token'] = null;	
//세션에 등록된 아이디 파기	
$_SESSION['id'] = null;		
//데이터베이스에서 토큰 초기화	
$tokenKill = "UPDATE user SET token=0 WHERE id='$id'";		
$tokenKill = mysqli_query($conn, $tokenKill);



echo "<script>
alert(\"로그아웃 되었습니다.\");
window.location.href='index.html';
</script>"
?>