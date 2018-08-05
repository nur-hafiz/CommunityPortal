<?php 
class RedirectUtil
{
	public static function log_in_to_home($userID){
		session_start();
		$_SESSION['user'] = $userID;
		header('Location:home.php');
	}
	
	public static function registration(){
		header('Location:registration.php');
	}
	
	public static function registration_thank_you(){
		header('Location:registrationthankyou.php');
	}
	
	public static function view_profile($id){
		header("Location:viewprofile.php?view=$id");
	}
	
	public static function registration_confirmation($city , $country, $username, $last_name,
																									 $email, $company, $password, $first_name){
		$_SESSION['city']			= $city;
		$_SESSION['email']		= $email;
		$_SESSION['company']	= $company;
		$_SESSION['country']	= $country;
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['lName']		= $last_name;
		$_SESSION['fName']		= $first_name;
		header('Location:registrationconfirmation.php');
	}
	
}
?>