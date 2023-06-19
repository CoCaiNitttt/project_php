<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .frame_featured_product{
            width: 80%;
            border: 1px solid red;
            display: flex;
            justify-content: center;
            margin-left: 10%;
            border-radius: 20px;
            margin-top: 20px;
        }
        .frame_featured_product .featured_product{
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
        .frame_featured_product .featured_product .frame_product{
            width: 238px;
        }
        .frame_featured_product img{
            width: 120px;
            height: 150px;
            margin-left: 16px;
            transition: 0.3s;
        }
        .frame_featured_product img:hover{
            scale: 1.06;
        }
        .frame_featured_product .featured_product .product_discount{
            position: absolute;
            background-color: red;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            font-size: 12px;
        }
        .frame_featured_product .featured_product .frame_product .product_name{
            width: 200px;
        }
        .frame_product{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .body{
            width: 100%;
        }
        .header_featured_product{
            width: 100%;
            height: 60px;
            background: orange;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            margin-bottom: 30px;
        }
        .header_featured_product table{
            width: 100%;            
        }
        .header_featured_product table caption{
            text-align: left;
            margin-left: 30px;
            margin-top: 10px;
        }
        .product_discount i{
            margin-right: 5px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <?php
    include 'connect.php';
    $sql = "select * from sanpham
            order by level DESC
            limit 15";
    $ket_qua = mysqli_query($connect, $sql);
    ?>
    <div class="frame_featured_product">
        <div class="body">
        <div class="header_featured_product">
            <table>
                <caption><h1>SẢN PHẨM NỔI BẬT</h1></caption>
            </table>
        </div>
    <div class="featured_product">
                    <?php
                    foreach($ket_qua as $value){
                    $giaban = $value['Gia'] - $value['GiaGiam'];
                    ?>
                   <div class="frame_product">
                       
                            <div class="product_image" style="border: 1px solid red;width: 90%;margin-left: 10%;padding: 8px 0;border-radius: 20px;">
                                <a href="product_detail.php?id=<?php echo $value['id'] ?>"><img style="margin-left: 45px;" src="/image/<?php echo $value['Avatar'] ?>" alt=""></a>
                            </div>
                            <?php if($value['GiaGiam'] != 0) { ?>
                            <div class="product_discount" style="width: 150px; color: white;margin-top: 10px;margin-left: -40px;height: 18px;">
                                <div style="margin-top: 2px;">
                                <?php
                                    echo "<i>Giảm: </i>" . number_format($value['GiaGiam'], 0, '.', '.')."đ" ;
                                ?>
                                </div>
                            </div>
                            <?php } ?>
                        <div style="font-size: 14px;width: 90%; margin-top: 10px;margin-left: 20px;" class="product_name">
                            <h4 style="width: 100%;"><?php echo $value['TenSP'] ?></h4>
                        </div>
                        <div style="font-size: 14px; margin:10px 0 20px 20px;" class="product_price">
                            <?php if($value['GiaGiam'] != 0) { ?>
                            <h3 style="color:red"><?php echo number_format($giaban, 0, '.', '.')."đ"  ?> <b style="text-decoration: line-through; color:gray; font-size: 15px; opacity: 0.5;margin-left: 10px;"><?php echo number_format($value['Gia'], 0, '.', '.')."đ" ?></b></h3>
                            <?php }
                            else { ?>
                                <h3 style="color:red"><?php echo number_format($value['Gia'], 0, '.', '.')."đ"  ?></h3>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>          
        </div>
    </div>
    <?php mysqli_close($connect) ?>
</body>
</html>