<?php
	/**
	 * Created by PhpStorm.
	 * User: DERBIE
	 * Date: 4/26/2018
	 * Time: 5:37 AM
	 */
	include "../sms/SMSClass.php";
	include "../class/Ems.class.php";
	$sms = new SMS();
	$ems = new Ems();
	
	$phone = $_GET['phone'];


// display debug data? TRUE/FALSE
	$sms->debugMode = true;


// get these credentials from http://giantsms.mi-xtreme.ml/profile
	$sms->username = "hzqwWXGk";
	$sms->password = "BYFifsZPgo";

// -------------------------------------------------

// to send a message
	$sender = "EMS"; // should not be more than 11 characters... should not include copyrighted names [ like MobileMoney :( ]
	$recipient = $phone;
	$message = "Hello. Thanks for subscribing to our event managing system. We'll keep you in touch ;)";
	
	if($sms->send($message, $recipient, $sender))
		$ems->useRawQuery("UPDATE ems_subscribers SET sub_received_text ='1' WHERE sub_phone = ".$_GET['phone']);
	$ems->goToHeader(BASE_URL.'?s');
	

// -------------------------------------------------

// to get remaining credit balance
	$credits = $sms->balance();
