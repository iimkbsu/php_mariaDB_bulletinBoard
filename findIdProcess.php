<?php
   $conn = mysqli_connect('127.0.0.1','root','620328','bulletin');
   $sql = "SELECT id FROM user WHERE name = '{$_POST['name']}' AND email ='{$_POST['email']}'";
   $result = mysqli_query($conn, $sql);
   $arr = mysqli_fetch_array($result);

   if(isset($arr)) {
      echo "<script>alert('고객님의 아이디는 {$arr['id']} 입니다. 로그인 해주세요'); window.location.href='regi.html'</script>";
   }else {
      echo "<script>alert('찾는 아이디가 없습니다.'); history.back();</script>";
   }

  
?>