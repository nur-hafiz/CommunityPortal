<?php
ob_start();
require_once '../includes/security.php';
require_once '../scripts/updateprofilejobs_script.php';
?>
<div class='row mt-5'>
<div class='col-1'></div>

<div class='col-10'><!--Line 119-->
<h2>Add a job</h2>
<form method='POST'>
	<div class="form-row">
		<p><?=$form_error?></p>
		<div class="form-group col-12">
	    <label for="company">Company</label><span class='red-text'><?=' '.$company_error?></span>
	    <input type="text" name='company' value='<?=$company?>' class="form-control" id="company" placeholder="Company Name">
  		</div>
  	</div>

    <div class="form-row">
 		<div class="form-group col-12">
	    <label for="title">Position</label><span class='red-text'><?=' '.$title_error?></span>
	    <input type="text" name='title' value='<?=$title?>' class="form-control" id="title" placeholder="Job Position">
  		</div>
  	</div>

  	<div class="form-row">
    	<div class="form-group col-6">
      	<label for="mStart">From</label><span class='red-text'><?=' '.$mStart_error?></span>
		    <select name='mStart' value='<?=$mStart?>' class="custom-select" id="mStart">
				<option selected disabled>Month..</option>
				<?=$month_list?>
		    </select>
		  </div>
    	
    	<div class="form-group col-6">
      	<label for="yStart">From</label><span class='red-text'><?=' '.$yStart_error?></span>
		    <select name='yStart' value='<?=$yStart?>' class="custom-select" id="yStart">
				<option selected disabled>Year..</option>
				<?=$year_list?>
		    </select>
		    </div>
  	</div>

  	<div class="form-row">
	    <div class="form-group col-6">
	    	<label for="mEnd">To</label><span class='red-text'><?=' '.$mEnd_error?></span>
		    <select name='mEnd' value='<?=$mEnd?>' class="custom-select" id="mEnd">
				<option selected disabled>Month..</option>
				<?=$month_list?>
		    </select>
	    </div>
	    
	    <div class="form-group col-6">
	     <label for="yEnd">To</label><span class='red-text'><?=' '.$yEnd_error?></span>
		    <select name='yEnd' value='<?=$yEnd?>' class="custom-select" id="yEnd">
				<option selected disabled>Year..</option>
				<?=$year_list?>
		    </select>
	    </div>
	</div>

	<button type='submit' class='btn btn-primary btn-block'>Confirm</button>
</div>



</form>
</div>
<div class='col-1'></div>
</div>