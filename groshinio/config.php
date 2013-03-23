<?php
ob_start();

// STAŁE DLA BAZY DANYCH
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'nazwa_uzytkownika');
define('DB_PASS', 'haslo');
define('DB_DB', 'nazwa_bazy_danych');

//STAŁE DLA PLIKÓW I KATALOGÓW;
set_include_path(get_include_path(). PATH_SEPARATOR . "class");
set_include_path(get_include_path(). PATH_SEPARATOR . "class/managers");
set_include_path(get_include_path(). PATH_SEPARATOR . "libray");

// Magiczna funkcja automatycznie ładująca klasy wg. zapotrzebowania

function __autoload($className) {
    
    @include_once($className.".class.php");
    
}

?>
