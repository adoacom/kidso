<?php
	include_once('include/common.php');
	$category = $_REQUEST['cate'];
	$district = $_REQUEST['district'];
	$keyword = $_REQUEST['keyword'];
	$lang = getLang();
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
	$dwhere = "";
	$cwhere = "";
	$where = "";
	if(!empty($district))
		$dwhere = " and (".TABLE_DISTRICT.".district_zh = '".$district."' or  ".TABLE_DISTRICT.".district_en = '".$district."')";
	if(!empty($category))
		$cwhere = " where cate_en = '".$category."' ";
	if(!empty($keyword))
		$where = " and ".TABLE_PRODUCTION.".name_zh like'%".$keyword."%' or ".TABLE_PRODUCTION.".name_en like'%".$keyword."%' or ".TABLE_PRODUCTION.".description_zh like'%".$keyword."%' or ".TABLE_PRODUCTION.".description_en like'%".$keyword."%'";
	
	$db = new DB();
	
	$limit = " LIMIT ".$page*$limitforPage." , ".$limitforPage." ";
	
	$query = "select * from ".TABLE_PRODUCTION." left join ".TABLE_DISTRICT." ON ".TABLE_DISTRICT.".district_id = ".TABLE_PRODUCTION.".district_id Where ".TABLE_PRODUCTION.".cid in (select cate_id from ".TABLE_CATEGORY." ".$cwhere.") ".$where.$dwhere." ORDER BY RAND() LIMIT 3 ";	
	$res = $db->fetchAllBySQL($query,true);	
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
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/bootstrap-rating.js"></script>
	<script>
		
		var order = "asc";
		var col = "pic";	
		var page = 0 ;
		var arrow = "up";
		$(function () {

			setHeaderUI();
			setSearchUI();
			getRecord(page,col);
	      });
	      function goinfo(id){
			window.location = 'detail.php?pid='+id;
			}
			
			
			function getRecord(page){
				$.post( "ajax/ajaxCategory.php", { col : col , order : order , page: page, cate: "<?php echo $category;?>", district: "<?php echo $district;?>", keyword: "<?php echo $keyword;?>" })
				  .done(function( data ) {
				  	$("#categoryDiv").html(data);
			        $('.rating-tooltip').rating({
    			      extendSymbol: function (rate) {
	            		$(this).tooltip({
		    	          container: 'body',
	    		          placement: 'bottom'
	            		});
			          }
	    		    });				  	
				});
			}
			
			function cateOrder(column){
				col = column;
				if(order == "asc"){
					order="desc";
					arrow = "down";
				}else{
					order = "asc";
					arrow = "up";
				}
				$(".icon_order").hide();
				$(".icon_order").removeClass("fa-caret-down , fa-caret-up");
				$("#arrow_"+col).show();
				$("#arrow_"+col).addClass("fa-caret-"+arrow);
				getRecord(page);
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
<div class="cateHeader">
<div class="categoryHeader"><span class="content-Text5">TOP 3 OF KIDS O RECOMMEND</span></div>
</div>
<div class="top3">
<?php
	for($i=0;$i<count($res);$i++):
?>
	<div class="top3info">
		<div class="catinfo toLink" onclick="javascript:goinfo(<?php echo $res[$i]['pid'];?>);">
		<img src="<?php if($res[$i]['pic']){ echo $res[$i]['pic'];}else{echo "images/noimage.png";}?>" class="full-width-img half-height-img">
		<p></p>
		<span class="content-black content-Text2"><?php echo autoLang($res[$i]['name_zh'],$res[$i]['name_en']);?></span>
		</div>
	</div>
<?php
	endfor;
?>
</div>
<div class="cateHeader">
<div class="categoryHeader"></div>
</div>
<p></p>
<div><?php include_once('cat_search.php');?></div>
<p></p>
<center>
<table class="cateTable">
<tr>
	<td class="content-Text3" onclick="cateOrder('pic')">IMAGE <i id="arrow_pic" class="icon_order fa fa-caret-up"></i></td>
	<td class="content-Text3" onclick="cateOrder('name_<?php echo $lang?>')">NAME <i id="arrow_name_<?php echo $lang?>" class="icon_order fa"></i></td>
	<td class="content-Text3" onclick="cateOrder('district_<?php echo $lang?>')">DISTRICT <i id="arrow_district_<?php echo $lang?>" class="icon_order fa"></i></td>
	<td class="content-Text3" onclick="cateOrder('pid')">VALUE <i id="arrow_pid" class="icon_order fa"></i></td>
</tr>
</table>
<div id="categoryDiv"></div>
</center>
</div>
</body>