<?php 
$Upload 	= new UploadUtil;
$Redirect = new RedirectUtil;

$id = $_SESSION['user'];
$directory  = '../displaypicture/';
$file_types = ['.jpg','.jpeg','.png'];
$form_error = '';


if($_SERVER['REQUEST_METHOD']=='POST'){
	if(!empty($_FILES['profilePicture']['name'])){
		$file_extension = $Upload->get_file_extension($_FILES['profilePicture']['name']); #Get extension of uploaded file
		$save_file_name = $directory.$id.'.'.$file_extension; #Prepare name to be saved as
		$Upload->delete_existing_file($file_types,$directory,$id); #Delete existing profile picture
		if(!($form_error = $Upload->check_file_size($_FILES['profilePicture']['size'],10000))){ #Checks if file size is below 10KB
			if(!($form_error = $Upload->check_file_type($file_extension,$file_types))){ #Checks if file type is accepted
				$Upload->save_file($_FILES['profilePicture']['tmp_name'],$save_file_name); #Save file
				$Redirect->view_profile($id);
			}
		}
	}else{
		$form_error = 'Please select file';
	}
};
	
?>
