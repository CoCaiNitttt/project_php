<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
include 'connect.php';
$sql = "select * from magiamgia";
$ket_qua = mysqli_query($connect, $sql);

foreach($ket_qua as $value) {
    $id = $value['id'];
    $NgayHethan = $value['NgayHetHan'];
    if(strtotime($NgayHethan) <= strtotime($date)) {
        $sql_update = "update magiamgia set TrangThai = 0 where id = '$id'";
        mysqli_query($connect, $sql_update);
    }
}
mysqli_close($connect);
?>