<?php
require_once '../lib/connection.php';
if(isset($_GET["id_delete"]))
{

    $key=$_GET["id_delete"];
    

}
    $sll="delete from phukien where masp=".$_GET["id_delete"];
//if(mysql_query($sl))
if(mysqli_query($co,$sll))

{
    echo "<script language='javascript'>alert('Xoá thành công');";
        echo "location.href='list-phukien.php';</script>";
}


?>