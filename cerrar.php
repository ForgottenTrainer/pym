<?php 

//Lee el inicio de sesion para posteriormente destruirlo 
session_start();
session_destroy();
header("location:login.php");

?>