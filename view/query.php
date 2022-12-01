<?php include 'header.php'; ?>

<section class="py-5">
	<div class="container">
		<div class="row">
		<div class="col-md-7 mx-auto">
		<div class="card">
			<div class="card-header text-center">
				<h4>Product Query</h4>
			</div>
			<div class="card-body">
				<p class="card-title">Enter your SQL query in the textbox:</p>
			
				<form class="post-form" action="" method="POST"> 
				<div class="row mb-3 mx-auto">
					<textarea id="query_text" class="form-control" name="query" rows="4" required></textarea></br></br>			
				</div>
				<div class="row mb-3 mx-auto">
					<input class="btn btn-outline-info" type="submit" value="Run Query"/>
				</div>
				</form>
				
				<?php if(isset($result)) {
					    echo "<pre>";
						   print_r($result);
					   echo "</pre>";
				} ?>
			</div>	
		</div>	
		</div>
		</div>			
	</div>
</section>
	
<?php include 'footer.php'; ?>