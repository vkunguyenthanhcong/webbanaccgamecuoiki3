<?php
include "lib/connection.php";
session_start();
$id = $_SESSION["user_id"];


$sql = mysqli_query($conn, "SELECT * FROM yeuthich WHERE iduser = '$id'");

while ($data = mysqli_fetch_array($sql) ) {?>
											<div class="product-widget">
												
												<div class="product-img">
													<img src="photo/<?php echo $data['image'] ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="chitiet-phukien.php?masp=<?php echo $data['idsp'] ?>"><?php echo $data['tensp'] ?></a></h3>
													
												</div>
                        
											</div>

                      <?php } ?>
<?php

if(isset($_POST["tensp"])){

  $tensp = $_POST["tensp"];
  $giasp = $_POST["giasp"];
  $hinhsp = $_POST["hinhsp"];
  $iduser = $_POST["iduser"];
	$idsp = $_POST["idsp"];

  mysqli_query($conn, "INSERT INTO yeuthich (tensp, gia, iduser, image, idsp) values('$tensp', '$giasp',  '$iduser', '$hinhsp', '$idsp')");

}

?>
											