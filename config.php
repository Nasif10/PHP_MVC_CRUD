<?php

class dbconnect
{	
	protected $conn;
	
	public function __construct(){
		$this->conn = new mysqli("localhost", "root", "", "pcrud");
		
	    if($this->conn->connect_error) {
		   die("Connection failed: " . $conn->connect_error);
		}
	}
}

?>