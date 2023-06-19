<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .frame_menu table .sanpham{
            background: black;
        }
        /* .frame_menu table .quanlycuahang{
            background: antiquewhite;
        } */
        .frame_product_insert .body{
            display: flex;
            width: 100%;
        }
        .frame_product_insert .body_right{
            width: 96%;
            margin-left: 2%;
        }
        .frame_product_insert .body_right .body_right_insert{
            background-color: aquamarine;
            width: 95%;
            height: 540px;
            margin-top: 20px;
            border-radius: 10px;
        }
        .frame_product_insert .body .body_right_insert table{
            margin-left: 50px;
            margin-top: 20px;
            height: 500px;
            font-size: 18px;
            width: 100%;
        }
        .frame_product_insert .body .body_right_insert table tr .title{
            width: 120px;
        }
        .frame_product_insert .body .body_right_insert table input{
            outline: none;
            border: none;
            height: 26px;
            border-radius: 5px;
            width: 360px;
        }
    </style>
</head>
<body>
    <?php
    include 'connect.php';

    $id = $_GET['id'];
    $sql_loai_sp = "select * from loaisanpham";
    $ket_qua_lsp = mysqli_query($connect, $sql_loai_sp);

    $sql_nha_cung_cap = "select * from nhacungcap";
    $ket_qua_ncc = mysqli_query($connect, $sql_nha_cung_cap);

    $sql_san_pham = "select * from sanpham where id = '$id'";
    $ket_qua_san_pham = mysqli_query($connect, $sql_san_pham);
    $kq_san_pham = mysqli_fetch_array($ket_qua_san_pham);
    
    ?>
    <div class="frame_product_insert">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="body_left">
                <?php include 'menu.php' ?>
            </div>
            <div class="body_right">
                <div class="body_right_titile">
                    <h1>Thêm sản phẩm</h1>
                </div>
                <div class="body_right_insert">
                    <form action="product_update_mysql.php" method="post" onsubmit="return check_insert()">
                    <table>
                        <tr></tr>
                        <tr>
                        <tr><td></td><th style="text-align: right;"></th><td><input hidden style="width: 60px; border-radius: 10px; border: none; outline: none; font-size: 18px; margin-left: 10px;" value="<?php echo $_GET['id'] ?>" type="text" name="id"></td></tr>
                        </tr>
                        <tr>
                            <td class="title">Loại sản phẩm </th>
                            <td>
                                <select style="width: 360px; height: 26px; border-radius: 5px; outline: none; border: none;" name="loaisanpham" id="">
                                    <?php
                                    foreach($ket_qua_lsp as $value) {
                                     ?>
                                     <option value="<?php echo $value['id'] ?>"><?php echo $value['TenLoai'] ?></option>
                                     <?php } ?>
                                </select>
                            </td>
                            <td class="title">Nhà cung cấp </td>
                            <td>
                            <select style="width: 360px; height: 26px; border-radius: 5px; outline: none; border: none;" name="nhacungcap" id="">
                                    <?php
                                    foreach($ket_qua_ncc as $value) {
                                     ?>
                                     <option value="<?php echo $value['id'] ?>"><?php echo $value['TenNhaCungCap'] ?></option>
                                     <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="title">Tên sản phẩm </td>
                            <td><input id="ten" value="<?php echo $kq_san_pham['TenSP'] ?>" type="text" name="tensanpham"></td>
                            <td class="title">Hình ảnh </td>
                            <td><input name="hinhanh" style="border-radius: 0;" type="file"></td>
                        </tr>
                        <tr>
                            <td class="title">Mô tả </td>
                            <td>
                                <textarea style="border-radius: 10px; padding-top: 2px; border: none; outline: none;" name="mota" id="motas" cols="47" rows="6"><?php echo $kq_san_pham['MoTa'] ?></textarea>
                            </td>
                            <td class="title">Số lượng </td>
                            <td><input id="soluongs"  value="<?php echo $kq_san_pham['SoLuong'] ?>" name="soluong" type="number"></td>
                        </tr>
                        <tr>
                            <td class="title" rowspan="3">Mô tả chi tiết </td>
                            <td rowspan="3">
                                <textarea  style="border-radius: 12px; padding-top: 3px; border: none; outline: none;" name="motachitiet" id="motachitiets" cols="47" rows="14"><?php echo $kq_san_pham['MoTaChiTiet'] ?></textarea>
                            </td>
                            <td class="title" rowspan="1">Giá </td>
                            <td><input id="tien"  value="<?php echo $kq_san_pham['Gia'] ?>" name="gia" type="text"></td>
                        </tr>
                        <tr>
                            <td class="title">Giá giảm </td>
                            <td><input id="giagiams"  value="<?php echo $kq_san_pham['GiaGiam'] ?>" name="giagiam" type="text"></td>
                        </tr>
                        <tr>
                            <td class="title">Độ hot </td>
                            <td><input id="dohots"  value="<?php echo $kq_san_pham['level'] ?>" name="dohot" type="text"></td>
                        </tr>
                        
                        <tr><td></td><td></td><td></td><td><button style="border-radius: 6px; outline: none; border: none;margin-left: 200px;" ><input style="width: 120px; height: 30px; border: none; outline: none;border-radius: 6px; cursor: pointer;" type="submit" value="Lưu"></button></td></tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check_insert() {
            var name = document.getElementById('ten').value;
            var mota = document.getElementById('motas').value;
            var soluong = document.getElementById('soluongs').value;
            var motachitiet = document.getElementById('motachitiets').value;
            var gia = document.getElementById('tien').value;
            var giagiam = document.getElementById('giagiams').value;
            var dohot = document.getElementById('dohots').value;

            var regex_number = /^[1-9]\d*$/;
            var regex_dohot = /^[0-9]+$/;

            if(name == "") {
                alert("Nhập tên sản phẩm");
                return false;
            }
            if(mota == "") {
                alert("Nhập mô tả sản phẩm");
                return false;
            }
            if(soluong == "") {
                alert("Nhập số lượng sản phẩm");
                return false;
            }
            else if(!regex_number.test(soluong)) {
                alert("Nhập số lượng sản phẩm là 1 số > 0");
                return false;
            }
            if(motachitiet == "") {
                alert("Nhập mô tả chi tiết");
                return false;
            }
            if(gia == "") {
                alert("Nhập giá sản phẩm");
                return false;
            }
            else if(!regex_number.test(gia)) {
                alert("Nhập giá sản phẩm là 1 số > 0");
                return false;
            }
            if(giagiam == "") {
                alert("Nhập giá giảm sản phẩm");
                return false;
            }
            else if(!regex_dohot.test(giagiam)) {
                alert("Nhập giá giảm sản phẩm là 1 số >= 0");
                return false;
            }
            if(Number(giagiam) >= Number(gia)) {
                alert("Nhập giá giảm < giá bán");
                return false;
            }
            if(dohot == "") {
                alert("Nhập độ hot sản phẩm");
                return false;
            }
            else if(!regex_dohot.test(dohot)) {
                alert("Nhập độ hot sản phẩm là 1 số >= 0");
                return false;
            }
            return true;
        }
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>