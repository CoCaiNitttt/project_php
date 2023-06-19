<?php
$id = $_POST['id'];
include 'connect.php';
$sql = "update donhang set TrangThai = 1 where id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: order.php");
?>