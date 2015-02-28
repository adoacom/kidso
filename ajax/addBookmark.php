<?php
	include_once('../include/common.php');
//  	ini_set('display_errors',1);
//  	ini_set('display_startup_errors',1);
//  	error_reporting(-1);
	if(count($_REQUEST)>0){
		$db = new DB();		
		$str = "SELECT bookmarkid from ".TABLE_BOOKMARK." WHERE user_id='".$_REQUEST['user']."' AND editor_id='".$_REQUEST['editor_id']."'";
		$res = objectToArray($db->fetchBySQL($str));
		if(!empty($res['bookmarkid'])){
			$str = "DELETE from ".TABLE_BOOKMARK." WHERE bookmarkid=".$res['bookmarkid']."";
			$res = $db->fetchBySQL($str);
			$record['img'] = 'images/editor_mark.png';
		}
		else
		{
			$result['user_id'] = $_REQUEST['user'];
			$result['editor_id'] = $_REQUEST['editor_id'];
			$db->insert(TABLE_BOOKMARK,$result);
			$record['img'] = 'images/editor_marked.png';			
		}
	}
	echo json_encode($record);
?>