<?php
session_cache_limiter();
session_start();

// echo
//    "post id: " . $_POST['id'] . "<br>";
// echo
//    "post pw: " . $_POST['pw'] . "<br>";
// echo
//    "post email: " . $_POST['email'] . "<br>";
// echo
//    "post name: " . $_POST['name'] . "<br>";
// echo
//    "update profile: " . $_POST['profile'] . "<br>";
// echo
//    "session id: " . $_SESSION['id'] . "<br>";
// echo
//    "session pw: " . $_SESSION['pw'] . "<br>";
// echo
//    "session name: " . $_SESSION['name'] . "<br>";
// echo
//    "session email: " . $_SESSION['email'] . "<br>";
// echo
//    "session token: " . $_SESSION['token'] . "<br>";


$conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');
$sql = "UPDATE user SET pw='{$_POST['pw']}', name='{$_POST['name']}', profile='{$_POST['profile']}' WHERE id='{$_SESSION['id']}' AND email='{$_SESSION['email']}'";
$result = mysqli_query($conn, $sql);

if (!empty($result)) {
   $_SESSION['token'] = 0;
   $sql = "UPDATE user SET token='{$_SESSION['token']}' WHERE id='{$_SESSION['id']}' AND email='{$_SESSION['email']}'";
   $result = mysqli_query($conn, $sql);
   
   echo "<script>alert('변경되었습니다. 다시 로그인해주세요.');location.href='index.html';</script>";
   unset($_SESSION['id']);
   unset($_SESSION['pw']);
   unset($_SESSION['name']);
   unset($_SESSION['email']);
   

} else {
   echo "<script>alert('문제가 발생했습니다. 관리자에게 문의하세요.');history.back();</script>";
}


?>