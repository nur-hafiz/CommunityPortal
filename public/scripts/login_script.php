<?php
require_once '../includes/autoload.php';

$username = '';
$password = '';
$form_error = null;
$username_error = null;
$password_error = null;

if($_SERVER['REQUEST_METHOD']=='POST'){
	$Validate = new ValidateUtil;
	
	if(!($username_error = $Validate->is_empty('username','Username'))){
		$username = $Validate->clean_string('username');
	}

	if(!($password_error = $Validate->is_empty('password','Password'))){
		$password = $Validate->clean_string('password');
	}
	
	/* Check if user is in DB:
	 * If user is blocked, print "Your account is blocked"
	 * If user is not blocked, redirect to home page
	 * If user not in DB, print "Invalid username or password
	 */
	if(!($username_error || $password_error)){
		$UM = new UserManager;
		$Redirect = new RedirectUtil;
		$user = $UM->getUserByUsernamePassword($username,$password);
		if($user){
			$user->is_block ? $form_error = 'Your account is blocked' : $Redirect->log_in_to_home($user->id);
		}else{
			$form_error = 'Invalid username or password';
		}
	}
}
?>