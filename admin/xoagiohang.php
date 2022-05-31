<?php
require_once '../lib/connection.php';
if(isset($_GET["stt"]))
{

    $key=$_GET["stt"];
    

}
    $sll="delete from giohang where stt=".$_GET["stt"];
//if(mysql_query($sl))
if(mysqli_query($conn,$sll))

{
    echo "<script language='javascript'>alert('Xoá thành công');";
        echo "location.href='thongtintv.php';</script>";
}


?>