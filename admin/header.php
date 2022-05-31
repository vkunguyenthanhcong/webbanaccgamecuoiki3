
<div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img style="width: 100%;"src="https://upload.wikimedia.org/wikipedia/vi/9/93/Li%C3%AAn_quan_mobile.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                       
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <?php
require_once '../lib/connection.php';
    $id = $_SESSION["user_id"];
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'"));
?>
                        <li>
                            <a class="profile-pic" href="#">
                                
                                <img src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium"><?php echo $_SESSION['fullname'];  ?></span></a>
                        </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6" >
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" style="margin-top: 50px">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../index.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Trang chủ</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Trang quản lý</span>
                            </a>
                        </li>
                        <?php $q = mysqli_query($conn, "SELECT * FROM menuadmin");
                        while($r = mysqli_fetch_array($q)) { ?>
                        <li class="sidebar-item pt-2" id="<?php echo $r[3] ?>">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $r[2] ?>"
                                aria-expanded="false">
                                <i class="fas fa-table" aria-hidden="true"></i>
                                <span class="hide-menu"><?php echo $r[1] ?></span>
                            </a>
                        </li>
                        <?php } ?>
                        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        