<?php
define('HOST','localhost');
define('USER','prayanan_cma');
define('PASSWORD','123cma!@#');
define('DBname','prayanan_jjsoft_cma');

class DB
{
	
	public $con;
	
	public function __construct(){
		$this->con = mysqli_connect(HOST,USER,PASSWORD) or die('Connection Error:'.mysqli_error($this->con));
		mysqli_select_db($this->con,DBname) or die('Connection Error: ->'.mysqli_error($this->con));
	}
	
	public function getCon(){
		return $this->con;
	} 
	
}

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
	
	
	  
	
}


?>