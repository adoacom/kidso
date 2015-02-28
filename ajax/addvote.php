<?php
	include_once('../include/common.php');
 	ini_set('display_errors',1);
 	ini_set('display_startup_errors',1);
 	error_reporting(-1);
	if(count($_REQUEST)>0){
		$db = new DB();
		$result['commend_id'] = $_REQUEST['cid'];
		switch($_REQUEST['type']){
			case "helpful":
				$result['helpful'] = 1;
			break;
			case "interesting":
				$result['interesting'] = 1;
			break;
			case "notbad":
				$result['notbad'] = 1;
			break;			
		}
		if(count($result) > 1)
			$db->insert(TABLE_VOTE,$result);
	}
	echo json_encode($_REQUEST);
?>