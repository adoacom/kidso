<?php
	include_once('include/common.php');
	$category = $_REQUEST['cate'];
	$pid = $_REQUEST['pid'];
	$pageid = 1;
	$pageid = $_REQUEST['pageid'];
	
	if(!empty($_SESSION['username']))
	{
		$userId = $_SESSION['username'];
	}
	else
	{
		$userId = getIP();
	}
	
	if($pid)
	{	
// 		$query = "select * from ".TABLE_PRODUCTION." left join ".TABLE_DISTRICT." ON ".TABLE_DISTRICT.".district_id = ".TABLE_PRODUCTION.".district_id Where ".TABLE_PRODUCTION.".cid in (select cate_id from ".TABLE_CATEGORY." ".$cwhere.") ".$where.$dwhere;	
		$query = "select * from ".TABLE_PRODUCTION." left join ".TABLE_DISTRICT." ON ".TABLE_DISTRICT.".district_id = ".TABLE_PRODUCTION.".district_id left join ".TABLE_CATEGORY." ON ".TABLE_PRODUCTION.".cid = ".TABLE_CATEGORY.".cate_id WHERE ".TABLE_PRODUCTION.".pid = ".$pid ;
		$db = new DB();
		$res = objectToArray($db->fetchBySQL($query));
// 		print_r($res);
		$category = strtolower($res['cate_en']);
		$res1 = objectToArray(getAvg($pid));
		print_r($res1);
	}
	
	switch($category){
		case "education":
			$search_color = "rgba(65,186,241,1.0)";
			$search_banner = "images/education_banner.png";
			$search_box = "images/education_box.png";
			$search_distirct = "images/education_distirct.png";
			$search_or = "images/education_OR.png";
			$search_bar = "images/education_keywords.png";
			$search_submit = "images/education_search.png";			
		break;		
		case "outdoor":
			$search_color = "rgba(150,211,110,1.0)";
			$search_banner = "images/outdoor_banner.png";
			$search_box = "images/outdoor_box.png";
			$search_distirct = "images/outdoor_distirct.png";
			$search_or = "images/outdoor_OR.png";
			$search_bar = "images/outdoor_keywords.png";
			$search_submit = "images/outdoor_search.png";			
		break;
		case "medical":
			$search_color = "rgba(252,130,196,1.0)";
			$search_banner = "images/medical_banner.png";
			$search_box = "images/medical_box.png";
			$search_distirct = "images/medical_distirct.png";
			$search_or = "images/medical_OR.png";
			$search_bar = "images/medical_keywords.png";
			$search_submit = "images/medical_search.png";			
		break;		
		case "party":
			$search_color = "rgba(175,126,202,1.0)";
			$search_banner = "images/party_banner.png";
			$search_box = "images/party_box.png";
			$search_distirct = "images/party_distirct.png";
			$search_or = "images/party_OR.png";
			$search_bar = "images/party_keywords.png";
			$search_submit = "images/party_search.png";			
		break;
	}
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);	
	$result = objectToArray(getEditor_plugin());	
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
	
	<!-- 	FlexSlider -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	
	<script src="ckeditor/ckeditor.js"></script>
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/bootstrap-rating.js"></script>
	<script type="text/javascript" src="js/smoothproducts.min.js"></script>

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

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
	
	<link rel="stylesheet" href="css/lightbox.css">

	<script src="js/lightbox.js"></script>		
	
