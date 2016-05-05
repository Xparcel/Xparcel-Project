<?php
	function connectMock(){
		try {
				# MySQL with PDO_MYSQL                                           
				$DBH = new PDO("mysql:host=localhost;dbname=xparcelmockdb", 'root', 'root');	
			} 
			catch(PDOException $e) {
				die("ERROR : " .$e->getMessage());
			}

		return $DBH;
	}	
?>