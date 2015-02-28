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
<!-- 	<link rel="stylesheet" type="text/css" href="css/easydropdown.css"/> -->

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Font Awesome CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/bootstrap-rating.css" rel="stylesheet">
	
	<!-- 	FlexSlider -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />	
	
	<link rel="stylesheet" type="text/css" href="css/common.css" media="screen"> 
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
		
	<script src="js/bootstrap.min.js"></script>
<!-- 	<script src="js/jquery.easydropdown.js"></script> -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>

	<!-- FlexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>	

	<!-- Syntax Highlighter -->
	<script type="text/javascript" src="js/shCore.js"></script>
	<script type="text/javascript" src="js/shBrushXml.js"></script>
	<script type="text/javascript" src="js/shBrushJScript.js"></script>

	<!-- Optional FlexSlider Additions -->
	<script src="js/jquery.easing.js"></script>
	<script src="js/jquery.mousewheel.js"></script>


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
			$('.flexslider').flexslider({
		        animation: "slide",
		        animationLoop: false,
		        itemWidth: 1482,
		        slideshow: false,
				controlsContainer: ".flex-container",
		        start: function(slider) {
					$('body').removeClass('loading');          
        		    $('.total-slides').text(slider.count);
		        },
//           		after: function(slider) {
// 					$('.current-slide').text(slider.currentSlide);
// 				}
				after: function(slider) {
			        slider.find('.slideIndex').html(slider.currentSlide + 1);
			    }				
     		 });			
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
	<style>
	.search{
		margin-top: -240px;
	}
	</style>
</head>
<body>
<div class="header_bar"></div>
<div class="header"><?php include('header.php');?></div>
<div class="color_bar"></div>
<div class="banner">
	<?php
		$result = objectToArray(getBanner_plugin());
	?>
	<div class="banner">
        <div class="flexslider">
          <ul class="slides">
            <li>
  	    	    <img src="<?php echo $result['banner_url'];?>" class="banner-fix-height" />
  	    	</li>
  	    	<li>
  	    	    <img src="<?php echo $result['banner_url'];?>" class="banner-fix-height" />
  	    	</li>
  	    	<li>
  	    	    <img src="<?php echo $result['banner_url'];?>" class="banner-fix-height" />
  	    	</li>
  	    	<li>
  	    	    <img src="<?php echo $result['banner_url'];?>" class="banner-fix-height" />
  	    	</li>
          </ul>
        </div>		
	</div>
	<div class="search"><?php include_once('search.php');?></div>
</div>
<div class="mainbody">
<div class="mainbutton"><?php include('mainButton.php');?></div>
<br>
<?php include('member_plugin.php');?>
<br>
<div class="divHor">
<table class="header">
<tr>
	<td class="content-left content-Text2 content-gray"><br>EDITOR'S CHOICE</td>
	<td class="content-right content-Text2 content-baseline"><span id="editor_more" class="content-orange toLink">>> MORE</span></td>
</tr>
<tr>
	<td colspan="2" class="underline"></td>
</tr>
</table>
<?php include('editor_plugin.php');?>
</div>
<div class="divHor">
<table class="header">
<tr>
	<td class="content-left content-Text2 content-gray"><br>SPECIAL TOPIC</td>
	<td class="content-right content-Text2 content-baseline"><span id="special_more" class="content-orange toLink">>> MORE</span></td>
</tr>
<tr>
	<td colspan="2" class="underline"></td>
</tr>
</table>
<?php include('special_plugin.php');?>
</div>
<div class="divHor">
<table class="header">
<tr>
	<td class="content-left content-Text2 content-baseline"><span id="recommentprev" class="content-orange toLink"><<</span></td>
	<td class="content-center content-gray content-Text2">5 RECOMMENDATIONS<br>OF <span id="catename">EDUCATION</span></td>
	<td class="content-right content-Text2 content-baseline"><span id="recommentnext" class="content-orange toLink">>></span></td>
</tr>
<tr>
	<td colspan="3" class="underline"></td>
</tr>
</table>
<div id="recommendBody"></div>
</div>
</div>
</body>