<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Mua bán sản phẩm game Liên Quân Mobile</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<style>
			body{
				font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;}
		</style>
    </head>
	<body>
		<?php session_start();?>
		<?php include('header.php') ?>
		<!-- SECTION -->
		<section style="margin-top: 50px; " class="container">
			<H3>ACC FREE FIRE SIÊU VIP, GIÁ RẺ, AN TOÀN, UY TÍN 100%</H3>
			<div style="border-radius: 5px; background-color: #cceeff; padding: 10px; margin-bottom: 50px;">
				<p style="font-size: 20px;"><b>Acc Free Fire Giá Rẻ, CÁC BẠN KHI MUA ACC VỀ HÃY ĐỔI MẬT KHẨU HOẶC THÊM SỐ ĐIỆN THOẠI VÀO NHÉ!! TRUY CẬP WEBSITE : <u>https://account.garena.com/</u> ĐỂ ĐỔI THÔNG TIN TÀI KHOẢN.</b></p>
			</div>
			<div class="main">
			<div class="col-md-10" style="margin-bottom: 50px">
				
					<h3>Tìm kiếm tài khoản theo giá</h3>
					<input type="text" name="giatimkiem" id="giatimkiem" style="border-radius: 10px; max-width: 200px; height: 40px" placeholder="Tìm kiếm">
					<button class="btn btn-success" type="submit" name="timkiem" id="timkiem"> Tìm kiếm </button>
					
			</div>
				<div id="xemthongtin">
				<?php
				require_once 'lib/connection.php';
						$ff = mysqli_query($conn, "SELECT * FROM acc WHERE game = 'freefire' and damua = 'false'");
				?>
				<?php while ($row = mysqli_fetch_array($ff)){ ?>
				<div class="col-md-3 col-xs-6 shadow" style="margin-bottom: 50px;">
					<img style="width: 100%;" src="photo/<?php echo $row['image'] ?>" alt="">
					<div style="background-color: rgb(152, 71, 71); width: 100%;"><b style="color: white;font-size: 15px; padding: 10px;"><?php echo $row['gioithieu'] ?></b></div>
					<div class="row" style="padding: 20px">
						<div class="col-md-6 col-xs-4">
							<p>Tướng: <?php echo $row['tuong'] ?></p>
							<p>Rank : <?php echo $row['rank'] ?></p>
						</div>
						<div class="col-md-6 col-xs-4">
							<p style="font-size: px;">Trang phục: <?php echo $row['skin'] ?></p>
							<p>Trạng thái : <?php echo $row['trangthai'] ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-xs-3">
						<button style="background-color: white; border : 1px solid red;border-radius: 5px; padding: 10px;"><?php echo $row['gia'] ?> VNĐ</button>
						</div>
						<div class="col-md-6 col-xs-3">
						<a href="chitietsp.php?maacc=<?php echo $row['maacc'] ?>"><button style="background-color: #ff704d; border-radius: 10px; padding: 10px; border : 0"><b style="color: white">CHI TIẾT</b></button></a>
						</div>
					</div>
				</div>
			<?php } ?>
				</div>
			</div>
		</section>
		<?php include('footer.php') ?>
		<?php include "js.php" ?>
		<script type="text/javascript">
	$(document).ready(function(){
		$("#timkiem").click(function(event){
			event.preventDefault();
			var	giatimkiem = $('#giatimkiem').val();
			$.ajax({
			    type: "POST",
			    url: "timkiemacc.php?game=freefire&&tien=" + giatimkiem,
			    success: function(query){
						$('#xemthongtin').html(query)
					}
			});
		});
        
	});
</script>
	</body>
</html>
