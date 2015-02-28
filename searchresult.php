<?php
	include_once('include/common.php');
	$keyword = $_REQUEST['keyword'];
	$category = $_REQUEST['cate'];
	$district = $_REQUEST['district'];
	$where = "";
	$dwhere = "";
	$cwhere = "";

	if(!empty($district))
		$dwhere = " and (".TABLE_DISTRICT.".district_zh = '".$district."' or  ".TABLE_DISTRICT.".district_en = '".$district."')";
	if(!empty($category))
		$cwhere = " where LOWER(".TABLE_CATEGORY.".cate_en) = '".strtolower($category)."' ";
	if(!empty($keyword))
		$where = " and (".TABLE_PRODUCTION.".name_zh like'%".$keyword."%' or ".TABLE_PRODUCTION.".name_en like'%".$keyword."%' or ".TABLE_PRODUCTION.".description_zh like'%".$keyword."%' or ".TABLE_PRODUCTION.".description_en like'%".$keyword."%')";
		
	$query = "select * from ".TABLE_PRODUCTION." left join ".TABLE_DISTRICT." ON ".TABLE_DISTRICT.".district_id = ".TABLE_PRODUCTION.".district_id Where ".TABLE_PRODUCTION.".cid in (select cate_id from ".TABLE_CATEGORY." ".$cwhere.") ".$where.$dwhere;
// 	echo $query;
	$db = new DB();
	$res = $db->fetchAllBySQL($query,ture);
	
	switch(strtolower($category)){
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
		default:
			$search_color = "rgba(248,217,74,1.0)";
			$search_banner = "images/education_banner.png";
			$search_box = "images/education_box.png";
			$search_distirct = "images/search_distirct.png";
			$search_or = "images/education_OR.png";
			$search_bar = "images/search_keywords.png";
			$search_submit = "images/education_search.png";	
		break;
	}	
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
		.search {
			width: 1000px;
			text-align: center;
			position: relative;
			z-index: 100;
			margin-top: 0px;
			/* border: 1px solid rgba(175,126,202,1.0); */
			margin-left: auto;
			margin-right: auto;
			left: 0;
			right: 0;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			background-color: rgba(255,255,255,0.9);
			padding: 25px;
		}
		.categoryHeader {
		  height: 1px; 
		  border-top: 1px dashed <?php echo $search_color;?>;
		  text-align: center; 
		  position: relative;     
		} 

		.categoryHeader span{ 
		    color: <?php echo $search_color;?>; 
			position: relative; 
			top: -.7em; 
			background: white; 
			display: inline-block; 
			padding-left: 10px;
			padding-right: 10px;   
		}
		.search_tb{
			width:60%;
		}
		.search_tb td{
		/* 	width:40%; */
			text-align: center;
			padding:0px 5px;
		}
		.search_tb th{
		/* 	width:5%; */
			text-align: center;
		}

		.cateTable{
			width:97%;
			border-collapse: collapse;
			border: 1px dashed <?php echo $search_color;?>;
		}
		.cateTable td{
			width:25%;
			text-align: center;
			color: <?php echo $search_color;?>;
			border: 1px dashed <?php echo $search_color;?>;
			padding: 5px;	
		}

		.cateRecordTable{
			width:97%;
			background-color: rgb(241,241,244);
			text-align: center;
	margin-left: auto;
	margin-right: auto;	
}

.cateRecordTable td{
	width:25%;
	text-align: center;
	color: black;
	padding: 5px;
}


.cateRecord{
	width:22%;
	display: inline-block;
	text-align: center;
/* 	background-color: rgb(71,184,171); */
	padding: 5px;
}
.cateRecordVote{
	width:100%;
	height: 200px;
}

.voteTable{
	width:100%;
}
.voteTable td{
	color: black;
	text-align: left;
}



.search_input{
	background: url('<?php echo $search_bar?>') repeat-x;
	background-size: 100%;
	width:300px;
	height:48px;
	padding-left:70px;
	border: 0;
	background-color: rgba(255,255,255,0.0);
	color: <?php echo $search_color;?>;
}
.search_btn{
	width:123px;
	height:46px;
	border: 0;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;			
	background-color: <?php echo $search_color;?>;
}
.category_sel{
      border: 0 !important;  /*Removes border*/
      -webkit-appearance: none;  /*Removes default chrome and safari style*/
      -moz-appearance: none; /* Removes Default Firefox style*/
      background: url('../images/search_category.png') repeat-x;  /*Adds background-image*/
      background-size: 100%;
      width: 180px; /*Width of select dropdown to give space for arrow image*/
      height: 48px;
      text-indent: 0.01px; /* Removes default arrow from firefox*/
      text-overflow: "";  /*Removes default arrow from firefox*/
      /*My custom style for fonts*/
      color: <?php echo $search_color;?>;
      padding-left:70px;
      font-size:	1.0em;
}
.distirct_sel{
      border: 0 !important;  /*Removes border*/
      -webkit-appearance: none;  /*Removes default chrome and safari style*/
      -moz-appearance: none; /* Removes Default Firefox style*/
      background: url('<?php echo $search_distirct?>') repeat-x;  /*Adds background-image*/
      background-size: 100%;
      width: 180px; /*Width of select dropdown to give space for arrow image*/
      height: 48px;
      text-indent: 0.01px; /* Removes default arrow from firefox*/
      text-overflow: "";  /*Removes default arrow from firefox*/
      /*My custom style for fonts*/
      color: <?php echo $search_color;?>;
      padding-left:70px;
      font-size:	1.0em;
}

.top3info{
	background-image: url('<?php echo $search_box?>');
	background-size: 100%;
}

.orText{
	color: <?php echo $search_color;?>;
	font-weight: bold;
}
</style>	
	<script type="text/javascript">
		$(document).ready(function(){
			setHeaderUI();
		});
		function goinfo(id){
			window.location = 'detail.php?pid='+id;
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
<br>
<div class="search"><?php include_once('search.php');?></div>
<br>
<center>
<table class="cateTable">
<tr>
	<td class="content-Text3">IMAGE</td>
	<td class="content-Text3">NAME</td>
	<td class="content-Text3">DISTRICT</td>
	<td class="content-Text3">VALUE</td>
</tr>
</table>

<div class="content-black">
<?php
// 	echo $query."<br>";
// 	echo count($res)."<br>";
	for($i=0;$i<count($res);$i++):
?>
	<p></p>
	<table class="cateRecordTable toLink" onclick="javascript:goinfo(<?php echo $res[$i]['pid'];?>);">
	<tr>
		<td class="middleLargeText"><img src="<?php if($res[$i]['pic']){ echo $res[$i]['pic'];}else{echo "images/noimage.png";}?>" class="full-width-img" /></td>
		<td class="content-Text2"><?php echo autoLang($res[$i]['name_zh'],$res[$i]['name_en']);?></td>
		<td class="content-Text2"><?php echo autoLang($res[$i]['district_zh'],$res[$i]['district_en']);?></td>
		<td class="content-Text2">
		<?php
			switch(strtolower($category)){
				case "education":
					echo '<img src="images/education_icon01.png">';
				break;		
				case "outdoor":
					echo '<img src="images/outdoor_icon01.png">';									
				break;
				case "medical":
					echo '<img src="images/medical_icon01.png">';				
				break;		
				case "party":
					echo '<img src="images/party_icon01.png">';				
				break;		
			}
		?>
		</td>
	</tr>
	</table>
<?php
	endfor;
?>
</div>
</center>
<br>
</body>