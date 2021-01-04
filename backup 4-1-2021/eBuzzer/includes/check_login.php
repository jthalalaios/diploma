<!-- 
access = administrator
purpose = check the values of login -->
<?php
session_start();
require_once ('require.php');
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
$con=db_open();
if(empty($_POST['usname'] && $_POST['pass'])) 
           {     
            $msg = "Wrong Username or Password. Please retry" ;
			echo '<script language="javascript">';
			echo ' alert("Λάθος Εισαγωγή Στοιχείων")';
			echo '</script>' ;
			$con->close();
            header( "refresh:0; url=../login.php" );			
			}
function returnheader($location){
	$returnheader = header("location: $location");
	return $returnheader;
} 
	
if(!empty($_POST['usname'] && $_POST['pass'])) 
    {     
        $name = stripslashes($_POST["usname"]); 
		$name=filter_var($_POST["usname"]);
        $password1 = stripslashes($_POST["pass"]); 
		$password1=filter_var($_POST["pass"]);
        $en_pass=md5($password1);
        $sql="SELECT username,password,type,id,first_name FROM user WHERE username = :username AND  password = :password   ";
		$result = $con->prepare($sql); 
		$result->execute(array(':username' => $name, ':password' =>$en_pass));

		$rows=$result->fetchColumn(2);
		$result = $con->prepare($sql);
		$result->execute(array(':username' => $name, ':password' =>$en_pass));
	   	$rows1=$result->fetchColumn(1);
        $result = $con->prepare($sql);
		$result->execute(array(':username' => $name, ':password' =>$en_pass));
		$rows2=$result->fetchColumn(0);
		$result->execute(array(':username' => $name, ':password' =>$en_pass));
		$rows3=$result->fetchColumn(3);
		$result->execute(array(':username' => $name, ':password' =>$en_pass));
		$rows4=$result->fetchColumn(4);
            if($rows == 0 && $rows2== $name && $rows1== $en_pass)  {
				$_SESSION['root'] = true;
				setcookie("root", true);
			    setcookie("root", true, time()+3600);
				$_SESSION['who'] = $rows3;
				$_SESSION['name']=$rows4;
				returnheader("../admin/index.php");
			} 
			else {     
            $msg = "Wrong Username or Password. Please retry" ;
		    $_SESSION['nologin'] = 1;
			echo '<script language="javascript">';
			echo ' alert("Λάθος Εισαγωγή Στοιχείων:")';
			echo '</script>' ;
            header( "refresh:0; url=../login.php" );
			}
	}  
$con=null;		    
?>
