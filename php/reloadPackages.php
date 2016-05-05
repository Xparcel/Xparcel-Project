<?php
	if(session_id()){
	}
	else{
		session_start();
	}
	include "connection.php";

		$DBH = connect();
		    
	    $query = $DBH->prepare("SELECT `DeliveryDate`,`Status`,`TrackingNum` FROM `packages` WHERE `UserProfileID` = :profileID ;");

	    $query->bindValue(':profileID',$_SESSION['$profileID']);

	    $query->execute();

	    $sth = $query->fetchAll(PDO::FETCH_NUM);
	    
	    //if there are details to enter to the table
	    if (!empty($sth)){

		    foreach ($sth as $row){
		    		
                        echo "<tr class='tb'> 
                       		
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                           

                            </tr>  ";  
	        }
	     }
	     //if there are not details to enter into the table
	     else{
	     	echo "<tr class ='tb'><td></td><td></td><td></td></tr>
	     		   <tr class='tb'> 

	                            <td></td>
	                            <td> <div id='alertNoPack' class='alert alert-info'>
    									<strong>Add a package! </strong> click the Add button to start managing your packages.
  									</div>
  								</td>
	                            <td></td>
	                            </tr> 

	                            ";

	     }             



?>