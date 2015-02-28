<?php
include_once("init.php");

function autoLang($zh,$en){	
// 	echo $_SESSION['lang'];
	if(!empty($_SESSION['lang']))
		return $_SESSION["lang"] == "en" ? $en:$zh;
	else{
		setLang("en");
		return $en;
	}
}

function setLang($lang){
	return $_SESSION["lang"] = $lang;
}

function getLang(){
	return $_SESSION["lang"];
}

function objectToArray($d) {

	if (is_object($d)) {
		// Gets the properties of the given object
		// with get_object_vars function
		$d = get_object_vars($d);
	} 
	if (is_array($d)) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return array_map(__FUNCTION__, $d);
	}
	else {
		// Return array
		return $d;
	}
}
	
function arrayToObject($d) {
	if (is_array($d)) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return (object) array_map(__FUNCTION__, $d);
	}
	else {
		// Return object
		return $d;
	}
}

function limit_text( $text, $limit = 1000 ) {
	if ( strlen ( $text ) < $limit ) {
		return $text;
	}
	$split_words = explode(' ', $text );
	$out = null;
	foreach ( $split_words as $word ) {
		if ( ( strlen( $word ) > $limit ) && $out == null ) {
			return substr( $word, 0, $limit )."...";
		}           
		if (( strlen( $out ) + strlen( $word ) ) > $limit) {
			return $out . "...";
		}            
		$out.=" " . $word;
	}
	return $out;
}

function insertSQL($sql)
{
	$db = new DB();
	return $db->insert("tb_book",$sql);
}

function updateSQL($sql)
{
	print_r($sql);
	$db = new DB();
	$where = "id='".$sql['id']."'";
	return $db->update("tb_book",$sql,$where);
}
	
function selectGroup($group)
{
	$db = new DB();
	$db->table = "tb_book";
	$groupby = $group;
	$db->qField = $group;
	$friend = $db->groupAll("","",$groupby);
	$resultFriends = array();
	if($friend){		
		while($friendObj = $db->nextObject()){
			$friendJSON = (Object)NULL;
			switch($group)
			{
				case "subject":
					$friendJSON->subject = $friendObj->subject;
				break;
				case "grade":
					$friendJSON->form = $friendObj->grade;
				break;
				case "version":
					$friendJSON->version = $friendObj->version;
				break;			
			}
			array_push($resultFriends, $friendJSON);
		}
		$result["record"] = $resultFriends;
		$result["result"] = "SUCCESS";
	}else{
		$result["result"] = "FAIL";
	}
	echo json_encode($result);
	$db->close();
}

function getEditor_plugin(){
	$db = new DB();
	$str = "SELECT editor.*, user.name as user, user.image as user_img from ".TABLE_EDITOR." as editor Left Join ".TABLE_USER." as user on editor.user_id = user.user_id WHERE editor.user_id <> '' Order by editor.createdate DESC Limit 3";
	$res = $db->fetchAllBySQL($str,true);
	if(count($res)){
		return $res;
	}
}

function getEditorResult($limit){
	$db = new DB();
	$str = "SELECT editor.*, user.name as user, user.image as user_img from ".TABLE_EDITOR." as editor Left Join ".TABLE_USER." as user on editor.user_id = user.user_id WHERE editor.user_id <> '' Order by editor.createdate DESC".$limit;
	$res = $db->fetchAllBySQL($str,true);
	if(count($res)){
		return $res;
	}
}
function getEditorResultTotal(){
	$db = new DB();
	$str = "SELECT editor.*, user.name as user, user.image as user_img from ".TABLE_EDITOR." as editor Left Join ".TABLE_USER." as user on editor.user_id = user.user_id WHERE editor.user_id <> '' Order by editor.createdate DESC";
	$res = $db->fetchAllBySQL($str,true);
	if(count($res)){
		return count($res);
	}
}

function getEditorMarkedResult($user,$limit){
	$db = new DB();
	$str = "SELECT editor.*, user.name as user, user.image as user_img from ".TABLE_EDITOR." as editor Left Join ".TABLE_USER." as user on editor.user_id = user.user_id WHERE editor.user_id <> '' AND editor.editor_id in (SELECT editor_id FROM ".TABLE_BOOKMARK." WHERE user_id = '".$user."') Order by editor.createdate DESC".$limit;
	$res = $db->fetchAllBySQL($str,true);
	if(count($res)){
		return $res;
	}
}

