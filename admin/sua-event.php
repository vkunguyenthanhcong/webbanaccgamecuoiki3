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
input[type=password] {
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
		require_once("../lib/connection.php");
		
		$sql="select * from event where stt=".$_GET['stt'];
			
		$data = mysqli_fetch_array($result = mysqli_query($conn,$sql));
		?>
<div class="container">
	<H2>CHỈNH SỬA THÔNG TIN EVENT</h2>
    <form action="" enctype="multipart/form-data" method="post">
        <label>STT</label>
        <input type="text"  value="<?php echo $data['stt'];?>" disabled>
 
        <label>Tên Event</label>
        <input type="text" name="ten" value="<?php echo $data['ten'];?>">
 
        <label>Số lượng</label>
        <input type="text" name="soluong" value="<?php echo $data['soluong'] ?>">
 
        <label>Link</label>
        <input type="text" name="link" value="<?php echo $data['link'] ?>">
				
				<label>Ảnh</label>
				<input type="file" name="image" id="anh" />
				<img  style="max-width:100%" src="../photo/<?php echo $data['image'];?>" alt=""><br><br>
        <button class="btn btn-success" name="btn_submit">Chỉnh sửa</button>
    </form>
</div>

<?php
include("../lib/connection.php");
// upload hinh anh
	if(isset($_FILES["image"]["name"])) 	$icon=$_FILES["image"]["name"];
  if(isset($_FILES['image']['tmp_name'])) { 
  $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
  					if(isset($_GET['stt'])){
						$sl="select image from event where stt=".$_GET['stt'];}
				$results = mysqli_query($conn,$sl);
				$d = mysqli_fetch_array($results);
				if($d['icon']!=$icon)
				{
				    move_uploaded_file($anhminhhoa_tmp,"../photo/".$icon);
				    $anhcu='../photo/'.$d['icon'];
				    unlink($anhcu);
				}
		}
 //lay gia tri cho tham so
    $tam="";
if(isset($_POST["ten"]))	$ten = $_POST['ten'];
if(isset($_POST["soluong"]))	$soluong = $_POST['soluong'];
if(isset($_POST["link"]))	$link= $_POST['link'];
if (isset($_POST['btn_submit'])) 
	{
		if(isset($_GET["stt"]))   
			{
			 $key = $_GET["stt"];
			}
	if($icon=="")
	{		
$sl="update event set ten='$ten',soluong='$soluong',link='$link' where stt='$key'";		
	}
	else
	{
$sl="update event set ten='$ten',soluong='$soluong',link='$link',image='$icon' where stt ='$key'";
	}
if(mysqli_query($conn, $sl))
{
	echo "<script language='javascript'>alert('Sửa thành công');";
		echo "location.href='dashboard.php';</script>";
}
	}
?>
</body>
</html>