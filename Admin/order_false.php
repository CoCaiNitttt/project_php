<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            width: 90%;
            margin-left: 5%;
            border-collapse: collapse;
        }
        .frame_order .body .body_right_bottom table th{
            height: 30px;
        }
        .body_right_bottom i{
            color: red;
        }
    </style>
</head>
<body>
    <?php 
    include 'connect.php';
    $tranghientai = 1;
    if(isset($_GET['trang'])) {
        $tranghientai = $_GET['trang'];
    }
    $socode1Trang = 10;
    $offset = ($tranghientai - 1) * $socode1Trang;

    $sql_tong_so_code = "select count(*) from magiamgia";
    $mang_so_code = mysqli_query($connect, $sql_tong_so_code);
    $ket_qua_code = mysqli_fetch_array($mang_so_code);
    $tong_so_code = $ket_qua_code['count(*)'];

    $sotrang = ceil($tong_so_code / $socode1Trang);

    $sql_code = "select * from donhang where TrangThai = 3 limit $socode1Trang offset $offset";
    $kq = mysqli_query($connect, $sql_code);

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
                    <h2>Danh sách đơn hàng bị huỷ</h2>
                </div>
                <div class="function" style="display: flex; width: 450px; justify-content: space-around;margin-top: 10px;">
                    <div class="success">
                        <a style="color: green;" href="order_true.php">Đơn giao thành công</a>
                    </div>
                    <div class="false">
                    <a style="color: red;" href="order_false.php">Đơn hàng bị huỷ</a>
                    </div>
                </div>
                </div>
                <div class="body_right_bottom">
                    <table border="1">
                        <tr>
                            <th>STT</th>
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Xoá</th>
                            <th>Xem</th>
                        </tr>
                        <?php $stt = 0; foreach($kq as $value) { $stt++; ?>
                            <tr>
                                <th><?php echo $stt ?></th>
                                <th><?php echo $value['TenKhachHang'] ?></th>
                                <th><?php echo $value['SoDienThoai'] ?></th>
                                <th><?php echo $value['NgayTao'] ?></th>
                                <th>
                                     <?php echo "<i>Đơn hàng đã bị huỷ</i>" ?>
                                </th>
                                <th>
                                <form action="order_delete.php" method="post" onsubmit="return check_huy()">
                                    <input type="text" hidden name="id" value="<?php echo $value['id'] ?>">
                                    <button style="border: none;cursor: pointer;" type="submit"><i style="color: black;" class="fa-sharp fa-solid fa-trash"></i></button>
                                    </form>
                                </th>
                                <th>
                                    <a href="chi_tiet_hoa_don.php?id=<?php echo $value['id'] ?>"><i style="color: black;" class="fa-solid fa-eye"></i></a>
                                </th>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div style="width: 100%; display: flex; justify-content: center; align-items: center;" class="button">
                <?php
            for($i = 1; $i <= $sotrang; $i++) { ?>
            <button style="height: 20px; width: 30px; margin-top: 10px; margin-right: 10px;">
                <a style="text-decoration: none;color: black;" href="order_false.php?trang=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
            </button>
            <?php }
            ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        function check_huy() {
            if(confirm('Bạn có muốn xoá đơn hàng này không?') === true) {
                return true;
            }
            return false;
        }
    </script>
<?php mysqli_close($connect) ?>
</body>
</html>