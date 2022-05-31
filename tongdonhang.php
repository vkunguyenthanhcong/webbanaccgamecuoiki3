<!-- Code tổng số hàng -->
<?php
session_start();
include "lib/connection.php";
$id = $_SESSION["user_id"];
$tong=mysqli_fetch_array(mysqli_query($conn,"select count('id') from giohang where id = $id"));
echo "$tong[0]";
?>