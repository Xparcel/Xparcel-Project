<?php
<<<<<<< HEAD
	function connect(){
		try {
				# MySQL with PDO_MYSQL                                           
				$DBH = new PDO("mysql:host=localhost;dbname=xparceldb", 'root', 'root');	
=======
/* function is used to connect to the users database*/

	function connect(){
		try {
				# MySQL with PDO_MYSQL                                           
				$DBH = new PDO("mysql:host=127.0.0.1;dbname=xparceldb", 'root', '');	
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
			} 
			catch(PDOException $e) {
				die("ERROR : " .$e->getMessage());
			}
<<<<<<< HEAD

=======
		//returns the PDO connection to be used in other functions
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
		return $DBH;
	}
?>