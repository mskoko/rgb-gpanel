<?php
	ini_set('display_errors', 1); // Kad bude Live zameni sa 1 => 0;
	ini_set('display_startup_errors', 1); // Kad bude Live zameni sa 1 => 0;
	ini_set('error_log', 'dev/logs/errors.log'); // Logging file path
	error_reporting(E_ALL | E_STRICT | E_NOTICE);
	
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	ob_start();

	date_default_timezone_set('Europe/Belgrade');

	/* Change MAX upload size */
	/*ini_set(post_max_size, '100M');
	ini_set(upload_max_filesize, '100M');
	ini_set(max_execution_time, 6000000);
	ini_set(max_input_time, 6000000);
	ini_set(memory_limit, '100M');*/

	// SERVER HOME
	$path = $_SERVER['DOCUMENT_ROOT'];

	// Configuration Files
	include_once($path.'/core/inc/config.php');         			// MySQL Config File

	// Classes
	include_once($path.'/core/class/db.class.php'); 				// MySQL Managment Class
	include_once($path.'/core/class/lang.class.php'); 			// Lang Managment Class
	include_once($path.'/core/class/user.class.php'); 			// User Managment Class
	include_once($path.'/core/class/secure.class.php');    		// Secure Managment Class
	include_once($path.'/core/class/news.class.php');    		// News Managment Class
	include_once($path.'/core/class/upload.class.php');    		// Upload Managment Class
	include_once($path.'/core/class/alert.class.php');    		// Alert Managment Class
	include_once($path.'/core/class/log.class.php');    			// Logs Managment Class
	include_once($path.'/core/class/lang.class.php'); 			// Lang Managment Class

	// Initializing Classes
	$DataBase 	= new Database();
	$User 		= new User();
	$Secure 	= new Secure();
	$News 		= new News();
	$Upload 	= new Upload();
	$Alert 		= new Alert();
	
	// PHPMailer
	include_once($url.'/core/inc/libs/PHPMailer-master/class.phpmailer.php');
	include_once($url.'/core/inc/libs/PHPMailer-master/class.smtp.php');

	$mail = new PHPMailer();

	// Email template
	//include_once($url.'/assets/php/email_tmp.php');


	// Initializing SSH2
	/*set_include_path($_SERVER['DOCUMENT_ROOT'].'/core/inc/libs/SSH2');
	include_once('Net/SSH2.php');
	set_include_path('');*/


	//echo $_SESSION['lang'];

	// Initializing GameQ
	/*require_once($_SERVER['DOCUMENT_ROOT'].'/core/inc/libs/GameQ/Autoloader.php');
	$GameQ = new \GameQ\GameQ();*/
	
?>
