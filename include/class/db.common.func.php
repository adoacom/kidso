<?php
	
	function arrayIntToString($arrays = NULL){
		if(is_null($arrays) || !is_array($arrays)) return ;
		
		$arrayKeys = array_keys($arrays);
		
		foreach($arrayKeys as $key){
		
			if(is_array($arrays[$key])){
			
				$arrays[$key] = arrayIntToString($arrays[$key]);
				
			}else if(is_int($arrays[$key])){
			
				$arrays[$key] = (string)$arrays[$key];
			}
			
		}
		
		return $arrays ;
		
	}
	
	function arrayKeyToLower($arrays = NULL){
		if(is_null($arrays) || !is_array($arrays)) return ;
		
		$newArray = array();
		
		foreach($arrays as $key=>$value){
		
			$newKey = strtolower($key);
			
			if(is_array($value))$value = arrayKeyToLower($value);
			
			$newArray[$newKey] = $value;
		}
		
		return $newArray ;
		
	}
?>