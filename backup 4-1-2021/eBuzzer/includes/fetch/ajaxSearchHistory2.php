<?php
require_once ('../require.php');
$con=db_open();
$output = '';
if(isset($_POST["query"]))
{
	

 $searchq = htmlspecialchars($_POST["query"]);

 //$sql = "SELECT u.lname,u.fname,r.stdate FROM user u  INNER JOIN  history r ON u.id=r.userid   WHERE u.lname LIKE  concat(:lname,'%') OR u.aem LIKE  concat(:aem,'%')   ";
 $sql = "SELECT first_name,last_name,username,type,email,address,telephone  FROM user   WHERE (username LIKE concat(:username,'%') OR first_name LIKE concat(:first_name,'%') OR last_name LIKE concat(:last_name,'%'))  ";
 
$get_name = $con->prepare($sql); 
//$get_name->execute(array('lname'=>$searchq,'aem'=>$searchq));
$get_name->execute(array('username'=>filter_var($searchq),'first_name'=>filter_var($searchq),'last_name'=>filter_var($searchq)));
$count=$get_name->fetchALL();

echo '<br>';
if($count!=$get_name->fetchALL() )
{

 $output .= '
        <table class="mytable">
    <tr>
     <th>Όνομα</th>
     <th>Επώνυμο</th>
     <th>Username</th>
	   <th>Διεύθυνση</th>
	    <th>Ηλ/Ταχυδρομίο</th>
		 <th>Τηλέφωνο</th>
		  
    </tr>
	
 ';
 foreach($count as $row) 
 {
  $output .= '
   <tr>
    <td>'.$row["first_name"].'  </td>
    <td>'.$row["last_name"].'
	 <td>'.$row["username"].'</td>
	 <td>'.$row["address"].'</td>
	 <td>'.$row["email"].'</td>
	 <td>'.$row["telephone"].'</td>
   </tr>
  ';
  
 

 
}
echo $output;
 
}
else
{
 echo "Σφάλμα αναζήτησης χρήστη";
}

$con=null;
}
?>



