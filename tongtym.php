<?php
session_start();
$id = $_SESSION["user_id"];
include "lib/connection.php";

$r = mysqli_fetch_array(mysqli_query($conn, "Select count('id') from yeuthich where iduser = '$id'"));

echo $r[0];

?>