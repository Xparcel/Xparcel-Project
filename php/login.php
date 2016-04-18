<?php
	
	session_start();

	include "connection.php";

	$email = null;
	$pwd = null;

	//if a post has occured
	if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){

		//if email and password posts are set
		if(isset($_POST['emailAdd']) && isset($_POST['pwd']) && ($_POST['emailAdd'] != '') && ($_POST['pwd'] != '')) {

			$DBH = connect();

			getCredentials($DBH,$_POST['emailAdd'],$_POST['pwd']);

		}else{
			header("location:https://xparcel/index.php");
		}
	}

	//login check with
	function getCredentials($DBH,$email,$pwd){
		
		$query = $DBH->prepare("SELECT * FROM `directlogin` WHERE Email=:email AND Password=:pwd LIMIT 1;");

		$query->bindValue(':email', $email);
		$query->bindValue(':pwd', $pwd);

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $r ){

			$_SESSION['$userID'] = $r['UserID'];

			//echo $_SESSION['$userID'];
			//echo "$r result :".$r['UserID'];
		}
		
		//if result is returned continue to page
		if(!empty($result)){

			//get the users name
			$query = $DBH->prepare("SELECT `Username` FROM `user` WHERE `UserID` = :usersID LIMIT 1;");

			$query->bindValue(':usersID', $_SESSION['$userID']);
			
			$query->execute();

			$result = $query->fetchAll(PDO::FETCH_ASSOC);

			foreach($result as $found){
				$FullName = $found['Username'];
			}

			//splitt he names
			$Names = explode(" ", $FullName);

			$_SESSION['firstName'] = $Names[0];

			header("location: http://localhost/xparcel/manageParcel.php");
		}
		//if details incorrect show error message on index page
		else{
			header("location:http://localhost/xparcel/index.php?error=1");
		}
	}
?>