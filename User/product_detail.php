<?php 
if(isset($_SESSION['arr_user'])) {
    $arr = $_SESSION['arr_user'];
    $id_user = $arr['id'] ;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.css">
    <title>Chi tiết sản phẩm</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            width: 100%;
        }
        .frame_product_detail{
            height: 100%;
            width: 100%;
        }
        .frame_product_detail .body{
            margin-top: 160px;
            width: 90%;
            margin-left: 5%;
            min-height: 800px;
            border: 1px solid black;
            border-radius: 50px;
            box-shadow: 2px 2px 2px red;
        }
        .frame_product_detail .body .body_top table{
            width: 90%;
            margin-left: 5%;
        }
        .frame_product_detail .comment{
            width: 90%;
            margin-left: 5%;
            margin-top: 50px;
            font-size: 24px;
        }
        .frame_product_detail .display_comment{
            width: 90%;
            min-height: 160px;
            margin-left: 5%;
            margin-top: 20px;
            font-size: 24px;
            border: 1px solid red;
            border-radius: 20px;
        }

        

        .frame_discount_product{
            width: 90%;
            border: 1px solid red;
            display: flex;
            justify-content: center;
            margin-left: 5%;
            border-radius: 20px;
            margin-top: 20px;
        }
        .frame_discount_product table{
            width: 100%;
        }
        .frame_discount_product img{
            width: 120px;
            height: 150px;
            transition: 0.3s;
        }
        .frame_discount_product table caption{
            text-align: left;
            background: orange;
            height: 60px;
            margin-bottom: 40px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        .frame_discount_product table caption h1{
            margin-left: 30px;
            margin-top: 10px;
        }
        .frame_discount_product table .product .product_image{
            width: 220px;
            border: 1px solid red;
            margin-left: 24px;
            padding: 8px 0;
            margin-top: 10px;
            border-radius: 20px;
        }
        .frame_discount_product table .product .product_image img:hover{
            scale: 1.06;
        }
        .frame_discount_product table .product .product_image a .product_discount{
            position: absolute;
            background-color: red;
            width: 150px;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            margin-top: -35px;
            font-size: 12px;
            height: 18px;
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
</head>
<body>
    <?php
    $id = $_GET['id'];
    include 'connect.php';
    $sql_product = "select * from sanpham where id = '$id'";
    $ket_qua_product = mysqli_query($connect, $sql_product);
    $kq_product = mysqli_fetch_array($ket_qua_product);

    $so_san_pham = $kq_product['SoLuong'];


    ?>
    <div class="frame_product_detail">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="body_top">
                <table>
                    <caption style="text-align: left; margin-left: 34px; margin-bottom: 20px;margin-top: 20px;"><h2><?php echo $kq_product['TenSP'] ?></h2></caption>
                    <tr>
                        <th style="text-align: left; width: 400px;">
                            <img style="height: 400px;width: 320px;" src="/image/<?php echo $kq_product['Avatar'] ?>"/>
                        </th>
                        <th style="text-align:left; font-size: 20px;">
                            <h1 style="color: red;margin-top: -80px;"><?php echo number_format(($kq_product['Gia'] - $kq_product['GiaGiam']), 0, '.', '.')." đ" ?></h1>
                            <div class="discount" style="display: flex; margin-bottom: 30px; margin-top: 20px;">
                                <p style="text-decoration: line-through;opacity: 0.5;">Giá cũ: <?php echo number_format($kq_product['Gia'], 0, '.', '.')." đ"  ?></p>
                                <p style="margin-left: 50px;">Giảm: <?php echo number_format($kq_product['GiaGiam'], 0, '.', '.')." đ"?></p>
                            </div>
                            <p style="margin-bottom: 20px;">Tình trang: <?php if($kq_product['SoLuong'] == 0) {?> 
                                <i style="color: red;">Hết hàng</i>
                                <?php } else { ?>
                                    <i style="color: limegreen;">Còn hàng</i>
                                    <?php } ?>
                            </p>
                            <p style="margin-bottom: 20px;">Đã bán: <?php echo $kq_product['SoLuongMua'] ?> sản phẩm</p>
                            <div class="quantity" style="display: flex;">
                                <p>Số lượng:</p>
                                <button style="font-size: 35px; border: none;outline: none;cursor: pointer;background: white;height: 24px; margin-top: -12px; margin-left: 20px; margin-right: 10px;" id="down">-</button>
                                <input readonly style="width: 50px; height: 24px; border-radius: 10px;padding-left: 19px;" name="quantity" type="text" id="number" value="1">
                                <button style="font-size: 30px;border: none;outline: none;cursor: pointer; background: white;height: 24px; margin-top: -6px; margin-left: 10px;" id="up">+</button>
                            </div>
                            <div class="button" style="display: flex;margin-top: 20px;">
                                <form action="add_product_to_cart.php" method="post" onsubmit="return check_them()">
                                    <input type="text" id="test1" value="1" hidden name="soluong_them">
                                    <input type="text" hidden name="id_product" value="<?php echo $id ?>">
                                    <input type="text" hidden name="id_user" value="<?php echo $arr['id'] ?>">
                                    <button type="submit" style="font-size: 18px; height: 36px; width: 200px; margin-right: 20px; margin-top: 20px; cursor: pointer;background: red;color: white;border-radius: 20px; border: none;outline: none;">Thêm vào giỏ hàng</button>
                                </form>
                                <form action="buy_product.php" method="post" onsubmit="return check_muahang()">
                                    <input type="text" id="test2" value="1" hidden name="soluong_mua">
                                    <input type="text" hidden name="id_product" value="<?php echo $id ?>">
                                    <input type="text" hidden name="id_user" value="<?php echo $arr['id'] ?>">
                                    <button style="font-size: 18px; height: 36px;background: red; color: white; width: 200px; margin-top: 20px; cursor: pointer;border-radius: 20px; border: none;outline: none;">Mua hàng</button>
                                </form>
                            </div>
                        </th>
                        <th style="width: 20%;">
                            <table style="margin-top: -40px;">
                                <caption style="margin-bottom: 20px;"><h3>Chúng tôi luôn sẵn sàng để giúp đỡ bạn</h3></caption>
                                <tr><th><img style="height: 150px; width: 200px;margin-bottom: 10px;" src="https://social.sgp1.digitaloceanspaces.com/blog/1656404178_Nho-co-ung-dung-cham-soc-khach-hang-da-kenh-chat-luong-cham-soc-duoc-cai-thien-va-nang-cao-hon.jpg" alt=""></th></tr>
                                <tr><th><p>Để được hỗ trợ tốt nhất hãy gọi</p></th></tr>
                                <tr><th><i style="color: limegreen; font-size: 30px;">1800 1009</i></th></tr>
                                <tr><th><p>Hoặc</p></th></tr>
                                <tr><th style="margin-top: 4px;">Chát hỗ trợ trực tiếp</th></tr>
                                <tr><th><p style="margin-top: 4px;line-height: 20px;">Chúng tôi luôn sẵn sàng giúp đỡ bạn</p></th></tr>
                            </table>
                        </th>
                    </tr>
                </table>
            </div>
            <div class="body_bottom">
                <div class="describe" style="margin-top: 60px; margin-left: 40px;margin-bottom: 10px;margin-right: 20px;">
                    <h2 style="margin-bottom: 10px;">Mô tả sản phầm:</h2>
                    <div class="content" style="line-height: 30px;">
                    <?php echo $kq_product['MoTa'] ?>
                    </div>
                </div>
                <div class="describe_detail" style="margin-top: 60px; margin-left: 40px;margin-bottom: 10px;margin-right: 20px;">
                    <h2>Mô tả chi tiết sản phẩm</h2>
                    <div class="content" style="line-height: 40px;">
                    <?php 
                    $text = $kq_product['MoTaChiTiet'];
                    // $arr = explode('.', $text);
                    // print_r($arr);
                    echo $text;
                    
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="product">
        <?php
        $sql_loaisp = "select * from sanpham inner join loaisanpham on sanpham.LoaiSP = loaisanpham.id where sanpham.id = '$id'";
        $ket_qua_loaisp = mysqli_query($connect, $sql_loaisp);
        $kq_loaisp = mysqli_fetch_array($ket_qua_loaisp);
        $Tenloaisp = $kq_loaisp['TenLoai'];

        $sql_sp = "select * from sanpham
            where TenSP like '%$Tenloaisp%'
            limit 5";
    $ket_qua_sp = mysqli_query($connect, $sql_sp);
    ?>
    <div class="frame_discount_product">
        <table>
            <caption><h1>SẢN PHẨM LIÊN QUAN</h1></caption>
            <tr>
                <?php foreach($ket_qua_sp as $value) { ?>
                <th>
                    <div class="product">
                        <div class="product_image">
                            <a style="cursor: pointer;color:aliceblue" href="product_detail.php?id=<?php echo $value['id'] ?>"><img src="/image/<?php echo $value['Avatar'] ?>" alt="">
                            <div class="product_discount">
                                <?php
                                echo "Giảm: " . number_format($value['GiaGiam'], 0, '.', '.')."đ";
                                ?>
                            </div>
                        </a>
                            
                        </div>
                    </div>
                    <div style="margin-bottom: 5px;font-size: 14px;margin-top: 10px;width: 255px;" class="product_name">
                        <?php echo $value['TenSP'] ?>
                    </div>
                    <div class="product_price" style="font-size: 14px;margin-bottom:20px;">
                        <h3 style="color:red"><?php $gia_ban = $value['Gia'] - $value['GiaGiam']; echo number_format($gia_ban, 0, '.', '.')."đ"?> <b style="text-decoration: line-through; color:gray; font-size: 13px; opacity: 0.5;"><?php echo number_format($value['Gia'], 0, '.', '.')."đ" ?></b></h3>
                    </div>
                </th>
                <?php } ?>
            </tr>
        </table>
    </div>
   
        </div>
        <div class="comment">
            <div class="title"><h2>Bình luận sản phẩm</h2></div>
            <div style="border: 1px solid black; width: 100%; margin-top: 10px; margin-bottom: 30px;"></div>
            <div class="connect">
                <form action="add_comment.php" method="post" onsubmit="return check()">
                    <input type="text" hidden name="id_product" value="<?php echo $id ?>">
                    <input type="text" hidden name="id_user" value="<?php echo $arr['id'] ?>">
                    <input placeholder="Nhập nội dung muốn bình luận" style="width: 90%; height: 40px; border-radius: 15px;outline: none;font-size: 17px;" type="text" name="comment">
                    <button style="height: 30px; width: 128px; border-radius: 10px; background: orangered;color: white; border: none; cursor: pointer;" type="submit" id="button" onclick="reload()">Bình luận</button>
                </form>
            </div>
        </div>
        <div class="display_comment">
            <?php
                $sql_comment = "select * from comment inner join account on comment.id_account = account.id where id_product = '$id'";
                $kq_comment = mysqli_query($connect, $sql_comment);

                foreach($kq_comment as $value) {
                    $id_comment = $value['id_c'];
                    $sql_phan_hoi = "select * from phanhoi_comment inner join comment on phanhoi_comment.id_comment ='$id_comment'";
                    $ket_qua_phan_hoi = mysqli_query($connect, $sql_phan_hoi); 
                    $kq_phan_hoi = mysqli_fetch_array($ket_qua_phan_hoi);?>
                <div class="user">
                <div style="margin-left: 10px; margin-top: 5px; display: flex;"><h5><?php echo $value['HoTen'] ?></h5><i style="font-size: 12px; margin-top: 6px; margin-left: 10px;"><?php echo $value['date'] ?></i></div>
                <div style="margin-left: 30px; margin-bottom: 20px; font-size: 17px;"><i><?php echo $value['content'] ?></i></div>
                </div>
                <?php if(isset($kq_phan_hoi)) { ?>
                    <div style="margin-left: 100px; margin-top: -15px;" class="admin">
                <div style="margin-left: 10px; margin-top: 5px; display: flex;"><h5>Admin</h5><i style="font-size: 12px; margin-top: 6px; margin-left: 10px;"><?php echo $kq_phan_hoi['NgayPhanHoi'] ?></i></div>
                <div style="margin-left: 30px; margin-bottom: 20px; font-size: 17px;"><i><?php echo $kq_phan_hoi['PhanHoi'] ?></i></div>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="footer">
            <?php include 'footer.php' ?>
        </div>
    </div>
    <script>
            const number = document.getElementById('number');
            const up = document.getElementById('up');
            const down = document.getElementById('down');
            const add1 = document.getElementById('test1');
            const add2 = document.getElementById('test2');
            var n = 1;

            var soluong = "<?php echo $so_san_pham ?>";
            up.addEventListener("click", () => {
                if(n >= soluong) {
                    number.value = soluong;
                    add1.value = soluong;
                    add2.value = soluong;
                }
                else {
                    n++;
                    number.value = n;
                    add1.value = n;
                    add2.value = n;
                }
            });

            down.addEventListener("click", () => {
                if(number.value <= 1) {
                    number.value = 1;
                    add1.value = 1;
                    add2.value = 1;
                }
                else {
                    n--;
                    number.value = n;
                    add1.value = n
                    add2.value = n
                }
            });

            function check() {
                if("<?php echo isset($_SESSION['arr_user']) ?>" == true) {
                    return true;
                }
                else {
                    alert('Bạn phải đăng nhập trước khi bình luận');
                    return false;
                }
            }

            function check_muahang() {
                if("<?php echo $so_san_pham ?>" == 0) {
                    alert("Sản phẩm đã hết hàng. Vui lòng chọn sản phẩm khác");
                    return false;
                }
                if("<?php echo isset($_SESSION['arr_user']) ?>" == true) {
                    return true;
                }
                else {
                    alert('Bạn phải đăng nhập trước khi mua hàng');
                    return false;
                }
            }

            function check_them() {
                if("<?php echo $so_san_pham ?>" == 0) {
                    alert("Sản phẩm đã hết hàng. Vui lòng chọn sản phẩm khác");
                    return false;
                }
                if("<?php echo isset($_SESSION['arr_user']) ?>" == true) {
                    return true;
                }
                else {
                    alert('Bạn phải đăng nhập trước khi thêm vào giỏ hàng');
                    return false;
                }
            }

    </script>
</body>
</html>