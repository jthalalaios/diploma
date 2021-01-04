<?php
require_once ('../includes/fetch/loadItem.php');
require_once ('../includes/items/action.php');

$con=db_open();
$id=$_POST["hidden_name"];
echo $id;
?>
	<div class="orderlist">
	<table class="ordertable">
<?php	
 	$where = "";
	$output = '';
					$sql2="select * from product left join categories on categories.cat_id=product.product_cat_id $where  order by categories.cat_id asc, cat_name asc";
					$query2 = $con->prepare($sql2);
					$query2->bindParam(':cat_name',$cat_name);
					$query2->bindParam(':cat_id',$cat_id );
					$query2->bindParam(':product_id',$product_id );
					$query2->bindParam(':product_name ',$product_name);
					$query2->bindParam(':product_cat_id',$product_cat_id);
					$query2->bindParam(':quantity ',$quantity);
					$query2->bindParam(':value',$value);
					$query2->bindParam(':image',$image);
					$query2->execute(array(':cat_name' => filter_var($cat_name),':cat_id' => $id,':product_id' => $product_id,':product_name' => filter_var($product_name),':product_cat_id' => $product_cat_id,':quantity' => $quantity,':value' => $value,':image' => $image));
					$count=$query2->fetchAll();
foreach($count as $row)
 {
  $output .= '
  <table class"ordertable;">  
            <form id="order" name"order" action="test3.php" method="post">
			<tr>
			<td>
            <a href="test3.php" </a><img src="../includes/category/'.$row["image"].'" class="img-responsive" onclick="test4.php" name="hidden_name" value="'.$row["cat_id"].'" />    </td><br/>
            <h4 class="text-info">'.$row["product_name"].'</h4> 
            </tr> <tr><td> <input type="submit" id="form-submit" name="hidden_name" value="'.$row["value"].'" /> </td>
			</form>
			</tr>
            </table> 	
  ';
 
 }
 echo $output;
?>	
 </table>
 
		 </div>
		<div class="modalf-leftbtn">
        <button type="button"  id="closebut" class="btn btn-secondary" >Κλείσιμο</button>
		</div>
		<div class="modalf-rightbtn">
        <button type="button"   class="btn btn-success">Ολοκλήρωση</button>
      </div>
					 
	

