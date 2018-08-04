<?php
$form_error = '';

$title = '';
$title_error = '';

$company = '';
$company_error = '';

$mStart = '';
$mStart_error = '';

$yStart = '';
$yStart_error = '';

$mEnd = '';
$mEnd_error = '';

$yEnd = '';
$yEnd_error = '';

$year_list = null;
$month_list = null;
$months_array = ['January','February','March','April','May','June','July',
								'August','September','October','November','December'];

$year_count = 1990;
while ($year_count != date("Y")+1){
	$year_list.="<option value='$year_count'>$year_count</option>";
	$year_count++;
}

foreach($months_array as $month){
	$month_list.="<option value='$month'>$month</option>";
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$Validate = new ValidateUtil;
	
	if(!($company_error = $Validate->is_empty('company','Company'))){
		$company = $Validate->clean_string('company');
	}
	
	if(!($title_error = $Validate->is_empty('title','Position'))){
		$title = $Validate->clean_string('title');
	}
	
	if(!($mStart_error = $Validate->is_empty('mStart','Starting month'))){
		$mStart = $Validate->clean_string('mStart');
	}
	
	if(!($yStart_error = $Validate->is_empty('yStart','Starting year'))){
		$yStart = $Validate->clean_string('yStart');
	}
	
	if(!($mEnd_error = $Validate->is_empty('mEnd','End month'))){
		$mEnd = $Validate->clean_string('mEnd');
	}
	
	if(!($yEnd_error = $Validate->is_empty('yEnd','End '))){
		$yEnd = $Validate->clean_string('yEnd');
	}
	
	if(!($mEnd_error || $mStart_error || $title_error	 ||
			 $yEnd_error || $yStart_error || $company_error)){
		$UJ  = new UserJob;
		$UJM = new UserJobManager;
		$Redirect = new RedirectUtil;
		$UJ->year_end			= $yEnd;
		$UJ->month_end		= $mEnd;
		$UJ->job_title		= $title;
		$UJ->year_start		= $yStart;
		$UJ->month_start	= $mStart;
		$UJ->company_name = $company;
		$UJ->user_id = $_SESSION['user'];
		$UJM->saveUserJob($UJ);
		$Redirect->view_profile($_SESSION['user']);
	}
}
?>