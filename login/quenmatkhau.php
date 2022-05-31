<!DOCTYPE html>
<html>
<head>
    <title>Quên mật khẩu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php
        require_once("../lib/connection.php");
        use PHPMailer\PHPMailer\PHPMailer;
    	use PHPMailer\PHPMailer\Exception;
        if (isset($_POST["btn_submit"])) {
            //lấy thông tin từ các form bằng phương thức POST
            $email = $_POST["email"];
            $token = $_POST["token"];
 
            //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
              if ($email == "") {
                   echo "<script>alert('Bạn vui lòng điền đầy đủ thông tin')</script>";
            }else{
                    $kt=mysqli_query($conn, "select * from users where email='$email'");

                    if(mysqli_num_rows($kt)  > 0){
                        mysqli_query($conn,"update users set token='$token'where email='$email'");

                        $emailsend = $_POST['email'];
			            $subject = 'RESET PASSWORD';
			            $message = 'Bạn truy cập vào link <a href="http://localhost/store/login/resetpassword.php?token='.$token.'&email='.$email.'">Khôi phục mật khẩu</a>';
           
            require 'Exception.php';
            require 'PHPMailer.php';
            require 'SMTP.php';
            require 'OAuth.php';
            require 'POP3.php';

            $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'nonametkr@gmail.com';     
        $mail->Password = 'thanhcong';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'STARTTLS';                           
        $mail->Port = 587;                                   
 
        //Send Email
        $mail->setFrom('nonametkr@gmail.com');
 
        //Recipients
        $mail->addAddress($emailsend);              
        $mail->addReplyTo('nonametkr@gmail.com');
 
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;
 
        $mail->send();
 
       $_SESSION['result'] = 'Message has been sent';
       $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
       $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
       $_SESSION['status'] = 'error';
    }
 
    header("location: quenmatkhau.php");
                    }else{
                        //thực hiện việc lưu trữ dữ liệu vào db
                        echo "<script>alert('Không tồn tại email trong hệ thống')</script>";
                        }             
              }
    }
    ?>
    <div class="col-md-12 " style=" text-align: center; border-radius: 10px;">
        <div class="bg-white shadow col-md-3" style=" display: inline-block;padding:50px; margin-top:50px">
            <form action="quenmatkhau.php" method="post">
                <input class="form-control" type="email" name="email" placeholder="Nhập email">
                <input type="hidden" name="token" value="<?php $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz'; echo substr(str_shuffle($permitted_chars), 0, 10); ?>"><br>
                <button style="background: #5666a5; border-radius :50px" class="btn" type="submit" name="btn_submit"><b style="color:white">Gửi mã khôi phục</b></button>
            </form>
        </div>
    </div>
</body>
</html>