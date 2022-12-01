<?php
require 'config.php';

class Product extends dbconnect
{
	public $id;
	public $cid;
	public $name;
	public $image;
    public $description;
    public $price;

    function __construct(){
		parent::__construct();
        $id = $cid = $price = 0;
        $name = $image = $description = "";
    }
	
	public function get_result($sql)
	{
		$result = $this->conn->query($sql);
		$rows = [];
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
		}
		return $rows;	
	}
	
	public function selectData($c=0, $page=1, $limit=5)
	{	
		if($c != 0){
			$sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid where category.cid = '$c'";
			return $this->get_result($sql);
		}
		else{			
			$start = ($page-1) * $limit;
			$sql = "SELECT * FROM product INNER JOIN category ON product.cid = category.cid LIMIT {$start}, {$limit}";
			return $this->get_result($sql);
		}	
	}
	
	public function insertData()
	{
		$sql = "INSERT INTO product (`cid`, `name`, `image`, `description`, `price`) VALUES ('$this->cid', '$this->name', '$this->image', '$this->description', '$this->price')";
		$this->conn->query($sql);
	}
	
	public function updateData()
	{
		$sql = "UPDATE product SET `cid` = '$this->cid', `name` = '$this->name', `image` = '$this->image', `description` = '$this->description', `price` = '$this->price' WHERE `id` = $this->id";
	    $this->conn->query($sql);
	}
	
	public function deleteData()
	{
		$sql = "DELETE FROM product WHERE `id` = $this->id";
	    $this->conn->query($sql);	
	}
	
	public function queryData()
	{
	
	}
	
	public function pagination($limit = 5)
	{
		$sql = "SELECT COUNT(*) FROM product INNER JOIN category ON product.cid = category.cid";			
		$res = $this->conn->query($sql);
		$total = $res->fetch_array() ;
		$total = $total[0];
		$total_page = ceil($total / $limit);
		return $total_page;	
	}

	
	public function __destruct(){
		$this->conn->close();
	}

}

?>