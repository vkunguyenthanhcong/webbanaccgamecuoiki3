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
        body {
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
session_start ();
require_once 'lib/connection.php';
$maacc = $_GET[ 'maacc' ];
$id = $_SESSION[ 'user_id' ];

$data = mysqli_fetch_array ( mysqli_query ( $conn , "select * from acc where maacc='$maacc'" ) );

$row = mysqli_fetch_array ( mysqli_query ( $conn , "select * from users where id='$id'" ) );

$tuong = $data[ 'tuong' ];
$skin = $data[ 'skin' ];
$rank = $data[ 'rank' ];
$key = $data[ 'gia' ];
$gioithieu = $data[ 'gioithieu' ];
$gia = number_format ( $data[ 'gia' ] , 0 , '.' , '.' );
$a = $data[ 'gia' ] * ( 20 / 100 );
$giaatm = $data[ 'gia' ] - $a;
$giaatm = number_format ( $giaatm , 0 , '.' , '.' );
$tien = $row[ 'money' ];
$taikhoan = $data[ 'taikhoan' ];
$matkhau = $data[ 'matkhau' ];
?>
<body style="background-color: #F8F8F8">

<?php include ( 'header.php' ) ?>
<!-- SECTION -->
<section style="margin-top: 50px; background-color: #FFF; border-radius:10px; padding : 10px" class="container ">
    <div class="row">
        <div class="col-sm-6">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">


                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img src="https://thuthuatnhanh.com/wp-content/uploads/2020/09/anh-lien-quan.jpg"
                             style="max-width: 100%">
                    </div>
                    <?php
                    $hinhanh = mysqli_query ( $conn , "SELECT * FROM images  WHERE maacc = '$maacc'" );
                    if ( $hinhanh->num_rows > 0 ) {
                        while ($row = mysqli_fetch_array ( $hinhanh )) {
                            $imageURL = 'photo/' . $row[ "file_name" ];
                            ?>
                            <div class="item ">
                                <img src="<?php echo $imageURL; ?>" style="max-width: 100%">
                            </div>
                        <?php }
                    } else { ?>
                        <p>No image(s) found...</p>
                    <?php } ?>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="col-sm-12"
                 style="background-color: #ff4d4d; border-radius : 10px; padding : 10px 10px 0px 10px">
                <h3 style="color: white">MÃ SỐ : <?php echo $maacc ?></h3>
            </div>
            <div class="col-sm-12 " style="background-color: #ffcccc; border-radius: 10px; margin-top: 10px">
                <div class="row">
                    <div class="col-sm-6" style="margin-top: 10px;color:  #ff1a1a">
                        <span><b>THẺ CÀO</b></span><br>
                        <b><span style="font-size:30px;"><?php echo $gia; ?>đ </span></b>
                    </div>
                    <div class="col-sm-6" style="margin-top: 10px;color:  #ff1a1a">
                        <div style="position: absolute; right: 5%">
                            <span><b>ATM/BANKING</b></span><br>
                            <b><span style="font-size:30px;"><?php echo $giaatm; ?>đ </span></b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="font-size: 20px;margin-top: 10px">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Tướng:</p>
                        <p>Skin:</p>
                        <p>Rank:</p>
                        <p>Trạng thái:</p>
                    </div>
                    <div>
                        <p><?php echo $tuong; ?></p>
                        <p><?php echo $skin; ?></p>
                        <p><?php echo $rank; ?></p>
                        <p><?php echo $gioithieu; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <p style="text-align: center">
                    <button class="btn" onclick="myFunction()"><b>MUA NGAY</b></button>
                </p>
                <div style="border-radius: 10px; border : 1px solid  #00e600; padding: 10px;display:none" id="myDIV">
                    <h3>BẠN CHẮC CHẮN MUỐN MUA TÀI KHOẢN</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <button onclick="myFunction()" class="btn btn-danger" style="margin-left : 45%">Hủy</button>
                        </div>
                        <div class="col-sm-6">
                            <form action="#" method="post">
                                <button id="muangay" name="muangay" class="btn btn-success" style="margin-left : 25%">
                                    Mua
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    if ( isset( $_POST[ 'muangay' ] ) ) {
        if ( $tien < $key ) {
            echo "<script>alert('Tài khoản của bạn không đủ số dư để mua tài khoản này.')</script>";
        } else {

            $sl = "insert into accdamua (id,username,password, ngaymua) Value('$id','$taikhoan','$matkhau', Now())";

            if ( mysqli_query ( $conn , $sl ) ) {
                mysqli_query ( $conn , "update acc set damua = 'true'  where maacc = '$maacc'" );
                $tienconlai = $tien - $key;

                mysqli_query ( $conn , "update users set money = '$tienconlai' where id = '$id'" );
                echo "<script language='javascript'>alert('Mua thành công. Vào thông tin cá nhân để xem tài khoản mật khẩu.');";
                echo "location.href='index.php';</script>";

            }
        }
    };

    ?>
    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <div class="col-sm-12" style="margin-top: 30px">
        <?php
        $dau = $key - ( $key * 20 / 100 );
        $cuoi = $key + ( $key * 20 / 100 );

        $q = mysqli_query ( $conn , "SELECT * FROM acc WHERE (gia BETWEEN '$dau' and '$cuoi')" );
        ?>
        <h3>Tài khoản đồng giá</h3>
        <?php while ($row = mysqli_fetch_array ( $q )) { ?>
            <div class="col-md-3 col-xs-6 shadow" style="margin-bottom: 50px;">
                <img style="width: 100%;" src="photo/<?php echo $row[ 'image' ] ?>" alt="">
                <div style="background-color: rgb(152, 71, 71); width: 100%;"><b
                            style="color: white;font-size: 15px; padding: 10px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $row[ 'gioithieu' ] ?></b>
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-md-6 col-xs-4">
                        <p>Tướng: <?php echo $row[ 'tuong' ] ?></p>
                        <p>Rank : <?php echo $row[ 'rank' ] ?></p>
                    </div>
                    <div class="col-md-6 col-xs-4">
                        <p style="font-size: px;">Trang phục: <?php echo $row[ 'skin' ] ?></p>
                        <p>Trạng thái : <?php echo $row[ 'trangthai' ] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-3">
                        <button style="background-color: white; border : 1px solid red;border-radius: 5px; padding: 10px;overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php $a = number_format ( $row[ 'gia' ] , 0 , '.' , '.' );
                            echo $a ?>
                            VNĐ
                        </button>
                    </div>
                    <div class="col-md-6 col-xs-3">
                        <a href="chitietsp.php?maacc=<?php echo $row[ 'maacc' ] ?>">
                            <button style="background-color: #ff704d; border-radius: 10px; padding: 10px; border : 0"><b
                                        style="color: white">CHI TIẾT</b></button>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <div>

    </div>
</section>
<?php include ( 'footer.php' ) ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
