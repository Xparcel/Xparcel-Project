<?php

	/*This file is responsible for loading in existing package
	details and verifying the existance of the package tracking 
	number*/ 

	session_start();

	include "connection.php";
	
    //find out the logined users Profile ID and load details
    function getProfileID(){

    	$DBH = connect();

    	$sql = $DBH->prepare("SELECT `ProfileID` FROM `user` WHERE `UserID` = :userID LIMIT 1;");  

    	$sql->bindValue(':userID',$_SESSION['$userID']);
		$sql->execute();

		$result = $sql->fetchAll(PDO::FETCH_ASSOC);

		//store the profileID into session
		foreach($result as $r ){

			$_SESSION['$profileID'] = $r['ProfileID'];
		}

		//if the users already has added tracking details load them
		if(!empty($result)){
			
			loadDetails();
		}
		//if there are no details to load
		else{
			
			var_dump("Nothing to display");
		}
    }

    //load the tracking details into the table
    function loadDetails(){

    	$DBH = connect();
		    
	    $query = $DBH->prepare("SELECT `DeliveryDate`,`Status`,`TrackingNum` FROM `packages` WHERE `UserProfileID` = :profileID ;");

	    $query->bindValue(':profileID',$_SESSION['$profileID']);

	    $query->execute();

	    $sth = $query->fetchAll(PDO::FETCH_NUM);
	    $x =0;
	    //if there are details to enter to the table
	    if (!empty($sth)){

		    foreach ($sth as $row){
		    			$x++;
                        echo "<tr class='tb'> 
                       		<!--<td><input type='radio' name='".$x."'></td>-->
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
	                            <td><strong>You are not watching any packages</strong></td>
	                            <td></td>
	                            </tr> 

	                            <tr class='tb'><td></td><td></td><td></td</tr>
	                            <tr class='tb'><td></td><td></td><td></td></tr> ";
	     }             



        /*
        
        else{
        	echo "Nothing to display";
        }*/
	}

?>