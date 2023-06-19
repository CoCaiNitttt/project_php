<?php
$id = $_POST['id'];
include 'connect.php';
$sql = "delete from user where id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: customer.php");
?>