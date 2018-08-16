<?php
require_once '../includes/security.php';
require_once '../scripts/viewprofile_script.php';
?>
<div class='row light-purple-bg pb-5'>
  	<div class='col-1'></div>
  	<div class='col-10'>
    <div class='row light-purple-text purple-border white-bg mt-4 py-4'>
      <div class='col-1'></div>
      <div class='col-10 col-sm-3' style='text-align:center'>
      	<img style='border: 1px solid black; height:10em; width:10em;' src="<?=$profile_picture?>" class="d-block mx-auto rounded-circle">
      	<?=$upload_picture?>
      </div>
      <div class='col-1'></div>

      <div class='col-2 d-sm-none'></div>
      <div class='col-8 col-sm-6'><h3><?=$full_name?></h3><?=$edit_profile?>
      	<!--<h4>Web Developer</h4>-->
      	<p><?=$company?></p>
      	<p><?=$city.', '.$country?></p>
      	<p><?=$email?></p>
      </div>
      <div class='col-2 col-sm-1'></div>
    </div>
    </div>
    <div class='col-1'></div>

    <div class='col-1'></div>
    <div class='col-10'>
    <!-- Reserved for implmentation of skills
    	<div class='col-10 col-md-6'>-->
    <div class='row light-purple-text purple-border white-bg mt-4 py-4' style='border: 1px solid black;'>
      <div class='col-1 d-none d-sm-block'></div>
      <div class='col-12 col-sm-10'><h3>Experience</h3><?=$add_jobs?></div>
      <div class='col-1 d-none d-sm-block'></div>
      <!--Job-->
      <?=$jobs?>
      <!-- -->
    </div>
    </div>
    <div class='col-1'></div>
	


  	<div class='col-1'></div>
</div>
<?php
require_once '../includes/footer.php';
?>