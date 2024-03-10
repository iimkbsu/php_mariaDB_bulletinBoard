<?php
session_cache_limiter();
session_start();

//좋아요(추천) 테이블 접근
$conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');
$id = $_SESSION['id'];
$noticeIDX = $_GET['idx'];

//현재 글과 세션접속중인 아이디를 찾기
$sql = "SELECT * FROM liked WHERE notice_idx = '{$noticeIDX}' AND like_id ='{$id}'";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($result);

if (empty($arr)) {
   $sql = "INSERT INTO liked (notice_idx, like_id, like_rec, like_date) values ('{$noticeIDX}', '{$id}', 1, now())";
   $result = mysqli_query($conn, $sql);
   echo "<script>alert('추천되었습니다.');location.href='bulletinBoard_main.html?idx={$noticeIDX}&view=1';</script>";
} else {
   if ($arr['like_rec'] == 1) {
      $sql = "UPDATE liked SET like_rec =0, like_date = now() WHERE notice_idx='{$noticeIDX}' AND like_id='{$id}'";
      $result = mysqli_query($conn, $sql);
      echo "<script>alert('좋아요를 취소했어요.');location.href='bulletinBoard_main.html?idx={$noticeIDX}&view=1';</script>";
   } else if ($arr['like_rec'] == 0) {
      $sql = "UPDATE liked SET like_rec =1, like_date = now() WHERE notice_idx='{$noticeIDX}' AND like_id='{$id}'";
      $result = mysqli_query($conn, $sql);
      echo "<script>alert('추천되었습니다.');location.href='bulletinBoard_main.html?idx={$noticeIDX}&view=1';</script>";
   }
}







?>