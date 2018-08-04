<?php
session_start();
session_destroy();
require_once 'logoutnav.php';
?>
<div class='row mt-5 mb-5'>
<div class='col-2 col-lg-4'></div>

<!--Column for form-->
<div class='col-8 col-lg-6'>
	<h2>Welcome aboard to</br>ABC Community Portal</h2>
	<p>We're glad to have you with us.<p>
	<p>To activate your account, please click on the link sent into your email.</p>
	<p>Click on <a href="login.php">this link</a> to return to the log in screen</p>
</div>
<div class='col-2 col-lg-2'></div>
</form>
</div>
<div class='col-1'></div>
</div>
<?php
require_once '../includes/footer.php';
?>