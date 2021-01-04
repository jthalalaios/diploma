
<?php 
require_once ('header.php');
?>
<?php
$con=db_open();
$output = '';
			$sql = "SELECT * FROM categories    ";
			//$sql = "SELECT * FROM categories WHERE cat_id  = :cat_id   ";
			$query1 = $con->prepare($sql);
			$query1->bindParam(':cat_id',$cat_id);
			$query1->execute(array(':cat_id' => $cat_id));
			//$query1->execute();
			$result1 = $query1->fetchAll();
		
?>	
		
<body>
<div class="logo">
<label><h4>Επιλέξτε Κατηγορία:</h4></label>

       <select id="catList" class="btn btn-default">
		<option value="0">Όλες - Κατηγορίες</option>
		 
       <?php
	   foreach((array)$result1 as $row1)
       {
		   //echo $row1['cat_name'];
		   $catid = isset($_GET['categories']) ? $_GET['categories'] : 0;
			$selected = ($catid == $row1['cat_id']) ? " selected" : "";
			echo "<option$selected value=".$row1['cat_id'].">".$row1['cat_name']."</option>";
	   }
		?>
	  </select>
	   </div>
	   	 <div class="col-md-12"> 
		  <a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Προϊόν</a>
	</div>
	   <div class="gen">
	   	<table class="menutable">
			<thead>
				<th>Εικόνα</th>
				<th>Όνομα Προϊόντος</th>
				<th>Τιμή</th>
				<th>Ενέργειες</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['categories']))
					{
						$catid=$_GET['categories'];
						$where = " WHERE product.product_cat_id = $catid";
					}
					$sql2="select * from product left join categories on categories.cat_id=product.product_cat_id  $where  order by categories.cat_id asc, cat_name asc";
					$query2 = $con->prepare($sql2);
					$query2->bindParam(':cat_name',$cat_name);
					$query2->bindParam(':cat_id',$cat_id );
					$query2->bindParam(':product_id',$product_id );
					$query2->bindParam(':product_name ',$product_name);
					$query2->bindParam(':product_cat_id ',$product_cat_id);
					$query2->bindParam(':quantity ',$quantity);
					$query2->bindParam(':value',$value);
					$query2->bindParam(':image',$image);
					$query2->execute(array(':cat_name' => filter_var($cat_name),':cat_id' => $cat_id,':product_id' => $product_id,':product_name' => filter_var($product_name),':product_cat_id' => $product_cat_id,':quantity' => $quantity,':value' => $value,':image' => $image));
					$count=$query2->fetchAll();
					 foreach($count as $row){
						?>
						<tr>
							<td><img class="category_image" src="https://zafora.ece.uowm.gr/~ece00592/eBuzzer/includes/product/<?php  echo $row['image']; ?>"  /> </td>
							<td><?php echo $row['product_name']; ?></td>
							<td><?php echo number_format($row['value'], 2); ?>€</td>
							<td>
								<a href="#editproduct<?php echo $row['product_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> || <a href="#deleteproduct<?php echo $row['product_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</a>
								<?php include('../includes/product/editproduct.php'); ?>
							</td>
						</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
		</div>
      	<?php include('../includes/product/addproduct.php'); ?>
		
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'product.php';
			}
			else
			{
				window.location = 'product.php?categories='+$(this).val();
			}
		});
	});
</script>	  
 <?php require_once ('../includes/footer.php'); ?>
</body>
</html>	
 