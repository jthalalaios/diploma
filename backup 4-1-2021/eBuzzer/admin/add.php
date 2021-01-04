<?php
require_once ('../includes/fetch/loadItem.php');
require_once ('../includes/items/action.php');
;
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
	
	
					
					<div class="orderlist">
	<table class="ordertable">
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
 $output = '';
 foreach($count as $row)
 {
  $output .= '
  <div class="col-md-3" style="margin-top:12px;">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:450px;" align="center">
             <img src="'.$row["image"].'" class="img-responsive" /><br />
             <h4 class="text-info">'.$row["product_name"].'</h4>
             <h4 class="text-danger">'.$row["value"].' €</h4>
             <input type="text" name="quantity" id="quantity' . $row["product_id"] .'" class="form-control" value="1" />
             <input type="hidden" name="hidden_name" id="name'.$row["product_id"].'" value="'.$row["product_name"].'" />
             <input type="hidden" name="hidden_price" id="price'.$row["product_id"].'" value="'.$row["value"].'" />
             <input type="button" name="add_to_cart" id="'.$row["product_id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Προσθήκη" />
            </div>
        </div>
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
					 
	

