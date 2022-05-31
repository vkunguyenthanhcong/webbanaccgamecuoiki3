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
		include("../lib/connection.php");
		$maacc = $_GET['maacc'];
		if(isset($_GET['maacc'])){
		$sql="select * from acc where maacc=".$_GET['maacc'];}

		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_array($result);
		?>
		<?php 
		$game = $_GET['game'];
		if($game == "lienquan"){
            echo "<style>
            #freefire{display: none};
            </style>";
			echo "<style>
            #lmht{display: none};
            </style>";
        }elseif($game == "lmht"){
            echo "<style>
            #freefire{display: none};
            </style>";
			echo "<style>
            #lienquan{display: none};
            </style>";
        }elseif($game == "freefire"){
			echo "<style>
            #lmht{display: none};
            </style>";
			echo "<style>
            #lienquan{display: none};
            </style>";
        }
        ;
		?>
<div class="container">
	<div id="lienquan">
	<H2>CHỈNH SỬA THÔNG TIN ACCOUNT</h2>
    <form action="" enctype="multipart/form-data" method="post">
        <label>Mã ACC</label>
        <input type="text" name="maacc" value="<?php echo $data['maacc'];?>" disabled>
 
        <label>Tài khoản</label>
        <input type="text" name="taikhoan" value="<?php echo $data['taikhoan'];?>">
 
        <label>Mật khẩu</label>
        <input type="password" name="matkhau" value="<?php echo $data['matkhau'] ?>">
 
        <label>Giới thiệu</label>
        <input type="text" name="gioithieu" value="<?php echo $data['gioithieu'] ?>">

        <label>Giá</label>
        <input type="text" name="gia" value="<?php echo $data['gia'] ?>">

        <label>Tướng</label>
        <input type="text" name="tuong" value="<?php echo $data['tuong'] ?>">
 
 			<label>Skin :</label> 
 			<input type="text" name="skin" value="<?php echo $data['skin'];?>">
 			<label>Trạng thái :</label> 
 			<input type="text" name="trangthai" value="<?php echo $data['trangthai'];?>">

 			<label>Rank :</label>
 			<select name="rank" style="width: 100%; height: 40px; border-radius: 4px;">
					<option value="<?php echo $data['rank'];?>"><?php echo $data['rank'];?></option>
					<option value="Đồng">Đồng</option>
					<option value="Bạc">Bạc</option>
					<option value="Vàng">Vàng</option>
					<option value="Bạch Kim">Bạch Kim</option>
					<option value="Kim Cương">Kim Cương</option>
					<option value="Tinh Anh">Tinh Anh</option>
					<option value="Cao Thủ">Cao Thủ</option>
					<option value="Chiến Tướng">Chiến Tướng</option>
					<option value="Thách Đấu">Thách Đấu</option>
				</select><br><br>
				<label>Ảnh</label>
				<input type="file" name="image" id="anh" />
				<img style="max-width:100%" src="../photo/<?php echo $data['image'];?>" alt=""><br><br>
        <button class="btn btn-success" name="btn_submit">Chỉnh sửa</button>
		<a class="btn btn-success" href="themanh.php?maacc=<?php echo $maacc ?>">Update ảnh</a>
    </form>
	</div>

	<div id="lmht">
	<H2>CHỈNH SỬA THÔNG TIN ACCOUNT</h2>
    <form action="" enctype="multipart/form-data" method="post">
        <label>Mã ACC</label>
        <input type="text" name="maacc" value="<?php echo $data['maacc'];?>" disabled>
 
        <label>Tài khoản</label>
        <input type="text" name="taikhoan" value="<?php echo $data['taikhoan'];?>">
 
        <label>Mật khẩu</label>
        <input type="password" name="matkhau" value="<?php echo $data['matkhau'] ?>">
 
        <label>Giới thiệu</label>
        <input type="text" name="gioithieu" value="<?php echo $data['gioithieu'] ?>">

        <label>Giá</label>
        <input type="text" name="gia" value="<?php echo $data['gia'] ?>">

        <label>Tướng</label>
        <input type="text" name="tuong" value="<?php echo $data['tuong'] ?>">
 
 			<label>Skin :</label> 
 			<input type="text" name="skin" value="<?php echo $data['skin'];?>">
 			<label>Trạng thái :</label> 
 			<input type="text" name="trangthai" value="<?php echo $data['trangthai'];?>">
			 <label>Linh thú :</label> 
 			<input type="text" name="pet" value="<?php echo $data['pet'];?>">

 			<label>Rank :</label>
 			<select name="rank" style="width: 100%; height: 40px; border-radius: 4px;">
					<option value="<?php echo $data['rank'];?>"><?php echo $data['rank'];?></option>
					<option value="Sắt">Sắt</option>
					<option value="Đồng">Đồng</option>
					<option value="Bạc">Bạc</option>
					<option value="Vàng">Vàng</option>
					<option value="Bạch Kim">Bạch Kim</option>
					<option value="Kim Cương">Kim Cương</option>
					<option value="Tinh Anh">Tinh Anh</option>
					<option value="Cao Thủ">Cao Thủ</option>
					<option value="Grand Master">Grand Master</option>
					<option value="Thách Đấu">Thách Đấu</option>
				</select><br><br>
				<label>Ảnh</label>
				<input type="file" name="image" id="anh" />
				<img style="max-width: 100%" src="../photo/<?php echo $data['image'];?>" alt=""><br><br>
        <button class="btn btn-success" name="btn_lmht">Chỉnh sửa</button>
		<a class="btn btn-success" href="themanh.php?maacc=<?php echo $maacc ?>">Update ảnh</a>
    </form>
	</div>

	<div id="freefire">
	<H2>CHỈNH SỬA THÔNG TIN ACCOUNT</h2>
    <form action="" enctype="multipart/form-data" method="post">
        <label>Mã ACC</label>
        <input type="text" name="maacc" value="<?php echo $data['maacc'];?>" disabled>
 
        <label>Tài khoản</label>
        <input type="text" name="taikhoan" value="<?php echo $data['taikhoan'];?>">
 
        <label>Mật khẩu</label>
        <input type="password" name="matkhau" value="<?php echo $data['matkhau'] ?>">
 
        <label>Giới thiệu</label>
        <input type="text" name="gioithieu" value="<?php echo $data['gioithieu'] ?>">

        <label>Giá</label>
        <input type="text" name="gia" value="<?php echo $data['gia'] ?>">

        <label>Pet</label>
        <input type="text" name="pet" value="<?php echo $data['pet'] ?>">
 
 			<label>Thẻ vô cực </label> 
 			<input type="text" name="thevocuc" value="<?php echo $data['thevocuc'];?>">
 			<label>Trạng thái :</label> 
 			<input type="text" name="trangthai" value="<?php echo $data['trangthai'];?>">
			 

 			<label>Rank :</label>
 			<select name="rank" style="width: 100%; height: 40px; border-radius: 4px;">
					<option value="<?php echo $data['rank'];?>"><?php echo $data['rank'];?></option>
					<option value="Đồng">Đồng</option>
					<option value="Bạc">Bạc</option>
					<option value="Vàng">Vàng</option>
					<option value="Bạch Kim">Bạch Kim</option>
					<option value="Kim Cương">Kim Cương</option>
					<option value="Huyền thoại">Huyền thoại</option>
					<option value="Grand Master">Grand Master</option>
				</select><br><br>
				<label>Ảnh</label>
				<input type="file" name="image" id="anh" />
				<img src="../photo/<?php echo $data['image'];?>" alt=""><br><br>
        <button class="btn btn-success" name="btn_ff">Chỉnh sửa</button>
		<a class="btn btn-success" href="themanh.php?maacc=<?php echo $maacc ?>">Update ảnh</a>
    </form>
	</div>

