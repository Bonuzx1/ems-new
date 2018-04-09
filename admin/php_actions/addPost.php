<?php
include "../class/Ems.class.php";

$ems = new Ems();
$ems->define();
if(isset($_POST['submit'])){
    print_r($_POST);
    $user = $ems->getCurUser();
    if ($_POST['blog_publishDate']===''){
        $scheduled = date('Y-m-d H:m:s');

    }else
    {
        $temp = strtotime($_POST['blog_publishDate']);
        $scheduled = date('Y-m-d H-m-s', $temp);
        if ($scheduled == date('Y-m-d ').'00-03-00') {
            $scheduled = date('Y-m-d H-m-s');
        }
    }



$title = $_POST['blog_title']; $content = $_POST['blog_body'];
$author = $user['user_id']; $category = $_POST['blog_category']; $tag = $_POST['blog_tags'];
$created = date('Y-m-d H:m:s'); $comment = '56'; $status = '1';
$permalink = 'localhost/ems-new/?p=';

    $image_name = $_FILES['blog_image']['name'];
    print_r($image_name);exit;

if($res = $ems->post_new($title, $content, $author, $category, $tag, $created,
    $scheduled, $comment, $status, $permalink, $image_name)) {
//    print_r($res);exit;

    //image
    $target_dir = "../uploads/blog_images/".$ems->insertId();
    $target_file = $target_dir . basename($_FILES["blog_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["blog_image"]["tmp_name"]);
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
        if (move_uploaded_file($_FILES["blog_image"]["tmp_name"], $target_file)) {
//            $msg = "The file ". basename( $_FILES["blog_image"]["name"]). " has been uploaded.";
            $msg = 'uploaded';
        } else {
            $msg = "Sorry, there was an error uploading your file.";
        }
    }
    if ($msg != 'uploaded')
        $ems->goToHeader(ADMIN_BASE_URL.'?page=post&msg=Post Added But Error Adding Image');
    $ems->goToHeader(ADMIN_BASE_URL.'?page=post&msg=Post Successfully Added');

}
else{
    header('Location: '.$_SERVER['HTTP_REFERER']);

}

}