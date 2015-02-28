<?php
	include_once('../include/common.php');
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	$term = "";
// 	print_r($_REQUEST);
	if(!empty($_REQUEST['term']))
		$term = $_REQUEST['term'];
// 	echo $term;

	$db = new DB();
	$str = "SELECT pid,name_zh,name_en from ".TABLE_PRODUCTION." WHERE name_zh like '%".$term."%' or name_en like '%".$term."%' or description_zh like '%".$term."%' or description_en like '%".$term."%' ";
// 	echo $str;
	$res = $db->fetchAllBySQL($str,true);
	for($i=0;$i<count($res);$i++)
	{
		$result[$i]['id'] = $res[$i]['pid'];
		$result[$i]['value'] = autoLang($res[$i]['name_zh'],$res[$i]['name_en']);
		$result[$i]['label'] = autoLang($res[$i]['name_zh'],$res[$i]['name_en']);
	}
	echo json_encode($result); 
?>