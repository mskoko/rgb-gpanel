<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *   file                 :  index.php
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *   author               :  Muhamed Skoko - mskoko.me@gmail.com
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

include_once($_SERVER['DOCUMENT_ROOT'].'/includes.php');

if (isset($_GET['ssh'])) {
	$ssh = new Net_SSH2('');
	if (!$ssh->login('root', '')) {
	    exit('Login Failed');
	}

	echo $ssh->exec('ls');
	exit();

	//TEST SSH2 KONEKCIJE//
}


if (isset($_GET['cs'])) {
	for($port = 27015; $port <= 29999; $port++) {
		echo $port;
		exit();

		//SLOBODAN PORT ZA CS 1.6//
	}
}


if (isset($_GET['samp'])) {
	for($port = 7787; $port <= 9999; $port++) {
		echo $port;
		exit();

		//SLOBODAN PORT ZA SAMP//
	}
}


?>