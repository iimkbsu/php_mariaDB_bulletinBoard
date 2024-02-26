<?php
$conn = mysqli_connect('127.0.0.1','root','620328','bulletin');
$sql = "INSERT INTO user (id,pw,name,phone,email,profile) VALUES ('{$_POST['id']}', '{$_POST['pw']}','{$_POST['name']}','{$_POST['phone']}','{$_POST['email']}','{$_POST['profile']}')";
$result = mysqli_query($conn, $sql);

if ($result === false) {
   echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
   //error_log(mysqli_error($conn));
} else {
   echo "<script>alert('회원가입 완료');
      window.location.href='index.html';</script>";

   //header("LOCATION:index.php");

}


?>