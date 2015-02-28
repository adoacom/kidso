<?php


function adminOnly()
{
	if($_SESSION[ADMIN_SESSION_NAME]==""){
		jsRedirect("index.php");
	}
}

function getPost($fieldArray,$booleanArray = NULL){
	
	global $POST;
	$array = explode(",",$fieldArray);
	
	foreach($array as $p)
	{	
		$POST[$p] = $_POST[trim($p)];
	}
	
	if($booleanArray){
		$arrayBoolean = explode(",",$booleanArray);
		foreach($arrayBoolean as $pb)
		{	
			$POST[$pb] = isset($_POST[trim($pb)]);
		}
	}
	
	$POST["mktime"] = mktime();
	
}

function getGet($fieldArray){
	
	global $GET;
	
	$array = explode(",",$fieldArray);
	
	foreach($array as $g)
	{
		$GET[$g] = $_GET[trim($g)];
	}
	
	$POST["mktime"] = mktime();
	
}


 function removeKey($object,$keys){

	 if(is_object($object)){
		foreach(split(",",$keys) as $key){
			unset($object->$key);
		}		 
		 
	 }else if(is_array($object)){
		foreach(split(",",$keys) as $key){
			unset($object[$key]);
		}			 
	 }
	 	
	return $object;
 }


function jsRedirect($url){
	echo "<script>window.location='$url'</script>";
}


function trimVideoCode($url){
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	return $my_array_of_vars["v"];
}


?>