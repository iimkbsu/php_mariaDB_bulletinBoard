<?php
$conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');
$sql = "INSERT INTO notice (head, title, description) VALUES ('{$_POST['head']}','{$_POST['title']}','{$_POST['description']}');";

$result = mysqli_query($conn, $sql);

echo "<script>alert('글이 저장되었습니다.');
window.location.href='index.html';
</script>";
?>