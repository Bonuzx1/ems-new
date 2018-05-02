<?php
	/**
	 * Created by PhpStorm.
	 * User: DERBIE
	 * Date: 4/26/2018
	 * Time: 4:15 AM
	 */
	
	include "../class/Ems.class.php";
	$ems = new Ems();
	$output = [
		0 => "File(s) Uploaded Successfully",
		1 => 'Error Uploading file(s), try again some other time',
		2 => 'Unaccepted file extension found',
		3 => 'Please make sure you have selected an event and added corresponding media'
	];
	if (isset($_POST['submit-video']))
	{
		if ($ems->addEventMedia($_POST['event-id'], '', $_POST['videolink']))
		{
			$output = $output[0];
		}else
			$output = $output[1];
		$ems->goToHeader(ADMIN_BASE_URL.'?page=gallery&type=new-vid&msg='.$output);
	}