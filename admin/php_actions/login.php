<?php
include "../class/Ems.class.php";

$ems = new Ems();

if(isset($_POST['submit']))
{
//    print_r($_POST);exit;
    if ($ems->Login($_POST['username'], $_POST['password']))
    {
        $_SESSION['user_name'] = $_POST['username'];
        $_SESSION['loggedin'] = true;
        header("Location: ../index.php");
    }
    else{
        echo "<script>alert('wrong')</script>";
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
}