<?php
session_cache_limiter('');
session_start();

$sid = $_SESSION['id'];

$conn = mysqli_connect('localhost', 'root', '620328', 'bulletin');
$sql = "SELECT * FROM notice WHERE idx='{$_GET['idx']}'";
$result = mysqli_query($conn, $sql);
$arr;
$idx;
$head;
$title;
$description;
$ufile;

if (isset ($result)) {
   $arr = mysqli_fetch_array($result);
   if ($arr['writer'] == $_SESSION['id']) {
      $idx = $arr['idx'];
      $head = $arr['head'];
      $title = $arr['title'];
      $description = $arr['description'];
      $ufile = $arr['ufile'];
   }
} else {
   echo "<script>alert('문제가 발생했습니다. 관리자에게 문의하세요.'); location.href='index.html'</script>";
}


?>


<!DOCTYPE html>
<html lang="ko">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>글 수정</title>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
   integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
   <form id="updateForm" action="updateProcess.php?idx=<?= $_GET['idx'] ?>" method="post" enctype="multipart/form-data">
      <fieldset>
         <legend>글 수정</legend>
         <select name="head" form="updateForm">
            <?php
            if (($_SESSION['id'] == 'admin' || $_SESSION['id'] == 'ADMIN')) {
               echo "<option value=\"notice\">공지</option>";
            }
            ?>
            <option value="normal">일반</option>
            <option value="question">질문</option>
            <option value="vote">투표</option>
         </select>
         <input type="text" name="title" value="<?= $title ?>">
         <p><textarea name="description" rows="20px" cols="100px"><?= $description ?></textarea></p>

         <input type='file' id='image' name='userfile[]' onchange='setview(event)' onclick='removechild()' multiple>
         <br>
         <!-- 이미지 미리보기 -->
         <div id="image_container"></div>
         <br>
         <input type="submit">
      </fieldset>
   </form>

   <script>

      // 이미지 제거
      function removechild() {
         $('#image_container').empty();
      }

      function setview(event) {
         for (var image of event.target.files) {
            var reader = new FileReader();

            reader.onload = function (event) {

               var img = document.createElement("img");
               img.setAttribute("src", event.target.result);
               img.setAttribute("style", "width:300px; height:200px;");
               document.querySelector("div#image_container").appendChild(img);
            };
            console.log(image);
            reader.readAsDataURL(image);
         }

      }
   </script>
</body>

</html>