<?php
class UserJobManager
{
	public static function getUserJobByUserID($user_id){
		return UserJobDB::getUserJobByUserID($user_id);
	}
	
	public static function saveUserJob($user_job){
		return UserJobDB::saveUserJob($user_job);
	}
	
	public static function deleteUserJobs($delete_array){
		UserJobDB::deleteUserJobs($delete_array);
	}
}
?>