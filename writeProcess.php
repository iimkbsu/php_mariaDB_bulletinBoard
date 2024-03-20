<?php
session_cache_limiter('');
session_start();

$conn = mysqli_connect('127.0.0.1', 'root', '620328', 'bulletin');

if (!is_dir("./userupload/file")) {
   mkdir("./userupload/file", 0777);
}

//나중에 이미지와 파일 구분할 때 사용

// if (!is_dir("./userupload/img")) {
//    mkdir("./userupload/img", 0777);
// }


//var_dump($_FILES);
// array(1) { 
//    ["userfile"]=> 
//    array(6) { 
//       ["name"]=> string(8) "test.jpg" 
//       ["full_path"]=> string(8) "test.jpg" 
//       ["type"]=> string(0) "" 
//       ["tmp_name"]=> string(0) "" 
//       ["error"]=> int(2) 
//       ["size"]=> int(0) 
//    } 
// }


$ufile = $_FILES['userfile'];

$fname = $ufile['name'];
$fpath = $ufile['full_path'];
$ftype = $ufile['type'];
$tname = $ufile['tmp_name'];
$fsize = $ufile['size'];


//파일 타입 및 확장자 검사 (.txt .jpeg .jpg .gif .bmp .png .mp3)
$updir = "./userupload/file/";

$fnames = array();
$arrString;

for($i=0; $i<count($fname); $i++) {
   move_uploaded_file($tname[$i], $updir.$fname[$i]); //디렉토리 저장
   array_push($fnames, $fname[$i]); //fnames 배열에 push
   $arrString = implode(",", $fnames); // fnames 저장된 배열 문자열로
}






$sql = "INSERT INTO notice (head, title, description, writer, ufile) VALUES ('{$_POST['head']}','{$_POST['title']}','{$_POST['description']}','{$_SESSION['id']}', '$arrString');";

if ($result = mysqli_query($conn, $sql)) {
   echo "<script>alert('글이 저장되었습니다.');
         window.location.href='index.html';
         </script>";
}else {
   echo "<script>alert('문제가 발생했습니다. 관리자에게 문의하세요.');
         window.location.href='index.html';
         </script>";
}


?>