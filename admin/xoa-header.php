<?php
require_once '../lib/connection.php';
if(isset($_GET["stt_delete"]))
{
    $key=$_GET["stt_delete"];

}
    $sl="delete from header where stt=".$_GET["stt_delete"];
//if(mysql_query($sl))
if(mysqli_query($conn,$sl))
{
    echo "<script language='javascript'>alert('Xoá thành công');";
        echo "location.href='list-header.php';</script>";
}
?>