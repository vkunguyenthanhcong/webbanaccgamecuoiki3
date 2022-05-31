<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm tài khoản game</title>
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<style>
		.container {
    width: 30%;
    margin: auto;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
    input{
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
	</style>
    <script>
$(document).ready(function(){
    $("#chon").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
</head>
<body>
<div class="container">
    <label for="">Chọn Loại Tài Khoản Game Cần Thêm</label><br>
    <select id="chon">
        <option value="">---Chọn game---</option>
        <option value="lienquan">Liên Quân</option>
        <option value="freefire">FreeFire</option>
        <option value="tocchien">Tốc chiến</option>
        <option value="lmht">Liên Minh Huyền Thoại</option>
        <option value="fifa">Fifa Online 4</option>
    </select>
	<div class="lienquan box" >
        <form action="" method="post" enctype="multipart/form-data">
		<h3>THÊM ACC</h3>
	<label>Tài khoản: </label><input type="text" name="taikhoan"><br>
	<label>Mật khẩu: </label><input type="text" name="matkhau"><br>
    <label>Giới thiệu: </label><input type="text" name="gioithieu"><br>
    <label>Giá: </label><input type="text" name="gia"><br>
    <label>Tướng: </label><input type="text" name="tuong"><br>
    <label>Skin: </label><input type="text" name="skin"><br>
    <label>Trạng thái: </label><input type="text" name="trangthai"><br>
    <label>Rank: </label>
    <select name="rank">
    <option value="Đồng">Đồng</option>
    <option value="Bạc">Bạc</option>
    <option value="Vàng">Vàng</option>
    <option value="Bạch kim">Bạch kim</option>
    <option value="Kim cương">Kim cương</option>
    <option value="Tinh anh">Tinh anh</option>
    <option value="Cao thủ">Cao thủ</option>
    <option value="Chiến tướng">Chiến tướng</option>
    <option value="Thách đấu">Thách đấu</option>
    </select><br>
    <input type="hidden" name="game" value="lienquan">
    <label>Ảnh</label>
    <input type="file" name="image" /><br>
	<button  class="btn btn-success" type="submit" name="btn_lienquan">Lưu</button>
	<button  class="btn btn-success" type="reset">Reset</button><br>
</form>
</div>
<div class="freefire box">
        <form action="" method="post" enctype="multipart/form-data">
		<h3>THÊM ACC</h3>
	<label>Tài khoản: </label><input type="text" name="taikhoan"><br>
	<label>Mật khẩu: </label><input type="text" name="matkhau"><br>
    <label>Giới thiệu: </label><input type="text" name="gioithieu"><br>
    <label>Giá: </label><input type="text" name="gia"><br>
    <label>Pet: </label>
    <select name="pet">
        <option value="Có">Có</option>
        <option value="Không">Không</option>
    </select>
    <label>Thẻ vô cực: </label>
    <select name="thevocuc" id="">
        <option value="Có">Có</option>
        <option value="Không">Không</option>
    </select><br>
    <label>Trạng thái: </label><input type="text" name="trangthai"><br>
    <label>Rank: </label>
    <select name="rank">
    <option value="Đồng">Đồng</option>
    <option value="Bạc">Bạc</option>
    <option value="Vàng">Vàng</option>
    <option value="Bạch kim">Bạch kim</option>
    <option value="Kim cương">Kim cương</option>
    <option value="Huyền thoại">Huyền thoại</option>
    <option value="Grand Master">Grand Master</option>
    
    </select><br>
    <input type="hidden" name="game" value="freefire">
    <label>Ảnh</label>
    <input type="file" name="image" /><br>
	<button  class="btn btn-success" type="submit" name="btn_freefire">Lưu</button>
	<button  class="btn btn-success" type="reset">Reset</button><br>
</form>
</div>
<div class="lmht box">
        <form action="" method="post" enctype="multipart/form-data">
		<h3>THÊM ACC</h3>
	<label>Tài khoản: </label><input type="text" name="taikhoan"><br>
	<label>Mật khẩu: </label><input type="text" name="matkhau"><br>
    <label>Giới thiệu: </label><input type="text" name="gioithieu"><br>
    <label>Giá: </label><input type="text" name="gia"><br>
    <label>Tướng: </label><input type="text" name="tuong"><br>
    <label>Skin: </label><input type="text" name="skin"><br>
    <label>Linh thú: </label><input type="text" name="pet">
    <label>Trạng thái: </label><input type="text" name="trangthai"><br>
    <label>Rank: </label>
    <select name="rank">
    <option value="Sắt">Sắt</option>
    <option value="Đồng">Đồng</option>
    <option value="Bạc">Bạc</option>
    <option value="Vàng">Vàng</option>
    <option value="Bạch kim">Bạch kim</option>
    <option value="Kim cương">Kim cương</option>
    <option value="Cao thủ">Cao thủ</option>
    <option value="Grand Master">Grand Master</option>
    <option value="Thách đấu">Thách đấu</option>
    </select><br>
    <input type="hidden" name="game" value="lmht">
    <label>Ảnh</label>
    <input type="file" name="image" /><br>
	<button  class="btn btn-success" type="submit" name="btn_lmht">Lưu</button>
	<button  class="btn btn-success" type="reset">Reset</button><br>
</form>
</div>
</div>
<?php //ob_start();
if (isset($_POST['btn_lienquan'])){
	include_once('../lib/connection.php');
		// upload hinh anh	
	$icon=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"../photo/".$icon);

	$taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $gioithieu = $_POST['gioithieu'];
    $gia = $_POST['gia'];
    $tuong = $_POST['tuong'];
    $skin = $_POST['skin'];
    $game = $_POST['game'];
    $rank = $_POST['rank'];
    $trangthai = $_POST['trangthai'];

    
	
	
	$sl = "insert into acc (taikhoan,matkhau,gioithieu,gia,tuong,skin,game,rank,trangthai,createdate,image) Value('$taikhoan','$matkhau','$gioithieu','$gia','$tuong','$skin','$game','$rank','$trangthai',now(), '$icon')";

	if(mysqli_query($conn,$sl))
	{
		echo "<script language='javascript'>alert('Thêm thành công');";
		echo "location.href='dashboard.php';</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error($conn);
	}
	}
	?>
<?php //ob_start();
if (isset($_POST['btn_freefire'])){
	include_once('../lib/connection.php');
		// upload hinh anh	
	$icon=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"../photo/".$icon);

	$taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $gioithieu = $_POST['gioithieu'];
    $gia = $_POST['gia'];
    $pet = $_POST['pet'];
    $thevocuc = $_POST['thevocuc'];
    $game = $_POST['game'];
    $rank = $_POST['rank'];
    $trangthai = $_POST['trangthai'];

    
	
	
	$sl = "insert into acc (taikhoan,matkhau,gioithieu,gia,pet,thevocuc,game,rank,trangthai,createdate,image) Value('$taikhoan','$matkhau','$gioithieu','$gia','$pet','$thevocuc','$game','$rank','$trangthai',now(),'$icon')";

	if(mysqli_query($conn,$sl))
	{
		echo "<script language='javascript'>alert('Thêm thành công');";
		echo "location.href='dashboard.php';</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error($conn);
	}
	}
	?>
    <?php //ob_start();
if (isset($_POST['btn_lmht'])){
	include_once('../lib/connection.php');
		// upload hinh anh	
	$icon=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"../photo/".$icon);

	$taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    $gioithieu = $_POST['gioithieu'];
    $gia = $_POST['gia'];
    $pet = $_POST['pet'];
    $tuong = $_POST['tuong'];
    $skin = $_POST['skin'];
    $game = $_POST['game'];
    $rank = $_POST['rank'];
    $trangthai = $_POST['trangthai'];

    
	
	
	$sl = "insert into acc (taikhoan,matkhau,gioithieu,gia,pet,tuong,skin,game,rank,trangthai,createdate,image) Value('$taikhoan','$matkhau','$gioithieu','$gia','$pet','$tuong','$skin','$game','$rank','$trangthai',now(),'$icon')";

	if(mysqli_query($conn,$sl))
	{
		echo "<script language='javascript'>alert('Thêm thành công');";
		echo "location.href='dashboard.php';</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error($conn);
	}
	}
	?>
</body>


</html>