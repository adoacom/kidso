<?php
	include_once('../include/common.php');
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);	
// 	$db = new DB();
// 	$db->table = TABLE_PRODUCTION;
// 	$where = " ";
// 	$order = " district_id ";
// 	$res = $db->fetchAll("",$order);
// 	if(count($res)){
// 		return $res;
// 	}	
	$file = fopen("demo1.csv","r");

	while(! feof($file))
	{
		$result = fgetcsv($file);
		$db = new DB();
		
		$db->table = TABLE_DISTRICT;
		$where = " district_en = '".$result[3]."' ";
		$order = " ";
		$res = objectToArray($db->fetchRow($where,$order));

		if($result[8] == "public")
			$result[8] = 0;
		else
			$result[8] = 1;
		
		$sql['cid'] = addslashes(trim($result[0]));
		$sql['district_id'] = $res['district_id'];
		$sql['name_zh'] = addslashes(trim($result[1]));
		$sql['name_en'] = addslashes(trim($result[2]));
		$sql['address_zh'] = addslashes(trim($result[4]));
		$sql['address_en'] = addslashes(trim($result[13]));
		$sql['description_zh'] = addslashes(trim($result[10]));
		$sql['description_en'] = addslashes(trim($result[11]));
		$sql['tel'] = addslashes(trim(str_replace("Tel:","",$result[5])));
		$sql['email'] = addslashes(trim($result[6]));
		$sql['language'] = addslashes(trim($result[7]));
		$sql['public'] = addslashes(trim($result[8]));
		$sql['working_hr'] = addslashes(trim($result[9]));
		$sql['website'] = addslashes(trim($result[15]));
		
		$db->insert(TABLE_PRODUCTION,$sql);		
	}
	
	fclose($file);
?>