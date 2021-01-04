<?php
require_once ('../require.php');
$con=db_open();
$output = '';
if(isset($_POST["query"]))
{
	

 $searchq = htmlspecialchars($_POST["query"]);

 $sql = "SELECT u.lname,u.fname,u.aem,r.name,r.subcatid,r.stdate,r.endate FROM lonusers u  INNER JOIN  lonhistory r ON u.aem=r.userid   WHERE u.lname LIKE  concat(:lname,'%') OR u.aem LIKE  concat(:aem,'%')   ";
 
$get_name = $con->prepare($sql); 
$get_name->execute(array('lname'=>$searchq,'aem'=>$searchq));
$count=$get_name->fetchALL();


echo '<br>';
if($count!=$get_name->fetchALL() )
{

 $output .= '
        <table class="mytable">
    <tr>
     <th>Όνομα</th>
     <th>Επώνυμο</th>
     <th>ΑΕΜ</th>
     <th>Εξοπλισμός</th>
     <th>Ημ/Δανεισμού</th>
	 <th>Ημ/Επιστροφής</th>
    </tr>
	
 ';
 foreach($count as $row) 
 {
  $output .= '
   <tr>
    <td>'.$row["fname"].'  </td>
    <td>'.$row["lname"].'
    <td>'.$row["aem"].'</td>
    <td>'.$row["name"].'</td>
	 <td>'.$row["stdate"].'</td>
	  <td>'.$row["endate"].'</td>
   </tr>
  ';
  
 

 
}
echo $output;
 echo ' <form id="myform2" name="myform2" action="../includes/pdf.php"  method="post" >
	 <input type="hidden" name="valu" value="'.$row["aem"].'" id="valu" /> 
	 <input type="submit" name="but1" id="but1"  class="btn" value="PDF"   /> 
	</form>';
}
else
{
 echo "Σφάλμα αναζήτησης χρήστη";
}

$con=null;
}
?>



