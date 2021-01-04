<?php
session_start();
require_once('../require.php');
require_once('../functions.php');
$con=db_open();
	
	if(!empty($_POST["cname"] )) 
    {     
		  $a1=$_POST["cname"];
		
		  
		  	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['image'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}
	  $a2=$location;
	try {
			$sql=" INSERT INTO categories (cat_name,cat_image) VALUES (?,?)" ;
			$inar=array($a1,$a2);
			$q=sqlexecute($con,$sql,$inar,1);
			$dx=0; 
			$_SESSION['yaddc'] = 1;
			setcookie("yaddc", true);
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
			if (isset($_COOKIE['yaddc'])) {
			unset($_COOKIE['yaddc']);
			setcookie('yaddc', '', time() - 3600, '/'); 
			}
		}
        }
	

	   if(isset($_SESSION['yaddc'])){
      echo '<script language="javascript">';
      echo ' alert("Επιτυχής Δημιουργία Νέας Κατηγορίας:")';
	  echo '</script>' ;	
	  	unset($_COOKIE["yaddc"]);
		header( "refresh:0; url=../../menu2.php" );
       }
	   else {
		   echo '<script language="javascript">';
           echo 'alert("Πρόβλημα στην Δημιουργία νέας Κατηγορίας:")';
	       echo '</script>' ;
		   setcookie("yaddc", false);
		   unset($_COOKIE["yaddc"]);
	   }
  
 
header( "refresh:0; url=../../admin/category.php" );
  $con=null;

?>