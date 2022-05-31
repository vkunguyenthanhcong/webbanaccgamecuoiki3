<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Huong Dan tao trang dang ki/Dang Nhap</title>';
if (session_destroy())
echo "Thoát thành công!";
else
echo "KO thể thoát dc, có lỗi trong việc hủy session";

header('Location: ../index.php');
?>