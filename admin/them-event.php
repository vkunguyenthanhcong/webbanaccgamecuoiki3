<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm event</title>
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
<div class="container">
	<h3>THÊM EVENT</h3>
	<form action="" method="post" enctype="multipart/form-data"><br>
		<label>Tên event</label>
		<input type="text" name="ten">
		<label>Số lượng</label>
		<input type="number" name="soluong">
		<label>Link</label>
		<input type="text" name="link">
		<input type="file" name="image" id="anh" /><br>
		<button class="btn btn-success" type="submit" name="btn_submit">Thêm</button>
		<button class="btn btn-success" type="reset" >Reset</button>
	</form>
</div>
<?php //ob_start();
if (isset($_POST['btn_submit'])){
	include_once('../lib/connection.php');
		// upload hinh anh	
	$icon=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"../photo/".$icon);

	$ten = $_POST['ten'];
	$soluong = $_POST['soluong'];
	$link = $_POST['link'];
	
	$sl = "insert into event (ten,soluong,link,image,createdate) Value('$ten','$soluong','$link','$icon', now())";

	if(mysqli_query($conn,$sl))
	{
		echo "<script language='javascript'>alert('Thêm thành công');";
		echo "location.href='dashboard.php';</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error($conn);
	}
	}
	?>
</body>
</html>