<?php
$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
  <tr>  
            <th width="40%">Όνομα Προϊόντος</th>  
            <th width="10%">Ποσότητα</th>  
            <th width="20%">Τιμή</th>  
            <th width="15%">Σύνολο</th>  
            <th width="5%">Ενέργειες</th>  
        </tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $output .= '
  <tr>
   <td>'.$values["product_name"].'</td>
   <td>'.$values["product_quantity"].'</td>
   <td align="right">€ '.$values["product_price"].'</td>
   <td align="right">€ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
   <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
  </tr>
  ';
  $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
  $total_item = $total_item + 1;
 }
 $output .= '
 <tr>  
        <td colspan="3" align="right">Total</td>  
        <td align="right">€ '.number_format($total_price, 2).'</td>  
        <td></td>  
    </tr>
 ';
}
else
{
 $output .= '
    <tr>
     <td colspan="5" align="center">
      Το καλάθι σας είναι άδειο!
     </td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
 'cart_details'  => $output,
 'total_price'  => '€' . number_format($total_price, 2),
 'total_item'  => $total_item
); 

echo json_encode($data);


?>
