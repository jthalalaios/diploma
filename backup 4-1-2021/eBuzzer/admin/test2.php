<div class="orderlist">
<?php
require_once ('../includes/fetch/loadItem.php');
require_once ('../includes/items/action.php');

$con=db_open();
$output = '';
			$sql = "SELECT * FROM categories    ";
			//$sql = "SELECT * FROM category_cookies WHERE cat_id  = :cat_id   ";
			$query1 = $con->prepare($sql);
			$query1->bindParam(':cat_id',$cat_id);
			$query1->execute(array(':cat_id' => $cat_id));
			$count = $query1->fetchAll();
		
 foreach($count as $row)
 {
  $output .= '
  <table class"ordertable;">  
            <form id="order" name"order" action="test3.php" method="post">
			<tr>
			<td>
            <a href="test3.php" </a><img src="../includes/category/'.$row["cat_image"].'" class="img-responsive" onclick="test4.php" name="hidden_name" value="'.$row["cat_id"].'" />    </td><br/>
            <h4 class="text-info">'.$row["cat_name"].'</h4> 
            </tr> <tr><td> <input type="submit" id="form-submit" name="hidden_name" value="'.$row["cat_id"].'" /> </td>
			</form>
			</tr>
			
            </table> 
			
  ';
 
 }
 echo $output;

?>	
		 </div>	 
		<div class="modalf-leftbtn">
        <button type="button"  id="closebut" class="btn btn-secondary" >Κλείσιμο</button>
		</div>
		<div class="modalf-rightbtn">
        <button type="button"   class="btn btn-success">Ολοκλήρωση</button>
      </div>
					 
	

