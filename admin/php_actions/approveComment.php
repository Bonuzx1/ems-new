<?php
	/**
	 * Created by PhpStorm.
	 * User: DERBIE
	 * Date: 4/26/2018
	 * Time: 7:23 AM
	 */
	include "../class/Ems.class.php";
	$e = new Ems();
	
	$e->useRawQuery("UPDATE ems_comment SET comment_isApproved = '1' WHERE comment_id =".$_GET['id']);
	$msg = "Succesfully approved the comment";
	$e->goToHeader(ADMIN_BASE_URL."?page=comment&msg=".$msg);