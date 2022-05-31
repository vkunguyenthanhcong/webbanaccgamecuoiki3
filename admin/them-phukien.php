<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm phụ kiện</title>
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
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
	<form action="#" method="post" id="form" enctype="multipart/form-data">
		<h3>THÊM PHỤ KIỆN</h3>
	<label>Tên sản phẩm: </label><input type="text" id="tensp" name="tensp"><br>
	<label for="">Loại sản phẩm: </label><input id="loai" type="text" name="loai"><br>
	<label>Số lượng: </label><input type="text" id="soluong" name="soluong"><br>
	<label>Giá: </label><input type="text" name="gia" id="gia"><br>
	<label>Xuất xứ: </label><input type="text" name="xuatxu" id="xuatxu"><br>
	<label>Chất liệu: </label><input type="text" name="chatlieu" id="chatlieu"><br>
	<label>Mô tả sản phẩm: </label>
	<textarea name="mota" id="mota"></textarea>
                <script>
                        CKEDITOR.replace( 'mota' );
                </script>
	<input type="file" name="image" id="image" /><br>
	<button  class="btn btn-success" type="submit" name="btn_submit">Lưu</button>
	<button  class="btn btn-success" type="reset">Reset</button><br><br>
	<a href="../admin/dashboard.php" class="btn btn-success">Trang chủ</a>
</form>
</div>

</body>
<?php //ob_start();
if (isset($_POST['btn_submit'])){
	include_once('../lib/connection.php');
		// upload hinh anh	
	$icon=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"../photo/".$icon);

	$tensp = $_POST['tensp'];
	$loai = $_POST['loai'];
	$soluong = $_POST['soluong'];
	$gia = $_POST['gia'];
	$xuatxu = $_POST['xuatxu'];
$chatlieu = $_POST['chatlieu'];
$mota = $_POST['mota'];
	
	$sl = "insert into phukien (tensp,loai,soluong,gia,image,createdate,xuatxu,chatlieu,mota, ngaythem) Value('$tensp','$loai','$soluong','$gia','$icon', now(),'$xuatxu','$chatlieu', '$mota', Now())";

	if(mysqli_query($conn,$sl))
	{
		echo "<script>alert('Thêm thành công');</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error($conn);
	}
	}
	?>

</html>