</div>
<?php
if (isset($_POST['btn_submit'])) {
	$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];
$gioithieu = $_POST['gioithieu'];
$gia = $_POST['gia'];
$tuong = $_POST['tuong'];
$skin = $_POST['skin'];
$trangthai = $_POST['trangthai'];
// upload hinh anh
	if(isset($_FILES["image"]["name"])) 	$icon=$_FILES["image"]["name"];
  if(isset($_FILES['image']['tmp_name'])) { 
  $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
  					if(isset($_GET['maacc'])){
						$sl="select image from acc where maacc=".$_GET['maacc'];}
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
		if(isset($_GET["maacc"]))   
			{
			 $key = $_GET["maacc"];
			}

	if($icon=="")
	{		
$sl="update acc set taikhoan='$taikhoan',matkhau='$matkhau',gioithieu='$gioithieu',gia='$gia',tuong='$tuong',skin='$skin',trangthai='$trangthai' where maacc='$key'";		
	}
	else
	{
$sl="update acc set taikhoan='$taikhoan',matkhau='$matkhau',gioithieu='$gioithieu',gia='$gia',tuong='$tuong',skin='$skin',trangthai='$trangthai',image='$icon' where maacc ='$key'";
	}
//$uup=mysql_query($sl);


if(mysqli_query($conn, $sl))
{
	echo "<script language='javascript'>alert('Sửa thành công');";
		echo "location.href='dashboard.php';</script>";
}
	}
