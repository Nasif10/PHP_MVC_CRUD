<?php

class productController{

    public $obj;
	
	function __construct(){
		require 'model/product.php';
        $this->obj = new Product();
    }

    public function home()
	{
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$limit = 5;
		if(isset($_POST["cid"]))
        {
			$cid = (int)$_POST["cid"];
			$result = $this->obj->selectData($cid);
		}
		else{
			$result = $this->obj->selectData(0,$page,$limit);
		}
		$sql = "SELECT * FROM category";
		$result2 = $this->obj->get_result($sql);
		$result3 = $this->obj->pagination($limit);
		
		require 'view/home.php';
    }

    public function create()
	{
		$sql = "SELECT * FROM category";
		$result = $this->obj->get_result($sql);
			
		if(isset($_POST["submit"]))
        {
            $iname = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $target_dir = "savedImage/".$iname;
            move_uploaded_file($tmp_name, $target_dir);

            $this->obj->cid = $_POST['cid'];
			$this->obj->name = $_POST['name'];
			$this->obj->image = $target_dir;
            $this->obj->description = $_POST['description'];
            $this->obj->price = $_POST['price'];
            $this->obj->insertData();

            header("Location: index.php");
        }
        include('view/add.php');
	}
	
	public function update()
	{
		if((isset($_POST['showbtn'])) || (isset($_GET['id'])) ){
			$pid = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];

			$sql = "SELECT * FROM product where id = '$pid'";
			$result = $this->obj->get_result($sql);
			
			$sql2 = "SELECT * FROM category";
		    $result2 = $this->obj->get_result($sql2);
		}
		
		if(isset($_POST["submit"]))
		{
			$this->obj->id = $_POST['id'];
			$this->obj->cid = $_POST['cid'];
			$this->obj->name = $_POST['name'];
			$this->obj->description = $_POST['description'];
			$this->obj->price = $_POST['price'];
				
			$this->old_img = $_POST['old_image'];
			$iname = $_FILES['image']['name'];
				
			if($iname != ''){
				$tmp_name = $_FILES['image']['tmp_name'];
				$target_dir = "savedImage/".$iname;
				move_uploaded_file($tmp_name, $target_dir);
				$this->obj->image = $target_dir;
				$this->obj->updateData();
			}
			else{
				$this->obj->image = $this->old_img;
				$this->obj->updateData();
			}
				 
			header("Location: index.php");
		}
		
		include('view/update.php');
	}
	
	public function delete()
	{
		if((isset($_POST['deletebtn'])) || isset($_GET['id']))
		{
			$pid = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];		
			$this->obj->id = $pid;
			$this->obj->deleteData();
			header("Location: index.php");
		}
		$sql = "select COLUMN_NAME from information_schema.columns where table_schema = 'pcrud' and table_name = 'product'";
		$result2 = $this->obj->get_result($sql);
		include('view/delete.php');
	}
	
	public function query()
	{
		if(isset($_POST['query']))
		{
			$sql = $_POST['query'];
		    $result = $this->obj->get_result($sql);		
		}
		include('view/query.php');
		
	}
}
?>