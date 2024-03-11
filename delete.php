<?php
session_cache_limiter('');
session_start();

$sid = $_SESSION['id'];
$idx = $_GET['idx'];

$conn = mysqli_connect('localhost','root','620328','bulletin');
$sql = "DELETE FROM notice WHERE idx='{$idx}' AND writer='{$sid}'";
$result = mysqli_query($conn, $sql);


if(isset($result)) {
   echo "<script>alert('글이 삭제되었습니다.');location.href='index.html';</script>";
}else {
   echo "글 삭제 도중 문제가 생겼습니다. 관리자에게 문의하세요.";
}
?>