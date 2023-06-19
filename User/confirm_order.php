<?php
$id = $_GET['id'];
include 'connect.php';
$sql = "update donhang set TrangThai = 2 where id = '$id'";
mysqli_query($connect, $sql);

mysqli_close($connect);

header("location: follow_all_order.php");
?>