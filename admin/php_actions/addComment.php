<?php
	/**
	 * Created by PhpStorm.
	 * User: DERBIE
	 * Date: 4/25/2018
	 * Time: 7:19 PM
	 */
	include "../class/Ems.class.php";
	$ems = new Ems();
	$msg = '';
	if (isset($_POST['username']))
	{
		if ($ems->addComment($_POST['username'], $_POST['useremail'], $_POST['commenttext'], $_POST['post']))
		{
			$msg = "Your comment has been added for review";
			
		}else
			$msg = "An error occurred, please try again in a few minute";
		$ems->goToHeader($_SERVER['HTTP_REFERER'].'&msg='.$msg);
	}