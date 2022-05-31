<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chỉnh sửa thông tin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.container {
    width: 30%;
    margin: auto;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
    input{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
	</style>
</head>
<body>
		<?php 
		include("../lib/connection.php");

		if(isset($_GET['id'])){
		$sql="select * from users where id=".$_GET['id'];}
		$data = mysqli_fetch_array(mysqli_query($conn,$sql));
        
		?>
<div class="container">
	<H2>CHỈNH SỬA THÔNG TIN</h2>
    <form action="" enctype="multipart/form-data" method="post">
        <label>Mã thành viên</label>
        <input type="text"  value="<?php echo $data['id'];?>" disabled>
 
        <label>Họ và tên</label>
        <input type="text" name="fullname" value="<?php echo $data['fullname'];?>">
 
        <label>Tài khoản</label>
        <input type="text" name="username" value="<?php echo $data['username'] ?>" disabled>
 
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $data['email'] ?>">
        <label>Số điện thoại</label>
        <input type="number" name="phone" value="<?php echo $data['phone'] ?>">
		<label>Quyền/Chức vụ</label>
        <select style="width: 150px; border-radius : 10px; height: 30px" name="thanhvien">
			<option value="1">Người dùng</option>
			<option value="2">Quản trị viên</option>
		</select><br>
        <label>Số dư</label>
        <input type="number" name="money" value="<?php echo $money ?>">	
				
        <button class="btn btn-success" name="btn_submit">Chỉnh sửa</button>
        <a href="dashboard.php" class="btn btn-primary">Trang chủ</a>
    </form>
</div>

<?php
if (isset($_POST['btn_submit'])) {
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];	
$thanhvien = $_POST['thanhvien'];
$money = $_POST['money'];

		if(isset($_GET["id"]))   
			{
			 $key = $_GET["id"];
			}

$sl="update users set fullname='$fullname',email='$email',phone='$phone',thanhvien='$thanhvien', money='$money' where id='$key'";
if(mysqli_query($conn, $sl))
{
	echo "<script language='javascript'>alert('Sửa thành công');";
		echo "location.href='dashboard.php';</script>";
}
	}
?>
</body>
</html>