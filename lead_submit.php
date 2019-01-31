<?php
include_once "class.php";
$lead = new lead;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
 	$created_date = date('Y-m-d H:i:s');
	$lead_insert = $lead->lead_insert($_REQUEST['uniqid'], $_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['email'], $_REQUEST['phone'], $_REQUEST['address'], $_REQUEST['squarefoot'], $created_date);
	if($lead_insert){
		echo "<div class='alert alert-success'>Information Has Been Saved</div>";
	} else {
		
		echo "<div class='alert alert-danger'>Lead Submission Failed !</div>";
	}
	
}

?>