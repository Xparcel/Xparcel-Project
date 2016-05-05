<?php
<<<<<<< HEAD
	include "connection.php";

=======
	if(session_id()){
	}
	else{
		session_start();
		include "connection.php";
	}
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
	//if a post has occured
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		//if the post method is testing the tracking number
		if(isset($_POST['method']) && ($_POST['method'])=="testTrackNum"){
<<<<<<< HEAD

			$Exsists = validateTrackNum();
			
			//send info for client to validate
=======
			$trackingNum = $_POST['trackingNum'];

			//returns true or false
			$Exsists = validateTrackNum();			
			//send info for client to validate and /or add to user DB
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
			if($Exsists){
				setPackageDetails();
			}
			else{
				echo False;
			}
<<<<<<< HEAD

			
=======
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
		}
	}

	//get the details related to the tracking number
	function getPackageDetails(){

		include_once "connectionMock.php";
		//connect to mock database
		$DBH = connectMock();

		$trackingNum = $_POST['trackingNum'];

		$sql = $DBH->prepare("SELECT * FROM `packagerecords` WHERE `trackingNum` = :trackingnum LIMIT 1;");

		$sql->bindValue(':trackingnum',$trackingNum);
		$sql->execute();

		return $sql;
	}

	//checks if the trtacking number exsistes in the mock database
	function validateTrackNum(){

<<<<<<< HEAD
=======
		//returns details related to the tracking number
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
		$sql = getPackageDetails();

		$r = $sql->fetchAll(PDO::FETCH_NUM);

		//if the tracking number exsists return...
		if(!empty($r)){
			return True;
		}
		else{
			return False;
		}
	}
<<<<<<< HEAD

=======
	//link the package details to the users account
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
	function setPackageDetails(){

		$sql = getPackageDetails();

<<<<<<< HEAD
=======
		//get the details of the package from MockDB
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
		$detail = $sql->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($detail as $result){
			$add = $result['address'];
<<<<<<< HEAD
			$date = $result['deliverydate'];
		}

		echo "address : ". $add . " date : " .$date;
		
=======
			$date = $result['date'];
		}


		$packageID = null;
		//MUST CHANGE, NEED TO ADD STATUS TO MOCK DB !!!
		$status = "no";
		$trackingNum = $_POST['trackingNum'];

		//adds the verified details to the users account
		$DBH = connect();

		$sql = ("INSERT INTO `packages` (`PackageID`,`UserProfileID`,`deliverydate`,`Status`,`TrackingNum`) VALUES (?,?,?,?,?);");

		$sth = $DBH->prepare($sql);

		$sth->bindParam(1,$packageID,PDO::PARAM_INT);
		$sth->bindParam(2,$_SESSION['$profileID'],PDO::PARAM_INT);
		$sth->bindParam(3,$date,PDO::PARAM_INT);
		$sth->bindParam(4,$status,PDO::PARAM_INT);
		$sth->bindParam(5,$trackingNum,PDO::PARAM_INT);

		$sth->execute();

		//returns to js/Add.js to add to table of contents
		echo $date.",".$status."," .$trackingNum;
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
	}
?>