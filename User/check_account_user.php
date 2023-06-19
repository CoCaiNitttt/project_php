<?php
session_start();
$_SESSION['check_account_user'] = 0;

$account = $_POST['account'];
$password = $_POST['password'];

include 'connect.php';
$sql = "select * from account where role = 0 and TaiKhoan = '$account'";
$ket_qua = mysqli_query($connect, $sql);
$kq = mysqli_fetch_array($ket_qua);




if($kq == null) {
    $_SESSION['check_account_user'] = 1;
    header("location: account_login.php");
}
else if($kq['MatKhau'] != $password) {
    $_SESSION['check_account_user'] = 2;
    header("location: account_login.php");
}
else {
    $user = ['id' => $kq['id'], 'name' => $kq['HoTen'], 'phone' => $kq['SoDienThoai'], 'email' => $kq['Email'], 'address' => $kq['DiaChi'], 'sex' => $kq['GioiTinh']];
    $_SESSION['arr_user'] = $user;
    header("location: TrangChu.php");
}
mysqli_close($connect);
?>