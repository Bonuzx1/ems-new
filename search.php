<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 4/10/2018
 * Time: 5:45 PM
 */

if (!isset($_GET['sort']))
{
    echo "error";
}
else{
    if ($_GET['sort']=='user' && isset($_GET['id']))
    {
        $user = $db->getOneValue('ems_users', 'user_id', $_GET['id']);
    }
}
?>