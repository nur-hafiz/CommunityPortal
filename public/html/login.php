<?php 
require_once '../scripts/login_script.php';
require_once 'logoutnav.php';
?>
<!--Container for main content area-->
<div class='container mt-5'><!--Line 84-->

<!-- Row of log in form-->
<div class='row'><!--Line 83-->
<div class='col-2 col-md-3  col-lg-4'></div>

<!-- Column of log in form-->
<div class='col-8 col-md-6 col-lg-4 rounded' style='background-color: #503C7D;'>

  <!-- Row for form header-->
  <div class='row mt-3 mb-3'>
    <div class='col-1 col-md-3'></div>
    <div class='col-6'>
    <img style='height: 3em;' src='..\images\ABC_logo.png' alt='ABC Logo'>
    <h2 class='white-text d-inline'>Community Portal</h2></div>
  </div>

  <!-- Rows for form inputs and submit button-->
  <div class='mb-5'>
  <span class='red-text'><?=$form_error?></span>
  <form name='loginForm' method='post'>
    <div class='form-row'>
      <div class='form-group col-12'>
      <span class='red-text'><?=$username_error?></span>
        <input type='text' class='form-control' name='username' id='usernameField' value='<?=$username?>' placeholder='Username'>
      </div>
    </div>

    <div class='form-row'>
      <div class='form-group col-12'>
      <span class='red-text'><?=$password_error?></span>
        <input type='password' class='form-control' name='password' id='passwordField' value='<?=$password?>' placeholder='Password'>
      </div>
    </div>
    <button type='submit' class='btn btn-primary btn-block'>Log In</button>
  </form>
  </div>
</div>
</div>
</div>

<!--Sign up and Forgot password row-->
<div class='row'>
<div class='col-3 col-md-4 col-lg-5'></div>
<div class='col-2 col-md-2 col-lg-1'><a href="registration.php">Sign Up</a></div>
<div class='col-1 col-md-none d-lg-none'></div>
<div class='col-3 col-md-2 col-lg-2'><a href="#">Forgot Password</a></div>
<div class='col-3 col-md-4 col-lg-4'></div>
</div>
<?php
require_once '../includes/footer.php';
?>