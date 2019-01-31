<?php 
include('header.php'); /*include header*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "class.php";
$lead = new lead; /*lead object creation*/
 
?>
	<h2>Lead Details</h2>
 		<div class="col-md-10">
			<table class="table table-bordered">
			
				<thead>
				  <tr>
					<th>Full Name</th>
					<th>Email Address</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Home Square Footage</th>
					<th>Created Date</th>
				  </tr>
				</thead>
				<tbody>
					<?php 
					if(isset($_GET['luid']))
					{
						$lead->single_lead_details($_GET['luid']); /*single lead details with row*/
					} else {
						
						echo "<tr><td colspan='6'>Invalid Request !</td></tr>";
					}
						
					?>
				</tbody>
			 </table>
		</div>
 	
<?php 
 include('footer.php');	
?>