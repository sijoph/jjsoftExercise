<?php 
include('header.php'); /*include header*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "class.php";
$lead = new lead; /*lead object creation*/

 if(isset($_GET['auid']))
 {
	
	if($_GET['auid']=='603AEC402B9363218DED7762BA6A3D3E')
	{
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
	}
	else 
	{
		?>
		<div class='alert alert-danger'>You Dont Have Permission To Access This Page !</div>
		<?php
		
	}
}
else 
{
	?>
	<div class='alert alert-danger'>You Dont Have Permission To Access This Page !</div>
	<?php
	
}

 include('footer.php');	/*footer*/
?>