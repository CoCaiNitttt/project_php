<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.css">
    <title>Quản lý sản phẩm</title>
    <style>
        .frame_menu table .sanpham{
            background: black;
        }
        /* .frame_menu table .quanlycuahang{
            background: antiquewhite;
        } */
        .frame_product .body{
            display: flex;
            margin-bottom: 20px;
        }
        .frame_product .body .body_right{
            width: 96%;
            margin-left: 1%;
        }
        .frame_product .body .body_right .body_right_top{
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .frame_product .body .body_right .body_right_top .function{
            display: flex;
            justify-content: space-between;
            width: 200px;
        }
        .frame_product .body .body_right .body_right_bottom table{
            margin-top: 40px;
            width: 100%;
        }
        img{
            height: 68px;
            width: 56px;
            margin: 2px;
            margin-top: 6px;
        }
    </style>
</head>
<body>
    <div class="frame_product">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="body_left">
                <?php include 'menu.php' ?>
            </div>
            <div class="body_right" style="color: black;">
                <div class="body_right_top">
                <div class="title">
                    <h2>Danh sách sản phẩm</h2>
                </div>
                <div class="function">
                    <div class="add">
                        <a style="color: darkgreen;margin-left: 30px;" href="product_insert.php">Thêm sản phẩm</a>
                    </div>
                </div>
                </div>
                <div class="body_right_bottom">
                    <table style="border-collapse: collapse;font-size: 14px;" border="1">
                        <tr>
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng còn</th>
                            <th>Đơn giá</th>
                            <th>Loại sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Nhập hàng</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                        <?php
                        include 'connect.php';
                        $tranghientai = 1;
                        if(isset($_GET['trang'])) {
                            $tranghientai = $_GET['trang'];
                        }
                        $soSanPham1Trang = 6;
                        $offset = ($tranghientai - 1) * $soSanPham1Trang;

                        $sql_tong_so_san_pham = "select count(*) from sanpham";
                        $mang_so_san_pham = mysqli_query($connect, $sql_tong_so_san_pham);
                        $ket_qua_san_pham = mysqli_fetch_array($mang_so_san_pham);
                        $tong_so_san_pham = $ket_qua_san_pham['count(*)'];

                        $sotrang = ceil($tong_so_san_pham / $soSanPham1Trang);

                        $sql_product = "select * from sanpham order by SoLuong asc limit $soSanPham1Trang offset $offset";
                        $ket_qua = mysqli_query($connect, $sql_product);
                        $stt = 0;
                        foreach($ket_qua as $value) { $stt++; ?>
                        <tr>
                            <th><?php echo $value['id'] ?></th>
                            <th><img src="/image/<?php echo $value['Avatar'] ?>" alt=""></th>
                            <th><?php echo $value['TenSP'] ?></th>
                            <th><?php echo $value['SoLuong'] ?></th>
                            <th><?php echo number_format(($value['Gia'] - $value['GiaGiam']), 0, '.', '.')." đ"?></th>
                            <th><?php echo $value['LoaiSP'] ?></th>
                            <th><?php echo $value['TrangThai'] ?></th>
                            <th>
                                <form action="update_quantity_product.php" method="post" onsubmit="return check_quantity()">
                                <div class="number" style="margin-bottom: 20px;">
                                    <input style="width: 50px;border-radius: 10px;padding-left: 18px;" type="text" name="number" id="soluong">
                                    <input type="text" value="<?php echo $value['id'] ?>" hidden name="id">
                                </div>
                                <div class="add">
                                <button style="background: deepskyblue; padding: 4px 10px; cursor: pointer; border: none; outline: none;border-radius: 10px;" type="submit">Nhập hàng</button>
                                </div>
                                </form>
                            </th>
                            <th><a style="color: black;" href="product_update.php?id=<?php echo $value['id']?>"><i class="fa-solid fa-wrench"></i></a></th>
                            <th>
                                <form action="product_delete.php" method="post" onsubmit="return check()">
                                <input name="id" type="text" value="<?php echo $value['id'] ?>" hidden style="width: 20px;">
                                <button style="border: none;cursor: pointer;" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                </form>
                            </th>
                        </tr>
                        <?php } ?>
                        <tr></tr>
                    </table>
                </div>
                <div style="width: 100%; display: flex; justify-content: center; align-items: center;" class="button">
                <?php
            for($i = 1; $i <= $sotrang; $i++) { ?>
            <button style="height: 20px; width: 30px; margin-top: 10px; margin-right: 10px;">
                <a style="text-decoration: none;color: black;" href="product.php?trang=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
            </button>
            <?php }
            ?>
                </div>
            </div>
        </div>
    </div>
    <?php mysqli_close($connect) ?>
    <script>
        function check() {
            if(confirm('Bạn có muốn xoá sản phẩm này không?') === true) {
                return true;
            }
            return false;
        }

        function check_quantity() {
            var number = document.getElementById('soluong').value;
            var regex_number = /^[1-9]\d*$/;
            if(number == "") {
                alert("Nhập số lượng hàng muốn nhập");
                return false;
            }
            else if(!regex_number.test(number)) {
                alert("Nhập số lượng là 1 số > 0");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>