<?php
require_once '../../public/includes/autoload.php';

class UserManagerDB
{
	public static function fillUser($row){
		$user = new User;
		$user->id = $row["id"];
		$user->city  = $row["city"];
		$user->email = $row["email"];
		$user->country = $row["country"];
		$user->company = $row["company"];
		$user->password  = $row["password"];
		$user->username  = $row["username"];
		$user->is_block  = $row["is_block"];
		$user->is_admin  = $row["is_admin"];
		$user->last_name = $row["lastname"];
		$user->first_name= $row["firstname"];
		$user->mail_subscribe= $row["mail_subscribe"];
		return $user;
	}
	
	public static function fillOneUser($result){
		if($result->num_rows>0){
			$row=$result->fetch_assoc();
			$user=self::fillUser($row);
			}
		return isset($user) ? $user : null;
	}
	
	public static function fillUsersArray($result){
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$user=self::fillUser($row);
				$users[]=$user;
			}
		}
		return isset($users) ? $users : null;
	}
	
	public static function saveUser($user){
		$con = DBUtil::getConnection();
		$sql = "INSERT INTO tb_user(city, username, country, firstname,
																email, password, company, lastname)
						VALUES('$user->city','$user->username','$user->country','$user->first_name',
									 '$user->email','$user->password','$user->company','$user->last_name')";
		$con->query($sql);
		$con->close();
	}
	
	public static function isAdmin($id){
		$user = self::getUserByID($id);
		return $user->is_admin;
	}
	
	public static function getAllUsers(){
		$con = DBUtil::getConnection();
		$sql = "SELECT * FROM tb_user";
		$result = $con->query($sql);
		$users  = self::fillUsersArray($result);
		$con->close();
		return $users;
	}
	
	public static function getUserByID($id){
		$con = DBUtil::getConnection();
		$sql = "SELECT * FROM tb_user WHERE id='$id'";
		$result = $con->query($sql);
		$user = self::fillOneUser($result);
		$con->close();
		return $user;
	}
	
	public static function getUserByEmail($email){
		$con = DBUtil::getConnection();
		$sql = "SELECT * FROM tb_user WHERE email='$email'";
		$result = $con->query($sql);
		$user = self::fillOneUser($result);
		$con->close();
		return $user;
	}
	
	public static function getUserByUsername($username){
		$con = DBUtil::getConnection();
		$sql = "SELECT * FROM tb_user WHERE username='$username'";
		$result = $con->query($sql);
		$user = self::fillOneUser($result);
		$con->close();
		return $user;
	}
		
	public static function getUserByUsernamePassword($username,$password){
		$con = DBUtil::getConnection();
		$sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
		$result = $con->query($sql);
		$user = self::fillOneUser($result);
		$con->close();
		return $user;
	}
	
	public static function getUserBySearchFields($first_name,$last_name){
		$con	 = DBUtil::getConnection();
		$users = null;
		if($first_name.$last_name==''){
			$users = self::getAllUsers();
		}else{
			$sql = "SELECT * FROM tb_user WHERE (firstname LIKE '$first_name' OR lastname LIKE '$last_name')";
			$result = $con->query($sql);
			$users	= $result ? self::fillUsersArray($result) : null;
		}
		$con->close();
		return $users;
	}
	
	public static function updateUser($user){
		$con	 = DBUtil::getConnection();
		$sql = "UPDATE tb_user	SET
						city = '$user->city',		username = '$user->username',	country = '$user->country',
						email = '$user->email',	password = '$user->password',	company = '$user->company',
						firstname = '$user->first_name', lastname = '$user->last_name',	mail_subscribe = $user->mail_subscribe
						WHERE id = $user->id";
		$con->query($sql);
		$con->close();
	}
	
	public static function toggleBlock($toggle_array){
		$con = DBUtil::getConnection();
		foreach($toggle_array as $id){
			$sql = "UPDATE tb_user SET is_block = IF(is_block=0,1,0) WHERE id = $id";
			$con->query($sql);
		}
		$con->close();
	}
	
	public static function deleteUser($delete_array){
		$con = DBUtil::getConnection();
		foreach($delete_array as $id){
			$sql = "DELETE FROM tb_user WHERE ID = '$id'";
			$con->query($sql);
		}
		$con->close();
	}
}
?>