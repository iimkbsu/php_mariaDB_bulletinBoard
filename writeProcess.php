<?php
session_cache_limiter('');	
session_start();

$conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');
$sql = "INSERT INTO notice (head, title, description, writer) VALUES ('{$_POST['head']}','{$_POST['title']}','{$_POST['description']}','{$_SESSION['id']}');";

$result = mysqli_query($conn, $sql);

echo "<script>alert('글이 저장되었습니다.');
window.location.href='index.html';
</script>";
?>