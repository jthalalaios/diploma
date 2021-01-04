<?php 
require_once ('header.php');

?>
<body>
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
	 <?php require_once ('add.php'); ?>
	
	</div></div>
	
		
</div>

<script src="../includes/js/main.js"> </script> 
<?php 
require_once ('../includes/footer.php');
?>
</body>
</html>