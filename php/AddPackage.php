<?php
	include "connection.php";

	//if a post has occured
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
		//if the post method is testing the tracking number
		if(isset($_POST['method']) && ($_POST['method'])=="testTrackNum"){

			$Exsists = validateTrackNum();
			
			//send info for client to validate
			if($Exsists){
				setPackageDetails();
			}
			else{
				echo False;
			}

			
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

	function setPackageDetails(){

		$sql = getPackageDetails();

		$detail = $sql->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($detail as $result){
			$add = $result['address'];
			$date = $result['deliverydate'];
		}

		echo "address : ". $add . " date : " .$date;
		
	}
?>