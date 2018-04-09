<?php
include "../class/Ems.class.php";

$ems = new Ems();

if (isset($_POST['event_title']) && isset($_POST['event_date']) && isset($_POST['event_color'])){
	
	$title = $_POST['event_title'];
	$start = $_POST['event_date'];
    $color = $_POST['event_color'];
    if ($ems->new_event($title, $color, $start))
        header('Location: '.$_SERVER['HTTP_REFERER'.'&message=fail']);
    header('Location: '.$_SERVER['HTTP_REFERER'].'&message=fail');
}


	
?>
