<?php
include "../class/Ems.class.php";

$ems = new Ems();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($ems->delEvent($id))
    {
        echo 'sucess';
    }else
        echo "no";
    header('Location: '.$_SERVER['HTTP_REFERER']);
}