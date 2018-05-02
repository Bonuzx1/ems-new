<?php
	/**
	 * Created by PhpStorm.
	 * User: DERBIE
	 * Date: 4/26/2018
	 * Time: 5:22 AM
	 */
	
	include "../class/Ems.class.php";
	$ems = new Ems();
	
	if(isset($_POST['submit-sub']))
	{
		if ($ems->newsubscriber($_POST['name'], $_POST['sub_phone']))
		{
			$ems->goToHeader(ADMIN_BASE_URL."php_actions/sendSubMessage.php?phone=".$_POST['sub_phone']);
		}
	}
