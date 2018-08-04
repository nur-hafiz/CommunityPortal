<?php
class VariableUtil
{
	public static function check_session($session_name){
		return isset($_SESSION[$session_name]) ? $_SESSION[$session_name] : '';
	}
}
?>