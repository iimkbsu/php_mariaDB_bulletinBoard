<?php

   $conn = mysqli_connect('127.0.0.1','root','620328','bulletin');
   $sql = "SELECT idx FROM user WHERE id=\"{$_GET['id']}\"";

   $result = mysqli_query($conn, $sql);

   $arr = mysqli_fetch_array($result);


   if($arr['idx'] != null) {
      echo "<script>alert('이미 가입된 아이디입니다.'); self.close();</script>";
   }else {
      echo "<script>alert('사용 가능한 아이디입니다.'); self.close();</script>";
   }
   
   

   
?>