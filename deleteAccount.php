<?php
session_cache_limiter();
session_start();

$conn = mysqli_connect('localhost', 'root', '620328', 'bulletin');
$sql = "DELETE FROM user WHERE id='{$_SESSION['id']}' AND pw='{$_SESSION['pw']}'";
$result = mysqli_query($conn, $sql);

if (!empty($result)) {
   $sql = "UPDATE notice SET writer = '탈퇴한 회원' WHERE writer ='{$_SESSION['id']}'";
   $result = mysqli_query($conn, $sql);
   $sql ="UPDATE reply SET id = '탈퇴한 회원' WHERE id='{$_SESSION['id']}'";
   $result = mysqli_query($conn, $sql);
   mysqli_close($conn);
   unset($_SESSION['id']);
   unset($_SESSION['pw']);
   // unset($_SESSION['name']);
   echo "<script>alert('정상처리 되었습니다.');location.href='index.html'</script>";
} else {
   echo "<script>alert('오류가 발생했습니다. 관리자에게 문의하세요.');location.href='index.html'</script>";
}



?>