<?php
if (isset($_SESSION['user_id']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: ../login/dangnhap.php');
}else {
	if (isset($_SESSION['user_id']) == true) {
		// Ngược lại nếu đã đăng nhập
		$thanhvien = $_SESSION['thanhvien'];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($thanhvien != '2') {
			echo "<script language='javascript'>location.href='../index.php';</script>";
		}
	}
}
?>