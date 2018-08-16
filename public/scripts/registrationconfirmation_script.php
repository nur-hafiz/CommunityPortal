<?php
require_once '../includes/autoload.php';
session_start();
$Redirect = new RedirectUtil;
isset($_SESSION['username']) ? null : $Redirect->registration();

$city				= $_SESSION['city'];
$email			= $_SESSION['email'];
$last_name 	= $_SESSION['lName'];
$first_name = $_SESSION['fName'];
$company		= $_SESSION['company'];
$country 		= $_SESSION['country'];
$username 	= $_SESSION['username'];
$password 	= $_SESSION['password'];

if($_SERVER['REQUEST_METHOD']='POST'){
	if(isset($_REQUEST['registration'])){
		$Redirect->registration();
	}elseif(isset($_REQUEST['confirm'])){
		$UM		= new UserManager;
		$user = new User;
		$user->city	 		 = $city;
		$user->email 		 = $email;
		$user->country   = $country;
		$user->company   = $company;
		$user->password  = $password;
		$user->username  = $username;
		$user->last_name = $last_name;
		$user->first_name= $first_name;
		$UM->saveUser($user);
		$Redirect->registration_thank_you();
	}
}
?>