<?php
	include_once('../include/common.php');
 	ini_set('display_errors',1);
 	ini_set('display_startup_errors',1);
 	error_reporting(-1);
	if(count($_REQUEST)>0){
		$db = new DB();
		
		$str = "SELECT user_id from ".TABLE_USER." WHERE name='".$_REQUEST['userId']."'";
		$res = objectToArray($db->fetchBySQL($str));
// 		print_r($res);
		$result['user_id'] = $res['user_id'];
		$result['username'] = $_REQUEST['userId'];
		$result['shop_id'] = $_REQUEST['id'];
		$result['value'] = $_REQUEST['val'];
		$result['service'] = $_REQUEST['ser'];
		$result['facility'] = $_REQUEST['fac'];
		$result['environment'] = $_REQUEST['env'];
		$result['comment'] = nl2br($_REQUEST['message']);
		
		$db->insert(TABLE_EDITOR_PLUGIN,$result);
	}
	echo json_encode($_REQUEST);
?>