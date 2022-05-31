<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm ảnh</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.container {
    width: 80%;
    margin: auto;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
    input[type=text] {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
input[type=password] {
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
		<?php 
		include("../lib/connection.php");
		$maacc = $_GET['maacc'];
		
		?>
		<?php 
		
		?>
<div class="container">
	<H2>Thêm ảnh</h2>
    <form action="#" enctype="multipart/form-data" method="post">
        <label>Mã ACC</label>
        <input type="text" name="maacc" value="<?php echo $maacc;?>" disabled>
 
        <input type="file" name="files[]" multiple >
        <button class="btn btn-success" name="btn_submit">Thay đổi</button>
        <a class="btn btn-primary" href="dashboard.php">Trở về trang chủ</a>
    </form>
    <?php
// Include the database configuration file

// Get images from the database
$query = mysqli_query($conn, "SELECT * FROM images  WHERE maacc = '$maacc'");

if($query->num_rows > 0){
    while($row = mysqli_fetch_array($query)){
        $imageURL = '../photo/'.$row["file_name"];
?>
    <img style="width: 500px" src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> 
    </div>



    <?php 
if(isset($_POST['btn_submit'])){ 
    // File upload configuration 
    $targetDir = "../photo/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$fileName."', NOW(), '".$maacc."'),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = mysqli_query($conn, "INSERT INTO images (file_name, uploaded_on, maacc) VALUES $insertValuesSQL");
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
 
?>    
</body>
</html>