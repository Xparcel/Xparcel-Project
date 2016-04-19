<?php

	/*This file is responsible for loading in existing package
	details and verifying the existance of the package tracking 
	number*/ 
	if(session_id()){
	}
	else{
		session_start();
		include "connection.php";
	}

	//include "connection.php";
	
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
			
		}
    }

    //load the tracking details into the table
    function loadDetails(){

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
	                            <td> <div class='alert alert-info'>
    									<strong>Add a package! </strong> click the Add button to start managing your packages.
  									</div>
  								</td>
	                            <td></td>
	                            </tr> 

	                            <tr class='tb'><td></td><td></td><td></td</tr>
	                            <tr class='tb'><td></td><td></td><td></td></tr>";

	     }             



        /*
        
        else{
        	echo "Nothing to display";
        }*/
	}

?>