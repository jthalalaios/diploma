<?php
session_start();
require_once('../require.php');
$con=db_open();

	if(!empty($_POST["id2"])) 
    {     
		  $a1=$_POST["id2"];

	try {
			$sql=" DELETE  FROM categories WHERE  cat_id= :cat_id ";
			$query=$con->prepare($sql);
			$query->execute(array(':cat_id' => $a1));
			$_SESSION['ydelc'] = 1;
			setcookie("ydelc", true);
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
        }
	}
	
	   if(isset($_SESSION['ydelc'])){
      echo '<script language="javascript">';
      echo ' alert("Επιτυχής Διαγραφή Κατηγορίας:")';
	  echo '</script>' ;	
	  	unset($_COOKIE["ydelc"]);
		header( "refresh:0; url=../../menu2.php" );
       }
	   else {
		   echo '<script language="javascript">';
           echo 'alert("Πρόβλημα στην Διαγραφή της Κατηγορίας:")';
	       echo '</script>' ;
		   setcookie("ydelc", false);
		   unset($_COOKIE["ydelc"]);
	   }
  
header( "refresh:0; url=../../admin/category.php" );
  $con=null;

?>