<?php
	include_once('include/common.php');
	$page = 1;
// 	$result = objectToArray(getSpecial());
// 	print_r($result);
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
	<link rel="stylesheet" href="css/screen.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/lightbox.css">

	<script src="js/lightbox.js"></script>	
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
			getYear(<?php echo date("Y");?>);
		});
		function getPage(id){
			$.get( "ajax/special_content.php?id="+id)
			.done(function( data ) {				
				$("#specialbody").html(data);
			});
		}
		function getYear(year){
			$.get( "ajax/special_page.php?pyear="+year)
			.done(function( data ) {				
				$("#specialDiv").html(data);
			});
		}		
	</script>
</head>
<body>
<div class="header_bar"></div>
<div class="header"><?php include_once('header.php');?></div>
<div class="color_bar"></div>
<div class="banner">
<img src="images/special_banner.png" class="full-width-img" />
</div>
<div class="mainbody">
<br>
<div id="specialDiv">
</div>
</body>