<?php 

//Lee la conexion a la base de datos
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'album';

try {
    //Si todo es correcto se crea la conexion
	$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
} catch (PDOException $e) {
	die('Conexion fallida'.$e->getMessage());
}

?>