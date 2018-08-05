<?php
$UM = new UserManager;
$Redirect = new RedirectUtil; 
$user = $UM->getUserByID($_SESSION['user']);

$city    = $user->city;
$email   = $user->email;
$company = $user->company;
$country = $user->country;
$username   = $user->username;
$password   = $user->password;
$last_name  = $user->last_name;
$first_name = $user->first_name;
$mail_subscribe = $user->mail_subscribe;

$form_error    = null;
$city_error    = null;
$email_error   = null;
$company_error = null;
$country_error = null;
$password_error   = null;
$username_error   = null;
$last_name_error  = null;
$first_name_error = null;

if($_SERVER['REQUEST_METHOD']=='POST'){
	$Validate = new ValidateUtil;
	
	$mail_subscribe = $Validate->clean_string('mailSubscribe');
	
	if(!($city_error = $Validate->is_empty('city','City'))){
		$city = $Validate->clean_string('city');
	}
	
	if(!($company_error = $Validate->is_empty('company','Company'))){
		$company = $Validate->clean_string('company');
	}
	
	if(!($country_error = $Validate->is_empty('country','Country'))){
		$country = $Validate->clean_string('country');
	}

	if(!($username_error = $Validate->is_empty('username','Username'))){
		$username = $Validate->clean_string('username');
	}
	
	if(!($password_error = $Validate->is_empty('password','Password'))){
		$password = $Validate->clean_string('password');
	}
	
	if(!($last_name_error = $Validate->is_empty('lName','Last Name'))){
		$last_name = $Validate->clean_string('lName');
	}
	
	if(!($first_name_error = $Validate->is_empty('fName','First Name'))){
		$first_name = $Validate->clean_string('fName');
	}
	
	$email       = $Validate->validate_clean_email('email','Email')[1];
	$email_error = $Validate->validate_clean_email('email','Email')[0];
	
	if(!($username_error || $email_error)){
		$UM = new UserManager;
		if($email!=$user->email){
		$exist_email = $UM->getUserByEmail($email);
		$exist_email ? $email_error = 'Email is already taken' : null;
		}
		
		if($username!=$user->username){
		$exist_username = $UM->getUserByUsername($username);
		$exist_username ? $username_error = 'Username is already taken' : null;
		}
	}

	if(!($city_error   || $username_error || $last_name_error  ||
			 $email_error  || $password_error || $first_name_error || $country_error)){
		$user->id = $_SESSION['user'];
		$user->city = $city;
		$user->email = $email;
		$user->company = $company;
		$user->country = $country;
		$user->username = $username;
		$user->password = $password;
		$user->last_name = $last_name;
		$user->first_name = $first_name;
		$user->mail_subscribe = $mail_subscribe;
		
		$UM->updateUser($user);
		$Redirect->view_profile($_SESSION['user']);
	}
}
?>