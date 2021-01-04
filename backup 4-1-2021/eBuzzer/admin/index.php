<?php
require_once('header.php'); 
?>
<div class="page">
 <div class="generic">
  <div class="panel">
   <div class="news-letter">
    <div class="logo">
		<h3>Καλωσήρθατε Διαχειριστή: <?php if (isset($_SESSION['name'])) {echo ''.$_SESSION['name'].'' ; }?> </h3>
			<div class="form-group">
             <div class="input-group">
				</div> </div>           	
	</div>
   </div>	
  </div>
 </div>
</div>    
  <?php require_once ('../includes/footer.php'); ?>
</body>
</html>
