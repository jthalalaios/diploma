<?php 
require_once ('header.php');
?>
<body>
<div class="container">
	<h1 class="logo">Εξέλιξη Παραγγελίας:</h1>
	<form method="POST" action="../includes/product/purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th class="text-center">Κατηγορία</th>
				<th class="text-center">Όνομα Προϊόντος</th>
				<th class="text-center">Τιμή</th>
				<th class="text-center">Ποσότητα</th>
			</thead>
			<tbody>
				<?php 
					$con=db_open();
					$sql="select * FROM product pr inner join category_cookies cat on cat.cat_id_cookies =pr.product_cat_cookies  order by pr.product_cat_cookies  asc, product_name  asc";
					$query = $con->prepare($sql);
					$query->bindParam(':product_cat_cookies',$product_cat_cookies);
					$query->bindParam(':product_name',$product_name);
					$query->execute(array(':product_cat_cookies' => $product_cat_cookies,':product_name' => $product_name));
					$count=$query->fetchALL();
					$iterate=0;
					foreach($count as $row) {
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['product_id']; ?>||<?php echo $iterate; ?>" name="product_id[]" style=""></td>
							<td><?php echo $row['cat_name_cookies']; ?></td>
							<td><?php echo $row['product_name']; ?></td>
							<td class="text-right"> <?php echo $row['value'];  ?>€</td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
		
			<div class="side-bar">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Αποστολή</button>
			</div>
		
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
<?php 
require_once ('../includes/footer.php');
?>
</body>
</html>