<!-- 
	<style>
	.smallText{font-size: 75%;}
	.middleText{font-size: 100%;}
	.middleLargeText{font-size: 125%;}
	.largeText{font-size: 150%;}	
	</style>
 -->
	<style>
		.symbol {
			display: inline-block;
			border-radius: 50%;
			border: 0px double black;
			width: 20px;
			height: 20px;
		}
		.textareaDiv{
			width: 100%;
			height: 100px;
			color: #000;
		}
	</style>
 	<script>
		$(function () {
			setHeaderUI();
			
	        $('.rating-tooltip').rating({
    	      extendSymbol: function (rate) {
	            $(this).tooltip({
    	          container: 'body',
	              placement: 'bottom'
	            });
	          }
	        });	        
	        $('.sp-wrap').smoothproducts();
	        $.post( "ajax/comment.php",{pid:"<?php echo $pid;?>"})
			  .done(function( data ) {
			    $("#comment").html(data);
			    commentUI();
			  });
// 			CKEDITOR.replace( 'editor1' );
			$("#addcomment").hide();
			$("#addCM").click(function() { openCommend();});
			$("#submitBtn").click(function() { submitCM();});
			$('.flexslider').flexslider({
		        animation: "slide",
		        animationLoop: false,
		        slideshow: false,
// 		  		controlNav: "thumbnails",
        		start: function(slider){
			        $('body').removeClass('loading');
	        	}
     		 });
	      });
	    
	    function openCommend(){
		    if($('#addcomment').is(':visible'))
			    $("#addcomment").fadeOut();
			else
			    $("#addcomment").fadeIn();
	    }
	    
	    function submitCM(){
// 		    var value = CKEDITOR.instances['editor1'].getData();
			var value = $("#editor1").val();
			$.post( "ajax/addComment.php", { userId: "<?php echo $userId;?>", id: "<?php echo $pid;?>", env: $("#env").val(), fac: $("#fac").val(), ser:$("#ser").val(), val:$("#val").val(), message: value })
			  .done(function( data ) {
// 			    CKEDITOR.instances['editor1'].setData('');
			    commentUI();
			    $("#editor1").val("");
// 			    alert(data);
			});		    
	    	$("#addcomment").fadeOut();
	    }
	</script> 
</head>
<body>
<div class="header_bar"></div>
<div class="header"><?php include_once('header.php');?></div>
<div class="color_bar"></div>
<div class="banner">
<img src="<?php echo $search_banner;?>" class="full-width-img" />
</div>
<div class="mainbody">
<!-- Left Side -->
<div class="detailArea">
<div class="flexslider">
    <ul class="slides">
        <li data-thumb="images/school/pic1.jpg">
  	   	    <a class="example-image-link" href="images/school/pic1.jpg" data-lightbox="example-set1" data-title=""><img src="images/school/pic1.jpg" /></a>
  	   	</li>
        <li data-thumb="images/school/pic2.jpg">
  	   	    <a class="example-image-link" href="images/school/pic2.jpg" data-lightbox="example-set1" data-title=""><img src="images/school/pic2.jpg" /></a>
  	   	</li>
        <li data-thumb="images/school/pic3.jpg">
  	   	    <a class="example-image-link" href="images/school/pic3.jpg" data-lightbox="example-set1" data-title=""><img src="images/school/pic3.jpg" /></a>
  	   	</li>
        <li data-thumb="images/school/pic4.jpg">
  	   	    <a class="example-image-link" href="images/school/pic4.jpg" data-lightbox="example-set1" data-title=""><img src="images/school/pic4.jpg" /></a>
  	   	</li>
     </ul>
</div>
<p></p>
<p></p>
<div class="content-Text2 headerText content-gray">INFORMATION</div>
<br>
<table class="detailInfo">
<tr>
	<th class="content-center content-middle"></th>
	<td class="content-Text4 content-black"><?php echo autoLang($res['name_zh'],$res['name_en']);?></td>
</tr>
<tr>
	<th class="content-center content-middle"><img src="images/info_icon01.png"></th>
	<td class="content-Text2 content-gray"><?php echo autoLang($res['address_zh'],$res['address_en']);?></td>
</tr>
<tr>
	<th class="content-center content-middle"><img src="images/info_icon02.png"></th>
	<td class="content-Text2 content-gray"><?php echo $res['working_hr'];?></td>
