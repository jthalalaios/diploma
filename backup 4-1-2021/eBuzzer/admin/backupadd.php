
<?php
$con=db_open();
$output = '';
			$sql = "SELECT * FROM category_cookies    ";
			//$sql = "SELECT * FROM category_cookies WHERE cat_id_cookies  = :cat_id_cookies   ";
			$query1 = $con->prepare($sql);
			$query1->bindParam(':cat_id_cookies',$cat_id_cookies);
			$query1->execute(array(':cat_id_cookies' => $cat_id_cookies));
			//$query1->execute();
			$result1 = $query1->fetchAll();
		
?>	

     
	   <select id="catList" class="selectt">
		<option value="0">Κατηγορίες - Όλες</option>

		 
       <?php
	   foreach((array)$result1 as $row1)
       {
		   echo $row1['cat_name_cookies'];
		   $catid = isset($_GET['category_cookies']) ? $_GET['category_cookies'] : 0;
			$selected = ($catid == $row1['cat_id_cookies']) ? " selected" : "";
			echo "<option$selected value=".$row1['cat_id_cookies'].">".$row1['cat_name_cookies']."</option>";
			
	   }
		?>
	</select>
	
	<?php
					$where = "";
					if(isset($_GET['category_cookies']))
					{
						$catid=$_GET['category_cookies'];
						$where = " WHERE product.product_cat_cookies = $catid";
					}
					$sql2="select * from product left join category_cookies on category_cookies.cat_id_cookies=product.product_cat_cookies  $where  order by category_cookies.cat_id_cookies asc, cat_name_cookies asc";
					$query2 = $con->prepare($sql2);
					$query2->bindParam(':cat_name_cookies',$cat_name_cookies);
					$query2->bindParam(':cat_id_cookies',$cat_id_cookies );
					$query2->bindParam(':product_id',$product_id );
					$query2->bindParam(':product_name ',$product_name);
					$query2->bindParam(':product_cat_cookies ',$product_cat_cookies);
					$query2->bindParam(':quantity ',$quantity);
					$query2->bindParam(':value',$value);
					$query2->bindParam(':image',$image);
					$query2->execute(array(':cat_name_cookies' => filter_var($cat_name_cookies),':cat_id_cookies' => $cat_id_cookies,':product_id' => $product_id,':product_name' => filter_var($product_name),':product_cat_cookies' => $product_cat_cookies,':quantity' => $quantity,':value' => $value,':image' => $image));
					$count=$query2->fetchAll();
					?>
					
					<div class="orderlist">
				
					<?php
			if($count!=$query2->fetchALL() )
{

 $output .= '
        <table class="ordertable">
    <tr>
	<th>Εικόνα</th>
     <th>Όνομα προϊόντος </th>
     <th>Τιμή</th>	  
    </tr>
	
 ';
 foreach($count as $row) 
 {
  $output .= '
   <tr>
    <td>'.$row["image"].'  </td>
    <td>'.$row["product_name"].'
	 <td>'.$row["value"].' €</td>
   </tr>
  ';
  
 


}
echo $output;
 
}
else
{
 echo "Σφάλμα αναζήτησης προϊόντων";
}

$con=null;

?>
 </table>
					 </div>
					 
					 <div class="modalf-leftbtn">
        <button type="button"  id="closebut" class="btn btn-secondary" >Κλείσιμο</button>
		</div>
		<div class="modalf-rightbtn">
        <button type="button"   class="btn btn-success">Ολοκλήρωση</button>
      </div>
					 
	

