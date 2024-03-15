<?php

//세션 사용
session_cache_limiter('');
session_start();


//DB 접속 정보
$dbid = 'root';
$dbpw = '620328';
$dbname = 'bulletin';
$dbhost = '127.0.0.1';
$conn = mysqli_connect($dbhost, $dbid, $dbpw, $dbname);

//POST 방식으로 받은 id, pw 입력값 초기화
$id = $_POST['id'];
$pw = $_POST['pw'];

//id 대조하여 DB에서 id가져오기
$getID = "SELECT id FROM user WHERE id='$id'";
$getID = mysqli_query($conn, $getID);
$getID = mysqli_fetch_array($getID);
$getSessionToken = null;
$token = null;

//id가 있다면
if ($getID['id']) {
   //id에서 비밀번호 가져오기
   $getArr = "SELECT * FROM user WHERE id='$id'";
   $getArr = mysqli_query($conn, $getArr);
   $getArr = mysqli_fetch_array($getArr);
   $PassWord = $getArr['pw'];

   //DB에서 가져온 pw와 입력된 pw가 같다면
   if ($PassWord == $pw) {
      //64자리 무작위 토큰 생성(로그인 대조에 사용)
      $key = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789^/';
      for ($i = 0; $i <= 63; $i++) {
         $token .= $key[rand(0, 63)];
      }
      //생성된 토큰을 DB에 업데이트
      $updateToken = "UPDATE user SET token='$token' WHERE id='$id'";
      $updateToken = mysqli_query($conn, $updateToken);

      //세션에 토큰 키 값 등록
      $_SESSION['token'] = $token;
      $getSessionToken = $_SESSION['token'];
      $_SESSION['id'] = $id;
      $_SESSION['pw'] = $pw;
      $_SESSION['email'] = $getArr['email'];
      $_SESSION['name'] = $getArr['name'];
      $_SESSION['profile'] = $getArr['profile'];

      echo "<script>alert('로그인 완료');
      window.location.href='index.html';
      </script>";

      return 0;
   } else {
      echo "<script>alert('비밀번호가 틀립니다.');
      window.location.href='regi.html';
      </script>";
      return 1;
   }
} else {
   echo "<script>alert('등록되지 않은 아이디입니다.');
   window.location.href='regi.html';
   </script>";
   return 1;
}

?>