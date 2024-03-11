<?php
session_cache_limiter('');
session_start();

$sid = $_SESSION['id'];

$conn = mysqli_connect('localhost','root','620328','bulletin');
$sql = "SELECT * FROM notice WHERE idx='{$_GET['idx']}'";
$result = mysqli_query($conn, $sql);
$arr;
$idx;
$head;
$title;
$description;

if(isset($result)) {
   $arr = mysqli_fetch_array($result);
   if($arr['writer'] == $_SESSION['id']) {
      $idx = $arr['idx'];
      $head = $arr['head'];
      $title = $arr['title'];
      $description = $arr['description'];
   }
}else {
   echo "글을 불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.";
}




?>


<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>글 수정</title>
</head>
<body>
   <form id="updateForm" action="updateProcess.php?idx=<?=$_GET['idx']?>" method="post">
      <fieldset>
         <legend>글 수정</legend>
         <select name="head" form="updateForm">
         <?php
            if(($_SESSION['id'] == 'admin' || $_SESSION['id'] == 'ADMIN')) {
               echo "<option value=\"notice\">공지</option>";
            }
            ?>
               <option value="normal">일반</option>
               <option value="question">질문</option>
               <option value="vote">투표</option>
         </select>
         <input type="text" name="title" value="<?=$title?>">
         <p><textarea name="description"><?=$description?></textarea></p>
         <input type="submit">
      </fieldset>
   </form>
</body>
</html>