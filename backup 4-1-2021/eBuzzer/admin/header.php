<?php 
require_once('../includes/functions.php');
require_once('../includes/https.php');
require_once('../includes/require.php');
require_once('adminSession.php');  
require_once ('requireadmin.php');
require_once ('../includes/js/logout-start.js');
?>
</head>
<body>
 <div class="menu-wrap">
 <div class="menu">
 <div class="dropdownm"> 
	<div class="who"> 	
		<button onclick="start()">
			<?php
		        if (isset($_SESSION['name'])) {
		        	echo ''.$_SESSION['name'].''
		        	;
		        	} else {
		        		echo '<li><a href="#" class="hvr-grow modal-trigger" data-target="modal1">Login</a></li>
		        		<li><a href="#" class="hvr-grow modal-trigger" data-target="modal2">Register</a></li>';
		        	}
			?>
	    </button>  
	</div>
  <ul>
  <li><h4>Παραγγελία </h4>  	
	<div class="subclass-menu">
		<ul>
			<li><a href="newor.php">Δημιουργία</a> </li>
			<li><a href="sales.php">Ιστορικό</a></li>
		</ul>	
	</div> 
  </li>	
  <li><h4>Επεξεργασία </h4>  	
	<div class="subclass-menu">
		<ul>
			<li><a href="category.php">Κατηγορίας</a> </li>
			<li><a href="product.php">Προϊόντος</a></li>
		</ul>					
	</div>
  </li>	
  <li><h4>Αναζήτηση </h4>  
	<div class="subclass-menu">
		<ul>
			<li><a href="suser.php">Χρήστη</a> </li>
			<li><a href="sorder.php">Παραγγελιών</a> </li>
		</ul>				
	</div>
  </li>
  </ul>
	<div class="logout"> 	
		<button onclick="logout()">Αποσύνδεση </button>  
	</div>
</div>
</div>
</div>

