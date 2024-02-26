<?php
$conn = mysqli_connect('127.0.0.1','root','620328','bulletin');
$sql = "SELECT * FROM user WHERE id='{$_POST['id']}' AND pw='{$_POST['pw']}'";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_array($result);

$id = $data['id'];
$pw = $data['pw'];

if ($data == '') {
   echo "로그인하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
   //error_log(mysqli_error($conn));
} else {
   echo "<script>alert('로그인 완료');
      window.location.href='index.html?id={$id}';</script>";

   //header("LOCATION:index.php");

}


?>