
        <?php
        require_once 'lib/connection.php';
        if($_GET['game'] == 'lienquan'){
        $game = $_GET['game'];
        $key = $_GET['tien'];
        $dau = $key-($key*20/100);
        $cuoi = $key+($key*20/100);
        $timkiem = mysqli_query($conn,"SELECT * FROM acc WHERE (gia BETWEEN '$dau' and '$cuoi') and game = '$game' and damua = 'false'")

        ?>
		
							<?php while ($row = mysqli_fetch_array($timkiem)){?>
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
						<button style="background-color: white; border : 1px solid red;border-radius: 5px; padding: 10px;"><?php $a = number_format($row['gia'],0,'.','.'); echo $a ?> VNĐ</button>
						</div>
						<div class="col-md-6 col-xs-3">
						<a href="chitietsp.php?maacc=<?php echo $row['maacc'] ?>"><button style="background-color: #ff704d; border-radius: 10px; padding: 10px; border : 0"><b style="color: white">CHI TIẾT</b></button></a>
						</div>
					</div>
				</div>
			<?php }  }elseif($_GET['game'] == 'freefire'){?>

				<?php
				require_once 'lib/connection.php';
				if($_GET['game'] == 'freefire'){
					$game = $_GET['game'];
					$key = $_GET['tien'];
					$dau = $key-($key*20/100);
					$cuoi = $key+($key*20/100);
					$timkiem = mysqli_query($conn,"SELECT * FROM acc WHERE (gia BETWEEN '$dau' and '$cuoi') and game = '$game' and damua = 'false'")
				?>
				<?php while ($row = mysqli_fetch_array($timkiem)){ ?>
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

				<?php } }else{ ?>
					
					<?php 
							$game = $_GET['game'];
							$key = $_GET['tien'];
							$dau = $key-($key*20/100);
							$cuoi = $key+($key*20/100);
							$timkiem = mysqli_query($conn,"SELECT * FROM acc WHERE (gia BETWEEN '$dau' and '$cuoi') and game = '$game' and damua = 'false'")?>
					<?php	while ($row = mysqli_fetch_array($timkiem)){ ?>
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
						<button style="background-color: #ff704d; border-radius: 10px; padding: 10px; border : 0"><b style="color: white">CHI TIẾT</b></button>
						</div>
					</div>
				</div>
					<?php } } ?>
          

