<?php 

/**
 * UserManager class passes values to UserManagerDB class
 * 
 * This is the business layer that passes value to UserManagerDB
 */
class UserManager
{
	
	/**
	 * This function saves user to DB upon registration confirm
	 * returns nothing
	 * 
	 * @param object $user User object
	 */
	public static function saveUser($user){
		return UserManagerDB::saveUser($user);
	}
	
	/**
	 * Checks for is_admin value of user in DB
	 * 
	 * Calls getUserByID
	 * Returns 1 if user is admin
	 * Returns 0 if user is not admin
	 * 
	 * @param int $id Uses $_SESSION['user'], session id of currently logged in user
	 */
	public static function isAdmin($id){
		return UserManagerDB::isAdmin($id);
	}
	
	/**
	 * Returns array of all users in DB
	 */
	public static function getAllUsers(){
		return UserManagerDB::getAllUsers();
	}
	
	/**
	 * Returns User object
	 * 
	 * @param int $id
	 */
	public static function getUserByID($id){
		return UserManagerDB::getUserByID($id);
	}
	
	/**
	 * Returns User object by Username
	 *
	 * @param string $username
	 */
	public static function getUserByUsername($username){
		return UserManagerDB::getUserByUsername($username);
	}

	/**
	 * Returns User object by Email
	 *
	 * @param string $email
	 */
	public static function getUserByEmail($email){
		return UserManagerDB::getUserByEmail($email);
	}
	
	/**
	 * Returns User object by Username and Password
	 *
	 * @param string $username
	 * @param string $password
	 */
	public static function getUserByUsernamePassword($username,$password){
		return UserManagerDB::getUserByUsernamePassword($username,$password);
	}
	
	/**
	 * Returns array of User objects
	 * 
	 * Searches for database for entries LIKE given parameters
	 *
	 * @param string $first_name
	 * @param string $last_name
	 */
	public static function getUserBySearchFields($first_name,$last_name){
		return UserManagerDB::getUserBySearchFields($first_name,$last_name);
	}
	
	/**
	 * Update user in DB
	 * 
	 * @param object $user User object to be updated in DB
	 */
	public static function updateUser($user){
		return UserManagerDB::updateUser($user);
	}
	
	/**
	 * Toggles block status of users in DB
	 * 
	 * If is_blocked = 0, changes to 1
	 * If is_blocked = 1, changes to 0
	 * Returns nothing
	 * 
	 * @param array $toggle_array Array of ID of users to be affected in DB
	 */
	public static function toggleBlock($toggle_array){
		return UserManagerDB::toggleBlock($toggle_array);
	}
	
	/**
	 * Delete users in DB
	 * Returns nothing
	 *
	 * @param array $delete_array Array of ID of users to be deleted
	 */
	public static function deleteUser($delete_array){
		return UserManagerDB::deleteUser($delete_array);
	}
}
?>