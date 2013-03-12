<?php
ob_start();

// STAŁE DLA BAZY DANYCH
define('DB_DERVER', 'localhost');
define('DB_USERNAME', 'nazwa_uzytkownika');
define('DB_PASS', 'haslo');
define('DB_DB', 'nazwa_bazy_danych');

//STAŁE DLA PLIKÓW I KATALOGÓW;
define('ClassFolder', 'class/', true);
define('ManagerFolder', 'class/managers/', true);
define('LogFolder', 'log/', true);

//ŁADOWANIE AUTOMATYCZNE KLAS
function __autoload($className) {
	
	@include_once(ClassFolder.$className."class.php");
	@include_once(ManagerFolder.$className."class.php");
}
	
?>