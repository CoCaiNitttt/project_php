<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách hàng</title>
    <style>
        .frame_menu table .khachhang{
            background: black;
        }
        /* .frame_menu table .quanlybanhang{
            background: antiquewhite;
        } */
        .frame_customer .body{
            display: flex;
        }
        .frame_customer .body .body_right{
            width: 96%;
            margin-left: 2%;
        }
        .frame_customer .body .body_right_top{
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }
        .frame_customer .body .body_right_bottom table{
            width: 90%;
            margin-left: 5%;
            border-collapse: collapse;
        }
        .frame_customer .body .body_right_bottom table th{
            height: 30px;
        }
    </style>
</head>
<body>
    <?php
    include 'connect.php';
    $tranghientai = 1;
    if(isset($_GET['trang'])) {
        $tranghientai = $_GET['trang'];
    }
    $socode1Trang = 16;
    $offset = ($tranghientai - 1) * $socode1Trang;

    $sql_tong_so_code = "select count(*) from magiamgia";
    $mang_so_code = mysqli_query($connect, $sql_tong_so_code);
    $ket_qua_code = mysqli_fetch_array($mang_so_code);
    $tong_so_code = $ket_qua_code['count(*)'];

    $sotrang = ceil($tong_so_code / $socode1Trang);

    $sql_code = "select * from account where role = 0 limit $socode1Trang offset $offset";
    $kq = mysqli_query($connect, $sql_code);

    ?>
<div class="frame_customer">
<div class="header">
            <?php include 'header.php' ?>
        </div>
        <div class="body">
            <div class="body_left">
                <?php include 'menu.php' ?>
            </div>
            <div class="body_right">
                <div class="body_right_top">
                <div class="title">
                    <h2>Danh sách khách hàng</h2>
                </div>
                </div>
                <div class="body_right_bottom">
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Xem</th>
                            <th>Xoá</th>
                        </tr>
                        
                        <?php
                        $stt = 0;
                        foreach($kq as $value) {
                            $stt++;
                        ?>
                        <tr>
                            <th><?php echo $value['id'] ?></th>
                            <th><?php echo $value['HoTen'] ?></th>
                            <th><?php echo $value['Email'] ?></th>
                            <th><?php echo $value['SoDienThoai'] ?></th>
                            <th><a href="customer_detail.php?id=<?php echo $value['id'] ?>"><i style="color: black;" class="fa-solid fa-eye"></i></a></th>
                            <th>
                            <form action="customer_delete.php" method="post" onsubmit="return check()">
                                <input name="id" hidden type="text" value="<?php echo $value['id'] ?>">
                                <button style="border: none;cursor: pointer;" type="submit"><i style="color: black;" class="fa-sharp fa-solid fa-trash"></i></button>
                            </form>
                            </th>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div style="width: 100%; display: flex; justify-content: center; align-items: center;" class="button">
                <?php
            for($i = 1; $i <= $sotrang; $i++) { ?>
            <button style="height: 20px; width: 30px; margin-top: 10px; margin-right: 10px;">
                <a style="text-decoration: none;color: black;" href="customer.php?trang=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
            </button>
            <?php }
            ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function check() {
        if(confirm("Bạn có muốn xoá tài khoản này?") === true) {
            return true;
        }
        return false;
    }
</script>
<?php mysqli_close($connect) ?>
</body>
</html>