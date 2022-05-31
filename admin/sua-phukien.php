<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script  src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

		<?php 
		include("../lib/connection.php");

		if(isset($_GET['id'])){
		$sql="select * from phukien where masp=".$_GET['id'];}

		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_array($result);
		?>
<div class="container">
	<H2>CHỈNH SỬA THÔNG TIN</h2>
    <form action="" enctype="multipart/form-data" method="post">
        <label>Mã sản phẩm</label>
        <input type="text"  value="<?php echo $data['masp'];?>" disabled>
 
        <label>Tên sản phẩm</label>
        <input type="text" name="tensp" value="<?php echo $data['tensp'];?>">
 
        <label>Loại sản phẩm</label>
        <input type="text" name="loai" value="<?php echo $data['loai'] ?>">
 
        <label>Số lượng</label>
        <input type="number" name="soluong" value="<?php echo $data['soluong'] ?>">
        <label>Giá</label>
        <input type="text" name="gia" value="<?php echo $data['gia'] ?>">
		<label>Xuất sứ</label>
        <input type="text" name="xuatxu" value="<?php echo $data['xuatxu'] ?>">
        <label>Chất liệu</label>
        <input type="text" name="chatlieu" value="<?php echo $data['chatlieu'] ?>">
        <label>Mô tả sản phẩm: </label>
        <textarea name="mota" ><?php echo $data['mota']; ?></textarea>
                <script>
                        CKEDITOR.replace( 'mota' );
                </script>

		<label>Ảnh giới thiệu</label>
				<input type="file" name="image" id="anh" />
				<img style="max-width: 100%" src="../photo/<?php echo $data['image'];?>" alt=""><br><br>
        <button class="btn btn-success" name="btn_submit">Chỉnh sửa</button>
		<a class="btn btn-success" href="themanhpk.php?masp=<?php echo $data['masp']  ?>">Thêm ảnh</a>
    </form>
</div>
<?php
if (isset($_POST['btn_submit'])) {
$tensp = $_POST['tensp'];
$loai = $_POST['loai'];
$soluong = $_POST['soluong'];	
$gia = $_POST['gia'];
$xuatxu = $_POST['xuatxu'];
$chatlieu = $_POST['chatlieu'];
$mota = $_POST['mota'];


// upload hinh anh
	if(isset($_FILES["image"]["name"])) 	$icon=$_FILES["image"]["name"];
  if(isset($_FILES['image']['tmp_name'])) { 
  $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
  					if(isset($_GET['id'])){
						$sl="select image from users where id=".$_GET['id'];}
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
		if(isset($_GET["id"]))   
			{
			 $key = $_GET["id"];
			}

	if($icon=="")
	{		
$sl="update phukien set tensp='$tensp',loai='$loai',soluong='$soluong',gia='$gia',xuatxu='$xuatxu',chatlieu='$chatlieu',mota='$mota' where masp='$key'";		
	}
	else
	{
$sl="update phukien set tensp='$tensp',loai='$loai',soluong='$soluong',gia='$gia',xuatxu='$xuatxu',chatlieu='$chatlieu',mota='$mota', image ='$icon' where masp='$key'";			
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