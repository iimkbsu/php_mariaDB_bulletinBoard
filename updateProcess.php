<?php
session_cache_limiter('');
session_start();


$sid = $_SESSION['id'];
$idx = $_GET['idx'];
$head = $_POST['head'];
$title = $_POST['title'];
$description = $_POST['description'];

$conn = mysqli_connect('localhost', 'root', '620328', 'bulletin');




$ufile = $_FILES['userfile'];

$fname = $ufile['name'];
$fpath = $ufile['full_path'];
$ftype = $ufile['type'];
$tname = $ufile['tmp_name'];
$fsize = $ufile['size'];

$updir = "./userupload/file/";

$arrString = null;

$fnames = array();
for ($i = 0; $i < count($fname); $i++) {
   move_uploaded_file($tname[$i], $updir . $fname[$i]); //디렉토리 저장
   array_push($fnames, $fname[$i]); //fnames 배열에 push
   $arrString = implode(",", $fnames); // fnames 저장된 배열 문자열로
}



$conn = mysqli_connect('localhost', 'root', '620328', 'bulletin');

$sql = "UPDATE notice SET head='{$head}', title='{$title}', description='{$description}', ufile='{$arrString}' WHERE writer='{$sid}' AND idx='{$idx}'";
$result = mysqli_query($conn, $sql);
if (isset ($result)) {
   echo "<script>alert('글 수정이 완료되었습니다');location.href='bulletinBoard_main.html?idx={$_GET['idx']}'</script>";

} else {
   echo "글을 수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.";
}




?>