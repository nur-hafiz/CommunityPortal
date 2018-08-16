<?php
ob_start();
require_once '../includes/security.php';
require_once '../scripts/updateprofilepicture_script.php';
?>
<div class='row mt-5'>
<div class='col-1'></div>

<div class='col-10'><!--Line 119-->

<h2>Select profile picture</h2>
<form method='POST' enctype='multipart/form-data'>
	<div class="form-row">
		<p><?=$form_error?></p>
		<div class="form-group col-12"> 
    <input type="file" name='profilePicture' class="form-control-file" id="profilePicture">
  	</div>
  	<button type='submit' class='btn btn-success'>Upload</button>
  </div>
</form>

</div>
<div class='col-1'></div>
</div>