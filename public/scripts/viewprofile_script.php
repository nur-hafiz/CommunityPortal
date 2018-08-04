<?php
function camel_case($value){
	return ucwords(strtolower($value));
}

$userID = $_GET['view'];
$user = new User;
$UM 	= new UserManager;
$UJM  = new UserJobManager;
$user = $UM->getUserByID($userID);
$user_jobs = $UJM->getUserJobByUserID($userID);

$jobs 		 = null;
$city  		 = camel_case($user->city);
$email 	 	 = $user->email;
$country 	 = camel_case($user->country);
$company 	 = camel_case($user->company);
$full_name = camel_case($user->first_name.' '. $user->last_name);

#Variables will be null if user is not viewing his own profile
$add_jobs 		= $userID == $_SESSION['user'] ? "<a href='updateprofilejobs.php'>Add Jobs</a>" : null;
$edit_profile = $userID == $_SESSION['user'] ? "<a href='updateprofile.php'>Edit Profile</a>": null;

#Adds markup for each job corresponding to the user ID
if($user_jobs){
foreach($user_jobs as $user_job){
	$year_end  		= camel_case($user_job->year_end);
	$month_end 		= camel_case($user_job->month_end);
	$job_title  	= camel_case($user_job->job_title);
	$year_start		= camel_case($user_job->year_start);
	$month_start	= camel_case($user_job->month_start);
	$company_name = camel_case($user_job->company_name);
	
	$jobs.="<div class='col-1 d-none d-sm-block'></div>
      		<div class='col-12 col-sm-10'>
      		<h4>$job_title at $company_name</h4>
      		<p>$month_start $year_start - $month_end $year_end</p>
      		</div>
      		<div class='col-1 d-none d-sm-block'></div>";
	}
}
?>