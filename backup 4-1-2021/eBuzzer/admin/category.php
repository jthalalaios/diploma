<?php 
require_once ('header.php');
require_once ('../includes/functions.php');
?>
<body>
<?php //require_once('message.php'); ?>
<div class="container">
	<h3 class="logo">Κατηγορίες Προϊόντων:</h3>
	<div class="row">
		<div class="col-md-12">
			<a href="#addcategory" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Κατηγορία</a>
		</div>
	</div>
		<table class="menutable">
			<thead>
				<th>Εικόνα</th>
				<th>Όνομα Κατηγορίας</th>
				<th>Ενέργειες</th>
			</thead>
			<tbody>
				<?php
				$con=db_open();
				$sql6 = "SELECT * FROM categories  ";
				//$sql = "SELECT * FROM category_cookies WHERE cat_id  = :cat_id   ";
				$query1 = $con->prepare($sql6);
				$query1->bindParam(':cat_id',$cat_id);
				$query1->bindParam(':cat_image',$cat_image);
				$query1->execute(array(':cat_id' => $cat_id,':cat_image' => $cat_image));
				$result1 = $query1->fetchAll();
					foreach((array)$result1 as $row) {
						?>
						<tr>
							<td> <img class="category_image" src="https://zafora.ece.uowm.gr/~ece00592/eBuzzer/includes/category/<?php  echo $row['cat_image']; ?>"  /> </td> 
							<td><?php echo $row['cat_name']; ?></td>
							<td>
								<a href="#editcategory<?php echo $row['cat_id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Επεξεργασία</a> || <a href="#deletecategory<?php echo $row['cat_id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</a>
								<?php include('../includes/category/editcategory.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php require_once('../includes/footer.php'); ?>
</body>
</html>