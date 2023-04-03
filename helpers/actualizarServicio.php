<?php
require_once "../coneLog.php";

if($_POST){
	$sql = "UPDATE servicio SET nombre = :nombre, descripcion = :descripcion, categoria = :categoria WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":nombre", $_POST['nombre']);
	$stmt->bindParam(":descripcion", $_POST['descripcion']);
	$stmt->bindParam(":categoria", $_POST['categoria']);
    $stmt->bindParam(":id", $_POST['id']);

	if($stmt->execute()){
        header("Location: ../index.php");
    }
    else{
        print("error");
    }
}

?>