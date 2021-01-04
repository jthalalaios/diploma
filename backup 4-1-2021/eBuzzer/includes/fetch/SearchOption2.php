<?php 
require_once ('includes/require2.php');
require_once('includes/https.php');
require_once('includes/require.php');
?>
<?php

$con=db_open();
$output = '';

			$sql = "SELECT * FROM category_cookies ";
			$query1 = $con->prepare($sql);
			$query1->bindParam(':cat_name_cookies',$cat_name_cookies);
			$query1->bindParam(':cat_id_cookies',$cat_id_cookies );
			$query1->execute(array(':cat_name_cookies' => filter_var($cat_name_cookies),':cat_id_cookies' => $cat_id_cookies));
			$result1=$query1->fetchAll();
			
	   foreach((array)$result1 as $row1)
       {
        echo '<option value="('.$row1["cat_id_cookies"].')">'.$row1["cat_name_cookies"].'</option>';
	   $val=$row1["cat_id_cookies"];
	   }
		echo '</select>';
?>	

