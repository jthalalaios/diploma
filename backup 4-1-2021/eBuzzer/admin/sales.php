<?php 
include('header.php'); ?>
<body>
<div class="container">
	<h1 class="page-header text-center">Αγορές:</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Ημερομηνία</th>
			<th>Συνολικές Αγορές</th>
			<th>Λεπτομέρειες</th>
		</thead>
		<tbody>
			<?php 
				$con=db_open();
				$who=$_SESSION['who'];
				//$sql="select  s_date,total,idh_user  from history WHERE idh_user=:idh_user   order by id_pur desc";
				$sql="select  *  from history WHERE idh_user=:idh_user   order by id_pur desc";
				$query = $con->prepare($sql);
			    $query->execute(array(':idh_user' => $_SESSION['who']));	
				
				foreach ($query->fetchAll() as $row) {
					$hid=$row['idh_prod'];
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['s_date'])) ?></td>
						<td class="text-right"><?php echo number_format($row['total'], 2); ?>€</td>
						<td><a href="#details<?php echo $row['id_pur']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
							<?php include('salesinfo.php'); ?>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
 <?php require_once ('../includes/footer.php'); ?>
</body>
</html>