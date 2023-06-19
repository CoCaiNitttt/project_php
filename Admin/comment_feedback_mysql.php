<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
$id_c = $_POST['id_comment'];
$content = $_POST['content'];

include 'connect.php';
$sql_insert = "insert into phanhoi_comment(PhanHoi, id_comment, NgayPhanHoi) values('$content', '$id_c', '$date')";
mysqli_query($connect, $sql_insert);

$sql_update = "update comment set TrangThai = 1 where id_c = '$id_c'";
mysqli_query($connect, $sql_update);

mysqli_close($connect);
header("location: comment.php");
?>