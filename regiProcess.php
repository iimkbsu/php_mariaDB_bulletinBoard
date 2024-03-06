<?php

$decide_id = $_POST['decide_id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$email = $_POST['email'];
$profile = $_POST['profile'];


//regiProcess.php를 url로 직접 입력하여 강제로 접근했을 때 null값으로 계정이 생성되는 것을 방지
if (empty($decide_id) || empty($pw) || empty($name) || empty($email)) {
   echo "<script>alert('비정상적인 접근입니다. 회원가입란에 정확하게 기입해주세요.');
   window.location.href='regi.html';</script>";
} else {
   $conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');
   $sql = "INSERT INTO user (id,pw,name,email,profile) VALUES ('{$decide_id}', '{$pw}','{$name}','{$email}','{$profile}')";
   $result = mysqli_query($conn, $sql);

   if (!isset($result)) {
      echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.');
      window.location.href='regi.html';</script>";
      //error_log(mysqli_error($conn));
   } else {
      echo "<script>alert('회원가입 완료');
         window.location.href='index.html';</script>";

      //header("LOCATION:index.php");

   }
}



//id, phone, email은 유니크키로서 중복되면 alert

//$sql = "SELECT idx FROM user WHERE id ='{$_POST['decide_id']}' OR email='{$_POST['email']}'";

?>