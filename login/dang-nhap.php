<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng nhập / Đăng ký</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>
<body>
    <script type="text/javascript">
$(document).ready(function(){
$('*').bind('cut copy paste contextmenu', function (e) {
    e.preventDefault();
})});
</script>

<?php
if (isset($_SESSION['fullname']) == false) {
}else {
    if (isset($_SESSION['fullname']) == true) {
        // Ngược lại nếu đã đăng nhập
        header('Location: ../index.php');
}}
?>

<?php
        require_once("../lib/connection.php");
        if (isset($_POST["btn_dangky"])) {
            //lấy thông tin từ các form bằng phương thức POST
            $username = $_POST["username"];
            $password = $_POST["password"];
            $fullname = $_POST["fullname"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $id = $_POST["id"];
 
              if ($username == "" || $password == "" || $fullname == "" || $email == "" || $phone == "") {
                   echo "<script>alert('Bạn vui lòng điền đầy đủ thông tin')</script>";
            }else{
                    $kt=mysqli_query($conn, "select * from users where username='$username' or email='$email'");

                    if(mysqli_num_rows($kt)  > 0){
                        echo "<script>alert('Tài khoản đã tồn tại.')</script>";
                    }else{
                        mysqli_query($conn,"INSERT INTO users(id,fullname,email,phone,username,password,createdate) VALUES ('$id','$fullname','$email','$phone','$username','$password',now())");
                        header('location: dang-nhap.php')   ;
                        }             
              }
    }
    ?>
    <?php 
if (isset($_POST["btn_dangnhap"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $username = strip_tags($username);
  $username = addslashes($username);
  $password = strip_tags($password);
  $password = addslashes($password);
  if ($username == "" || $password =="") {
    echo "<script>alert('Tài khoản, mật khẩu không được để trống!')</script>";
  }else{
    $query = mysqli_query($conn,"select * from users where username = '$username' and password = '$password'");
    $num_rows = mysqli_num_rows($query);
    if ($num_rows==0) {
     echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!')</script>";
    }else{
      // Lấy ra thông tin người dùng và lưu vào session
      while ( $data = mysqli_fetch_array($query) ) {
          $_SESSION["user_id"] = $data["id"];
        $_SESSION["username"] = $data["username"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["fullname"] = $data["fullname"];
        $_SESSION["phone"] = $data["phone"];
        $_SESSION["thanhvien"] = $data["thanhvien"];
        }
      
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
      header('Location: ../index.php');
    }
  }
}
 ?>
<?php
 
require_once 'vendor/autoload.php';

// Lấy những giá trị này từ https://console.google.com
$client_id = '426775583892-03c8clbed6me1b6c4qmncsk2luehhf5i.apps.googleusercontent.com'; 
$client_secret = 'Q_8cqY_0t2bzksPLKmVPYgRt';
$redirect_uri = 'http://localhost/store/login/dang-nhap.php';
 
//Thông tin kết nói database
include "../lib/connection.php";
###################################################################
 
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
 
$service = new Google_Service_Oauth2($client);
 
// Nếu kết nối thành công, sau đó xử lý thông tin và lưu vào database
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    //header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    $user = $service->userinfo->get(); //get user info 
 
    // connect to database
    $mysqli = new mysqli($server_host, $server_username, $server_password, $database);
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
 
    //Kiểm tra xem nếu user này đã tồn tại, sau đó nên login tự động
    $result = $mysqli->query("SELECT COUNT(id) as usercount FROM users WHERE id=$user->id");
    $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
    
    //show user picture
    echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
 
    if($user_count) // Nếu user tồn tại thì show thông tin hiện có
    {   
        $sql = "select * from users WHERE id='$user->id' ";
        $query = mysqli_query($conn,$sql);
        $_SESSION["user_id"] = $user->id;
        $_SESSION["fullname"] = $user->name;
        while ( $data = mysqli_fetch_array($query) ) {
        $_SESSION["thanhvien"] = $data["thanhvien"];
        }
        echo "<script language='javascript'>location.href='../index.php';</script>";

    }
    else //Ngược lại tạo mới 1 user vào database
    {   
        $sql = "select * from users WHERE id='$user->id'";
        $query = mysqli_query($conn,$sql);
        $_SESSION["user_id"] = $user->id;
        $_SESSION["fullname"] = $user->name;
        while ( $data = mysqli_fetch_array($query) ) {
        $_SESSION["thanhvien"] = $data["thanhvien"];
        }
        
        $statement = $mysqli->prepare("INSERT INTO users (id, fullname, email, link, image, createdate) VALUES ('$user->id','$user->name','$user->email','$user->link','$user->picture', now())");
        $statement->execute();
        echo "<script language='javascript'>location.href='../index.php';</script>";
        echo $mysqli->error;
    }
    exit;
}
 
//Nếu sẵn sàng kết nối, sau đó lưu session với tên access_token
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else { // Ngược lại tạo 1 link để login
    $authUrl = $client->createAuthUrl();
}
?>


<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="dang-nhap.php" method="post">
            <h1>Tạo tài khoản</h1>
            <div class="social-container">
                <a href="<?php if(isset($authUrl)) echo $authUrl ; ?>" class="social"><i class="fab fa-google-plus-g"></i></a>
               </div>
            <span>hoặc sử dụng email để đăng ký</span>
            <input type="hidden" name="id" value="<?php echo mt_rand(1000, 100000); ?>">
            <input type="text" name="fullname" placeholder="Họ và tên" />
            <input type="text" name="username" placeholder="Tài khoản" />
            <input type="email" name="email" placeholder="Email" />
            <input type="number" name="phone" placeholder="Số điện thoại" />
            <input type="password" name="password" id="password" onchange='check_pass();' placeholder="Mật khẩu" />
            <input type="password" name="confirm_password" id="confirm_password" onchange='check_pass();' placeholder="Nhập lại mật khẩu" />
            <span id='message'></span><br>
            
            
            <button type="submit" name="btn_dangky" id="submit" disabled>Đăng ký</button>
        </form>
        
    </div>
    <div class="form-container sign-in-container">
        <form action="dang-nhap.php" method="post">
            <h1>Đăng nhập</h1>
            <div class="social-container">
                
                <a href="<?php if(isset($authUrl)) echo $authUrl ; ?>" class="social"><i class="fab fa-google-plus-g"></i></a>
                
            </div>
            <span>hoặc sử dụng tài khoản</span>
            <input type="text" name="username" placeholder="Tài khoản" />
            <input type="password" name="password" placeholder="Mật khẩu" />
            
            <a href="quenmatkhau.php">Quên mật khẩu</a>

            <button type="submit" name="btn_dangnhap">Đăng nhập</button>
        </form>

    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Chào mừng bạn trở lại!</h1>
                <p>Để tiếp tục công việc, vui lòng đăng nhập</p>
                <button class="ghost" id="signIn">Đăng nhập</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Chào bạn!</h1>
                <p>Đăng ký thông tin để tham gia cùng với chúng tôi.</p>
                <button class="ghost" id="signUp">Đăng ký</button>
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="script.js"></script>

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
    $('#message').html('Mật khẩu khớp').css('color', 'green');
  } else 
    $('#message').html('Mật khẩu chưa khớp').css('color', 'red');
});
</script>
</html>


