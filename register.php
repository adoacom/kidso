<?php
	include_once('include/common.php');
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Firebean Limited">  
	<title>Kids O</title>
	<link rel="stylesheet" type="text/css" href="css/common.css" media="screen"> 
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Font Awesome CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/bootstrap-rating.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/smoothproducts.css">
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	
	<style>
		.symbol {
			display: inline-block;
			border-radius: 50%;
			border: 0px double black;
			width: 20px;
			height: 20px;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			setHeaderUI();
		});
	</script>
</head>
<body>
<div class="header_bar"></div>
<div class="header"><?php include_once('header.php');?></div>
<div class="color_bar"></div>
<div class="mainbody">
<span class="content-gray content-center content-bold content-Text6">SIGN UP FOR KIDS O</span>
<p></p>
<div class="registerbody">
<div class="registerForm content-black content-left content-Text2">
E-mail Address<br>
<input id="email" class="rformtext">
<br><br>
Choose Your Password<br>
<input id="password" class="rformtext">
<br><br>
Your Name Displays As<br>
<input id="dname" class="rformtext">
<br><br>
Mobile Phone Number<br>
<input id="phone" class="rformtext">
<br><br>
<div class="center">
<button name="loginbtn" id="loginbtn" class="flatbtn-blu content-Text5 hidemodal">Submit</button>
</div>
<br>
</div>
</div>
</div>
</body>