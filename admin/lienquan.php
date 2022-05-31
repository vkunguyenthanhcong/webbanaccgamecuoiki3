<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>$('#form_lienquan').submit(function(event) {
      event.preventDefault();
      var form = $(this);
      console.log(form.serialize());
      $.ajax({
        type: form.attr('method'),
        url: form.attr('lienquan.php'),
        data: form.serialize()
      });
    });</script>
<form action="" method="post" enctype="multipart/form-data"  id="form_lienquan" autocomplete="off">
		<h3>THÊM ACC</h3>
	<label>Tài khoản: </label><input type="text" name="taikhoan"><br>
	<label>Mật khẩu: </label><input type="text" name="matkhau"><br>
	<label>Giá: </label><input type="text" name="gia"><br>
	<label>Tướng : </label><input type="text" name="tuong"><br>
    <label>Skin : </label><input type="text" name="skin"><br>
    <label>Giới thiệu: </label><input type="text" name="gioithieu">
    <label for="">Rank</label><input type="text" name="rank">
    <label for="">Tình trạng: </label><input type="text" name="tinhtrang">
	<label>Mô tả sản phẩm: </label>
	<textarea name="mota"></textarea><br>
                <script>
                        CKEDITOR.replace( 'mota' );
                </script>
                <label for="">Ảnh giới thiệu: </label>
	<input type="file" name="image" id="anh" /><br>
	<button  class="btn btn-success" type="submit" name="btn_lienquan">Lưu</button>
	<button  class="btn btn-success" type="reset">Reset</button><br>
</form>
<?php //ob_start();
if (isset($_POST['btn_lienquan'])){
	include_once('../lib/connection.php');
		// upload hinh anh	
	$icon=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"../photo/".$icon);

	$taikhoan = $_POST['taikhoan'];
	$matkhau = $_POST['matkhau'];
	$gia = $_POST['gia'];
	$tuong = $_POST['tuong'];
	$skin = $_POST['skin'];
	$gioithieu = $_POST['gioithieu'];
	$rank = $_POST['rank'];
	$tinhtrang = $_POST['tinhtrang'];
	$mota = $_POST['mota'];
	$game = 'lienquan';
	
	
	$sl = "insert into acc (taikhoan,matkhau,gia,tuong,skin,gioithieu,rank,tinhtrang,mota,game,createdate,image) Value('$taikhoan','$matkhau','$gia','$tuong','$skin','$gioithieu','$rank','$tinhtrang','$mota','$game',now(),'$icon')";

	if(mysqli_query($conn,$sl))
	{
		echo "<script language='javascript'>alert('Thêm thành công');</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error($conn);
	}
	}
	?>