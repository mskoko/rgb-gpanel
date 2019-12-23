<?php
header_remove("X-Powered-By");
$img_src = '/assets/img/header/4.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>

	<!-- ld -->
	<script type="application/ld+json" src="/assets/json/ld.json"></script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="revisit-after" content="1 days">
	
	<meta name="author" content="Muhamed Skoko | mskoko.me@gmail.com | Nikita Šibul (RootSec) cik3r@pm.me">

	<!-- Icon -->
	<link rel="icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/favicon.ico" type="image/x-icon">

	<!-- Bootstrap 4 -->
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/animate.css">

	<!--[if IE]>
    	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  	<![endif]-->
    
	<!--[if lt IE 9]>
		<script src="/assets/theme/js/respond.min.js"></script>
	<![endif]-->
</head>
