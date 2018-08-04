<?php 
require_once '../includes/autoload.php';
$userID=$_SESSION['user'];
$UM = new UserManager;
$user = $UM->getUserByID($userID);

$bulk_mail = '';
if($user->is_admin){
	$bulk_mail = '<li class="nav-item">
									 <a class="nav-link" href="bulkmail.php">
									 <button class="btn btn-custom">Bulk Mail</button></a>
									 </li>';
}
?>
<head>
<!doctype html>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="..\css\bootstrap.min.css">
 <style>
 .purple-bg{
  background-color: #503C7D;
}

.white-bg{
  background-color: white;
}

.purple-text{
	color: #503C7D;
}

.light-purple-text{
  color: #594389;
}

.purple-border{
  border: 1px solid #503C7D;
}

.light-purple-bg{
  background-color: #594389;
}

.black-bg{
  background-color: #1C1C1C;
}

.white-border{
  border-color: white;
}

.white-text{
  color: white;	
}

.red-text{	
  color:red;
}

.btn-custom{
  background-color: #503C7D;
  border-color: white;
  color: white;
}

.btn-custom:hover{
  cursor:pointer;
  background-color: white;
  border-color: white;
  color: #503C7D;
}
 
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark purple-bg" style='border-bottom: 1px solid white'>
	<a class="navbar-brand" href="home.php"><img style='height:3em' alt="logo" src="../images/ABC_logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
    <li class="nav-item active">
    	<a class="nav-link" href="home.php">
    	<button class='btn btn-custom px-3'>Home</button></a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="viewprofile.php?view=<?=$userID?>">
      <button class='btn btn-custom px-3'>Profile</button></a>
    </li>
    
    <?=$bulk_mail?>
    
    <li class="nav-item">
    	<a class="nav-link" href="#">
    	<button class='btn btn-custom'>Threads</button></a>
    </li>
    
    <li class="nav-item dropdown">
    	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <button class='btn btn-custom px-4'>Jobs</button>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      	<a class="dropdown-item" href="#">Find Jobs</a>
      	<a class="dropdown-item" href="#">Post Jobs</a>
      	<div class="dropdown-divider"></div>
      	<a class="dropdown-item" href="#">Applied Jobs</a>
      </div>
    </li>

    </ul>
    <form action='searchusers.php' class="form-inline my-2 mr-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name='navbarSearch' aria-label="Search">
      <button class="btn btn-custom my-2 my-sm-0 px-3" type="submit">Search</button>
    </form>
    <span class="navbar-text">
     <a href="../scripts/logout_script.php">Log Out</a>
    </span>
  </div>
</nav>