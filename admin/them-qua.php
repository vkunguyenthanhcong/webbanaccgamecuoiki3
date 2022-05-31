<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thêm quà cho vòng quay</title>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
</head>
<body>
<div class="container">
    <form action="#" method="post" id="form" enctype="multipart/form-data">
        <h3>THÊM QUÀ</h3>
        <label>Tên quà: </label><input type="text" id="text" name="text"><br>
        <label for="">Số lượng: </label><input id="loai" type="text" name="number"><br>
        <label>Tỉ lệ: </label><input type="text" id="percent" name="percent"><br>
        <label>Hình ảnh</label>
        <input type="file" name="image" id="image" /><br>
        <button  class="btn btn-success" type="submit" name="btn_submit">Lưu</button>
        <button  class="btn btn-success" type="reset">Reset</button><br><br>
        <a href="../admin/dashboard.php" class="btn btn-success">Trang chủ</a>
    </form>
</div>

</body>
<?php //ob_start();
if (isset($_POST['btn_submit'])){
    include_once('../lib/connection.php');
    // upload hinh anh
    $icon=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"../photo/".$icon);

    $text = $_POST['text'];
    $number = $_POST['number'];
    $percent = $_POST['percent'];

    $sl = "insert into quavongquay (text, images, number, percent) Value('$text','$icon','$number','$percent')";

    if(mysqli_query($conn,$sl))
    {
        echo "<script>alert('Thêm thành công');</script>";
    }
    else
    {
        echo 'Lỗi: ',mysqli_error($conn);
    }
}
?>

</html>