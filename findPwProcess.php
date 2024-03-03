<?php

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];


$conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');
$sql = "SELECT * FROM user WHERE email = '{$email}' AND name = '{$name}' AND id ='{$id}'";

$result = mysqli_query($conn, $sql);

$arr = mysqli_fetch_array($result);

if (isset($arr)) {

   $to = "{$arr['email']}";
   $subject = "PHP 게시판 연습의 비밀번호 확인 메일입니다.";
   $contents = "비밀번호는 {$arr['pw']} 입니다.";
   $headers = "From: iimkbsu@gmail.com";

   mail($to, $subject, $contents, $headers);

   echo "<script>
   alert('메일이 발송되었습니다. 메일을 확인하세요.');
   window.location.href='index.html';
   </script>";


}else {
   echo "<script>
   alert('일치하는 정보가 없습니다. 계정을 확인하세요.');
   window.location.href='findPw.html';
   </script>";
}


?>