<?php
	session_start();
	include("common.php");
 	ini_set('display_errors',1);
 	ini_set('display_startup_errors',1);
 	error_reporting(-1);
	if(!empty($_REQUEST['username']) && !empty($_REQUEST['password'])){
		$_PARAM['username'] = $_REQUEST['username'];
		$_PARAM['password'] = $_REQUEST['password'];
	}
	$_SESSION['username'] = $_PARAM['username'];
	$_SESSION['pwd'] = $_PARAM['password'];
	$_SESSION['type'] = "member";
	echo json_encode($_SESSION);
?>