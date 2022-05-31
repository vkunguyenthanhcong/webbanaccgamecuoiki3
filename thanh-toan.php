<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Mua bán sản phẩm game Liên Quân Mobile</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>


		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<style>
			body{
				font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;}
		td {
			width: 300px;
		}
		#anh {
			max-width: 50px;
		}
		.form-input{
    width:100%;
    padding: 20px;
    border-radius: 10px;
    border: 1px solid #eee;
    transition: 0.25s ease;
    outline: none;
  }
  .form-input:focus {
    border: 1px solid red;
  }
  .form-field{
    position: relative;
  }
  .form-label{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 23px;
    pointer-events: none;
    user-select: none;
  }
  .form-input:not(:placeholder-shown) + .form-label,
  .form-input:focus + .form-label{
    top: 0;
    padding :10px;
    display: inline-block;
    background-color: white;
    transition: 0.25s ease;
	}
		</style>
    </head>
	<body>
		<?php session_start();?>
		<?php include('header.php') ?>
		<?php require_once 'lib/connection.php'; ?>
		<div class="container" style="background-color: #fafafa; margin-top: 50px; margin-bottom: 50px;">
		<form action="#" method="get">
		
		 	<table border="1">
		 		<tr align="center">
					 <td>Chọn</td>
		 			<td>Mã sản phẩm</td>
		 			<td>Tên sản phẩm</td>
		 			<td>Số lượng</td>
					<td>Size</td>
		 			<td>Giá</td>
		 			<td>Tổng giá</td>
		 			<td>Ảnh</td>
		 			<td>Hành động</td>
		 		</tr>
				
		 		<?php
		 		$id = $_SESSION['user_id'];
   			$query = mysqli_query($conn,"select * from giohang where id = $id"); ?>
   				<?php while ($data = mysqli_fetch_array($query) ) { ?>
   					<tr align="center">
						   
					<td><Input type="checkbox" name="checkbox[]" value="<?php echo $data['stt']; ?>"></td>
					
   					<td><?php echo $data['masp']; ?></td>
		 			<td><?php echo $data['tensp']; ?></td>
		 			<td><?php echo $data['soluong']; ?></td>
					 <td><?php echo $data['size']; ?></td>
		 			<td><?php $b = number_format($data['gia'],0,'.','.'); echo $b ?> VNĐ</td>
		 			<td><?php $a = number_format($data['giatong'],0,'.','.'); echo $a ?> VNĐ</td>
		 			<td ><img id="anh" src="photo/<?php echo $data['image']; ?>" alt=""></td>
		 			<td><a style="color : red" href="xoa.php?id=<?php echo $data['stt']; ?>">Xoá</a></td>
					 
   					</tr>
   				<?php } ?>		  
		 	</table><br><br>
			
				
				<div>	
					<h3>Điền thông tin nhận hàng</h3>
					<div class="form-field">
					<Input type="text" class="form-input" name="name" placeholder=" ">
					<label for="" class="form-label" >Họ và tên</label>
				</div><br>
				<div class="form-field">
					<Input type="text" class="form-input" name="diachi" placeholder=" ">
					<label for="" class="form-label" >Địa chỉ</label>
				</div><br>
				
				<div class="form-field">
					<Input type="text" class="form-input" name="phone" placeholder=" ">
					<label for="" class="form-label" >Số điện thoại</label>
				</div>
			</div><br>
			 
			 <button class="btn btn-success" type="submit" name="xoahang">Xóa nhiều</button>
			 <button class="btn btn-success" type="submit" name="thanhtoan">Thanh toán</button>
			 </form>
		</div>
		<?php require_once 'lib/connection.php'; ?>
				<?php 
				if(isset($_GET['xoahang'])){
					$chkarr  = $_GET['checkbox'];
					foreach($chkarr as $id){
						mysqli_query($conn, "Delete from giohang where stt=".$id);
						echo "<script language='javascript'>location.href='thanh-toan.php';</script>";}
				}
				?>
				<?php 
				if(isset($_GET['thanhtoan'])){
					$chkarr  = $_GET['checkbox'];
					$diachi = $_GET['diachi'];
					$name = $_GET['name'];
					$phone = $_GET['phone'];
					foreach($chkarr as $id){
						$sl="update giohang set diachi='$diachi', name = '$name', phone = '$phone', ngaydat = Now() where stt='$id'";		
if(mysqli_query($conn, $sl))
{
	echo "<script language='javascript'>alert('Đặt hàng thành công');";
		echo "location.href='thanh-toan.php';</script>";
}
				}
			}
				
				?>
		<!-- jQuery Plugins -->
		<?php include "js.php" ?>
	</body>
</html>
