<?php
	
	function http_status_codes($http_code){
	
	 	$http_status_codes = array(
		100 => "Continue", 
		101 => "Switching Protocols", 
		102 => "Processing", 
		200 => "OK", 
		201 => "Created", 
		202 => "Accepted", 
		203 => "Non-Authoritative Information", 
		204 => "No Content", 
		205 => "Reset Content", 
		206 => "Partial Content", 
		207 => "Multi-Status", 
		300 => "Multiple Choices", 
		301 => "Moved Permanently", 
		302 => "Found", 
		303 => "See Other", 
		304 => "Not Modified", 
		305 => "Use Proxy", 
		306 => "(Unused)", 
		307 => "Temporary Redirect", 
		308 => "Permanent Redirect", 
		400 => "Client Bad Request", 
		401 => "Unauthorized", 
		402 => "Payment Required", 
		403 => "Forbidden", 
		404 => "Not Found", 
		405 => "Method Not Allowed", 
		406 => "Not Acceptable", 
		407 => "Proxy Authentication Required", 
		408 => "Request Timeout", 
		409 => "Conflict", 
		410 => "Gone", 
		411 => "Length Required", 
		412 => "Precondition Failed", 
		413 => "Request Entity Too Large", 
		414 => "Request-URI Too Long", 
		415 => "Unsupported Media Type", 
		416 => "Requested Range Not Satisfiable", 
		417 => "Expectation Failed", 
		418 => "I'm a teapot", 
		419 => "Authentication Timeout", 
		420 => "Enhance Your Calm",
		422 => "Unprocessable Entity", 
		423 => "Locked", 
		424 => "Failed Dependency", 
		424 => "Method Failure", 
		425 => "Unordered Collection", 
		426 => "Upgrade Required", 
		428 => "Precondition Required", 
		429 => "Too Many Requests", 
		431 => "Request Header Fields Too Large", 
		444 => "No Response", 
		449 => "Retry With", 
		450 => "Blocked by Windows Parental Controls", 
		451 => "Unavailable For Legal Reasons", 
		494 => "Request Header Too Large", 
		495 => "Cert Error", 
		496 => "No Cert", 
		497 => "HTTP to HTTPS", 
		499 => "Client Closed Request", 
		500 => "Internal Server Error", 
		501 => "Not Implemented", 
		502 => "Bad Gateway", 
		503 => "Service Unavailable", 
		504 => "Gateway Timeout", 
		505 => "HTTP Version Not Supported", 
		506 => "Variant Also Negotiates", 
		507 => "Insufficient Storage", 
		508 => "Loop Detected", 
		509 => "Bandwidth Limit Exceeded", 
		510 => "Not Extended", 
		511 => "Network Authentication Required", 
		598 => "Network read timeout error", 
		599 => "Network connect timeout error");
		
		return $http_status_codes[$http_code];
	}
	
	function api_status_codes($api_code){
		
	 	$api_status_codes = array(
	 	//General Status Code
               -100 => array("message"=>"Successful. ","httpCode"=>200),
		100 => array("message"=>"Successful. ","httpCode"=>200),
		101 => array("message"=>"Parameters Were Error/Missing. ","httpCode"=>200),
		102 => array("message"=>"Invalid Parameter. ","httpCode"=>200),
		103 => array("message"=>"SQL Error. ","httpCode"=>200),
	 	
	 	//Login Status Code
		104 => array("message"=>"Did Not Found Account. ","httpCode"=>200),
		105 => array("message"=>"Login Failed. ","httpCode"=>200),
		
		//SignUp Status Code
		106 => array("message"=>"Account is Exist. ","httpCode"=>200), 
		
		//Stage FB Unlock
		107 => array("message"=>"Stage Did Not Need FB Invitation. ","httpCode"=>200), 
		108 => array("message"=>"Wrong FB ID Type. ","httpCode"=>200), 
		
                109 => array("message"=>"Gems not enough. ","httpCode"=>200), 
                110 => array("message"=>"Duplicate character. ","httpCode"=>200), 
                111 => array("message"=>"Attribute full. ","httpCode"=>200), 
                112 => array("message"=>"Already Exist. ","httpCode"=>200), 
               -101 => array("message"=>"Invalid Gem Value. ","httpCode"=>500), 
		);
		
		
		return $api_status_codes[$api_code];
	}

		
				
	function statusReturn($api_code,$isError = false,$additionalData = NULL,$additionalmessage = NULL){
		
                $tmp = api_status_codes($api_code);
		//http_response_code(($tmp["httpCode"]));
		
		$responseStatus = array(
			"api_status" => (string)$api_code,
			"message" => ($tmp["message"]),
			
		);
		if(!is_null($additionalmessage)){
			$responseStatus["message"] = $tmp["message"].$additionalmessage;
		}
		if(!is_null($additionalData)){
		
			foreach($additionalData as $key => $value){
				
				$responseStatus[$key] = $value;
				
			}
		}
		
		echo(json_encode($responseStatus));
		
		if($isError)die();
	}
 
?>