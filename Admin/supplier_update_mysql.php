<?php
$id = $_POST['id'];
$name = $_POST['ten'];
$address = $_POST['diachi'];
$phone = $_POST['sodienthoai'];

include 'connect.php';
$sql = "update nhacungcap set TenNhaCungCap = '$name', DiaChi = '$address', SoDienThoai = '$phone' where id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: supplier.php");
?>