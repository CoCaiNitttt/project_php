<?php 
include 'header.php';
include 'ThongKeBanHang.php';
if(isset($_SESSION['arr_admin'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>Trang Chủ</title>
    <style>
        .frame_menu table .trangchu{
            background: black;
        }
        .body{
            display: flex;
            justify-content: space-between;
        }
        .body_right{
            width: 74%;
            border: 1px solid red;
            margin: 20px 45px;
            height: 100%;
            border-radius: 10px;
        }
        .body_right_top{
            display: flex;
            justify-content:space-around;
        }
        .body_right .body_right_top .body_right_top_sanpham,
        .body_right .body_right_top .body_right_top_donhang,
        .body_right .body_right_top .body_right_top_tintuc,
        .body_right .body_right_top .body_right_top_binhluan
        {
            height: 150px;
            display: flex;
            align-items: center;
            background: rgba(1, 1, 1, 0.3);
            width: 240px;
            border-radius: 15px;
            margin-top: 20px;
        }
        .body_right .body_right_top .icon{
            margin-left: 10px;
        }
        .body_right .body_right_top .icon i{
            font-size: 80px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <?php
    include 'connect.php';
    $sql_tong_so_sp = "select count(*) from sanpham";
    $mang_so_sp = mysqli_query($connect, $sql_tong_so_sp);
    $ket_qua_sp = mysqli_fetch_array($mang_so_sp);
    $tong_so_sp = $ket_qua_sp['count(*)'];

    $sql_tong_so_dh = "select count(*) from donhang";
    $mang_so_dh = mysqli_query($connect, $sql_tong_so_dh);
    $ket_qua_dh = mysqli_fetch_array($mang_so_dh);
    $tong_so_dh = $ket_qua_dh['count(*)'];

    $sql_tong_so_sp = "select count(*) from sanpham";
    $mang_so_sp = mysqli_query($connect, $sql_tong_so_sp);
    $ket_qua_sp = mysqli_fetch_array($mang_so_sp);
    $tong_so_sp = $ket_qua_sp['count(*)'];

    $sql_tong_so_cm = "select count(*) from comment";
    $mang_so_cm = mysqli_query($connect, $sql_tong_so_cm);
    $ket_qua_cm = mysqli_fetch_array($mang_so_cm);
    $tong_so_cm = $ket_qua_cm['count(*)'];
    ?>
    
    <div class="body">
        <div class="body_left">
            <?php include 'menu.php' ?>
        </div>
        <div class="body_right">
            <div class="body_right_top">
                <div class="body_right_top_sanpham">
                    <div class="icon">
                        <i class="fa-solid fa-mobile"></i>
                    </div>
                    <div class="content">
                        <div class="number">
                            <h2><?php echo $tong_so_sp ?></h2>
                        </div>
                        <div class="content">
                            <h3>Sản phẩm</h3>
                        </div>
                    </div>
                </div>
                <div class="body_right_top_donhang">
                    <div class="icon">
                        <i class="fa-solid fa-money-bill"></i>
                    </div>
                    <div class="content">
                        <div class="number">
                            <h2><?php echo $tong_so_dh ?></h2>
                        </div>
                        <div class="content">
                            <h3>Đơn hàng</h3>
                        </div>
                    </div>
                </div>
                <!-- <div class="body_right_top_tintuc">
                <div class="icon">
                <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <div class="content">
                        <div class="number">
                            <h3>99</h3>
                        </div>
                        <div class="content">
                            Tin tức
                        </div>
                    </div>
                </div> -->
                <div class="body_right_top_binhluan">
                <div class="icon">
                <i class="fa-solid fa-comment"></i>
                </div>
                    <div class="content">
                        <div class="number">
                            <h2><?php echo $tong_so_cm ?></h2>
                        </div>
                        <div class="content">
                            <h3>Bình luận</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body_right_bottom">
                <div class="thong_ke_doanh_thu">
                    <div id="chart" style=" margin-top: 100px;height: 250px; width: 100%"></div>
                </div>
                <div class="title" style="margin: 20px 0 20px 400px;">
                    <h2>Biểu đồ thống kê doanh thu</h2>
                </div>
            </div>
        </div>
    </div>
    <?php 
    
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2019', order: "<?php echo $arr2019[1] ?>", sales: "<?php echo $arr2019[0] ?>", quantity: "<?php echo $arr2019[2] ?>" },
    { year: '2020', order: "<?php echo $arr2020[1] ?>", sales: "<?php echo $arr2020[0] ?>", quantity: "<?php echo $arr2020[2] ?>" },
    { year: '2021', order: "<?php echo $arr2021[1] ?>", sales: "<?php echo $arr2021[0] ?>", quantity: "<?php echo $arr2021[2] ?>" },
    { year: '2022', order: "<?php echo $arr2022[1] ?>", sales: "<?php echo $arr2022[0] ?>", quantity: "<?php echo $arr2022[2] ?>" },
    { year: '2023', order: "<?php echo $arr2023[1] ?>", sales: "<?php echo $arr2023[0] ?>", quantity: "<?php echo $arr2023[2] ?>" }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['order', 'sales', 'quantity'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Đơn hàng', 'Doanh Thu', 'Số lượng bán']
});
    </script>
</body>
</html>
<?php } else {
header("location: login.php");
}