<?php
session_start();
require_once('../require.php');
$con=db_open();
$id2=$_POST['id'];

if(!empty($_POST["cname2"])) 
    {      
			$cname1=$_POST['cname2'];
	try {
			$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['image'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}
			$sql2=" update categories set cat_name ='$cname1' ,cat_image ='$location'  WHERE  cat_id=:cat_id ";
			$query2=$con->prepare($sql2);
			$query2->execute(array(':cat_id' => $id2));
			
			$_SESSION['yeditc'] = 1;
			setcookie("yeditc", true);
		}
	    catch(PDOException $e)
        {	
        echo $sql . "<br>" . $e->getMessage();
		$_SESSION['yeditc'] = 0;
		setcookie("yeditc", false);
		 unset($_COOKIE["yeditc"]);
        }
	}

if(isset($_SESSION['yeditc'])){
		// echo ("Επιτυχής Επεξεργασία Κατηγορίας:");
      echo '<script language="javascript">';
      echo ' alert("Επιτυχής Επεξεργασία Κατηγορίας:")';
	  echo '</script>' ;	

	   setcookie("yeditc", false);
	   setcookie ("yeditc", "", time()-3600 , '/' );
	  	unset($_COOKIE["yeditc"]);
		
       }
	    else {
		   //echo ("Πρόβλημα στην Επεξεργασία της Κατηγορίας:");
		   echo '<script language="javascript">';
           echo 'alert("Πρόβλημα στην Επεξεργασία της Κατηγορίας:")';
	       echo '</script>' ;
		   setcookie("yeditc", false);
		   setcookie ("yeditc", "", time()-3600 , '/' );
		   unset($_COOKIE["yeditc"]);
		 
	   }

  
  
header( "refresh:0; url=../../admin/category.php" );
  $con=null;

?>