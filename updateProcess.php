<?php
session_cache_limiter('');
session_start();

$sid = $_SESSION['id'];
$idx = $_GET['idx'];
$head = $_POST['head'];
$title = $_POST['title'];
$description = $_POST['description'];

$conn = mysqli_connect('localhost', 'root', '620328', 'bulletin');

$sql = "UPDATE notice SET head='{$head}', title='{$title}', description='{$description}' WHERE writer='{$sid}' AND idx='{$idx}'";
$result = mysqli_query($conn, $sql);
if (isset($result)) {
   echo "<script>alert('글 수정이 완료되었습니다');location.href='bulletinBoard_main.html?idx={$_GET['idx']}'</script>";

} else {
   echo "글을 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.";
}




?>