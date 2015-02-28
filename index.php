<?php
	require_once("class/common.class.php");
?>
<html lang="en">
<head>
  <title>Kidso</title>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Firebean Limited">  
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/tut-nicescroll.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.nicescroll.js"></script>
  <script type="text/javascript" src="js/tut-nicescroll.js"></script>
  <script type="text/javascript" src="js/common.js"></script>
</head>
<script>
$( document ).ready(function() {
 	var W = $(window).width(),H = $(window).height(); 	
	if (W > 1000) W = 800;
	$('#bodydiv').width(800);
	$('#bodydiv').height(480);
	$('#ldiv').width($('#maindiv').width()/2-20);
	$('#rdiv').width($('#maindiv').width()/2-20);
	$('#ldiv').height(370);
	$('#rdiv').height(370);
	$('#maindiv').height(370);
	$('#banner').width(656);
	$('#banner').height(316);
	$('#banner1').width(656);
	$('#banner1').height(316);
	$('#banner2').width(656);
	$('#banner2').height(316);	
	$('#banner3').width(656);
	$('#banner3').height(316);	
	$('#banner4').width(656);
	$('#banner4').height(316);	
	$('#banner5').width(656);
	$('#banner5').height(316);	
	$('#banner6').width(656);
	$('#banner6').height(316);	
	$('#banner7').width(656);
	$('#banner7').height(316);		
	var p = $('#ldiv');
	var position = p.position();
	var p = $("#maindiv").getPos();	
	$("#banner").css({top: p.top, zindex:180, position:'absolute'});
	$("#banner1").css({top: p.top, zindex:170, position:'absolute'});
	$("#banner2").css({top: p.top, zindex:160, position:'absolute'});
	$("#banner3").css({top: p.top, zindex:150, position:'absolute'});
	$("#banner4").css({top: p.top, zindex:140, position:'absolute'});
	$("#banner5").css({top: p.top, zindex:130, position:'absolute'});
	$("#banner6").css({top: p.top, zindex:120, position:'absolute'});
	$("#banner7").css({top: p.top, zindex:110, position:'absolute'});					
	$("#search").css({top: 34, zindex:'50', position:'absolute'});
	banner();
});
</script>

<link rel="stylesheet" type="text/css" href="css/common.css" media="screen"> 
<body>
<div id="bodydiv">
<div id="header"><?php require_once("header.php");?></div>
<div id="maindiv">
	<div id="mdiv-inner">	
	<div id="ldiv"><div id="simple-inner"><?php require_once("ajax/leftSideRecord.html");?></div></div>
	<div id="rdiv"><div id="custom-inner"><?php require_once("ajax/rightSideRecord.html");?></div></div>
	</div>
</div>
</div>
<?php require_once("search.php");?>
<?php require_once("banner.php");?>
</body>
</html>