<?php
include 'header.php';
?>

<section class="pt-5">
	<div class="container">
		<div class="row mb-3 border-bottom">
			<div class="col">
				<h3>Product List</h3>
			</div>
			<div class="col col-3 d-flex justify-content-end pb-3">
				<form class="input-group post-form" action="" method="post">
					<select class="form-select" name="cid">
						<option value="" >All</option>
								
				  <?php foreach($result2 as $k2 => $v2)
				        { 
				  ?>			
						<option value ="<?php echo $v2['cid']; ?>" <?php echo isset($_POST["cid"]) ? ((int)$_POST["cid"] == $v2['cid'] ? 'selected="selected"' : '') : '';?> > <?php echo $v2['cname']; ?></option>

			      <?php } ?>
					</select>
					<button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>
		</div>
		
		<table class="table table-bordered table-hover" cellpadding="2px">
			<thead class="table-light">
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Image</th>
				<th scope="col">Description</th>
				<th scope="col">Price</th>  
				<th scope="col"></th>
			</thead>
			<tbody>
			<?php
				foreach($result as $k => $v)
				{
			?>
					<tr>
						<td><?php echo $v['id']; ?></td>
						<td><?php echo $v['name']; ?></td>
						<td style="text-align:center;"><img src="<?php echo $v['image']; ?>" alt="N" width="45" height="45"></td>
						<td><?php echo $v['description']; ?></td>
						<td><?php echo $v['price']; ?></td>             
						<td style="text-align: center; width:13%">
							<a role="button" class="btn btn-sm btn-outline-warning mx-1" href='index.php?function=update&id=<?php echo $v['id']; ?>'><i class="bi bi-pencil-square"></i></a>
							<a role="button" class="btn btn-sm btn-outline-danger mx-1" href='index.php?function=delete&id=<?php echo $v['id']; ?>'><i class="bi bi-trash"></i></a>
						</td>
					</tr>
			<?php
				} 
			?>
			</tbody>
		</table>
		
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center pt-3">

			<?php
				$total_page = $result3;
				
				if($total_page>1){ 
					for ($i = 1; $i <= $total_page; $i++)
					{					
						$cls = '';
						if(isset($_GET['page'])){
							$cls = ($i == $_GET['page']) ? "active" :"";
						}
						echo '<li class="page-item '.$cls.'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>'; 							
					}
				}		
		    ?>	
			</ul>
		</nav>

	</div>
</section>

<?php include 'footer.php'; ?>
