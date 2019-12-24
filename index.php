<?php
/*************************************************************/
/*                       RootSec
/*************************************************************/

include_once($_SERVER['DOCUMENT_ROOT'].'/includes.php');
  
if(isset($_GET['action'])) {
  $action = stripslashes(htmlspecialchars(trim($_GET['action'])));
  $url = explode('/', $action);
} else {
  $url[0] = "home";
}
  
switch ($url[0]) {
	case 'home': {
		if (!($User->IsLoged()) == true) {
		header("Location: /login");
		die();
		}
    		$title = 'Home | '.$Config['Site']['Name'];
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/head.php');
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/home.php');
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/footer.php');
		break;
   	}
   	case 'login': {
   		$title = 'Login | '.$Config['Site']['Name'];
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/head.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/login.php');
   		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/footer.php');
    		break;
  	}
	case 'register': {	   
    		$title = 'Register | '.$Config['Site']['Name'];
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/head.php');
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/register.php');
   	        require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/footer.php');
   		break;
  	}
	case 'logout': {
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/logout.php');
   	 	break;
   	}
	default: {
       		 $title = 'Error 404';
		 require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/404.php');
	}
}
