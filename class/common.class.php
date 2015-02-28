<?php
	session_start();
	class Common{
	    public function autoLang($zh,$en){
	    	return $_SESSION["lang"] == "en" ? $en : $zh;
	    }
	    public function setLang($lang){
	    	$_SESSION["lang"] = $lang;
	    }
	    public function getLang($lang){
	    	return $_SESSION["lang"];
	    }
		public function curPageURL() {
			 $pageURL = 'http';
			 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			 $pageURL .= "://";
			 if ($_SERVER["SERVER_PORT"] != "80") {
				$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			 } else {
				$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			 }
			 return $pageURL;
		}	    
	}
?>