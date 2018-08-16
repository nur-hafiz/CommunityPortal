<?php 
class UploadUtil{

	public static function delete_existing_file($file_type,$directory,$file_name){
		foreach($file_type as $extension){
			if(file_exists($directory.$file_name.$extension)){
				unlink($directory.$file_name.$extension);
			}
		}
	}
	
	public static function get_file_extension($file_name){
		$file_name = explode('.',$file_name);
		return $file_extension = strtolower(end($file_name));
	}
	
	public static function check_file_size($file_size,$limit){
		return $file_size>$limit ? 'File too big' : null;
	}
	
	public static function check_file_type($file_extension,$accepted_types){
		return in_array('.'.$file_extension,$accepted_types)? null : 'Unaccepted file type';
	}
	
	public static function save_file($tmp_file_name,$save_file_name){
		move_uploaded_file($tmp_file_name,$save_file_name);
	}
}
?>