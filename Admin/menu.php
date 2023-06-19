<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.css">
    <title>Document</title>
    <style>
        .frame_menu{
            font-size: 18px;
            width: 300px;
            height: 650px;
            background:dimgrey;
        }
        .frame_menu table{
            width: 100%;
            text-align: left;
        }
        .frame_menu table tr{
            height: 40px;
        }
        .frame_menu table .x:hover{
            background: black;
        }
        a{
            text-decoration: none;
            color: white;
        }
        .frame_menu i{
            width: 40px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="frame_menu">
        <table>
            <tr><th>
                
            </th></tr>
            <tr><th></th></tr>
            <tr>
                <th class="trangchu x"><i class="fa-solid fa-house"></i><b><a href="TrangChu.php"> Trang chủ quản trị</a></b></th>
            </tr>
            <tr>
                <th class="quanlycuahang"><h4>Quản lý cửa hàng</h4></th>
            </tr>
            <tr class="sanpham x">
                <th><i class="fa-solid fa-mobile"></i><b><a href="product.php"> Sản phẩm</a></b></th>
            </tr>
            <tr>
                <th class="magiamgia x"><i class="fa-solid fa-hourglass-start"></i><b><a href="discount_code.php"> Mã giảm giá</a></b></th>
            </tr>
            <tr>
                <th class="nhacungcap x"><i class="fa-solid fa-truck-field"></i><b><a href="supplier.php"> Nhà cung cấp</a></b></th>
            </tr>
            <tr>
                <th class="quanlybanhang"><h4> Quản lý bán hàng</h4></th>
            </tr>
            <tr>
                <th class="comment x"><i class="fa-solid fa-newspaper"></i><b><a href="comment.php"> Bình luận</a></b></th>
            </tr>
            <tr>
                <th class="donhang x"><i class="fa-solid fa-money-bill"></i><b><a href="order.php"> Đơn hàng</a></b></th>
            </tr>
            <tr>
                <th class="khachhang x"><i class="fa-regular fa-user"></i><b><a href="customer.php"> Khách hàng </a></b></th>
            </tr>
        </table>
    </div>
</body>
</html>