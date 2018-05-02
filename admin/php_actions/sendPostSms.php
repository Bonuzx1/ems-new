<?php
	/**
	 * Created by PhpStorm.
	 * User: DERBIE
	 * Date: 4/26/2018
	 * Time: 6:01 AM
	 */
	
	include "../sms/SMSClass.php";
	include "../class/Ems.class.php";
	$sms = new SMS();
	$ems = new Ems();
	


// display debug data? TRUE/FALSE
	$sms->debugMode = true;


// get these credentials from http://giantsms.mi-xtreme.ml/profile
	$sms->username = "hzqwWXGk";
	$sms->password = "BYFifsZPgo";

// -------------------------------------------------

// to send a message
	$sender = "EMS"; // should not be more than 11 characters... should not include copyrighted names [ like MobileMoney :( ]
	$message = "Hello. We've posted on ".$_GET['title'].". See you on the website";
	$sub = $ems->fillTable('ems_subscribers');
	foreach ($sub as $item) {
		$recipient = $item['sub_phone'];
		$sms->send($message, $recipient, $sender);
	}
	$msg = "Successfully sent the message to all subscribers and added the post";
	$ems->goToHeader(ADMIN_BASE_URL.'?page=post&msg='.$msg);


// -------------------------------------------------

// to get remaining credit balance
//	$credits = $sms->balance();
