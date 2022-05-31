<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm header</title>
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
	<form action="" method="post">
		<h3>THÊM HEADER</h3>
	<label>Tên: </label><input type="text" name="ten"><br>
	<label>Link: </label><input type="text" name="link"><br>
	<button class="btn btn-success" type="submit" name="btn_submit">Lưu</button>
	<button class="btn btn-success" type="reset">Reset</button><br>
</form>
</div>
<?php //ob_start();
	include_once('../lib/connection.php');
	if (isset($_POST['btn_submit'])) {
		$ten = $_POST['ten'];
		$link = $_POST['link'];
	$sl = "insert into header (ten,link) Value('$ten','$link')";

	if(mysqli_query($conn,$sl))
	{
		echo "<script language='javascript'>alert('Thêm thành công');";
		echo "location.href='dashboard.php';</script>";
		//header("location:theloai.php");
	}
	else
	{
		echo 'Lỗi: ',mysqli_error($conn);
	}
	}
?>

</body>
</html>