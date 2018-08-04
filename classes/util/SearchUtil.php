<?php
class SearchUtil
{
	public static $head 	= '<th>Block Status</th><th>Toggle</th><th>Delete</th><tr>';
	public static $close	= '</table>';
	public static $block_button  = '<input type="submit" name="toggle_button" value="Toggle">';
	public static $delete_button = '<input type="submit" name="delete_button" value="Delete">';
	
	public static function tableHead($is_admin){
		return $is_admin ? self::$head : '<tr>';
	}
	
	public static function tableClose($is_admin){
		$admin_closing = self::$close.self::$block_button.self::$delete_button;
		return $is_admin ? $admin_closing : self::$close;
	}
	
	public static function tableCheckbox($is_admin, $user){
		$status = $user->is_block ? 'Blocked' : 'Active';
		$block  = "<td><input type='checkbox' name='block[]'  value='$user->id'></td>";
		$delete = "<td><input type='checkbox' name='delete[]' value='$user->id'></td>";
		$result = "<td>$status</td>$block$delete</tr>";
		return $is_admin ? $result : '</tr>';
	}
	
	public static function tableResult($is_admin, $users){
		$result= '';
		foreach($users as $user){
			$result.="<tr><td><a href='viewprofile.php?view=$user->id'>$user->first_name</a></td><td>$user->last_name</td>";
			$result.= self::tableCheckbox($is_admin, $user);
		}
		return $result;
	}
	
	public static function adminAction($button, $array){
		return isset($_REQUEST[$button]) && isset($_REQUEST[$array]);
	}
}
?>