<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/icon/fontawesome-free-6.4.0-web/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .header{
            width: 100%;
            position: fixed;
            top: 0; 
            left: 0;
            padding: 20px 100px;
            align-items: center;
            background-color: red;
            height: 100px;
            z-index: 1;
        }
        .navigation{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navigation_left{
            width: 45%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navigation_right{
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navigation_right .search input{
            height: 30px;
            border-radius: 10px;
            width: 400px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        .navigation_right .search form button{
            position: absolute;
            background: red;
            font-size: 25px;
            width: 40px;
            border: none;
            color: white;
            margin-top: 2px;
            cursor: pointer;
        }
        .navigation_right .search a .icon_search{
            font-size: 45px;
            font-weight: 700;
            margin-left: 10px;
        }
        .navigation_right .cart .icon_cart{
            font-size: 25px;
            font-weight: 700;
            color: white;
        }
        .navigation a{
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 18px;
            cursor: pointer;
        }
        .navigation .button_login button{
            width: 90px;
            height: 35px;
            background: transparent;
            outline: none;
            border-radius: 8px;
            border: 2px solid white;
            font-size: 18px;
            font-weight: 700;
            color: white;
            cursor: pointer;
        }
        .navigation .button_login button:hover{
            background-color: antiquewhite;
            color:darkgreen
        }
        .setting_child{
            position: absolute;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            margin-left: -40px;
            background: red;
            border-radius: 10px;
            border: 1px solid black;
            display: none;
        }
        .header .navigation .navigation_right i:hover .setting_child{
            display: block;
        }
    </style>
    <div class="header_home">
    <div class="frame">
        <div class="header">
            <div class="navigation">
                <div class="navigation_left">
                <div class="logo">
                    <div class="img">
                    <img style="height: 50px; width: 50px; border-radius: 10px;" src="/image/logo.jpg" alt="">
                    </div>
                    <div style="color: white;" class="name">
                        <h2>SweetLemon</h2>
                    </div>
                </div>
                <a href="TrangChu.php">Trang Chủ</a>
                <a href="all_product.php">Sản Phẩm</a>
                <a href="new.php"></a>
                </div>
                <div class="navigation_right">
                <div class="search">
                    <form action="search_product.php" method="get">
                        <input type="text" name="info" id="input_product" placeholder="Nhập tên sản phẩm muốn tìm kiếm!">
                        <button type="submit">
                            <ion-icon class="icon_search" name="search-sharp"></ion-icon>
                        </button>
                    </form>
                </div>
                
                <div class="setting_user" style="color: white; width: 200px; margin-left: 60px;">
                <?php
                if(isset($_SESSION['arr_user'])) { $arr = $_SESSION['arr_user']; echo $arr['name']; ?>
                <a href="delete_session_user.php"><i style="margin-left: 10px; cursor: pointer;" class="fa-solid fa-right-from-bracket"></i></a>
                <?php }
                else { ?>
                <div class="button_login">
                    <a href="account_login.php"><button class="btn_login">
                    <ion-icon name="person"></ion-icon>
                    </button></a>
                </div>
                <?php } ?>
                </div>
                <div class="cart">
                <a href="cart_product.php"><ion-icon class="icon_cart" name="cart-outline"></ion-icon></a>
                </div>
                <?php
                if(isset($_SESSION['arr_user'])) { ?>
                    <div class="setting" style="width: 30px;position: absolute;margin-left: 700px;">
                <a href="update_info_user.php"><i style="color: white;" class="fa-sharp fa-solid fa-gear"></i></a>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>