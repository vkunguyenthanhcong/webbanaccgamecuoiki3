
<style>
	.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<div>
<header>
		<?php
    if (isset($_SESSION['user_id']) == false) {
        echo "<style>
        #user{
            display: none;
        }

        </style>";
     }else {
        echo "<style>
        #dangnhap{
            display: none;
        }
        </style>";
           require_once 'lib/connection.php';
			}		
		if(isset($_SESSION['thanhvien']) != "2"){
			echo "
			<style>
		#quanly{display:none};
			</style>";
		}
	
	?>
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i>0935.704.083</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> nguyencong8attt@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Việt Nam</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> VND</a></li>
						<li id="dangnhap"><a href="login/dang-nhap.php"><i class="fa fa-user-o"></i> Đăng nhập / Đăng ký</a></li>
						
						<li class="nav-item" id="user"><div class="dropdown">
                              <i class="fa fa-user-o"></i>
                              <div class="dropdown">
							  <span style="color : white"><?php echo $_SESSION['fullname'] ?></span>
							  <div class="dropdown-content">
							  <a type="button"  style="color :red;" href="admin/dashboard.php" id="quanly">Quản lý</a><br>
							  <a type="button"  style="color :red;" href="admin/thongtintv.php">Thông tin tài khoản</a><br><br>
							  <a type="button" style="color :red" href="login/dang-xuat.php">Đăng xuất</a>
							  </div>
							</div>
                            </div>
                            </li>   
					</ul>

				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img style="width: 169px;" src="https://upload.wikimedia.org/wikipedia/vi/9/93/Li%C3%AAn_quan_mobile.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<!-- <div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Tìm kiếm ở đây">
									<button class="search-btn">Tìm kiếm</button>
								</form>
							</div>
						</div> -->
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<style>
							@media screen and (min-width: 800px) {
							.giohang {
								position: absolute;
								right: 400px;
							}
							}
						</style>
						<div class="col-md-3 clearfix giohang" >
							<div class="header-ctn">
								<!-- Wishlist -->
								
								<!-- /Wishlist -->

								<!-- Cart -->
							<?php
							if (isset($_SESSION['user_id']) == true){
								include('giohang.php');
							}
							 ?>
									
								
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<?php
					include "lib/connection.php";
    $menu = mysqli_query($conn, "SELECT * FROM header");
?>
					<ul class="main-nav nav navbar-nav">
						<?php while ($row = mysqli_fetch_array($menu)){ ?>
						<li class=""><a href="<?php echo $row['link'] ?>"><?php echo $row['ten'] ?></a></li>
					<?php } ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
</div>