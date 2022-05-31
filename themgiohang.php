<?php session_start(); ?>
<?php 
	include_once('lib/connection.php');

	if (isset($_SESSION['user_id']) == false) {
		echo "<script language='javascript'>location.href='login/dang-nhap.php';</script>";
	}else{
    if(isset($_POST["muangay"])){
      
	$id = $_POST['id'];
	$masp = $_POST['masp'];
	$gia = $_POST['gia'];
	$tensp = $_POST['tensp'];
	$image = $_POST['image'];
	$soluong = $_POST['soluong'];

	$giatong = $_POST['soluong'] * $_POST['gia'];; 
	$size = $_POST['size'];
	
	
	
	$sl = "insert into giohang (id,masp,gia,tensp,image,soluong, giatong, size) Value('$id','$masp','$gia','$tensp', '$image','$soluong', '$giatong' ,'$size')";

	mysqli_query($conn, $sl);

    }

	}
	?>
  
<!-- Code xem danh sách hàng -->
  <?php 
  include_once('lib/connection.php');
  $id = $_SESSION['user_id'];
  $query = mysqli_query($conn, "select * from giohang where id = $id");
  while ($data = mysqli_fetch_array($query) ) { ?>
											<div class="product-widget">
												
												<div class="product-img">
													<img src="photo/<?php echo $data['image'] ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"><?php echo $data['tensp'] ?></a></h3>
													<h4 class="product-price"><span class="qty"><?php echo $data['soluong'] ?>x</span><?php $a = number_format($data['giatong'],0,'.','.'); echo $a ?> VNĐ</h4>
												</div>
                        <button onclick="xoagiohang(<?php echo $data['stt'] ?>)" style="background: white; border : none">X</button>
											</div>
											<?php } ?>


