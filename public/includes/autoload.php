<?php 
spl_autoload_register(function ($class_name){
	
	$classes_path = $_SERVER['DOCUMENT_ROOT'].'/Capstone/classes/';
	
	if (preg_match('/DB$/',$class_name)){
		include $classes_path.'data/'.$class_name.'.php';
	} 
	elseif (preg_match('/Manager$/',$class_name)){
		include $classes_path.'business/'.$class_name.'.php';
	} 
	elseif (preg_match('/Util$/',$class_name)){
		include $classes_path.'util/'.$class_name.'.php';
	}
	else{
		include $classes_path.'entity/'.$class_name.'.php';
	}
    #include $_SERVER['DOCUMENT_ROOT'] . "/students/SG0118A09/Module_5_Project_Submission/" .$class_name . '.php';
    #include $_SERVER['DOCUMENT_ROOT'] . "/phpunit/bin/src/Project/" .$class_name . '.php';
});
?>