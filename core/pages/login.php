<?php 
if(!defined('gp')) {
   die('Direct access not permitted');
}

if(isset($_GET['log'])) {
    $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if(empty($POST['Email'])) {
        $error[] = 'Greska!';
        //$Note->sMSG('Morate unijeti Email.', 'error');        
    }
    if(empty($POST['Password'])) {
        $error[] = 'Greska!';
        //$Note->sMSG('Morate unijeti password.', 'error');        
    }
    $Email 		= $Secure->SecureTxt($POST['Email']);
    $Pass 		= $Secure->SecureTxt($POST['Password']);
    if (isset($POST['zapamtiME'])) {
    	$ZapamtiME 	= $Secure->SecureTxt($POST['zapamtiME']);
    } else {
    	$ZapamtiME = '';
    }
    if (isset($ZapamtiME) && $ZapamtiME == '1') {
    	$ZapamtiME = '1';
    } else {
    	$ZapamtiME = '0';
    }
    if(empty($error)) {
        echo $User->LogIn($Email, $Pass, false, $ZapamtiME);
    } else {
        //$Note->sMSG('Podaci za prijavu nisu tacni!', 'error');
    }
}
?>
<body>
	<div id="organization"></div><div id="webpage"></div>

	<div class="preloader"></div>

	<!-- Alerts -->
	<div id="msg_alert"><?php echo $Alert->PrintAlert(); ?></div>
	<script type="text/javascript">
		setTimeout(function() {
			document.getElementById('msg_alert').innerHTML = "<?php echo $Alert->RemoveAlert(); ?>";
		}, 5000);
	</script>

	<!-- Header -->
	<header class="header_area">
		<!-- Navigation -->
		<div class="main_menu">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav class="navbar navbar-expand-lg navbar-light">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item">
										<a class="nav-link js-scroll-trigger" href="/home">
											<i class="fa fa-home"></i> Home
										</a>
									</li>

									<li class="nav-item">
										<a class="nav-link js-scroll-trigger" href="/help">
											<i class="fa fa-support"></i> Help
										</a>
									</li>
								</ul>

								<div class="rightNav" style="float:right;">
									<li class="nav-item">
										<a class="nav-link js-scroll-trigger" href="/login?login">
											<i class="fa fa-user"></i> Log in
										</a>
									</li>

									<li class="nav-item">
										<a class="nav-link js-scroll-trigger btn btn btn-primary" href="/order#games">
											<i class="fa fa-user-plus"></i> Buy now
										</a>
									</li>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header> <!-- end Header -->

	<div class="space" style="margin-top:50px;"></div>
	<!-- Page content -->

    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-6">
    			<?php if (isset($_GET['login'])) { ?>
	    			<form action="/login?log" method="POST">
		                <div class="form-group">
		                    <label>Email address</label>
		                    <input type="email" name="Email" class="form-control" placeholder="Email" required="" autocomplete="Email">
		                </div>

		                <div class="form-group">
		                    <label>Password</label>
		                    <input type="password" name="Password" class="form-control" placeholder="Password" required="">
		                </div>

		                <div class="form-gorup">
		                	<label for="zapamtiME">
		                		<input id="zapamtiME" type="checkbox" name="zapamtiME" value="1" <?php if(isset($_COOKIE['member_login'])) { ?> checked <?php } ?>>
		                		Save my credentials
		                	</label>

		                	<label for="zapamtiME" style="float:right;">
		                		<a href="/login?forgot">I forgot my password</a>
		                	</label>
		                </div>

		                <button class="btn btn-primary btn-flat m-b-30 m-t-30" style="width:100%;">
		                	<i class="fa fa-sign-in"></i> Sign in
		                </button>     
		            </form>
		        <?php } else if (isset($_GET['active'])) { ?>
		        	<form action="/login?save_pw" method="POST">
		        		<input type="text" name="id" value="<?php echo $UserID; ?>" style="display:none;">
		        		<input type="text" name="key" value="<?php echo $TokenKey; ?>" style="display:none;">

		        		<div class="form-group">
		                    <label>Password</label>
		                    <input type="password" name="Password" class="form-control" placeholder="Password" required="">
		                </div>

		                <div class="form-group">
		                    <label>Re-Password</label>
		                    <input type="password" name="re_pw" class="form-control" placeholder="Password" required="">
		                </div>

		                <button class="btn btn-success btn-flat m-b-30 m-t-30" style="width:100%;">
		                	<i class="fa fa-save"></i> Save
		                </button> 
		        	</form>
		        <?php } else if (isset($_GET['forgot'])) { ?>
					<form action="/login?reset_pw" method="POST">
		                <div class="form-group">
		                    <label>Email address</label>
		                    <input type="email" name="Email" value="<?php if(isset($_GET['check_mail'])) { echo $Secure->SecureTxt($_GET['check_mail']); } ?>" class="form-control" placeholder="Email" required="" autocomplete="Email">
		                </div>

		                <button class="btn btn-primary btn-flat m-b-30 m-t-30" style="width:100%;">
		                	<i class="fa fa-key"></i> Send me code
		                </button>

		                <hr>

		                <div class="form-gorup">
		                	<label for="zapamtiME" style="float:right;">
		                		<a href="/login?login">
		                			<i class="fa fa-angle-left"></i> Back to login
		                		</a>
		                	</label>
		                </div>  
		            </form>
		        <?php } else if (isset($_GET['reset_password'])) {
		        	$GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		        	$userID = $Secure->SecureTxt($GET['uID']);
		        	$Token = $Secure->SecureTxt($GET['Token']);
		        	//echo $userID.'<br>'.$Token;
		        	//Proveri dali je zahtev za Reset lozinke Ispravan
					if (!empty($User->CheckForgotPass($userID, $Token)['id']) && $User->CheckForgotPass($userID, $Token)['Status'] == '1') {
						//Ok.
					} else {
						die('<b>This URL token is invalid!</b> <br> Please go to <a href="/login?login">Login</a> or <a href="/home">homepage</a>.');
					}
					
					?>
		        	<form action="/login?new_password" method="POST" autocomplete="off">
		        		<input type="text" name="uID" value="<?php echo $userID; ?>" style="display:none;">
		        		<input type="text" name="Token" value="<?php echo $Token; ?>" style="display:none;">

		        		<div class="form-group">
		                    <label>New Password</label>
		                    <input type="password" name="Pass" class="form-control" placeholder="New password" required="">
		                </div>

		                <div class="form-group">
		                    <label>Re-Password</label>
		                    <input type="password" name="rPass" class="form-control" placeholder="re-Password" required="">
		                </div>

		                <button class="btn btn-primary btn-flat m-b-30 m-t-30" style="width:100%;">
		                	<i class="fa fa-save"></i> Save
		                </button> 
		        	</form>
		        <?php } ?>
    		</div>
		</div>
    </div>
