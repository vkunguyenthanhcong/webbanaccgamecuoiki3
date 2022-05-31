<?php session_start();?>
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
		
		<?php include('header.php') ?>
		<!-- SECTION -->
		<div class="main">
		<div class="section ">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="https://cdns.diongame.com/static/image-62e3ddb7-fc33-44ff-9782-ad3825fd8ed0.gif" alt="">
							</div>
							<div class="shop-body">
								<h3>Mua<br>Tài khoản</h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="https://cdns.diongame.com/static/image-04683d4b-482f-4068-b864-b6444098de4f.gif" alt="">
							</div>
							<div class="shop-body">
								<h3>Mua<br>Quân huy</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="https://cdns.diongame.com/static/image-2c1dcd3b-895c-4783-bc2f-7f3c9b9408ab.gif" alt="">
							</div>
							<div class="shop-body">
								<h3>Vòng quay<br>Siêu phẩm</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<h3 style="text-align: center;"><U>DANH MỤC GAME</U></h3><br>
		<?php
			require_once 'lib/connection.php';
				$danhmuc = mysqli_query($conn, "SELECT * FROM event");
		?>
		<section class="container">
			<?php while ($r = mysqli_fetch_array($danhmuc)){ ?>
			<div class="col-md-3" style="margin-bottom: 30px;">
				<img style="width: 100%" class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad isLoaded" src="photo/<?php echo ($r['image']) ?>" alt=""><br><br>
				<p style="color : rgb(247, 176, 60); text-align: center; font-size: 20px"><b><?php echo ($r['ten']) ?></b></p>
				<p style="text-align: center;">Số lượng : <?php echo ($r['soluong']) ?></p>
				<p style="text-align: center"><a href="<?php echo ($r['link']) ?>"><img src="https://cdns.diongame.com/static/image-0ff38ce3-6918-494f-a2b6-9015a130b3ad.png" alt=""></a></p>
			</div>
		<?php } ?>
		</section>
		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Đăng ký để nhận <strong>Khuyến mãi</strong></p>
							<form>
								<input class="input" type="email" placeholder="Nhập email của bạn">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="https://www.facebook.com/welcome.to.wall.thanh.cong"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://www.facebook.com/welcome.to.wall.thanh.cong"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="https://www.facebook.com/welcome.to.wall.thanh.cong"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="https://www.facebook.com/welcome.to.wall.thanh.cong"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
	</div>
		<?php include('footer.php') ?>

		<!-- jQuery Plugins -->
		
		<?php include "js.php" ?>

	</body>
</html>
