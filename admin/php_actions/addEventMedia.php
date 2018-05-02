<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 4/25/2018
 * Time: 12:10 AM
 */
include "../class/Ems.class.php";
$ems = new Ems();

$output = [
    0 => "File(s) Uploaded Successfully",
    1 => 'Error Uploading file(s), try again some other time',
    2 => 'Unaccepted file extension found',
    3 => 'Please make sure you have selected an event and added corresponding media'
];
if(isset($_FILES) && isset($_POST['event']) && !empty($_POST['event']) && !empty($_FILES['files']['name'][0]))
{
	
	
    for ($i=0; $i<count($_FILES['files']['name']); $i++)
    {
    	$ems->addEventMedia($_POST['event'], $_FILES['files']['name'][$i], '');
		    $file_name = explode(".", $_FILES['files']['name'][$i]);
		    $allowed_ext = array("jpg", "jpeg", "png", "gif", "mp4");
		    //        print_r($file_name[0]);
		    //        exit;
		    //        continue;
		
		    if (in_array(strtolower($file_name[count($file_name) - 1]), $allowed_ext)) {
			    //            $new_name = md5(rand()) . '.' . $file_name[1];
			    $sourcePath = $_FILES['files']['tmp_name'][$i];
			    $targetPath = "../uploads/gallery/";
			    $targetPath = $targetPath . $_FILES['files']['name'][$i];
			    if (move_uploaded_file($sourcePath, $targetPath)) {
				    $output = $output[0];
			    } else {
				    $output = $output[1];
			    }
		    } else {
			    $output = $output[2];
		    }
	    
    }echo $output . "\n\r";
}
else {
	$output = $output[3];
	echo $output . "\n\r";
}