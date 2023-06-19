<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .frame_menu table .khachhang{
            background: black;
        }
        /* .frame_menu table .quanlybanhang{
            background: antiquewhite;
        } */
        .frame_customer .body{
            display: flex;
        }
        .frame_customer .body .body_right{
            width: 96%;
            margin-left: 2%;
        }
        .frame_customer .body .body_right_top{
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .frame_customer .body .body_right_bottom table{
            width: 100%;
        }
        .frame_customer .body_right table th i{
            color: red;
            font-size: 15px;
        }
        .frame_customer .body_right table th b{
            color: limegreen;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <?php
    $id = $_GET['id'];
    include 'connect.php';
    $sql = "select * from account where role = 0 and id = '$id'";
    $kq = mysqli_query($connect, $sql);
    ?>
<div class="frame_customer">
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
                    <h2>Danh sách chi tiết khách hàng</h2>
                </div>
                </div>
                <div class="body_right_bottom">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Giới tính</th>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                        </tr>
                        
                        <?php
                        foreach($kq as $value) {
                        ?>
                        <tr>
                            <th><?php echo $value['id'] ?></th>
                            <th><?php echo $value['HoTen'] ?></th>
                            <th><?php echo $value['Email'] ?></th>
                            <th><?php echo $value['SoDienThoai'] ?></th>
                            <th><?php if($value['DiaChi'] != "") {echo $value['DiaChi'];} else echo "<i>Chưa cập nhật</i>"; ?></th>
                            <th><?php if($value['GioiTinh'] != 0) {if($value['GioiTinh'] == 1) echo "Nữ"; if($value['GioiTinh'] == 2) echo "Nam";} else echo "<i>Chưa cập nhật</i>"; ?></th>
                            <th><?php echo $value['TaiKhoan'] ?></th>
                            <th><?php echo $value['MatKhau'] ?></th>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function check() {
        if(confirm("Bạn có muốn khôi phục lại tài khoản này?") === true) {
            return true;
        }
        return false;
    }
</script>
<?php mysqli_close($connect) ?>
</body>
</html>