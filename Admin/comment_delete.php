<?php
$id = $_POST['id'];
include 'connect.php';
$sql = "delete from comment where id_c = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("location: comment.php");
?>