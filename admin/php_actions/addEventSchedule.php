<?php
include "../class/Ems.class.php";

$ems = new Ems();

if (isset($_POST['event_title']) && isset($_POST['event_date']) && isset($_POST['event_color'])){


	$title = $_POST['event_title'];
	$start = $_POST['event_date'];
    $color = $_POST['event_color'];
    $image = $_FILES["image"]["name"];

    if ($ems->new_event($title, $color, $start, $_POST['location'], $image))
    {
        $msg = '';
        $target_dir = "../uploads/event_images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check == false) {
            $msg = "The Event was posted but your file is not an image.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg = "The Event was posted but your image was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $msg = "Event was created successfully.";
            }else {
                $msg = "Sorry, there was an error uploading your file.";
            }
        }
    }else
        $msg = "Unable to add event";
    $ems->goToHeader(ADMIN_BASE_URL.'?page=event&msg='.$msg);
}


	
?>
