<?php
include 'connect.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('Y/m/d H:i:s');
$comment = $_POST['comment'];
$id_product = $_POST['id_product'];
$id_account = $_POST['id_user'];
$sql = "insert into comment(content, id_product, id_account, date) values('$comment', '$id_product', '$id_account', '$date')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("refresh: 0.1; url = http://localhost:3000/User/product_detail.php?id=$id_product");
?>