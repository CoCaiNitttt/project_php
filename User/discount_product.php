<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .frame_discount_product{
            width: 80%;
            border: 1px solid red;
            display: flex;
            justify-content: center;
            margin-left: 10%;
            border-radius: 20px;
            margin-top: 20px;
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
            margin-left: 12px;
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
    include 'connect.php';
    $sql = "select * from sanpham
            order by GiaGiam DESC
            limit 5";
    $ket_qua = mysqli_query($connect, $sql);
    ?>
    <div class="frame_discount_product">
        <table>
            <caption><h1>GIẢM SỐC</h1></caption>
            <tr>
                <?php foreach($ket_qua as $value) { ?>
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
                    <div style="margin-bottom: 5px;font-size: 14px;margin-top: 10px;" class="product_name">
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
    <?php mysqli_close($connect) ?>
</body>
</html>