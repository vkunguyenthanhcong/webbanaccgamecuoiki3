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
				font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
				background-color: #fafafa;
			}
			@media screen and (max-width: 800px) {
				.freeship{
					margin-top: -20px;
				}
			}
			.sanpham:hover{
					border : 1px solid red;
			}
            
		</style>
    </head>
	<body>
		<?php session_start();?>
		<?php include('header.php') ?>
		
		<div class="container" style="margin-top: 50px;">
		
				
					<button class="btn" name="chonao" id="ao"><b>Áo</b></button>
					<button class="btn" name="chonmu" id="mu"><b>Mũ</b></button>
					<button class="btn" name="chonfull" id="tatca"><b>Tất cả</b></button>
		</div>
				
		
		<div id="xemphukien">
		 <?php include "xemphukien.php" ?>
		</div>
		<?php include('footer.php') ?>
		<?php include "js.php" ?>
		<script type="text/javascript">
	$(document).ready(function(){
		$("#ao").click(function(event){
			event.preventDefault();
			$.ajax({
			    url: "xemphukien.php?loai=ao",
			    success: function(query){
						$('#xemphukien').html(query)
					}
			});
		});
		$("#mu").click(function(event){
			event.preventDefault();
			$.ajax({
			    url: "xemphukien.php?loai=mu",
			    success: function(query){
						$('#xemphukien').html(query)
					}
			});
		});
		$("#tatca").click(function(event){
			event.preventDefault();
			$.ajax({
			    url: "xemphukien.php",
			    success: function(query){
						$('#xemphukien').html(query)
					}
			});
		});  
	});
</script>
	</body>
</html>
