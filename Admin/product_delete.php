<?php
$id = $_POST['id'];
include 'connect.php';
$sql = "delete from sanpham where id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: product.php");
?>