function getEditorMarkedResultTotal($user){
	$db = new DB();
	$str = "SELECT editor.*, user.name as user, user.image as user_img from ".TABLE_EDITOR." as editor Left Join ".TABLE_USER." as user on editor.user_id = user.user_id WHERE editor.user_id <> '' AND editor.editor_id in (SELECT editor_id FROM ".TABLE_BOOKMARK." WHERE user_id = '".$user."') Order by editor.createdate DESC";
	$res = $db->fetchAllBySQL($str,true);
	if(count($res)){
		return count($res);
	}
}

function getBookmark($userid){
	$db = new DB();
	$str = "SELECT editor_id from ".TABLE_BOOKMARK;
	$res = $db->fetchAllBySQL($str,true);
	if(count($res)){
		return $res;
	}
}

function getEditor($id){
	$db = new DB();
	$str = "SELECT user.name as user, user.image as user_img from ".TABLE_USER." as user WHERE user_id = '".$id."'";
	$res = $db->fetchBySQL($str);
	if(count($res)){		
		return $res;
	}
}

function getFriend($user_id){
	$db = new DB();
	$sql = "SELECT user.user_id as userid, user.name as user, user.image as user_img from ".TABLE_USER." as user WHERE user.user_id in (SELECT friend_user_id from ".TABLE_FRIEND." WHERE user_id='".$user_id."')";
	$res = $db->fetchAllBySQL($sql,true);
	if(count($res)){
		return $res;
	}
}

function getVote($cid){
	$db = new DB();
	$sql = "SELECT SUM(helpful) as helpful,SUM(interesting) as interesting,SUM(notbad) as notbad from ".TABLE_VOTE." WHERE commend_id='".$cid."'";
	$res = $db->fetchBySQL($sql);
	if(count($res)>0){
		return $res;
	}
}

function getAvg($cid){
	$db = new DB();
	$sql = "SELECT AVG(value) as value,AVG(service) as service,AVG(facility) as facility, AVG(environment) as environment from ".TABLE_COMMENT." WHERE shop_id='".$cid."'";
	$res = $db->fetchBySQL($sql);
	if(count($res)>0){
		return $res;
	}
}


function getTotalVote($uid){
	$db = new DB();
	$sql = "SELECT SUM(helpful) as helpful,SUM(interesting) as interesting,SUM(notbad) as notbad from ".TABLE_VOTE." WHERE commend_id in (SELECT vote_id FROM ".TABLE_COMMENT." WHERE user_id='".$uid."')";
	$res = $db->fetchBySQL($sql);
	if(count($res)>0){
		return $res;
	}
}

function getSpecial_plugin(){
	$db = new DB();
	$db->table = TABLE_SPECIAL;
	$where = " ";
	$order = " createdate DESC ";
	$res = $db->fetchRow("",$order);
	if(count($res)){
		return $res;
	}	
}

function getSpecial(){
	$db = new DB();
	$db->table = TABLE_SPECIAL;
	$where = " ";
	$order = " createdate DESC ";
	$res = $db->fetchAll("",$order);
	if(count($res)){
		return $res;
	}	
}

function getAllbooks(){
	$db = new DB();
	$db->table = "tb_book";
	$where = "enabled <> 0";
	$res = $db->fetchAll($where,"id");
	if(count($res)){
		return $res;
	}
}

function getMember_plugin(){
	$db = new DB();
	$db->table = TABLE_USER;
	$sql = "SELECT * FROM ".TABLE_USER." ORDER BY RAND() LIMIT 5";
// 	echo $sql;
	$res = $db->fetchAllBySQL($sql,true);
	if(count($res)){
		return $res;
	}
}

function getBanner_plugin(){
	$db = new DB();
	$db->table = TABLE_BANNER;
	$where = " ";
	$order = " createdate DESC ";
	$res = $db->fetchRow("",$order);
	if(count($res)){
		return $res;
	}	
}

function getCategory(){
	$db = new DB();
	$db->table = TABLE_CATEGORY;
	$where = " ";
	$order = " cate_id ";
	$res = $db->fetchAll("",$order);
	if(count($res)){
		return $res;
	}	
}

function getDistrict(){
	$db = new DB();
	$db->table = TABLE_DISTRICT;
	$where = " ";
	$order = " district_id ";
	$res = $db->fetchAll("",$order);
	if(count($res)){
		return $res;
	}	
}

function curPageURL() {
	$pageURL = 'http';
// 	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function getIP(){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
    	$ip = $_SERVER['REMOTE_ADDR'];
	}	
	return $ip;
}
?>