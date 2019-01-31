<?php
define('HOST','localhost');
define('USER','prayanan_cma');
define('PASSWORD','123cma!@#');
define('DBname','prayanan_jjsoft_cma');

class DB
{
	/*database connection*/
	public $con;
	
	public function __construct(){
		$this->con = mysqli_connect(HOST,USER,PASSWORD) or die('Connection Error:'.mysqli_error($this->con));
		mysqli_select_db($this->con,DBname) or die('Connection Error: ->'.mysqli_error($this->con));
	}
	
	public function getCon(){
		return $this->con;
	} 
	
}

/*class for lead operations*/
class lead
{
	public $db;
	
	public function __construct(){
		$this->db = new DB;
	}
	
	/*insert lead to db*/
	public function lead_insert ($uniqid, $fname, $lname, $email, $phone, $address, $squarefoot, $created_date){
		
		$check_lead	=	mysqli_query($this->db->getCon(), "select uniqid from leads where uniqid='$uniqid'");
		$result =	mysqli_num_rows($check_lead);
		if($result==0){ /*if uniqid not already exists*/
 			$leadInsert = mysqli_query($this->db->getCon(),"insert into leads (`uniqid`, `fname`,`lname`,`email`,`phone`,`address`,`squarefoot`,`created_date`) VALUES ('$uniqid','$fname', '$lname', '$email', '$phone', '$address', '$squarefoot', '$created_date')") or die(mysqli_error($this->db->getCon()));
			return $leadInsert;
		} else {  /*if uniqid already exists*/
			$leadUpdate = mysqli_query($this->db->getCon(),"update leads set `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`address`='$address',`squarefoot`='$squarefoot',`created_date`='$created_date' where uniqid='$uniqid'") or die(mysqli_error($this->db->getCon()));
			return $leadUpdate;
		}
		 
	}
	
	/* get all leads on agent dashboard */
	public function agent_dashboard(){
 		$allLeads = mysqli_query($this->db->getCon(),"select uniqid, fname, lname, email, created_date from leads ORDER BY fname ASC") or die(mysql_error());
 		$result =	mysqli_num_rows($allLeads);
		if($result==0){
			
			echo "<tr><td colspan='4'>No Details Found !</td></tr>";
			
		}
		else
		{
			
			while($lead = mysqli_fetch_assoc($allLeads))
			{
			?>
			  <tr>
				<td><?=$lead['fname'].' '.$lead['lname']?></td>
				<td><?=$lead['email']?></td>
				<td><?=$lead['created_date']?></td>
				<td><a href="lead_details.php?luid=<?=$lead['uniqid']?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
			  </tr>
			<?php
			}
		}
		 
	}
	
	/* get lead details on agent dashboard */
	public function single_lead_details($uniqid){
 		$singleLead = mysqli_query($this->db->getCon(),"select * from leads where uniqid='$uniqid'") or die(mysql_error());
 		$result =	mysqli_num_rows($singleLead);
		if($result==0){
			
			echo "<tr><td colspan='6'>Invalid Request !</td></tr>";
			
		}
		else
		{
			
			$lead = mysqli_fetch_array($singleLead);
			?> 
			  <tr>
				<td><?=$lead['fname'].' '.$lead['lname']?></td>
				<td><?=$lead['email']?></td>
				<td><?=$lead['phone']?></td>
				<td><?=$lead['address']?></td>
				<td><?=$lead['squarefoot']?></td>
				<td><?=$lead['created_date']?></td>
 			  </tr>
			<?php
			
		}
		 
	}
	  
	
}


?>