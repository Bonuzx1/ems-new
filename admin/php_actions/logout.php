<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 3/24/2018
 * Time: 1:42 PM
 */
include "../class/Ems.class.php";

$ems = new Ems();
$ems->logout();
header('Location: ../entry/login.php?loggedout');