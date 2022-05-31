<?php 

include "lib/connection.php";
$stt = $_GET["stt"];
$ketqua = mysqli_fetch_array(mysqli_query($conn, "DELETE from giohang where stt = '$stt'"));

?>