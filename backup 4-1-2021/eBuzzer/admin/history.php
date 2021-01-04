<?php
require_once('../includes/require.php');
require_once('header.php'); 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--------header wrap ends--------->
<body>
<div class="page">
    <div class="generic">
      <div class="panel">
	  <div class="news-letter">
        <div class="title">
			<h1>Αναζήτηση Χρήστη: </h1>

			      <div class="form-group">
                 <div class="input-group">
			 <input type="text" name="search_text" id="search_text" placeholder="Search User" class="form-control" />
				     </div>
                     </div>           
				 <div id="result"></div>
		</div>
        </div>
		
       </div>
	  </div>
    </div>
    <?php require_once('../includes/fetch/ajaxSearchHistory.php'); ?>
  <?php require_once ('../includes/footer.php'); ?>
</body>
</html>
