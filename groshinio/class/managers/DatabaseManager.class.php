<?php

class DatabaseManager {
	
	static public function getConnection() {
		
		$conn = @new mysqli(DB_SERVER, DB_USERNAME, DB_PASS, DB_DB);		

		if(mysqli_connect_errno()){
			$conn_errno = mysqli_connect_errno();
			$conn_error = mysqli_connect_error();
			//W przypadku wystąpenia problemów z połączeniem, zapisz informację w pliku LOG i zakończ działanie skrytpu
			LogFile::AdLog("Wystąpił błąd połączenia numer . [".$conn_errno."]  z bazą danych o treści: [ $conn_error ]", __LINE__, __FILE__);
			exit();
			
		} else {
			
			$conn->query("SET NAMES 'utf8'");
			return $conn;
		}
	}
	
	static public function selectSql($sql) {
		
		$conn = self::getConnection();
		$sql = $conn->real_escape_string($sql); // chroni przed wstrzyknięciem kodu backflashem
		$result = $conn->query($sql);
		
		if(!$result){
			
			LogFile::AddLog("Wystąpił błąd połączenia z bazą danych!", __LINE__, __FILE__);
			return FALSE;
		
		} else {
			
			$resultArray = Array();
			
				while(($row = $reault->fetch_array(MYSQLI_ASSOC)) !== NULL) {
					
					$resultArray[] = $row;
				}
		}
		if(count($resultArray) > 0 ) {
			return $resultArray;
		} esle {
			LogFile::AddLog("Zapytanie bazodanowe zwróciło pusty wynik", __LINE__, __FILE__);
			return FALSE;			
		}
		
		mysqli_close($conn);
	}
}

?>