<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
    include 'connect.php';

    $id = $_POST['id'];
    $code = $_POST['magiamgia'];
    $solannhap = $_POST['solannhap'];
    $tiengiam = $_POST['sotiengiam'];
    $dontoithieu = $_POST['donhangtoithieu'];
    $ngayhethan = $_POST['ngayhethan'];

    $sql = "update magiamgia set
    code = '$code',
    SoLanNhap = '$solannhap',
    SoTienGiam = '$tiengiam',
    DonHangToiThieu = '$dontoithieu',
    NgayHetHan = '$ngayhethan'
    where id = '$id'";


    mysqli_query($connect, $sql);
    mysqli_close($connect);
    header("location: discount_code.php");

    ?>