<?php
require_once ("config.php");

echo "<pre>";

print_r(DatabaseManager::getConnection());

print_r(DatabaseManager::selectSql("SELECT * FROM users"));

echo "</pre>";
?>