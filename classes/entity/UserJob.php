<?php 

/**
 * User class represents the User Job Entities
 * 
 * The variables in this class are the properties represented in
 * the TB_USER_JOB table in the Database
 * Jobs are the jobs user saved in profile page
 * 
 * @property int $user_job_id Unique ID per job
 * @property int $user_id User ID of user which the job belongs to
 */
class UserJob
{
	public $user_job_id=0;
	public $year_end;
	public $month_end;
	public $job_title;
	public $year_start;
	public $month_start;
	public $company_name;
	public $user_id = 0;
}
?>