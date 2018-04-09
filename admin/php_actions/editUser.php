<?php
include "../class/Ems.class.php";

$ems = new Ems();

if(isset($_POST['submit'])){

    $first_name = $_POST['user_first_name']; $username = $_POST['user_name'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_phone']; $type = $_POST['user_type'];

    if($ems->user_edit($username, $first_name, $_POST['id'], $email, $phone, $type))
        header('Location: '.$_SERVER['HTTP_REFERER'].'&message=success');

}