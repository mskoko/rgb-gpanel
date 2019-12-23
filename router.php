<?php
  include_once($_SERVER['DOCUMENT_ROOT'].'/includes.php');
  
	if(isset($_GET['action']))
	{
	$action = stripslashes(htmlspecialchars(trim($_GET['action'])));
	$url = explode('/', $action);
	}
	else 
	{
		$url[0] = "home";
	}
  
switch ($url[0]) {
	case 'home': {
		$title = 'Home | '.$Config['Site']['Name'];
    require_once($_SERVER['DOCUMENT_ROOT'].'/assets/php/head.php');
		require_once('home.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/assets/php/footer.php');
    break;
   }
   case 'login': {
   	$title = 'Login | '.$Config['Site']['Name'];
    require_once($_SERVER['DOCUMENT_ROOT'].'/assets/php/head.php');
		require_once('login.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/assets/php/footer.php');
    break;
   }
   case 'register': {
    $title = 'Register | '.$Config['Site']['Name'];
    require_once($_SERVER['DOCUMENT_ROOT'].'/assets/php/head.php');
		require_once('register.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/assets/php/footer.php');
    break;
   }
   case 'logout': {
		require_once('logout.php');
    break;
   }
   default:
	 {
        $title = 'Error 404';
				$page = '404.php';
	 }
}
