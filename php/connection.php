<?php
	function connect(){
		try {
				# MySQL with PDO_MYSQL                                           
				$DBH = new PDO("mysql:host=127.0.0.1;dbname=xparceldb", 'root', '');	
			} 
			catch(PDOException $e) {
				die("ERROR : " .$e->getMessage());
			}

		return $DBH;
	}
?>