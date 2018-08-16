<?php
ob_start();
require_once '../includes/security.php';
require_once '../scripts/searchusers_script.php';
?>
<h2>Search users</h2>
<form name='searchUsers' method='POST'>

<label>First Name: </label>
<input type='text' name='fName' value='<?=$first_name?>'>

<label>Last Name:  </label>
<input type='text' name='lName'  value='<?=$last_name?>'>

<input type='submit' value='Search'>
</form>

<form method='POST'>
<table border=1>
<tr><th>First Name</th><th>Last Name</th>
<?=$search_head?>
<?=$search_result?>
<?=$search_close?>
</form>

<?php
require_once '../includes/footer.php';
?>