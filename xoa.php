<?php
include ( "lib/connection.php" );
if ( isset( $_GET[ "id" ] ) ) {
    $key = $_GET[ "id" ];

}
$sl = "delete from giohang where stt=" . $_GET[ "id" ];
//if(mysql_query($sl))
if ( mysqli_query ( $conn , $sl ) ) {
    echo "<script language='javascript'>alert('Xoá thành công');";
    echo "location.href='thanh-toan.php';</script>";
}
?>
