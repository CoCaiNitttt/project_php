<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.min.css">
    <title>Tìm kiếm sản phẩm</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .frame_search_product{
            width: 100%;
        }
        .frame_search_product_body{
            display: flex;
            justify-content:space-between;
            margin-top: 150px;
            border: 2px solid red;
            width: 80%;
            margin-left: 10%;
            border-radius: 20px;
        }
        .frame_search_product_body .body_right{
            width: 100%;
            margin-bottom: 20px;
        }
        .frame_search_product_body .body_left .body_left_top table tr th:hover{
            background-color:antiquewhite;
            cursor: pointer;
        }
        .frame_search_product_body .body_left .body_left_top table a{
            text-decoration: none;
            color: black;
        }
        .frame_search_product_body .body_right table{
            width: 100%;
        }
        .frame_search_product_body .body_right table caption{
            background: goldenrod;
            color: white;
            height: 40px;
            border-top-right-radius: 18px;
            border-top-left-radius: 18px;
        }
        .frame_search_product_body .body_right table caption .body_caption{
            display: flex;
            justify-content: space-between;        }
        .frame_search_product_body .body_right table caption .body_caption div{
            margin-left: 20px;
            margin-top: 10px;
            display: flex;
            align-items: center;
            margin-bottom: -10px;
        }
        .frame_search_product_body .body_right table caption .body_caption h3{
            margin: 0 5px;
        }
        .frame_search_product_body .body_right table caption .body_caption .search_condition{
            display: flex;
            margin-top: 10px;
            margin-right: 40px;
            margin-top: -13px;
        }
        .frame_search_product_body .body_right table caption .body_caption .search_condition .select_condition_select select{
            width: 160px;
            height: 22px;
            margin-left: 20px;
        }
        .frame_search_product_body .body_right .body_right_product_x .product_image{
            border: 1px solid red;
            padding: 10px 0;
            border-radius: 20px;
        }
        .frame_search_product_body .body_right .body_right_product_x .product_image img{
            width: 150px;
            height: 180px;
            margin-left: 35px;
            transition: 0.3s;
        }
        .frame_search_product_body .body_right .body_right_product_x .product_image img:hover{
            scale: 1.06;
            cursor: pointer;
        }
        .frame_search_product .body_right .body_right_product_x {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            margin-left: 5%;
            min-height: 400px;
        }
        .frame_search_product .body_right .body_right_product_x .frame_product{
            width: 220px;
            margin-top: 20px;
        }
        .frame_search_product .body_right .body_right_product_x .frame_product{
            margin-left: 50px;
        }
        .frame_search_product .body_right .body_right_product_x .frame_product .product .product_discount{
            position: absolute;
            font-size: 12px;
            margin-top: -40px;
            background: red;
            width: 140px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .product_discount i{
            margin-left: -5px;
            margin-right: 4px;
        }
        .frame_search_product .body_right .body_right_product .frame_product .product_name{
            margin-top: 5px;
            margin-bottom: 8px;
        }
        .button{
            display: flex;
            justify-content: center;
            margin-top: 49px;
        }
        .button button{
            height: 20px;
            width: 30px;
            margin: 5px;
        }
        .button button a{
            text-decoration: none;
        }
        .icon{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .icon .fa-sharp{
            font-size: 200px;
            margin-top: 110px;
            margin-right: 150px;
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
    $tensp = '';
    if(isset($_GET['info'])) {
        $tensp = $_GET['info'];
    }
    else if(isset($_GET['infos'])) {
        $tensp = $_GET['infos'];
    }
    $sapxep = 0;
    if(isset($_GET['sapxep'])){
        $sapxep = $_GET['sapxep'];
    }
    $so_san_pham_tren_moi_trang = 12;
    $offset = ($trang_hien_tai - 1) * $so_san_pham_tren_moi_trang;
    
    $sql_tong_so_san_pham = "select count(*) from sanpham where TenSP like '%$tensp%'";
    $mang_so_san_pham = mysqli_query($connect, $sql_tong_so_san_pham);
    $ket_qua_san_pham = mysqli_fetch_array($mang_so_san_pham);
    $tong_so_san_pham = $ket_qua_san_pham['count(*)'];
    $so_trang = ceil($tong_so_san_pham / $so_san_pham_tren_moi_trang);

    if($tensp == '') {
        $so_san_pham = 0;
    }
    else {
        $so_san_pham = $tong_so_san_pham;
    }

    if($sapxep == 0) {
        $sql = "select * from sanpham
        where TenSP like '%$tensp%'
        order by 'id' ASC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '1') {
        $sql = "select * from sanpham
        where TenSP like '%$tensp%'
        order by SoLuongMua DESC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '4') {
        $sql = "select * from sanpham
                inner join giasanpham
                on sanpham.id = giasanpham.sanpham_id
                where sanpham.TenSP like '%$tensp%'
                order by giasanpham.GiaBan ASC
                limit $so_san_pham_tren_moi_trang
                offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '5') {
        $sql = "select * from sanpham
                inner join giasanpham
                on sanpham.id = giasanpham.sanpham_id
                where sanpham.TenSP like '%$tensp%'
                order by giasanpham.GiaBan DESC
                limit $so_san_pham_tren_moi_trang
                offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '6') {
        $sql = "select * from sanpham
        where TenSP like '%$tensp%'
        order by NgayTao ASC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    else if($sapxep == '7') {
        $sql = "select * from sanpham
        where TenSP like '%$tensp%'
        order by NgayTao DESC
        limit $so_san_pham_tren_moi_trang
        offset $offset";
        $kq = mysqli_query($connect, $sql);
    }
    


    ?>
    <div class="frame_search_product">
        <div class="frame_all_product_header">
            <?php include 'header.php' ?>
        </div>
        <div class="frame_search_product_body">
            <div class="body_right">
                <table>
                    <caption>
                        <div class="body_caption">
                            <?php if($so_san_pham != 0) { ?>
                                <div>Tìm thấy <h3> <?php echo $so_san_pham ?></h3> kết quả với từ khoá <h3> "<?php echo $tensp ?>"</h3></div>
                            <div class="search_condition">
                                <div class="search_condition_title">
                                    Sắp xếp theo:
                                </div>
                                <div class="select_condition_select">
                                    <select name="select_arrange" id="arrange" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                        <option value="">Lựa chọn sắp xếp</option>
                                        <option value="?sapxep=1&&infos=<?php echo $tensp?>">Bán chạy nhất</option>
                                        <option value="?sapxep=4&&infos=<?php echo $tensp?>">Giá tăng dần</option>
                                        <option value="?sapxep=5&&infos=<?php echo $tensp?>">Giá giảm dần</option>
                                        <option value="?sapxep=6&&infos=<?php echo $tensp?>">Mới nhất</option>
                                        <option value="?sapxep=7&&infos=<?php echo $tensp?>">Cũ nhất</option>
                                    </select>
                                </div>
                            </div>
                            <?php } 
                            else {?>
                            <p style="color: white; margin-top: 10px; margin-left: 20px;">Hãy nhập lại tên sản phẩm bạn muốn tìm kiếm</p>
                            <?php } ?>
                        </div>
                    </caption>
                </table>
                <div class="body_right_product_x">
                <?php
                if($so_san_pham != 0) {
     foreach($kq as $value){
    ?>
   
        <div class="frame_product">
        <div class="product">
            <div class="product_image">
                <a href="product_detail.php?id=<?php echo $value['id'] ?>"><img src="/image/<?php echo $value['Avatar'] ?>" alt=""></a>
                <?php if($value['GiaGiam'] != 0) { ?>
                    <div class="product_discount">
                    <?php
                    //$giam = 100 - (100 * $value['GiaBan']) / $value['Gia']; echo "<i>Giảm: </i>".$giam."%";
                        echo "<i>Giảm: </i>" . $value['GiaGiam'];
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
                <h3 style="color:red"><?php $gia_ban = $value['Gia'] - $value['GiaGiam']; echo number_format($gia_ban, 0, '.', '.')." đ"?> <b style="text-decoration: line-through; color:gray; font-size: 13px; opacity: 0.5;"><?php echo number_format($value['Gia'], 0, '.', '.')."đ" ?></b></h3>
            <?php }
            else { ?>
                <h3 style="color:red"><?php echo number_format($value['Gia'], 0, '.', '.')." đ" ?></h3>
            <?php } ?>
        </div>
        </div>
        <?php
            }
        }
            else {
             ?>
            <div class="icon">
            <i style="color: red;" class="fa-sharp fa-regular fa-eye-slash"></i>
            </div>
             <?php }?>
    </div>
                    
                
                
     <?php if($so_san_pham != 0) { ?>          
    <div class="button">
    <?php
    for($i = 1; $i <= $so_trang; $i++) {
    ?>
    
    <button><a href="?trang=<?php echo $i?>&&sapxep=<?php echo $sapxep ?>&&info=<?php echo $tensp ?>">
        <?php echo $i ?>
    </a></button>
        <?php }?>
    </div>
    <?php } ?>

   
                </div>
            </div>
        <div class="footer">
            <?php include 'footer.php' ?>
        </div>
    </div>
    <?php 
    // $sql_sanpham = "select * from sanpham";
    // $ketqua = mysqli_query($connect, $sql_sanpham);
    // $sql_xoa = "delete from giasanpham";
    // mysqli_query($connect, $sql_xoa);
    // foreach($ketqua as $value) {
    //     $giaban = $value['Gia'] - $value['GiaGiam'];
    //     $id_sanpham = $value['id'];
    //     $sql_gia_sanpham = "insert into giasanpham(GiaBan, sanpham_id) values('$giaban', '$id_sanpham')";
    //     mysqli_query($connect, $sql_gia_sanpham);
    // };
    mysqli_close($connect) ?>
</body>
</html>