<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .frame_menu table .nhacungcap{
            background: black;
        }
        /* .frame_menu table .quanlycuahang{
            background: antiquewhite;
        } */
        .frame_news .body{
            display: flex;
            background-color: #cccc;
            margin-bottom: 20px;
        }
        .frame_news .body .body_right{
            width: 80%;
            background: white;
        }
        .frame_news .body .body_right table{
            width: 90%;
            margin-top: 10px;
            margin-left: 5%;
        }
        .frame_news .body .body_right table th{
            height: 30px;
        }
        .frame_news .body .body_right .body_right_top{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .frame_news .body .body_right .body_right_top .title{
            margin: 20px 40px;
        }
        .frame_news .body .body_right .body_right_top .function{
            display: flex;
            width: 140px;
            justify-content: space-between;
        }
        img{
            height: 100px;
            width: 80px;
        }
    </style>
</head>
<body>
    <div class="frame_news">
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
                    <h2>Nhà cung cấp</h2>
                </div>
                <div class="function" style="margin-top: 40px;">
                    <div class="add">
                            <a style="color: green; cursor: pointer;" href="supplier_insert.php">Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="body_right_bottom">
                <table border="1" style="border-collapse: collapse;">
                    <tr>
                        <th>Mã nhà cung cấp</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ngày Thêm</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                    <?php
                        include 'connect.php';
                        $tranghientai = 1;
                        if(isset($_GET['trang'])) {
                            $tranghientai = $_GET['trang'];
                        }
                        $socode1Trang = 10;
                        $offset = ($tranghientai - 1) * $socode1Trang;

                        $sql_tong_so_code = "select count(*) from nhacungcap";
                        $mang_so_code = mysqli_query($connect, $sql_tong_so_code);
                        $ket_qua_code = mysqli_fetch_array($mang_so_code);
                        $tong_so_code = $ket_qua_code['count(*)'];

                        $sotrang = ceil($tong_so_code / $socode1Trang);

                        $sql_code = "select * from nhacungcap limit $socode1Trang offset $offset";
                        $ket_qua = mysqli_query($connect, $sql_code);
                        foreach($ket_qua as $value) { ?>
                        <tr>
                            <th><?php echo $value['id'] ?></th>
                            <th><?php echo $value['TenNhaCungCap'] ?></th>
                            <th><?php echo $value['DiaChi'] ?></th>
                            <th><?php echo $value['SoDienThoai'] ?></th>
                            <th><?php echo $value['NgayTao'] ?></th>
                            <th><a style="color: black;" href="supplier_update.php?id=<?php echo $value['id'] ?>"><i class="fa-solid fa-wrench"></i></a></th>
                            <th>
                                <form action="supplier_delete.php" method="post" onsubmit="return check()">
                                <input name="id" type="text" value="<?php echo $value['id'] ?>" hidden style="width: 20px;">
                                <button style="border: none;cursor: pointer;" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                </form>
                            </th>
                        </tr>
                        <?php } ?>
                </table>
            </div>
            <div style="width: 100%; display: flex; justify-content: center; align-items: center;" class="button">
                <?php
            for($i = 1; $i <= $sotrang; $i++) { ?>
            <button style="height: 20px; width: 30px; margin-top: 10px; margin-right: 10px;">
                <a style="text-decoration: none;color: black;" href="supplier.php?trang=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
            </button>
            <?php }
            ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check() {
            if(confirm('Bạn có muốn xoá nhà cung cấp này không?') === true) {
                return true;
            }
            return false;
        }
    </script>
</body>
</html>