<?php
require_once '../scripts/registrationconfirmation_script.php';
require_once 'logoutnav.php';
?>
<div class='row mt-5'>
<div class='col-1'></div>

<!--Column for form-->
<div class='col-10'><!--Line 119-->
<h2>Confirm Your Details</h2>
<form method='post'>
	<div class="form-row">
	<div class="form-group col-12">
	    <label for="username">Username</label>
	    <input disabled type="text" class="form-control" name='username' id="username" value='<?=$username?>'>
  	</div>
  	</div>

  	<div class="form-row">
    <div class="form-group col-6">
      	<label for="fName">First Name</label>
      	<input disabled type="text" class="form-control" name='fName' id="fName" value='<?=$first_name?>'>
    </div>
    <div class="form-group col-6">
      	<label for="lName">Last Name</label>
      	<input disabled type="text" class="form-control" name='lName' id="lN" value='<?=$last_name?>'>
    </div>
  	</div>

	<div class="form-group">
	    <label for="email">Email</label>
	    <input disabled type="email" class="form-control" name='email' id="email" value='<?=$email?>'>
  	</div>

  	<div class="form-row">
    <div class="form-group col-6">
      	<label for="country">Country</label>
      	<input disabled type="text" class="form-control" name="country" id="country" value='<?=$country?>'>
    </div>
    <div class="form-group col-6">
      	<label for="cityField">City</label>
      	<input disabled type="text" class="form-control" name="city" id="city" value='<?=$city?>'>
    </div>
	</div>

  	<div class="form-row">
    <div class="form-group col-12">
      	<label for="company">Company</label>
      	<input disabled type="text" class="form-control" name="company" id="company" value='<?=$company?>'>
    </div>
	</div>
	
	<div class="form-row">
	<div class="col-6">
	<input type='submit' class='btn btn-primary btn-block' name='confirm' value='Confirm'>
	</div>
		<div class="col-6">
	<input type='submit' class='btn btn-danger btn-block'  name='registration' value='Edit details'>
	</div>
	</div>
	
</div>

</form>
</div>
<div class='col-1'></div>
</div>
<?php
require_once '../includes/footer.php';
?>