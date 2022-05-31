<?php
session_start();
include "lib/connection.php";
$id = $_SESSION["user_id"];
$result = mysqli_query($conn, "SELECT SUM(giatong) AS value_sum FROM giohang where id = $id"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$b = number_format($sum,0,'.','.'); 
echo "$b";
?>