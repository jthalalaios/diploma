<?php 
require_once ('header.php');
?>
<body>

   <div class="rpanel">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
   
      <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>
    
    Το καλάθι μου:
        <a id="cart-popover" class="btn" data-placement="bottom" title=" Καλάθι Αγοράς:">
         <span class="glyphicon glyphicon-shopping-cart"></span>
         <span class="badge"></span>
         <span class="total_price">0.00 €</span>
        </a>
     
     </div>
     
    
   <div id="popover_content_wrapper" style="display: none">
    <span id="cart_details"></span>
    <div align="right">
     <a href="#" class="btn btn-primary" id="check_out_cart">
     <span class="glyphicon glyphicon-shopping-cart"></span> Υποβολή
     </a>
     <a href="#" class="btn btn-default" id="clear_cart">
     <span class="glyphicon glyphicon-trash"></span> Διαγραφή
     </a>
    </div>
   </div>


   
<div class="container">

	<h1 class="logo">Εξέλιξη Παραγγελίας:</h1>
	<div class="but">
	<button id="modalButor" class="butor"> Παράγγειλε τώρα </button>
	</div>
	<div id="sModal" class="modall">
	<div class="modall-content">
	<span class="closebutor">&times; </span>
	<p> Επιλέξτε το φαγητό που επιθυμείτε να παραγγείλετε! </p>
	<br>
		<?php require_once ('test4.php'); ?>
	</div></div>

		
</div>

<script src="../includes/js/main.js"> </script> 
<script src="../includes/js/jquery.min.js"></script>
<script src="../includes/js/bootstrap.min.js"></script>

<?php 
require_once ('../includes/footer.php');
?>

</body>
</html>

