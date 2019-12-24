<?php
if(!defined('gp')) {
   die('Direct access not permitted');
}

if (isset($_GET['lang'])) {
	if (isset($_GET['lang']) && $_GET['lang'] == 'en') {
		$_SESSION['lang'] = 'en';
	} else {
		$_SESSION['lang'] = 'me';
	}
}

if (isset($_SESSION['lang'])) {
	if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
		include_once($_SERVER['DOCUMENT_ROOT'].'/lang/en.php');
	} else {
		include_once($_SERVER['DOCUMENT_ROOT'].'/lang/me.php');
	}
} else {
	$_SESSION['lang'] = 'me';
	include_once($_SERVER['DOCUMENT_ROOT'].'/lang/me.php');
}


?>
