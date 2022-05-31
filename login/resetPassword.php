	    <?php
			if (isset($_GET["token"])) {
				$token = $_GET['token'];
		} 
		if (isset($_GET["email"])) {
				$email = $_GET['email'];
		} 
			require_once("../lib/connection.php");
			$r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));
	    if ($r['token'] == $token) {
	    	if (isset($_POST['btn_submit'])) {
				$password = $_POST['password'];
		
				$sl="update users set password='$password',token='0' where email='$email'";	
				if(mysqli_query($conn, $sl))
					{
						echo "<script language='javascript'>alert('Thay đổi mật khẩu thành công');";
							echo "location.href='../index.php';</script>";
					}	
			}
	    }else{
	    	echo "<Style>
	    		#reset{
	    	display: none;
	    }
	    	</style>";
	    	echo "<script language='javascript'>alert('Không tồn tại mã này!');
	    	location.href='quenmatkhau.php';</script>";
	    }
	     ?>
<!DOCTYPE html>
<html>
<head>
<title>Khôi phục mật khẩu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<div class="col-md-12" style="text-align : center">
	<div class="col-md-3 shadow bg-white" style="border-radius: 10px; padding :50px; display : inline-block; margin-top: 50px">
			<form id="reset" action="" method="post">
			<input class="form-control" type="password" name="password" id="password" onchange='check_pass();' placeholder="Mật khẩu" /><br>
				<input class="form-control" type="password" name="confirm_password" id="confirm_password" onchange='check_pass();' placeholder="Nhập lại mật khẩu" />
				<span id='message'></span><br>
				<button class="btn btn-success" type="submit" name="btn_submit" id="submit" disabled>Thay đổi</button>
			</form>
	</div>
</div>
</body>
<script type="text/javascript">
 function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Mật khẩu trùng khớp').css('color', 'green');
  } else 
    $('#message').html('Mật khẩu không trùng').css('color', 'red');
});
</script>
</html>