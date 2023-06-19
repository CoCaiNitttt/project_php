<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.css">
    <title>Chi tiết đơn hàng đã đặt</title>
    <style>
        .frame_order .body{
            display: flex;
        }
        .frame_order .body .body_right{
            width: 96%;
            margin-left: 2%;
        }
        .frame_order .body .body_right_top{
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .frame_order .body .body_right_bottom table{
            width: 100%;
        }
        .frame_order .body .body_right_bottom table th{
            height: 25px;
        }
        .frame_order .body .body_right_bottom table td{
            height: 30px;
        }
    </style>
</head>
<body>
    <?php 
    $id = $_GET['id'];
    include 'connect.php';
    $sql_select_hoadon = "select * from donhang
                          inner join giohang on donhang.id = giohang.id_DonHang
                          inner join sanpham on giohang.id_SanPham = sanpham.id
                          where donhang.id = '$id'";
    $ket_qua_hoa_don = mysqli_query($connect, $sql_select_hoadon);
    $kq_hoa_don = mysqli_fetch_array($ket_qua_hoa_don);
   ?>
<div class="frame_order">
<div class="header">
            <?php include 'header.php' ?>
        </div>
       
        <div class="body" style="margin-top: 140px;">
            <div class="body_right">
                <div class="body_right_top">
                <div class="title">
                </div>
                </div>
                <div class="body_right_bottom" style="width: 80%; margin-left: 10%;">
                    <div style="display: flex; justify-content: center; margin-bottom: 10px;" class="title"><h2>CHI TIẾT HOÁ ĐƠN</h2></div>
                    <table style="text-align: left;width: 800px; height: 180px;">
                        <tr>
                            <th style="width: 140px;">Mã đơn hàng: </th>
                            <th><input value="<?php echo $id ?>" style="width: 100%; outline: none; border: none;" type="text" name="ma"></th>
                        </tr>
                        <tr>
                            <th>Tên khách hàng: </th> 
                            <th><input value="<?php echo $kq_hoa_don['TenKhachHang'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="name"></th>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <th><input  value="<?php echo $kq_hoa_don['Email'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="email"></th>
                        </tr>
                        <tr>
                            <th>Số điện thoại: </th>
                            <th><input  value="<?php echo $kq_hoa_don['SoDienThoai'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="phone"></th>
                        </tr>
                        <tr>
                            <th>Địa chỉ: </th>
                            <th><input  value="<?php echo $kq_hoa_don['DiaChi'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="address"></th>
                        </tr>
                        <tr>
                            <th>Ngày đặt hàng: </th>
                            <th><input  value="<?php echo $kq_hoa_don['NgayTao'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="day"></th>
                        </tr>
                    </table>
                    <table border="1" style=" margin-top: 20px;border-collapse: collapse; text-align: center;">
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php $tong = 0; $stt = 0; foreach($ket_qua_hoa_don as $value) { $stt++; ?>
                            <tr>
                                <td><?php echo $stt?></td>
                                <td><?php echo  $value['TenSP']?></td>
                                <td><?php echo  $value['SoLuongBan']?></td>
                                <td><?php echo number_format(($value['Gia'] - $value['GiaGiam']), 0, '.', '.')." đ"?></td>
                                <td><?php $tien = $value['SoLuongBan'] * ($value['Gia'] - $value['GiaGiam']); $tong += $tien; echo number_format($tien, 0, '.', '.')." đ"; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div style="margin-top: 40px; margin-left: 75%; font-size: 18px;">
                        Tổng cộng: <?php echo number_format($tong, 0, '.', '.')." đ"; ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%; font-size: 18px;">
                        Voucher giảm giá: <?php if($kq_hoa_don['id_magiamgia'] != null) {
                            $id_magiamgia = $kq_hoa_don['id_magiamgia'];
                            $sql_magiamgia = "select * from magiamgia where id = '$id_magiamgia'";
                            $ket_qua_magiamgia = mysqli_query($connect, $sql_magiamgia);
                            $kq_magiamgia = mysqli_fetch_array($ket_qua_magiamgia);
                            echo number_format($kq_magiamgia['SoTienGiam'], 0, '.', '.')." đ";
                        }
                        else {
                            echo "0 đ";
                        }
                        ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%;">
                        Phí vận chuyển: <?php echo "30.000 đ" ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%; font-size: 18px; font-weight: 700;">
                        
                        Thành tiền: <?php
                        echo number_format($kq_hoa_don['TongTien'], 0, '.', '.')." đ";
                        ?>
                    </div>
                    <div  style=" font-size: 20px; margin-top: 20px; margin-left: 85%;" class="exit">
                    <button style="height: 30px; width: 120px; color: white;background-color: deepskyblue;border: none;cursor: pointer; border-radius: 5px;"><a style="text-decoration: none;" href="follow_all_order.php">Trở về</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mysqli_close($connect) ?>
</body>
</html>