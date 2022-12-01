<?php 
	include 'header.php'; 
?>

<section class="py-5">
	<div class="container">
		<div class="row">
		<div class="col-md-7 mx-auto">
		<div class="card">
		    <div class="card-header text-center">
				<h4>Update Product</h4>
			</div>
			<div class="card-body mt-3">
				<form class="post-form" action="" method="post" enctype="multipart/form-data">
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Product Id</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="id" required />
						</div>	
					</div>
					<div class="row mb-3">
					    <label class="col-form-label col-md-3"></label>
						<div class="d-grid col-md-9">
							<input class="btn btn-outline-info" type="submit" name="showbtn" value="Show" />
						</div>
					</div>	
				</form>

			<?php
			    if((isset($_POST['showbtn'])) || (isset($_GET['id'])) ){														      
				    foreach($result as $k => $v)
				    {
			?>
		
				<form class="post-form" action="" method="post" enctype="multipart/form-data">
				
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Category</label>
						
						<div class="col-md-9">
							<select class="form-select" name="cid">
							
							<?php																	
								foreach($result2 as $k2 => $v2)
								{
									if($v['cid'] == $v2['cid']){
										 $select = "selected";
									}
									else $select = "";
									
									echo  "<option {$select} value='{$v2['cid']}'>{$v2['cname']}</option>";
								}
								?>
							</select>     					
						</div>	
					</div>
					
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Name</label>
						<div class="col-md-9">
							<input type="hidden" name="id"  value="<?php echo $v['id']; ?>" />
							<input class="form-control" type="text" name="name" value="<?php echo $v['name']; ?>" />
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Image</label>
						<div class="col-md-9">
						    <input class="form-control" type="file" name="image"/>
							<input class="form-control" type="hidden" name="old_image" value="<?php echo $v['image']; ?>" />
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Description</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="description" value="<?php echo $v['description']; ?>" />
						</div>				
					</div>					
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Price</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="price" value="<?php echo $v['price']; ?>" />
						</div>
					</div>
					
					<div class="row mb-3">
						<label class="col-form-label col-md-3"></label>
						<div class="d-grid col-md-9">
							<input class="btn btn-outline-warning" name="submit" type="submit" value="Update" />
						</div>
					</div>
				</form>
			<?php
			   }
			}
			?>
		    </div>
		</div>
		</div>	
		</div>	
	</div>
</section>
	
<?php 
	include 'footer.php'; 
?>