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
	
	if($Search->adminAction('toggle_button', 'block')){
		$UM->toggleBlock($_REQUEST['block']);
		header('Location: searchusers.php');
	}
	
	if($Search->adminAction('delete_button', 'delete')){
		$UM->deleteUser($_REQUEST['delete']);
		$UJM->deleteUserJobs($_REQUEST['delete']);
		header('Location: searchusers.php');
	}
	
	#First portion of this code runs if search button on the search table was pressed, proceed to clean fields
	if($_SERVER['REQUEST_METHOD']=='POST'){
	$Validate->is_empty('lName','') ? null : $last_name  = $Validate->clean_string('lName');
	$Validate->is_empty('fName','') ? null : $first_name = $Validate->clean_string('fName');
	}else{ #Else, retrieve the value from nav bar, clean and fill all the fields
		$all_fields = $Validate->is_empty('navbarSearch','') ? null : $Validate->clean_string('navbarSearch');
		$last_name  = $all_fields;
		$first_name = $all_fields;
		unset($_GET['navbarSearch']);
	}
	
	$admin = $UM->isAdmin($_SESSION['user']);
	$users = $UM->getUserBySearchFields($first_name,$last_name);

	$search_head 	 = $Search->tableHead($admin);
	$search_close  = $Search->tableClose($admin);
	$search_result = $users ? $Search->tableResult($admin,$users) : null;
}
?>