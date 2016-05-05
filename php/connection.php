<?php
	function connect(){
		try {
				# MySQL with PDO_MYSQL                                           
				$DBH = new PDO("mysql:host=localhost;dbname=xparceldb", 'root', 'root');	
			} 
			catch(PDOException $e) {
				die("ERROR : " .$e->getMessage());
			}

		return $DBH;
	}
?>