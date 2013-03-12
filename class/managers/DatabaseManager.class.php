<?php

class DatabaseManager {
	
	static public function getConnection() {
		
		$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASS, DB_DB);		

		if(mysqli_connect_errno()){
			$conn_errno = mysqli_connect_errno();
			$conn_error = mysqli_connect_error();
			
			return "Wystąpił błąd połączenia z bazą danych. [".$conn_errno."] $conn_error";
		} else {
			
			$conn->query("SET NAMES 'utf8'");
			return "Połączono z bazą danych";
		}
	}
}

?>