?>
<?php
if (isset($_POST['btn_lmht'])) {
	$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];
$gioithieu = $_POST['gioithieu'];
$gia = $_POST['gia'];
$tuong = $_POST['tuong'];
$skin = $_POST['skin'];
$trangthai = $_POST['trangthai'];
$pet = $_POST['pet'];
// upload hinh anh
	if(isset($_FILES["image"]["name"])) 	$icon=$_FILES["image"]["name"];
  if(isset($_FILES['image']['tmp_name'])) { 
  $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
  					if(isset($_GET['maacc'])){
						$sl="select image from acc where maacc=".$_GET['maacc'];}
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
		if(isset($_GET["maacc"]))   
			{
			 $key = $_GET["maacc"];
			}

	if($icon=="")
	{		
$sl="update acc set taikhoan='$taikhoan',matkhau='$matkhau',gioithieu='$gioithieu',gia='$gia',tuong='$tuong',skin='$skin',trangthai='$trangthai', pet='$pet' where maacc='$key'";		
	}
	else
	{
$sl="update acc set taikhoan='$taikhoan',matkhau='$matkhau',gioithieu='$gioithieu',gia='$gia',tuong='$tuong',skin='$skin',trangthai='$trangthai',pet='$pet',image='$icon' where maacc ='$key'";
	}
//$uup=mysql_query($sl);


if(mysqli_query($conn, $sl))
{
	echo "<script language='javascript'>alert('Sửa thành công');";
		echo "location.href='dashboard.php';</script>";
}
	}
?>
<?php
if (isset($_POST['btn_ff'])) {
	$taikhoan = $_POST['taikhoan'];
$matkhau = $_POST['matkhau'];
$gioithieu = $_POST['gioithieu'];
$gia = $_POST['gia'];
$thevocuc = $_POST['thevocuc'];

$trangthai = $_POST['trangthai'];
$pet = $_POST['pet'];
// upload hinh anh
	if(isset($_FILES["image"]["name"])) 	$icon=$_FILES["image"]["name"];
  if(isset($_FILES['image']['tmp_name'])) { 
  $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
  					if(isset($_GET['maacc'])){
						$sl="select image from acc where maacc=".$_GET['maacc'];}
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
		if(isset($_GET["maacc"]))   
			{
			 $key = $_GET["maacc"];
			}

	if($icon=="")
	{		
$sl="update acc set taikhoan='$taikhoan',matkhau='$matkhau',gioithieu='$gioithieu',gia='$gia',tuong='$tuong',skin='$skin',trangthai='$trangthai', pet='$pet', thevocuc='$thevocuc' where maacc='$key'";		
	}
	else
	{
$sl="update acc set taikhoan='$taikhoan',matkhau='$matkhau',gioithieu='$gioithieu',gia='$gia',tuong='$tuong',skin='$skin',trangthai='$trangthai',pet='$pet',thevocuc='$thevocuc',image='$icon' where maacc ='$key'";
	}
//$uup=mysql_query($sl);


if(mysqli_query($conn, $sl))
{
	echo "<script language='javascript'>alert('Sửa thành công');";
		echo "location.href='dashboard.php';</script>";
}
	}
?>



</body>
</html>