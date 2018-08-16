<?php
require_once '../includes/security.php';
require_once '../scripts/bulkmail_script.php';
?>
<div class='row mt-5'>
<div class='col-1 col-md-3'></div>

<div class='col-10 col-md-6'>
<h2>Bulk mail</h2>
<form method='post'>

	<div class="form-row">
		<div class="form-group col-12">
	  <label for="title">Title: </label>
	  <input type="text" class="form-control" name='title' id="title">
  	</div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-12">
    <label for="emailContent">Content: </label>
    <textarea class="form-control" id="emailContent" name='emailContent' rows="10"></textarea>
 		</div>
  </div>
  
  <div class="form-row">
  	<div class="col-4"></div>
		<div class="col-4">
			<input type='submit' class='btn btn-primary btn-block' name='send' value='Send'>
		</div>
		<div class="col-4"></div>
	</div>
	
</form>
</div>
<div class='col-1 col-md-3'></div>
</div>
<?php
require_once '../includes/footer.php';
?>