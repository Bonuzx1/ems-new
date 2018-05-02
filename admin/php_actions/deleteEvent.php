<?php
include "../class/Ems.class.php";

$ems = new Ems();
$msg = '';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($ems->delEvent($id))
    {
        $msg =  'Event Deleted Successfully';
    }else
        $msg = "Error deleting event";
    $ems->goToHeader(ADMIN_BASE_URL.'?page=event&msg='.$msg );
}