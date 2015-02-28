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
	<link rel="stylesheet" type="text/css" href="css/easydropdown.css"/>
	<link rel="stylesheet" type="text/css" href="css/common.css" media="screen"> 
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Font Awesome CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/bootstrap-rating.css" rel="stylesheet">


	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
	<script src="js/jquery.easydropdown.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	<script type="text/javascript">
		var r = 0;
		var rarray = ["education","outdoor","medical","party"];
		var rcate = "";
		$(document).ready(function(){
			setHeaderUI();
// 			setBannerUI();
			setEditorUI();
			setMemberUI();
		  	setButtonUI();
		  	setSearchUI();		  	
		  	$("#special_more").click(function() {
		  		window.location = 'special.php';
			});			
		  	$("#editor_more").click(function() {
		  		window.location = 'editor.php';
			});
		  	$("#recommentprev").click(function() {
				prev();
			});			
		  	$("#recommentnext").click(function() {
		  		next();
			});						
			loadRecommend(r);
		});
		function loadRecommend(num)
		{
			rcate = rarray[num];			
// 			alert(rcate);
	        $.get( "ajax/recommend_plugin.php?cate="+rcate)
			  .done(function( data ) {
			    $("#recommendBody").html(data);
				setRecommendUI();    
				$("#catename").html(rcate.toUpperCase());
			  });		
		}
		function prev(){
			--r;
			if(r>3)
				r=0;
			else if(r<0)
				r=3;
			loadRecommend(r);
		}
		function next(){
			++r;
			if(r>3)
				r=0;
			else if(r<0)
				r=3;
			loadRecommend(r);
		}
	</script>
</head>
<body>
<div class="header_bar"></div>
<div class="header"><?php include_once('header.php');?></div>
<div class="banner"><?php include_once('banner.php');?></div>
<div class="color_bar"></div>
<div class="mainbody">
<div class="mainbutton"><?php include_once('mainButton.php');?></div>
<br>
<?php include_once('member_plugin.php');?>
<br>
<div class="divHor">
<table class="header">
<tr>
	<td class="content-left content-Text2 content-gray"><br>EDITOR'S CHOICE</td>
	<td class="content-right content-Text2"><span id="editor_more" class="content-orange toLink">>> MORE</span></td>
</tr>
<tr>
	<td colspan="2" class="underline"></td>
</tr>
</table>
<?php include_once('editor_plugin.php');?>
</div>
<div class="divHor">
<table class="header">
<tr>
	<td class="content-left content-Text2 content-gray"><br>SPECIAL TOPIC</td>
	<td class="content-right content-Text2"><span id="special_more" class="content-orange toLink">>> MORE</span></td>
</tr>
<tr>
	<td colspan="2" class="underline"></td>
</tr>
</table>
<?php include_once('special_plugin.php');?>
</div>
<div class="divHor">
<table class="header">
<tr>
	<td class="content-left content-Text2"><div id="recommentprev" class="content-orange arrow-left toLink"></div></td>
	<td class="content-center content-gray content-Text2">5 RECOMMENDATIONS<br>OF <span id="catename">EDUCATION</span></td>
	<td class="content-right content-Text2"><div id="recommentnext" class="content-orange arrow-right toLink"></div></td>
</tr>
<tr>
	<td colspan="3" class="underline"></td>
</tr>
</table>
<div id="recommendBody"></div>
</div>
</div>
</body>