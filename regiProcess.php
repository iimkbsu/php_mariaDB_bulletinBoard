<?php

$conn = mysqli_connect('127.0.0.1','root','620328','bulletin');
$sql = "INSERT INTO user (id,pw,name,email,profile) VALUES ('{$_POST['decide_id']}', '{$_POST['pw']}','{$_POST['name']}','{$_POST['email']}','{$_POST['profile']}')";
$result = mysqli_query($conn, $sql);

//id, phone, email은 유니크키로서 중복되면 alert

//$sql = "SELECT idx FROM user WHERE id ='{$_POST['decide_id']}' OR email='{$_POST['email']}'";




if (!$result) {
   echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.');
   window.location.href='regi.html';</script>";
   //error_log(mysqli_error($conn));
} else {
   echo "<script>alert('회원가입 완료');
      window.location.href='index.html';</script>";

   //header("LOCATION:index.php");

}


?>