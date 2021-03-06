<?php
require_once '../includes/security.php';
require_once '../scripts/updateprofile_script.php';
?>
<div class='row mt-5'>
<div class='col-1'></div>

<!--Column for form-->
<div class='col-10'><!--Line 119-->
<h2>Update Profile</h2>
<form method='POST'>
	<div class="form-row">
		<p><?=$form_error?></p>
		<div class="form-group col-12">
	    <label for="usernameField">Username</label><span class='red-text'><?=' '.$username_error?></span>
	    <input type="text" name='username' value='<?=$username?>' class="form-control" id="usernameField" placeholder="Your username is private to you">
  		</div>
  	</div>

    <div class="form-row">
 		<div class="form-group col-12">
	    <label for="passwordField">Password <span>show_icon</span></label><span class='red-text'><?=' '.$password_error?></span>
	    <input type="text" name='password' value='<?=$password?>' class="form-control" id="passwordField" placeholder="Minimum 6 characters">
  		</div>
  	</div>

  	<div class="form-row">
    	<div class="form-group col-6">
      	<label for="firstNameField">First Name</label><span class='red-text'><?=' '.$first_name_error?></span>
      	<input type="text" name='fName' value='<?=$first_name?>' class="form-control" id="firstNameField" placeholder="John">
    	</div>
    	
    	<div class="form-group col-6">
      	<label for="lastNameField">Last Name</label><span class='red-text'><?=' '.$last_name_error?></span>
      	<input type="text" name='lName' value='<?=$last_name?>' class="form-control" id="lastNameField" placeholder="Smith">
    	</div>
  	</div>

    <div class="form-row">
    <p><?=$email_error?></p>
	   <div class="form-group col-12">
	   <label for="emailField">Email</label><span class='red-text'><?=' '.$email_error?></span>
	    <input type="email" name='email' value='<?=$email?>' class="form-control" id="emailField" placeholder="example@example.com">
  	</div>
    </div>

  	<div class="form-row">
	    <div class="form-group col-6">
	    	<label for="countrySelect">Country</label><span class='red-text'><?=' '.$country_error?></span>
		    <select name='country' value='<?=$country?>' class="custom-select" id="countrySelect">
				<option selected disabled>I am from..</option>
				<option value="Singapore">Singapore</option>
				<option value="Malaysia">Malaysia</option>
				<option value="Indonesia">Indonesia</option>
		    </select>
	    </div>
	    <div class="form-group col-6">
	    	<label for="cityField">City</label><span class='red-text'><?=' '.$city_error?></span>
	    	<input type="text" name='city' value='<?=$city?>' class="form-control" id="cityField">
	    </div>
	</div>

	<div class="form-row">
			<div class="form-group col-6">
	    	<label for="mailSubscribeSelect">Mailing List</label>
		    <select name='mailSubscribe' class="custom-select" id="mailSubscribeSelect">
				<option selected value="1">Subscribe</option>
				<option value="0">Unsubscribe</option>
		    </select>
	    </div>
	    
	    <div class="form-group col-6">
	    	<label for="companyField">Company</label>
	    	<input type="text" name='company' value='<?=$company?>' class="form-control" id="companyField">
	    </div>
	</div>
	
	<button type='submit' class='btn btn-primary btn-block'>Update Profile</button>
</div>



</form>
</div>
<div class='col-1'></div>
</div>
<?php
require_once '../includes/footer.php';
?>