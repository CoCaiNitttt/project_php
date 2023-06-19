<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <style>
        .frame_all_product{
            width: 100%;
        }
        .frame_all_product_body{
            display: flex;
            justify-content:space-between;
            margin-top: 150px;
            width: 80%;
            margin-left: 10%;
            /* background: #cccc; */
        }
        .frame_all_product_body .body_left{
            width: 25%;
        }
        .frame_all_product_body .body_left .body_left_top, .frame_all_product_body .body_left .body_left_bottom{
            border: 1px solid black;
            width: 100%;
            margin-bottom: 20px;
        }
        .frame_all_product_body .body_left .body_left_top table, .frame_all_product_body .body_left .body_left_bottom table{
            width: 100%;
            text-align: left;
        }
        .frame_all_product_body .body_left .body_left_top table caption,  .frame_all_product_body .body_left .body_left_bottom table caption{
            background: blue;
            color: white;
            text-align: left;
            height: 40px;
        }
        .frame_all_product_body .body_left .body_left_top table caption h4, .frame_all_product_body .body_left .body_left_bottom table caption h4{
            margin-left: 40px;
            margin-top: 10px;
        }
        .frame_all_product_body .body_left .body_left_bottom table .frame_product_hot .product_hot{
            margin-bottom: 20px;
            margin-top: 10px;
            display: flex;
        }
        .frame_all_product_body .body_left .body_left_bottom table .frame_product_hot .product_hot img:hover{
            cursor: pointer;
            transition: 0.3s;
        }
        .frame_all_product_body .body_left .body_left_bottom table .frame_product_hot .product_hot .product_image_hot img{
            height: 120px;
            width: 100px;
        }
        .frame_all_product_body .body_left .body_left_bottom table .frame_product_hot .product_info
        .frame_all_product_body .body_left .body_left_top table{
            width: 100%;
        }
        .frame_all_product_body .body_left .body_left_bottom table .frame_product_hot  .product_hot .product_discount_hot{
            position: absolute;
            margin-top: 100px;
            margin-left: -113px;
            font-size: 10px;
            background: red;
            color: white;
            width: 90px;
            height: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .frame_all_product_body .body_left .body_left_bottom table .frame_product_hot .product_hot .product_hot_info .product_name_hot{
            margin-left: 20px;
            margin-top: 20px;
            font-size: 12px;
            height: 30px;
        }
        .frame_all_product_body .body_left .body_left_bottom table .frame_product_hot .product_hot .product_hot_info .product_price_hot{
            font-size: 14px;
            margin-left: 20px;
            margin-top: 20px;
        }
        .frame_all_product_body .body_left .body_left_top table th{
            height: 30px;
            text-align: left;
            padding-left: 15px;
        }
        .frame_all_product_body .body_right{
            width: 72%;
            border: 1px solid black;
            margin-bottom: 20px;
            border-radius: 20px;
        }
        .frame_all_product_body .body_left .body_left_top table tr th:hover{
            background-color:antiquewhite;
            cursor: pointer;
        }
        .frame_all_product_body .body_left .body_left_top table a{
            text-decoration: none;
            color: black;
        }
        .frame_all_product_body .body_right table{
            width: 100%;
        }
        .frame_all_product_body .body_right table caption{
            background: goldenrod;
            color: white;
            height: 40px;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
        }
        .frame_all_product_body .body_right table caption .body_caption{
            display: flex;
            justify-content: space-between;
        }
        .frame_all_product_body .body_right table caption .body_caption h3{
            margin-left: 20px;
            margin-top: 10px;
        }
        .frame_all_product_body .body_right table caption .body_caption .search_condition{
            display: flex;
            margin-top: 10px;
            margin-right: 40px;
        }
        .frame_all_product_body .body_right table caption .body_caption .search_condition .select_condition_select select{
            width: 160px;
            height: 22px;
            margin-left: 20px;
        }
        .frame_all_product_body .body_right .body_right_product .product_image{
            border: 1px solid red;
            padding-left: 20px;
            border-radius: 20px;
            padding-top: 4px;
        }
        .frame_all_product_body .body_right .body_right_product .product_image img{
            width: 150px;
            height: 180px;
            transition: 0.3s;
            padding: 5px;
            margin-left: 15px;
        }
        .frame_all_product_body img:hover{
            scale: 1.06;
            cursor: pointer;
        }
        .frame_all_product .body_right .body_right_product {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            margin-left: 5%;
        }
        .frame_all_product .body_right .body_right_product .frame_product{
            width: 220px;
            margin-top: 20px;
        }
        .frame_all_product .body_right .body_right_product .frame_product{
            margin-left: 50px;
        }
        .frame_all_product .body_right .body_right_product .frame_product .product .product_discount{
            position: absolute;
            font-size: 12px;
            margin-top: -40px;
            background: red;
            width: 150px;
            height: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            margin-left: -20px;
            color: white;
        }
        .frame_all_product .body_right .body_right_product .frame_product .product .product_discount i{
            margin-right: 6px;
        }
        .frame_all_product .body_right .body_right_product .frame_product .product_name{
            margin-top: 5px;
            margin-bottom: 8px;
        }
        .button{
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .button button{
            height: 20px;
            width: 30px;
            margin: 5px;
        }
        .button button a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    include 'connect.php';
    $trang_hien_tai = 1;
    if(isset($_GET['trang'])) {
        $trang_hien_tai = $_GET['trang'];
    }
    $tenloai = '';
    if(isset($_GET['tenloai'])) {
        $tenloai = $_GET['tenloai'];
    }
    $sapxep = 0;
    if(isset($_GET['sapxep'])){
        $sapxep = $_GET['sapxep'];
    }
    $so_san_pham_tren_moi_trang = 12;
    $offset = ($trang_hien_tai - 1) * $so_san_pham_tren_moi_trang;
    
    $sql_tong_so_san_pham = "select count(*) from sanpham where TenSP like '%$tenloai%'";
    $mang_so_san_pham = mysqli_query($connect, $sql_tong_so_san_pham);
    $ket_qua_san_pham = mysqli_fetch_array($mang_so_san_pham);
    $tong_so_san_pham = $ket_qua_san_pham['count(*)'];
    $so_trang = ceil($tong_so_san_pham / $so_san_pham_tren_moi_trang);

    if($sapxep == 0) {
        $sql = "select * from sanpham
        where TenSP like '%$tenloai%'
        order by 'id' ASC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '1') {
        $sql = "select * from sanpham
        order by SoLuongMua DESC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '2') {
        $sql = "select * from sanpham
        order by TenSP ASC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '3') {
        $sql = "select * from sanpham
        order by TenSP DESC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '4') {
        $sql = "select * from sanpham
                order by GiaBan ASC
                limit $so_san_pham_tren_moi_trang
                offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '5') {
        $sql = "select * from sanpham
                order by GiaBan DESC
                limit $so_san_pham_tren_moi_trang
                offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '6') {
        $sql = "select * from sanpham
        order by NgayTao ASC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '7') {
        $sql = "select * from sanpham
        order by NgayTao DESC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    


    ?>
    <div class="frame_all_product">
        <div class="frame_all_product_header">
            <?php  ?>
        </div>
        <div class="frame_all_product_body">
            <div class="body_left">
                <div class="body_left_top">
                    <table>
                        <caption><h4>DANH MỤC SẢN PHẨM</h4></caption>
                        <?php
                        $sql_loaisp = "select * from loaisanpham";
                        $kq_loaisp = mysqli_query($connect, $sql_loaisp);
                        foreach($kq_loaisp as $loaisp) {
                        ?>
                        <tr><th><a href="?tenloai=<?php echo $loaisp['TenLoai'] ?>"><?php echo $loaisp['TenLoai'] ?></a></th></tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="body_left_bottom">
                    <table>
                        <caption><h4>SẢN PHẨM KHUYẾN MẠI</h4></caption>
                        <?php 
                    $kq_sp_khuyen_mai = mysqli_query($connect, "select * from sanpham order by GiaGiam DESC limit 5");
                    foreach($kq_sp_khuyen_mai as $value) {
                    ?>
                    <tr>
                        <th>
                        <div class="frame_product_hot">
        <div class="product_hot">
            <div class="product_image_hot" style="border: 1px solid red; border-radius: 10px;padding: 6px;">
                <a href="product_detail.php?id=<?php echo $value['id'] ?>"><img src="/image/<?php echo $value['Avatar'] ?>" alt=""></a>
            </div>
            <div class="product_hot_info">
            <div class="product_discount_hot">
                <?php
                //$giam = 100 - (100 * $value['GiaBan']) / $value['Gia']; echo "<i>Giảm: </i>".$giam."%";
                if($value['GiaGiam'] != 0) {
                    echo "<i>Giảm: </i>" . number_format($value['GiaGiam'], 0, '.', '.')."đ" ;
                }
                ?>
            </div>
            <div class="product_name_hot">
                <?php echo $value['TenSP'] ?>
            </div>
            <div class="product_price_hot">
                <?php if($value['GiaGiam'] != 0) { ?>
                    <h3 style="color:red"><?php $gia_ban = $value['Gia'] - $value['GiaGiam']; echo number_format($gia_ban, 0, '.', '.')."đ"?> <b style="text-decoration: line-through; color:gray; font-size: 13px; opacity: 0.5;"><?php echo number_format($value['Gia'], 0, '.', '.')."đ" ?></b></h3>
                <?php }
                else { ?>
                <h3 style="color:red"><?php echo number_format($value['Gia'], 0, '.', '.')."đ" ?></h3>
                <?php } ?>
            </div>
            </div>
        </div>
        
        </div>
                        </th>
                    </tr>
                    <?php } ?>
                    </table>
                </div>
            </div>
            <div class="body_right">
                <table border="1">
                    <caption>
                        <div class="body_caption">
                            <h3>TẤT CẢ SẢN PHẨM</h3>
                            <div class="search_condition">
                                <div class="search_condition_title">
                                    Sắp xếp theo:
                                </div>
                                <div class="select_condition_select">
                                    <select name="select_arrange" id="arrange" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                        <option value="">Lựa chọn sắp xếp</option>
                                        <option value="?sapxep=1">Bán chạy nhất</option>
                                        <option value="?sapxep=2">A -> Z</option>
                                        <option value="?sapxep=3">Z -> A</option>
                                        <option value="?sapxep=4">Giá tăng dần</option>
                                        <option value="?sapxep=5">Giá giảm dần</option>
                                        <option value="?sapxep=6">Mới nhất</option>
                                        <option value="?sapxep=7">Cũ nhất</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </caption>
                </table>
                <div class="body_right_product">
                    <?php
                    foreach($kq as $value){
                    $giaban = $value['Gia'] - $value['GiaGiam'];
                    ?>
                   <div class="frame_product">
                        <div class="product">
                            <div class="product_image">
                                <a href="product_detail.php?id=<?php echo $value['id'] ?>"><img src="/image/<?php echo $value['Avatar'] ?>" alt=""></a>
                                <?php if($value['GiaGiam'] != 0) { ?>
                                <div class="product_discount">
                                    <?php
                                        echo "<i>Giảm: </i>" . number_format($value['GiaGiam'], 0, '.', '.')."đ" ;
                                    ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="product_name">
                            <h4><?php echo $value['TenSP'] ?></h4>
                        </div>
                        <div class="product_price">
                            <?php if($value['GiaGiam'] != 0) { ?>
                            <h3 style="color:red"><?php echo number_format($giaban, 0, '.', '.')."đ"  ?> <b style="text-decoration: line-through; color:gray; font-size: 15px; opacity: 0.5;"><?php echo number_format($value['Gia'], 0, '.', '.')."đ" ?></b></h3>
                            <?php }
                            else { ?>
                                <h3 style="color:red"><?php echo number_format($value['Gia'], 0, '.', '.')."đ"  ?></h3>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>          
    <div class="button">
    <?php
    for($i = 1; $i <= $so_trang; $i++) {
    ?>
    
    <button><a href="?trang=<?php echo $i?>&&tenloai=<?php echo $tenloai?>&&sapxep=<?php echo $sapxep ?>">
        <?php echo $i ?>
    </a></button>
        <?php }?>
    </div>
                </div>
            </div>
        </div>
        <div class="frame_all_product_footer">
            <?php include 'footer.php' ?>
        </div>
    </div>
    <?php mysqli_close($connect) ?>
</body>
</html>