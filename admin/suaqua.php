<?php
if(isset($_GET["suaqua_delete"])){
    include "../lib/connection.php";
    $sql = "DELETE FROM quavongquay WHERE id = ".$_GET["suaqua_delete"];
    mysqli_query ($conn, $sql);

    echo "<script>window.location='dashboard.php'</script>";
}