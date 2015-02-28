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

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.map.js"></script>

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
// 			$('#map_canvas').gmap().bind('init', function(ev, map) {
// 				$('#map_canvas').gmap('addMarker', {'position': '22.291331,114.207303', 'bounds': true}).click(function() {
// 				$('#map_canvas').gmap('openInfoWindow', {'content': 'autismpartnership'}, this);
// 				});
// 			});			
		});
	</script>
</head>
<body>
<div class="header_bar"></div>
<div class="header"><?php include_once('header.php');?></div>
<div class="color_bar"></div>
<div class="banner">
<img src="images/contactus_banner.png" class="full-width-img" />
</div>
<div class="mainbody">
<div class="contactinfo content-top content-left content-Text2 content-black">
<div class="content-Text2 content-left"><span class="content-Text5 content-bold content-orange">For Enquiry 
<br>
We Want to Hear From You!
</span>
<br><br>
Please complete the form below to drop us a message. Alternatively you are welcomed to call our hotline at 3622 2784.
</div>
<br>
<div class="content-left content-bold"><?php echo autoLang('名字','Your Name');?></div>
<div class="content-left"><input type="text" class="half-width-img"></div>
<br><div class="underline"></div><br>
<div class="content-left content-bold"><?php echo autoLang('公司','Company');?></div>
<div class="content-left"><input type="text" class="half-width-img"></div>
<br><div class="underline"></div><br>
<div class="content-left content-bold"><?php echo autoLang('電話號碼','Phone Number');?></div>
<div class="content-left"><input type="text" class="half-width-img"></div>
<br><div class="underline"></div><br>
<div class="content-left content-bold"><?php echo autoLang('電子郵件','Email');?></div>
<div class="content-left"><input type="text" class="half-width-img"></div>
<br><div class="underline"></div><br>
<div class="content-left content-bold"><?php echo autoLang('訊息','Message');?></div>
<div class="content-left"><input type="text" class="half-width-img"></div>
<br><div class="underline"></div><br>
<div class="content-Text3 content-bold content-left">Category of Enquiry:</div><br>
<div class="content-Text2 content-left"><input tabindex="1" type="checkbox" id="input-1"> Advertising</div><br>
<div class="content-Text2 content-left"><input tabindex="1" type="checkbox" id="input-1"> Media</div><br>
<div class="content-Text2 content-left"><input tabindex="1" type="checkbox" id="input-1"> PR & Marketing</div><br>
<div class="content-Text2 content-left"><input tabindex="1" type="checkbox" id="input-1"> Technique</div><br>
<div class="content-Text2 content-left"><input tabindex="1" type="checkbox" id="input-1"> Website Information Update</div><br>
<div class="content-Text2 content-left"><input tabindex="1" type="checkbox" id="input-1"> Others</div>

<!-- 
<div class="demo-list clear">
	<ul>
    	<li>
        	<input tabindex="1" type="checkbox" id="input-1">
            <label for="input-1" class="content-Text2 content-left">Advertising</label>
        </li>
    	<li>
        	<input tabindex="1" type="checkbox" id="input-1">
            <label for="input-1" class="content-Text2 content-left">Media</label>
        </li>
    	<li>
        	<input tabindex="1" type="checkbox" id="input-1">
            <label for="input-1" class="content-Text2 content-left">PR & Marketing</label>
        </li>
    	<li>
        	<input tabindex="1" type="checkbox" id="input-1">
            <label for="input-1" class="content-Text2 content-left">Technique</label>
        </li>
    	<li>
        	<input tabindex="1" type="checkbox" id="input-1">
            <label for="input-1" class="content-Text2 content-left">Website Information Update</label>
        </li>
    	<li>
        	<input tabindex="1" type="checkbox" id="input-1">
            <label for="input-1" class="content-Text2 content-left">Others</label>
        </li>
    </ul>
	<script>
		$(document).ready(function(){
			var callbacks_list = $('.demo-callbacks ul');
            $('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
              callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
            }).iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%'
            });
        });
    </script>
</div>

 -->

<br><div class="underline"></div><br>
<div class="content-left"><button class="submit_btn content-bold content-white"><?php echo autoLang('提交','Submit');?></button></div>
</div>
<div class="contactinfo content-top">
<div class="contactusBody">
<table class="contactusTB content-black">
<!-- 
<tr>
	<th class="content-top content-right"><img src="images/contact_icon01.png" width="36"></th>
	<td class="content-Text2">7/F, 633 King’s Road, Island East, Hong Kong</td>
</tr>
<tr>
	<th class="content-top content-right"><img src="images/contact_icon02.png" width="36"></th>
	<td class="content-Text2">AM: 8:30-11:30am<br>PM: 12:30-3:30pm<br>(Monday - Saturday)</td>
</tr>
 -->
<tr>
	<th class="content-top content-right"><img src="images/contact_icon03.png" width="36"></th>
	<td class="content-Text2">Tel: 852 3622 2784</td>
</tr>
<tr>
	<th class="content-top content-right"><img src="images/contact_icon04.png" width="36"></th>
	<td class="content-Text2">cs@kidso.com</td>
</tr>
<!-- 
<tr>
	<th class="content-top content-right"><img src="images/contact_icon05.png" width="36"></th>
	<td class="content-Text2">www.autismpartnership.com.hk</td>
</tr>
 -->
</table>
</div>
</div>
<!-- <div id="map_canvas" class="map content-black"></div> -->

<br>
</div>
</body>