<?php
include "../class/Ems.class.php";

$ems = new Ems();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($ems->delUser($id))
    {
        echo 'sucess';
    }else
        echo "";

    header('Location: '.$_SERVER['HTTP_REFERER']);
}