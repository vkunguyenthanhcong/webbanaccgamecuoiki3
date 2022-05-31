<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chỉnh sửa header</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.container {
    width: 30%;
    margin: auto;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
    input[type=text] {
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

		if(isset($_GET['stt'])){
		$sl="select * from header where stt=".$_GET['stt'];}

		$results = mysqli_query($conn,$sl);
		$data = mysqli_fetch_array($results);
		?>
<div class="container">
	<H2>CHỈNH SỬA HEADER</h2>
    <form action="" enctype="multipart/form-data" method="post">
        <label>STT</label>
        <input type="text"  value="<?php echo $data['stt'];?>" disabled>
 
        <label>Tên Event</label>
        <input type="text" name="ten" value="<?php echo $data['ten'];?>">
 
        <label>Link</label>
        <input type="text" name="link" value="<?php echo $data['link'] ?>">
	
        <button class="btn btn-success" name="btn_submit">Chỉnh sửa</button>
    </form>
</div>
<?php
include("../lib/connection.php");
if (isset($_POST['btn_submit'])) {
$ten = $_POST['ten'];
$link = $_POST['link'];
		if(isset($_GET["stt"]))   
			{
			 $key = $_GET["stt"];
			}
$sl="update header set ten='$ten',link='$link' where stt='$key'";		
if(mysqli_query($conn, $sl))
{
	echo "<script language='javascript'>alert('Sửa thành công');";
		echo "location.href='dashboard.php';</script>";
}
	}
?>

</body>
</html>