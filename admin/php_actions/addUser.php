<?php
include "../class/Ems.class.php";

$ems = new Ems();

if (isset($_POST['submit'])){

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["user_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["user_image"]["tmp_name"]);
        if($check == false) {
            $msg = "File is not an image.";
            $uploadOk = 0;
        }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
            $msg = "The file ". basename( $_FILES["user_image"]["name"]). " has been uploaded.";
        } else {
            $msg = "Sorry, there was an error uploading your file.";
        }
    }

    $first_name = $_POST['user_first_name']; $username = $_POST['user_name'];
    $email = $_POST['user_email']; $pass = md5($_POST['user_password']);
    $phone = $_POST['user_phone']; $type = $_POST['user_type'];
    $image_name = $_FILES['user_image']['name'];
//    if(!empty($_FILES['user_image']['tmp_name'])
//        && file_exists($_FILES["user_image"]["name"])) {
        $image_file= (file_get_contents($_FILES['user_image']['tmp_name']));
//    }
//print_r($msg); exit;
    if($ems->new_user($username, $first_name, $email, $pass, $phone, $type, $image_name, '')){
        $msg = "User successfully added";
        header("Location: ../index.php?page=users&msg=$msg");
    }


}