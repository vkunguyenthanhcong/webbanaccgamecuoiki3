
<?php 
if (isset($_POST['comment'])){
	include_once('lib/connection.php');
	$binhluan = $_POST['binhluan'];
	$tennguoidung = $_POST['fullname'];
	$masp = $_POST['idsp'];
	$sl = "insert into binhluan (binhluan,tennguoidung, masp,ngaybl) Value('$binhluan', '$tennguoidung','$masp',now())";

	mysqli_query($conn,$sl);
	
	}
	?>
	<?php
			$masp = $_GET['masp'];
				require_once 'lib/connection.php';
				$binhluan = mysqli_query($conn, "SELECT * FROM binhluan WHERE masp = '$masp'");

        while ($bl = mysqli_fetch_array($binhluan)){
				?>
				<p><img style="border-radius:50%; width: 50px; margin-right: 10px" src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg"><b><?php echo $bl['tennguoidung']; ?> <i data-visualcompletion="css-img" aria-label="Tài khoản đã xác minh" role="img" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yE/r/mrCvbD_vSoR.png&quot;); background-position: -173px -46px; background-size: auto; width: 12px; height: 12px; background-repeat: no-repeat; display: inline-block;"></i></b></p>
				<p><?php echo $bl['binhluan']; ?></p><br>
			<?php } ?>



