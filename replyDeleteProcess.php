<?php


$ridx = $_GET['ridx'];
$rpw = $_POST['rpw'];
$idx = $_GET['idx'];

$conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');
$sql = "SELECT * FROM reply WHERE idx='{$ridx}' AND PW='{$rpw}'";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($result);

if (!empty($arr)) {
   $sql = "DELETE FROM reply WHERE idx='{$ridx}' AND pw='{$rpw}'";
   $result = mysqli_query($conn, $sql);
   echo "<script>alert('삭제되었습니다.');location.href='bulletinBoard_main.html?idx={$idx}&view=1'</script>";
}else {
   echo "<script>alert('비밀번호를 확인하세요.');history.back();</script>";
}



?>