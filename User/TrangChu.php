<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<body>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            min-height: 1200px;
        }
        
    </style>
    
    <div class="frame">
        <div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="banner">
                <?php include 'banner.php' ?>
            </div>
            <div class="discount_product">
                <?php include 'discount_product.php' ?>
            </div>
            <div class="banner3">
                <img style="width: 80%; border-radius: 20px; height: 200px;margin-left: 10%;margin-top: 20px;" src="/image/banner3.png" alt="">
            </div>
            <div class="featured_product">
                <?php include 'featured_product.php' ?>
            </div>
            <div class="banner2">
                <a href="http://localhost:3000/User/product_detail.php?id=69"><img style="width: 80%; height: 200px;margin-left: 10%;margin-top: 20px;border-radius: 20px;" src="/image/banner2.png" alt=""></a>
            </div>
            <div class="best_selling_product">
                <?php include 'best_selling_product.php' ?>
            </div>
        </div>
        <div class="footer">
            <?php include 'footer.php' ?>
        </div>
    </div>
</body>
</html>