<?php
	include_once('../include/common.php');
 	ini_set('display_errors',1);
 	ini_set('display_startup_errors',1);
 	error_reporting(-1);
	$category = $_REQUEST['cate'];
	$district = $_REQUEST['district'];
	$keyword = $_REQUEST['keyword'];
	$limitforPage = 5;
	$page = 0;
	if(!empty($_REQUEST['page']))
		$page = $_REQUEST['page'];
	
	switch($category){
		case "education":
			$search_color = "rgba(65,186,241,1.0)";
			$search_banner = "../images/education_banner.png";
			$search_box = "../images/education_box.png";
			$search_distirct = "../images/education_distirct.png";
			$search_or = "../images/education_OR.png";
			$search_bar = "../images/education_keywords.png";
			$search_submit = "../images/education_search.png";			
		break;		
		case "outdoor":
			$search_color = "rgba(150,211,110,1.0)";
			$search_banner = "../images/outdoor_banner.png";
			$search_box = "../images/outdoor_box.png";
			$search_distirct = "../images/outdoor_distirct.png";
			$search_or = "../images/outdoor_OR.png";
			$search_bar = "../images/outdoor_keywords.png";
			$search_submit = "../images/outdoor_search.png";			
		break;
		case "medical":
			$search_color = "rgba(252,130,196,1.0)";
			$search_banner = "../images/medical_banner.png";
			$search_box = "../images/medical_box.png";
			$search_distirct = "../images/medical_distirct.png";
			$search_or = "../images/medical_OR.png";
			$search_bar = "../images/medical_keywords.png";
			$search_submit = "../images/medical_search.png";			
		break;		
		case "party":
			$search_color = "rgba(175,126,202,1.0)";
			$search_banner = "../images/party_banner.png";
			$search_box = "../images/party_box.png";
			$search_distirct = "../images/party_distirct.png";
			$search_or = "../images/party_OR.png";
			$search_bar = "../images/party_keywords.png";
			$search_submit = "../images/party_search.png";			
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
	
	$query = "select * from ".TABLE_PRODUCTION." left join ".TABLE_DISTRICT." ON ".TABLE_DISTRICT.".district_id = ".TABLE_PRODUCTION.".district_id Where ".TABLE_PRODUCTION.".cid in (select cate_id from ".TABLE_CATEGORY." ".$cwhere.") ".$where.$dwhere;
	$res = $db->fetchAllBySQL($query,true);
	$total = abs(count($res) / $limitforPage);	
	
	$query = "select * from ".TABLE_PRODUCTION." left join ".TABLE_DISTRICT." ON ".TABLE_DISTRICT.".district_id = ".TABLE_PRODUCTION.".district_id Where ".TABLE_PRODUCTION.".cid in (select cate_id from ".TABLE_CATEGORY." ".$cwhere.") ".$where.$dwhere.$limit;	
	$res = $db->fetchAllBySQL($query,true);

	for($i=0;$i<count($res);$i++):
	
?>
<p></p>
<center>
<table class="cateRecordTable toLink"  onclick="javascript:goinfo(<?php echo $res[$i]['pid'];?>);">
<tr>
	<td class="middleLargeText"><img src="<?php if($res[$i]['pic']){ echo $res[$i]['pic'];}else{echo "images/noimage.png";}?>" class="full-width-img" /></td>
	<td class="content-Text2"><?php echo autoLang($res[$i]['name_zh'],$res[$i]['name_en']);?></td>
	<td class="content-Text2"><?php echo autoLang($res[$i]['district_zh'],$res[$i]['district_en']);?></td>
	<td class="content-Text2">
		<table class="voteTable">
		<tr>
			<td class="content-Text2">ENVIRONMENT</td>
			<td><input type="hidden" class="rating-tooltip" data-filled="symbol symbol-filled" data-empty="symbol symbol-empty" value="4"/></td>
		</tr>
		<tr>
			<td class="content-Text2">FACILITY</td>
			<td><input type="hidden" class="rating-tooltip" data-filled="symbol symbol-filled" data-empty="symbol symbol-empty" value="3"/></td>
		</tr>
		<tr>
			<td class="content-Text2">SERVICE</td>
			<td><input type="hidden" class="rating-tooltip" data-filled="symbol symbol-filled" data-empty="symbol symbol-empty" value="2"/></td>
		</tr>
		<tr>
			<td class="content-Text2">VALUE</td>
			<td><input type="hidden" class="rating-tooltip" data-filled="symbol symbol-filled" data-empty="symbol symbol-empty" value="1"/></td>
		</tr>
		</table>
	</td>
</tr>
</table>
</center>
<?php
	endfor;
?>
<p></p>
<center>
<div class="content-center content-Text1 content-black">
<?php
	for($i=0;$i<$total;$i++):
		$y=$i+1;
?>
	<span <?php if($i==$page){ echo 'class="Bubbleselect"';}else{echo 'class="Bubble toLink" onclick="javascript:getRecord('.$i.');"';}?> ><?php echo $y;?></span>
<?
	endfor;
?>
</div>
</center>