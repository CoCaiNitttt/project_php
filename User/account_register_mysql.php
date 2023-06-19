<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
$account = $_POST['account'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

include 'connect.php';
$sql_account = "insert into account(TaiKhoan, MatKhau, HoTen, SoDienThoai, Email, NgayTao, role)
values('$account', '$password', '$name', '$phone', '$email', '$date', 0)";
mysqli_query($connect, $sql_account);
header("location: account_login.php")
?>