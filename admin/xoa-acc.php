<?php
require_once '../lib/connection.php';
if(isset($_GET["maacc_delete"]))
{

    $key=$_GET["maacc_delete"];
    

}
    $sll="delete from acc where maacc=".$_GET["maacc_delete"];
//if(mysql_query($sl))
if(mysqli_query($co,$sll))

{
    echo "<script language='javascript'>alert('Xoá thành công');";
        echo "location.href='list-acc.php';</script>";
}


?>
<?php
if(isset($_GET["stt"]))
{
    $id = $_GET["id"];
    $sll="delete from accdamua where stt=".$_GET["stt"];

if(mysqli_query($co,$sll))

{
    echo "<script language='javascript'>alert('Xoá thành công');";
        echo "location.href='accdamua.php?id=$id';</script>";
}
}

?>
<?php
if(isset($_GET["binhluan"]))
{
    $binhluan = $_GET["binhluan"];
    $sql="delete from binhluan where stt=".$_GET["binhluan"];

if(mysqli_query($co,$sql))

{
    echo "<script language='javascript'>alert('Xoá thành công');";
        echo "location.href='list-binhluan.php';</script>";
}
}

?>
