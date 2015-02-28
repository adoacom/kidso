<?php
	require_once("class/common.class.php");
	$common = new Common();
	$common->setLang("zh");
	echo $common->getLang();
	echo $common->autoLang("aaaa","bbbb");
?>