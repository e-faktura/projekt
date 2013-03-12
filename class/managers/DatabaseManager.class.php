<?php

class DatabaseManager {
	
	static public function getConnection() {
		
		$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASS, DB_DB);		

		if(mysqli_connect_errno()){
			return "wystapil blad";
		}
	}
}

?>