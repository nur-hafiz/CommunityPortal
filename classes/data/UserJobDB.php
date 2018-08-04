<?php
require_once '../../public/includes/autoload.php';

class UserJobDB
{
	public static function fillUserJob($row){
		$user_job = new UserJob;
		$user_job->user_job_id = $row["user_job_id"];
		$user_job->job_title = $row["job_title"];
		$user_job->company_name = $row["company_name"];
		$user_job->month_start = $row["month_start"];
		$user_job->year_start  = $row["year_start"];
		$user_job->month_end  = $row["month_end"];
		$user_job->year_end  = $row["year_end"];
		return $user_job;
	}
	
	public static function fillUserJobArray($result){
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$user_job=self::fillUserJob($row);
				$user_jobs[]=$user_job;
			}
		}
		return isset($user_jobs) ? $user_jobs : null;
	}
	
	public static function getUserJobByUserID($user_id){
		$con = DBUtil::getConnection();
		$user_jobs = null;
		$sql = "SELECT *
						FROM tb_user_job
						WHERE user_id = $user_id";
		$result = $con->query($sql);
		$user_jobs	= $result ? self::fillUserJobArray($result) : null;
		$con->close();
		return $user_jobs;
	}
	
	public static function saveUserJob($user_job){
		$con = DBUtil::getConnection();
		$sql = "INSERT INTO tb_user_job (year_end,  year_start,  job_title,
																		 month_end, month_start, company_name, user_id)
						VALUES('$user_job->year_end',   	'$user_job->year_start',	 
									 '$user_job->job_title',		'$user_job->month_end', 
									 '$user_job->month_start',	'$user_job->company_name', '$user_job->user_id')";
		$con->query($sql);
		$con->close();
	}
	
	public static function deleteUserJobs($delete_array){
		$con = DBUtil::getConnection();
		foreach($delete_array as $id){
			$sql = "DELETE FROM tb_user_job WHERE user_id = '$id'";
			$con->query($sql);
		}
		$con->close();
	}

}
?>