<?php 
	include 'header.php'; 
?>

<section class="py-5">
	<div class="container">	
		<div class="row">
		<div class="col-md-7 mx-auto">
		<div class="card">
		    <div class="card-header text-center">
				<h4>Create New Product</h4>
			</div>
			<div class="card-body mt-3">
				<form class="post-form" action="" method="post" enctype="multipart/form-data">
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Category</label>
						<div class="col-md-9">
							<select class="form-select" name="cid">
							<option value="" selected disabled>Select category</option>
							
					  <?php foreach($result as $k => $v){ ?>
								<option value ="<?php echo $v['cid']; ?>"> <?php echo $v['cname']; ?></option>

					  <?php } ?>
							</select>
						</div>	
					</div>
				
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Name</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="name"/>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Image</label>
						<div class="col-md-9">
							<input class="form-control" type="file" name="image" required/>
					    </div>
					</div>
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Description</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="description" required/>
						</div>	
					</div>
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Price</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="price" required/>
					    </div>
					</div>
					
					<div class="row mb-3">
					    <label class="col-form-label col-md-3"></label>
						<div class="d-grid col-md-9">
						    <input class="btn btn-outline-success" name="submit" type="submit" value="Save" />
				        </div>
					</div>
				</form>
			</div>
		</div>
		</div>	
		</div>	
	</div>
</section>

<?php 
	include 'footer.php'; 
?>
