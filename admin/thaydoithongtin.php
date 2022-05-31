<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>@import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(45deg, greenyellow, dodgerblue);
  font-family: "Sansita Swashed", cursive;
}
.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 300px;
  height: 50px;
  margin-bottom: 50px;
}
.center .inputbox input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}
.center .inputbox:last-child {
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="button"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}
.center .inputbox:hover [type="button"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}

</style>
<body>
  

<?php
require_once '../lib/connection.php';
?>
<?php
	$sql = 'SELECT * FROM users where id = '.$_GET['id'];
	$query = mysqli_query($conn,$sql);
?>

<div class="center">
  <h1>Thay đổi thông tin</h1>
  <form method="post" action="#">
  <?php while ( $data = mysqli_fetch_array($query) ) { ?>
  <div class="inputbox">
      <input type="text" disabled>
      <span>ID <?php echo $data['id']; ?></span>
    </div>
    <div class="inputbox">
      <input type="text" name="fullname" value="<?php echo $data['fullname']; ?>">
      <span>Họ và tên</span>
    </div>
    <div class="inputbox">
      <input type="text" name="username" value="<?php echo $data['username']; ?>">
      <span>Tài khoản</span>
    </div>
    <div class="inputbox">
      <input type="email" name="email" value="<?php echo $data['email']; ?>">
      <span></span>
    </div>
    <div class="inputbox">
      <input type="text" name="phone" value="<?php echo $data['phone']; ?>">
      <span>Số điện thoại</span>
    </div>
    <div class="inputbox">
      <input type="password" name="password" value="<?php echo $data['password']; ?>">
      <span>Mật khẩu</span>
    </div>
    <div class="inputbox">
      <input type="text" name="diachi" value="<?php echo $data['diachi']; ?>">
      <span>Địa chỉ</span>
    </div>
    <button class="btn btn-success" type="submit" name="submit">Xác nhận</button>
    <a href="dashboard.php" class="btn btn-primary">Trang chủ</a>
    <?php } ?>
  </form>
</div>
<?php
if (isset($_POST['submit'])) {
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$diachi = $_POST['diachi'];

		if(isset($_GET["id"]))   
			{
			 $key = $_GET["id"];
			}
$sl="update users set fullname='$fullname',username='$username', email='$email', phone='$phone', password='$password', diachi='$diachi'  where id='$key'";		
if(mysqli_query($conn, $sl))
{
	echo "<script language='javascript'>alert('Sửa thành công');";
		echo "location.href='thongtintv.php';</script>";
}
	}
?>
</body>