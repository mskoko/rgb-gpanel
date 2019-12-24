<?php
if(!defined('gp')) {
   die('Direct access not permitted');
}

class User {

	public function LogIn($Email, $Password, $AutoLogin=false, $ZapamtiME) {
		global $DataBase;
		global $Core;
		global $User;
		global $Alert;

		$DataBase->Query("SELECT id, Email, Password, Token, Status FROM `users` WHERE `Email` = :Email");
		$DataBase->Bind(':Email', $Email);
		$DataBase->Execute();

		$UserData 	= $DataBase->Single();

		if ($UserData['Status'] !== '1') {
			$Alert->SaveAlert('Your account has been deactivated.', 'error');
			header('Location: /login?login');
			die();
		}

		$UserCount 	= $DataBase->RowCount();

		//Autologin provera;
		if ($AutoLogin == false) {
			$Provera = md5($Password) == $UserData['Password'];
		} else {
			$Provera = !empty($Password);
		}

		if($UserCount == true && $Provera) {
			$_SESSION['UserLogin']['ID'] = $UserData['id'];

			if(isset($_COOKIE['accept_cookie']) && $_COOKIE['accept_cookie'] == '1') {
			    if ($ZapamtiME == '1') {
			    	// Get Current date, time
					$current_time = time();

					// Set Cookie expiration for 1 month
					$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

			    	setcookie('member_login', '1', $cookie_expiration_time);
			    	//Set Secure Cookies -> HttpOnly
			    	setcookie('l0g1n', $UserData['Token'].'_'.$UserData['id'], $cookie_expiration_time, '/', null, null, TRUE);
			    }
			}


			$Alert->SaveAlert('Welcome back!', 'success');
			header('Location: /home');
			die();
		} else {
			$Alert->SaveAlert('You have entered incorrect information. Please try again!', 'error');
			header('Location: /login');
			die();
		}
	}

	public function IsLoged() {
		global $User;

		if(isset($_SESSION['UserLogin'])) {
			$return = true;
		} else {
			if (isset($_COOKIE['l0g1n'])) {
				$GetUid = explode('_', $_COOKIE['l0g1n']);
				if (!empty($GetUid[1])) {
					if (!empty($User->UserDataID($GetUid[1])['id'])) {
						if ($User->UserDataID($GetUid[1])['Token'] == $GetUid[0]) {
							$return = $User->ProduziLogin($GetUid[1]);
						} else {
							$return = false;
						}
					}
				} else {
					$return = false;
				}
			} else {
				$return = false;
			}

			$return = false;
		}

		return $return;
	}

	public function ProduziLogin($uID) {
		global $User;

		if (!empty($uID) && is_numeric($uID)) {
			if (!empty($User->UserDataID($uID)['id'])) {
				$_SESSION['UserLogin']['ID'] = $uID;
				$return = true;
			} else {
				$return = false;
			}
		}
		
		return $return;
	}

	public function UserData() {
		global $DataBase;

		if(isset($_SESSION['UserLogin'])) {
			$DataBase->Query("SELECT * FROM `users` WHERE `id` = :ID");
			$DataBase->Bind(':ID', $_SESSION['UserLogin']['ID']);
			$DataBase->Execute();

			return $DataBase->Single();
		} else {
			return false;
		}
	}

	public function UserDataID($uID) {
		global $DataBase;

		$DataBase->Query("SELECT * FROM `users` WHERE `id` = :uID");
		$DataBase->Bind(':uID', $uID);
		$DataBase->Execute();

		return $DataBase->Single();
	}


}

?>
