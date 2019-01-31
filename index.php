<?php 
include('header.php'); /*include header*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "class.php";
/*form submit : post*/  
$lead = new lead; /*lead object creation*/
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	$created_date = date('Y-m-d H:i:s');
	/*insert lead to db */
	$lead_insert = $lead->lead_insert($_REQUEST['uniqid'], $_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['email'], $_REQUEST['phone'], $_REQUEST['address'], $_REQUEST['squarefoot'], $created_date);
	if($lead_insert){
		echo "<div class='alert alert-success'>Information Successfully Saved</div>";
	} else {
		
		echo "<div class='alert alert-danger'>Lead Submission Failed !</div>";
	}
	
}

 
?>

 
	
	<h2>Enter Your Lead Details</h2>
	<div id="form_info"></div>
	  <form class="" action="" method="post">
		<div class="col-md-6">
			<div class="form-group">
			  <label for="fname">First Name:</label>
			  <input type="text" class="form-control" id="fname" maxlength="20" placeholder="Enter First Name" name="fname" onkeyup="saveLeadFormdata()" required>
			  <input type="hidden" id="uniqid" name="uniqid" value="">
			</div>
			
			<div class="form-group">
			  <label for="lname">Last Name:</label>
			  <input type="text" class="form-control" id="lname" maxlength="20" placeholder="Enter Last Name" name="lname" onkeyup="saveLeadFormdata()" required>
			</div>
			
			<div class="form-group">
			  <label for="email">Email Address:</label>
			  <input type="email" class="form-control" id="email" maxlength="30" placeholder="Enter Email Address" name="email" onkeyup="saveLeadFormdata()" required>
			</div>
			
			<div class="form-group">
			  <label for="phone">Phone Number:</label>
			  <input type="text" class="form-control" maxlength="12" id="phone" placeholder="Enter Phone Number" name="phone" onkeyup="saveLeadFormdata()" required>
			</div>
			
			<div class="form-group">
			  <label for="phone">Address:</label>
			  <textarea class="form-control" id="address" name="address" onkeyup="saveLeadFormdata()" required></textarea>
			</div>
			
			<div class="form-group">
			  <label for="phone">Home Square Footage:</label>
			  <input type="text" class="form-control" id="squarefoot" maxlength="10" placeholder="Enter Home Square Footage" name="squarefoot" onkeyup="saveLeadFormdata()" required>
			</div>
		 
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	  </form>
	
<?php 
 include('footer.php');	
?>