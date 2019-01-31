<?php 
include('header.php'); /*include header*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "class.php";
$lead = new lead; /*lead object creation*/

 
?>
	<h2>Agent Dashboard : All Leads</h2>
 		<div class="col-md-6">
			<table class="table table-bordered">
			
				<thead>
				  <tr>
					<th>Full Name</th>
					<th>Email Address</th>
					<th>Created Date</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody>
					<?php 
						$lead->agent_dashboard();
					?>
				</tbody>
			 </table>
		</div>
	 
	
<?php 
 
 include('footer.php');	
?>