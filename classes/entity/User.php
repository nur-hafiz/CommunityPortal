<?php 

/**
 * User class represents the User Entity
 * 
 * The variables in this class are the properties represented in
 * the TB_USER table in the Database
 * 
 * @property int $id Unique ID per user
 * @property string $email User email, used for bulkmailing
 * @property string $company Company user works in, empty string if user does specify
 * @property string $password User password used for log in
 * @property int $is_block 1 if user is blocked from logging in, otherwise 0
 * @property int $is_admin 1 if user has access to admin site, otherwise 0
 * @property int $mail_subscribe 1 if user is subscribed to newsletter, otherwise 0
 */
class User
{
	public $id=0;
	public $city;
	public $email;
	public $company;
	public $country;
	public $password;
	public $username;
	public $last_name;
	public $first_name;
	public $is_block=0;
	public $is_admin=0;
	public $mail_subscribe=1;
}
?>