</tr>
<tr>
	<th class="content-center content-middle"><img src="images/info_icon03.png"></th>
	<td class="content-Text2 content-gray">Tel: <?php echo $res['tel'];?></td>
</tr>
<tr>
	<th class="content-center content-middle"><img src="images/info_icon04.png"></th>
	<td class="content-Text2 content-gray"><?php echo $res['website'];?></td>
</tr>
<tr>
	<th class="content-center content-middle"><img src="images/info_icon05.png"></th>
	<td class="content-Text2 content-gray"><?php echo $res['website'];?></td>
</tr>
<tr>
	<th class="content-center content-middle"><img src="images/info_icon06.png"></th>
	<td class="content-Text2 content-gray"><?php echo $res['language'];?></td>
</tr>
<tr>
	<th class="content-center content-middle"><img src="images/info_icon07.png"></th>
	<td class="content-Text2 content-gray"><?php if($res['public'] == 1){ echo "Private";}else{ echo "Public";}?></td>
</tr>
</table>
<div class="content-Text2 headerText content-gray">DESCRIPTION</div>
<div class="detaildescription content-Text1 content-black">
<?php echo stripslashes(autoLang($res['description_zh'],$res['description_en']));?>
</div>
<div class="voteBox">
<p></p>
<div class="underline"></div>
<p></p>
<table class="voteTable">
<tr>
	<th class="content-Text2 content-black">ENVIRONMENT</td>
	<td><input type="hidden" class="rating-tooltip" data-filled="symbol symbol-filled1" data-empty="symbol symbol-empty" value="4"/></td>
</tr>
<tr>
	<th class="content-Text2 content-black">FACILITY</td>
	<td><input type="hidden" class="rating-tooltip" data-filled="symbol symbol-filled2" data-empty="symbol symbol-empty" value="3"/></td>
</tr>
<tr>
	<th class="content-Text2 content-black">SERVICE</td>
	<td><input type="hidden" class="rating-tooltip" data-filled="symbol symbol-filled3" data-empty="symbol symbol-empty" value="2"/></td>
</tr>
<tr>
	<th class="content-Text2 content-black">VALUE</td>
	<td><input type="hidden" class="rating-tooltip" data-filled="symbol symbol-filled4" data-empty="symbol symbol-empty" value="1"/></td>
</tr>
</table>
<p></p>
<div class="underline"></div>
<p></p>
<div><img src="images/add_cm.png" id="addCM" class="toLink"/></div>
<div id="addcomment">
<p></p>
<img src="images/CM_banner.png" class="full-width-img" />
<textarea name="editor1" id="editor1" class="textareaDiv"></textarea>
<p></p>
<table class="voteTable">
<tr>
	<th class="content-Text2 content-black">ENVIRONMENT</td>
	<td><input type="hidden" id="env" class="rating-tooltip" data-filled="symbol symbol-filled1" data-empty="symbol symbol-empty"/></td>
</tr>
<tr>
	<th class="content-Text2 content-black">FACILITY</td>
	<td><input type="hidden" id="fac" class="rating-tooltip" data-filled="symbol symbol-filled2" data-empty="symbol symbol-empty"/></td>
</tr>
<tr>
	<th class="content-Text2 content-black">SERVICE</td>
	<td><input type="hidden" id="ser" class="rating-tooltip" data-filled="symbol symbol-filled3" data-empty="symbol symbol-empty"/></td>
</tr>
<tr>
	<th class="content-Text2 content-black">VALUE</td>
	<td><input type="hidden" id="val" class="rating-tooltip" data-filled="symbol symbol-filled4" data-empty="symbol symbol-empty"/></td>
</tr>
</table>
<button id="submitBtn" class="search_btn content-Text5 content-bold"/><?php echo autoLang('Submit','Submit');?></button>
</div>
</div>
</div>
<!-- Right Side -->
<div class="detailArea">
	<div id="comment"></div>
</div>
</div>
</body>