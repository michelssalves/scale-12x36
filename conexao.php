<?php
global $pdo;
$db_name = 'escalas';
$db_host= 'localhost';
$db_user= 'root';
$db_pass= '';
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

