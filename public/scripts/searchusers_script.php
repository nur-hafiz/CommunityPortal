<?php
$UM  = new UserManager;
$UJM = new UserJobManager;
$Search 	= new SearchUtil;
$Validate = new ValidateUtil;

$username   ='';
$last_name  ='';
$first_name ='';

$search_head	 ='';
$search_close  ='';
$search_result ='';

if($_SERVER['REQUEST_METHOD']=='POST' || (isset($_GET['navbarSearch']))){
	
	/*
	 * If admin presses toggle button:
	 * Checked values in toggle block column will be sent as array to UserManager
	 * Blocked users will be unblocked, unblocked users will be blocked
	 */
	if($Search->adminAction('toggle_button', 'block')){
		$UM->toggleBlock($_REQUEST['block']);
		header('Location: searchusers.php');
	}
	
	/*
	 * If admin presses delete button:
	 * Checked values in delete column will be sent as array to UserManager
	 * Users will be deleted from DB
	 */
	
	if($Search->adminAction('delete_button', 'delete')){
		$UM->deleteUser($_REQUEST['delete']);
		$UJM->deleteUserJobsByUserID($_REQUEST['delete']);
		header('Location: searchusers.php');
	}
	
	/*
	 * If search form was submitted, clean form values
	 * If page was loaded from navbar, set all fields as navbar searchfield value
	 */
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$Validate->is_empty('lName','') ? null : $last_name  = $Validate->clean_string('lName');
	$Validate->is_empty('fName','') ? null : $first_name = $Validate->clean_string('fName');
	}else{ 
		$all_fields = $Validate->is_empty('navbarSearch','') ? null : $Validate->clean_string('navbarSearch');
		$last_name  = $all_fields;
		$first_name = $all_fields;
		unset($_GET['navbarSearch']);
	}
	
	$admin = $UM->isAdmin($_SESSION['user']);
	$users = $UM->getUserBySearchFields($first_name,$last_name);
	
	/*
	 * Loads the search table based on admin status of current user
	 */
	$search_head 	 = $Search->tableHead($admin);
	$search_close  = $Search->tableClose($admin);
	$search_result = $users ? $Search->tableResult($admin,$users) : null;
}
?>