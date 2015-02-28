<?php
	include_once('include/common.php');
 	ini_set('display_errors',1);
 	ini_set('display_startup_errors',1);
 	error_reporting(-1);
	$lang="";
	$lang = getLang($lang);
	session_unset();
	setLang($lang);
	header("Refresh:0,url=index_t.php");
?>