<?php 
class UserManager
{
	
	public static function saveUser($user){
		return UserManagerDB::saveUser($user);
	}
	
	public static function isAdmin($id){
		return UserManagerDB::isAdmin($id);
	}

	public static function getAllUsers(){
		return UserManagerDB::getAllUsers();
	}
	
	public static function getUserByID($id){
		return UserManagerDB::getUserByID($id);
	}
	
	public static function getUserByUsername($username){
		return UserManagerDB::getUserByUsername($username);
	}
		
	public static function getUserByEmail($email){
		return UserManagerDB::getUserByEmail($email);
	}
	
	public static function getUserByUsernamePassword($username,$password){
		return UserManagerDB::getUserByUsernamePassword($username,$password);
	}
	
	public static function getUserBySearchFields($first_name,$last_name){
		return UserManagerDB::getUserBySearchFields($first_name,$last_name);
	}

	public static function updateUser($user){
		return UserManagerDB::updateUser($user);
	}
	
	public static function toggleBlock($toggle_array){
		return UserManagerDB::toggleBlock($toggle_array);
	}
	
	public static function deleteUser($delete_array){
		return UserManagerDB::deleteUser($delete_array);
	}
}
?>