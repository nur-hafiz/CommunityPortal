<?php
/**
 * UserJobManager class passes values to UserJobDB class
 *
 * This is the business layer that passes value to UserJobDB
 */
class UserJobManager
{
	/**
	 * Gets User Jobs matching user ID
	 * 
	 * Returns array of user jobs in table
	 * Returns empty array if no jobs exists
	 * 
	 * @param int $user_id
	 */
	public static function getUserJobByUserID($user_id){
		return UserJobDB::getUserJobByUserID($user_id);
	}
	
	/**
	 * Saves UserJob into DB
	 * 
	 * Returns nothing
	 * 
	 * @param object $user_job UserJob object
	 */
	public static function saveUserJob($user_job){
		return UserJobDB::saveUserJob($user_job);
	}
	
	/**
	 * Delete UserJob from DB
	 *
	 * Returns nothing
	 *
	 * @param array $delete_array ID of users to have their jobs deleted from DB
	 */
	public static function deleteUserJobsByUserID($delete_array){
		UserJobDB::deleteUserJobsByUserID($delete_array);
	}
}
?>