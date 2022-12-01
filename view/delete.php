<?php 
	include 'header.php';
?>

<section class="py-5">
	<div class="container">
	    <div class="row">
		<div class="col-md-7 mx-auto">
		<div class="card">
		    <div class="card-header text-center">
				<h4>Delete Product</h4>
			</div>
			<div class="card-body mt-3">
				<form class="post-form" action="" method="post">
					<div class="row mb-3">
						<label class="col-form-label col-md-3">Product Id</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="id" />
						</div>	
					</div>
					<div class="row mb-3">
					    <label class="col-form-label col-md-3"></label>
						<div class="d-grid col-md-9">
							<input class="btn btn-outline-danger" type="submit" name="deletebtn" value="Delete"/>
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