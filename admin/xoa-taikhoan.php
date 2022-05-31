<?php
require_once '../lib/connection.php';
if(isset($_GET["id_delete"]))
{
    $key=$_GET["id_delete"];

}
    $sl="delete from users where id=".$_GET["id_delete"];
//if(mysql_query($sl))
if(mysqli_query($conn,$sl))
{
    echo "<script language='javascript'>alert('Xoá thành công');";
        echo "location.href='list-taikhoan.php';</script>";
}


?>

