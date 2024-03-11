<?php
session_cache_limiter();
session_start();

$conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');

$id;
$pw;

if ($_SESSION['id'] && $_SESSION['pw']) {
   $id = $_SESSION['id'];
   $pw = $_SESSION['pw'];
}else {
   $id = $_POST['id'];
   $pw = $_POST['pw'];
}
$idx = $_GET['idx'];

// $sql = "insert into reply (notice_idx, id, pw, content, date) values ('25', 'test_id','test_pw','reply contents test test test test',now())";
// $result = mysqli_query($conn, $sql);
// $arr = mysqli_fetch_array($result);
$sql = "insert into reply (notice_idx, id, pw, content, date) values ('{$idx}', '{$id}','{$pw}','{$_POST['reply']}',now());";

mysqli_query($conn, $sql);


?>

<script>alert('덧글이 작성되었습니다.'); location.href = 'bulletinBoard_main.html?idx=<?= $idx ?>';</script>