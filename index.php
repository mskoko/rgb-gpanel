<?php
define('gp', TRUE);

include_once($_SERVER['DOCUMENT_ROOT'].'/includes.php');

if(isset($_GET['action'])) {
  $action = stripslashes(htmlspecialchars(trim($_GET['action'])));
  $url = explode('/', $action);
} else {
  $url[0] = "home";
}
if (!($User->IsLoged()) == true) {
switch ($url[0]) {
	case 'home': {
    		$title = 'Home | '.$Config['Site']['Name'];
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/head.php');
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/index.php');
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
	default: {
       		 $title = 'Error 404';
		 require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/404.php');
	}
}
} else {
switch ($url[0]) {
	case 'home': {
    		$title = 'Home | '.$Config['Site']['Name'];
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/head.php');
    		require_once($_SERVER['DOCUMENT_ROOT'].'/core/pages/home.php');
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
}
