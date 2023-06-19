<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
    include 'connect.php';

    $code = $_POST['magiamgia'];
    $solannhap = $_POST['solannhap'];
    $tiengiam = $_POST['sotiengiam'];
    $dontoithieu = $_POST['donhangtoithieu'];
    $ngayhethan = $_POST['ngayhethan'];


    $sql = "insert into magiamgia(code, SoTienGiam, SoLanNhap, SoLanDaNhap, NgayHetHan, DonHangToiThieu, NgayTao, TrangThai) 
    values('$code', '$tiengiam', '$solannhap', 0, '$ngayhethan', '$dontoithieu', '$date', 1)";

    mysqli_query($connect, $sql);
    mysqli_close($connect);

    header("location: discount_code.php");

    ?>