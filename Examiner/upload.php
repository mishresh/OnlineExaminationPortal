<?php
require "connect.php";
require "addquestions.php";
$target_dir = "../store/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<h5 style='color:red;'>File is an image - " . $check["mime"] . ".</h5>";
        $uploadOk = 1;
    } else {
        echo "<h5 style='color:red;'>File is not an image.</h5>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<h5 style='color:red;'>Sorry, file already exists.</h5>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<h5 style='color:red;'>Sorry, your file is too large.</h5>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<h5 style='color:red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h5>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h5 style='color:red;'>Sorry, your file was not uploaded.</h5>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h5 style='color:red;'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h5>";
    } else {
        echo "<h5 style='color:red;'>Sorry, there was an error uploading your file.</h5>";
    }
}
$op1 = $_POST['op1'];
$op2 = $_POST['op2'];
$op3 = $_POST['op3'];
$op4 = $_POST['op4'];
$correct = $_POST['correct'];
$sub_id = $_POST['sub_name'];
$examiner_id = $_SESSION['examiner_id'];
$add_que = $_POST['addque'];

$right = 0;

if($correct == 'a')
{
    $right = 1;
}
else if($correct == 'b')
{
    $right = 2;
}
else if($correct == 'c')
{
    $right = 3;
}
else if($correct == 'd')
{
    $right = 4;
}

if($op1 == "")
{
    $insert_img = 'INSERT INTO `question`(`img_question`, `text_question`, `examiner_id`, `sub_id`, `correct_op`) VALUES("'.$target_file.'", "'.$add_que.'", '.$examiner_id.', "'.$sub_id.'", '.$right.')';
}
else
{

    $insert_img = 'INSERT INTO `question`(`op_a`, `op_b`, `op_c`, `op_d`, `img_question`, `text_question`, `examiner_id`, `sub_id`, `correct_op`) VALUES("'.$op1.'", "'.$op2.'", "'.$op3.'", "'.$op4.'", "'.$target_file.'", "'.$add_que.'", '.$examiner_id.', "'.$sub_id.'", '.$right.')';
}
if(mysql_query($insert_img))
{
    echo "<script>alert('Image successfully added to database')</script>";
}
else{
    echo "<script>alert('".die(mysql_error())."')</script>";
    header('addquestions.php');
}

?>