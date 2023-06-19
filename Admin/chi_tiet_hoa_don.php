<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.css">
    <title>Chi Tiết hoá đơn</title>
    <style>
        .frame_menu table .donhang{
            background: black;
        }
        /* .frame_menu table .quanlybanhang{
            background: antiquewhite;
        } */
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
    </style>
</head>
<body>
    <?php 
    include 'connect.php';
    $id = $_GET['id'];
    $sql = "select * from donhang
    inner join giohang on donhang.id = giohang.id_DonHang
    inner join sanpham on giohang.id_SanPham = sanpham.id where donhang.id = '$id'";

    $ketqua = mysqli_query($connect, $sql);
    $kq = mysqli_fetch_array($ketqua);
   ?>
<div class="frame_order">
<div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="body_left">
                <?php include 'menu.php' ?>
            </div>
            <div class="body_right">
                <div class="body_right_top">
                <div class="title">
                    <h2>Thông tin hoá đơn</h2>
                </div>
                </div>
                <div class="body_right_bottom" style="width: 80%; margin-left: 10%; margin-top: 10px;">
                    <div style="display: flex; justify-content: center; margin-bottom: 40px;" class="title"><h2>CHI TIẾT HOÁ ĐƠN</h2></div>
                    <form action="in_hoa_don.php" method="post">
                    <table style="text-align: left;width: 800px; height: 180px;">
                        <tr>
                            <th style="width: 140px;">Mã đơn hàng: </th>
                            <th><input value="<?php echo $kq['id_DonHang'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="ma"></th>
                        </tr>
                        <tr>
                            <th>Tên khách hàng: </th> 
                            <th><input value="<?php echo $kq['TenKhachHang'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="name"></th>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <th><input  value="<?php echo $kq['Email'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="email"></th>
                        </tr>
                        <tr>
                            <th>Số điện thoại: </th>
                            <th><input  value="<?php echo $kq['SoDienThoai'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="phone"></th>
                        </tr>
                        <tr>
                            <th>Địa chỉ: </th>
                            <th><input  value="<?php echo $kq['DiaChi'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="address"></th>
                        </tr>
                        <tr>
                            <th>Ngày đặt hàng: </th>
                            <th><input  value="<?php echo $kq['NgayTao'] ?>" style="width: 100%; outline: none; border: none;" type="text" name="day"></th>
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
                        <?php $tong = 0; $stt = 0; foreach($ketqua as $value) { $stt++; ?>
                            <tr>
                                <td><?php echo $stt?></td>
                                <td><?php echo  $value['TenSP']?></td>
                                <td><?php echo  $value['SoLuongBan']?></td>
                                <td><?php echo number_format(($value['Gia'] - $value['GiaGiam']), 0, '.', '.')."đ"?></td>
                                <td><?php $tien = $value['SoLuongBan'] * ($value['Gia'] - $value['GiaGiam']); $tong += $tien; echo number_format($tien, 0, '.', '.')."đ"; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div style="margin-top: 40px; margin-left: 75%; font-size: 18px;">
                        Tổng cộng: <?php echo number_format($tong, 0, '.', '.')."đ"; ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%; font-size: 18px;">
                        Voucher giảm giá: <?php if($kq['id_magiamgia'] != null) {
                            $id_code = $kq['id_magiamgia'];
                            $sql_code = "select * from magiamgia where id = '$id_code'";
                            $ket_qua_code = mysqli_query($connect, $sql_code);
                            $kq_code = mysqli_fetch_array($ket_qua_code);
                            echo number_format($kq_code['SoTienGiam'], 0, '.', '.') . " đ";
                        }
                        else {
                            echo "0 đ";
                        }
                        ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%;">
                        Phí vận chuyển: <?php echo "30.000đ" ?>
                    </div>
                    <div style=" margin-top: 6px; margin-left: 75%; font-size: 18px; font-weight: 700;">
                        Thành tiền: <?php if(isset($kq['TienGiamGia'])) {
                            $thanhtien = $tong - $kq['TienGiamGia'] + 30000;
                            echo number_format($thanhtien, 0, '.', '.')."đ";
                        }
                        else {
                            $thanhtien = $tong + 30000;
                        echo number_format($thanhtien, 0, '.', '.')."đ";
                        }
                        ?>
                    </div>
                    <div  style=" font-size: 20px; margin-top: 40px; margin-left: 85%;" class="print">
                    <button type="submit" style="height: 30px; width: 120px; color: white;background-color: deepskyblue;border: none;cursor: pointer; border-radius: 5px;"><i class="fa-solid fa-print"></i> In đơn hàng</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mysqli_close($connect) ?>
</body>
</html>