<?php
require_once '../includes/autoload.php';
$declaration = new VariableUtil;

$city    = $declaration->check_session('city');
$email   = $declaration->check_session('email');
$company = $declaration->check_session('company');
$country = $declaration->check_session('country');
$username   = $declaration->check_session('username');
$password   = $declaration->check_session('password');
$last_name  = $declaration->check_session('lName');
$first_name = $declaration->check_session('fName');

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
		$exist_email = $UM->getUserByEmail($email);
		$exist_email ? $email_error = 'Email is already taken' : 'Test';

		$exist_username = $UM->getUserByUsername($username);
		$exist_username ? $username_error = 'Username is already taken' : null;
	}

	if(!($city_error   || $username_error || $last_name_error  ||
			 $email_error  || $password_error || $first_name_error || $country_error)){
		$user = new User;
		$Redirect = new RedirectUtil;
		$Redirect->registration_confirmation($city , $country, $username, $last_name,
																				 $email, $company, $password, $first_name);
	}
}
?>