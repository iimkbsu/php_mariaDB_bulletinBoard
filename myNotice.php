<?php
session_cache_limiter('');
session_start();

//DB 접속 정보
$dbid = 'root';
$dbpw = '620328';
$dbname = 'bulletin';
$dbhost = '127.0.0.1';
$conn = mysqli_connect($dbhost, $dbid, $dbpw, $dbname);

// $id = $data['id'];
// $pw = $data['pw'];

// if ($data == '') {
//    echo "로그인하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요";
//    //error_log(mysqli_error($conn));
// } else {
//    echo "<script>alert('로그인 완료');
//       window.location.href='index.html?id={$id}';</script>";

//    //header("LOCATION:index.php");

// }


//게시판 테이블 출력
$sql = "SELECT * FROM notice WHERE writer='{$_SESSION['id']}' ORDER BY idx DESC";
$result = mysqli_query($conn, $sql);

$list = null;

while ($noticeBoard = mysqli_fetch_array($result)) {
   if ($noticeBoard['head'] == 'notice') {
      $noticeBoard['head'] = '공지';
   } else if ($noticeBoard['head'] == 'normal') {
      $noticeBoard['head'] = '일반';
   } else if ($noticeBoard['head'] == 'question') {
      $noticeBoard['head'] = '질문';
   } else if ($noticeBoard['head'] == 'vote') {
      $noticeBoard['head'] = '투표';
   } else {
      $noticeBoard['head'] = '테스트';
   }
   $list .= "<tr>
      <td>{$noticeBoard['idx']}</td>
      <td>{$noticeBoard['head']}</td>
      <td><a href='bulletinBoard_main.html?idx={$noticeBoard['idx']}'>" . mb_substr($noticeBoard['title'], 0, 30) . "</a></td>
      <td>" . mb_substr($noticeBoard['description'], 0, 50) . "</td>
      <td>{$noticeBoard['writer']}</td>
      <td>{$noticeBoard['created']}</td>
      <td>{$noticeBoard['checked']}</td>
      <td>{$noticeBoard['rec']}</td>
   </tr>";

}

function loged()
{
   if (isset($_SESSION['id'])) {
      return true;
   } else {
      return false;
   }
}

function loged1()
{
   if (loged() == false) {
      echo "<h3><a href=\"login.html\">로그인</a></h3>
      <h3><a href=\"regi.html\">회원가입</a></h3>";
   } else {
      echo "<h3><a href=\"logout.php\">로그아웃</a></h3>";
      echo "<div onclick='updateAccount()' style='cursor:pointer; width:120px;'>회원정보 수정</div>";
      echo "<div onclick='deleteAccount()' style='cursor:pointer; width:80px;'>회원탈퇴</div>";
   }
}

function loged2()
{
   if (loged() == true) {
      echo "<a href='index.html'>전체 글 보기</a>";
   }
}

?>

<!DOCTYPE html>
<html lang="ko">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>게시판</title>
</head>

<body>
   <div>
      <h1><a href="index.html">게시판</a></h1>
   </div>
   <div style="border: 1px solid black; width: 300px; margin-bottom: 20px; text-align: center;">
      <?php
      loged1();
      ?>

   </div>
   <div>
      <p id="hello">
         <?php

         if (isset($_SESSION['id'])) {
            echo "{$_SESSION['id']} 님 반갑습니다.";
         } else {
            echo "비회원 고객님 반갑습니다.";
         }
         ?>
      </p>
   </div>
   <div><a href="write.html">글 쓰기</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <?php
      loged2();
      ?>
   </div>

   <div>
      <table border="1" style="text-align: center; width: 1000px;">
         <th>글 번호</th>
         <th>말머리</th>
         <th>글 제목</th>
         <th>글 내용</th>
         <th>작성자</th>
         <th>작성일</th>
         <th>조회</th>
         <th>추천</th>
         <?= $list ?>
      </table>
   </div>

   <script>
      function deleteAccount() {
         if (confirm("진짜로 탈퇴하시겠습니까?")) {
            location.href = "deleteAccount.php";
         }
      }
      function updateAccount() {
         location.href = 'updateAccount.html';
      }
   </script>

</body>

</html>