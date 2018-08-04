<?php 
class ValidateUtil{
	
	public static function is_empty($request,$error_msg){
		if(empty($_REQUEST[$request])){
			return "$error_msg is required";
		}
		return null;
	}

	public static function clean_string($request){
		return filter_var($_REQUEST[$request], FILTER_SANITIZE_STRING);
	}

	public static function validate_clean_email($request,$error_msg){
		if(self::is_empty($request,$error_msg)){
			return array("$error_msg is required",'');
		}
		$clean_email = filter_var($_REQUEST[$request], FILTER_SANITIZE_EMAIL);
		return $clean_email == $_REQUEST[$request] ? array(null, $clean_email) : array("$error_msg is invalid",$_REQUEST[$request]);
	}
	
}
?>