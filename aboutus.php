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
<!-- 
	<link rel="stylesheet" type="text/css" href="css/common.css" media="screen"> 
	<!~~ Bootstrap core CSS ~~>
	<link href="css/bootstrap.css" rel="stylesheet">
	<!~~ Font Awesome CSS ~~>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!~~ Custom CSS ~~>
	<link href="css/bootstrap-rating.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/smoothproducts.css">
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 -->
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Font Awesome CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/bootstrap-rating.css" rel="stylesheet">
<!-- 	<link rel="stylesheet" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/common.css" media="screen"> 
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
	<script src="js/bootstrap.min.js"></script>
<!-- 	<script src="js/jquery.easydropdown.js"></script> -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
<div class="banner">
<img src="images/aboutus_banner.png" class="full-width-img" />
</div>
<div class="mainbody">
<br>
<div class="aboutusBody">
<!-- 
<div class="content-left content-Text1 content-black">
members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests. members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests. members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests.
</div>
<br>
<br>
<table class="aboutusTB content-Text1">
<tr>
	<th><img src="images/pic01.jpg" class="full-width-img" /></th>
	<td>
	<div class="content-left content-Text1 content-black">
		members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests. members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests. members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests.
	</div>
	</td>
</tr>
</table>
<br>
<table class="aboutusTB content-Text1">
<tr>
	<th><img src="images/pic02.jpg" class="full-width-img" /></th>
	<td>
	<div class="content-left content-Text1 content-black">
		members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests. members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests. members receive exclusive access to IXL's state standards reports. These comprehensive reports cover everything you need to know about your students' readiness for their standardized tests.
	</div>
	</td>
</tr>
</table>
 -->
<div class="content-left content-Text2 content-black">
<span class="content-bold content-Text3 content-underline"><?php echo autoLang('關於KidsO','About KidsO');?></span>
<br>
<p class="pSpace"><?php echo autoLang('KidsO於2015年4月創立，為一站式育兒綜合資訊網上搜尋平台。網站旨為家長及小朋友提供最新、最實用、專業、可靠的育兒資訊。家長們可透過本平台增強相關訊息交流，以提昇服務提供者之服務質素，讓孩童安享和諧快樂的身心發展過程；這亦是KidsO希望達成的服務理想。','KidsO was established in April 2015, as your one-stop destination to help parents find and learn more about the places you plan to bring your child. We strive to create a platform where all parents are able to locate what they are looking for. You can refer to the basic information as well as browse the comments and experiences from other parents to help you with your choices.');?></p>
<br>
<p class="pSpace"><?php echo autoLang('KidsO中的「O」，意指KidsO羅集孩童健康成長中四個重要元素——教育、醫療及保健、戶外及課外活動、休閒娛樂，成就零歲至六歲兒童的多元化發展及成長。四大元素圓圓緊扣相連，務求創建兒童及家長的理想網上搜尋渠道及平台。','The “O” in KidsO represents a circle of choices, well-rounded matters that reflect on the children of today and our future. We chose four main categories that we believe are important for the growth of every child. Education, Health, Activities and Celebrations!');?></p>
<br>
<span class="content-bold content-Text3 content-underline"><?php echo autoLang('教育','Education');?></span>
<p class="pSpace"><?php echo autoLang('KidsO為適齡孩童提供香港playgroup及幼稚園各區院校網絡資料，有效地為各程度、年齡的小朋友憑藉各校教育背景、師資、用家分享等資料挑選最合適的教育機構及課程。','Within Education, we have included playgroups, schools and special needs Education, for children from 0 – 6years of age, as this is a very beginning of your child’s future.');?></p>
<br>
<span class="content-bold content-Text3 content-underline"><?php echo autoLang('醫療','Health');?></span>
<p class="pSpace"><?php echo autoLang('此包含產前及幼兒醫療及保健種類，一方面特意為懷孕期間的準媽媽提供產前檢查的醫療資訊，亦為新生嬰兒及幼童提供合適的專科以及非專科的兒童醫生，跟進寶寶的健康成長。','Health is crucial to growth. Good health forms the basis for continued development in all aspects of a child’s life. ');?></p>
<br>
<span class="content-bold content-Text3 content-underline"><?php echo autoLang('戶外及課外活動','Outdoor Activities');?></span>
<p class="pSpace"><?php echo autoLang('為配合小朋友多元化發展，KidsO搜羅不同動靜皆宣的戶外及課外活動資訊。因應小朋友的才能和興趣，讓他們在活動中學習及提昇個人潛能，開闢第一步身心發展的關鍵道路。','Activities play a large role in a child’s development. It is important to recognize your child’s talents and interests, so that they can find activities that are both enjoyable and stimulating.');?></p>
<br>
<span class="content-bold content-Text3 content-underline"><?php echo autoLang('休閒娛樂','Parties/Celebration');?></span>
<p class="pSpace"><?php echo autoLang('KidsO為家長和小朋友們搜尋最新的休閒娛樂活動資訊，包括親子活動及生日派對等的籌備資料，建立家長與子女的感情，創造美好的家庭回憶。','KidsO compiled a list of venues, party companies, bakeries, to making the celebration more memorable, at the same time making any parent’s diary much easier to manage.');?></p>
</div>
</div>
<br>
</body>