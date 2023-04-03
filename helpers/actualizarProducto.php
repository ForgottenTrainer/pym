<?php
require_once "../coneLog.php";

if($_POST){
	$sql = "UPDATE proyecto SET nombre = :nombre, precio = :precio, descripcion = :descripcion WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":nombre", $_POST['nombre']);
	$stmt->bindParam(":descripcion", $_POST['descripcion']);
	$stmt->bindParam(":precio", $_POST['precio']);
    $stmt->bindParam(":id", $_POST['id']); // Asegúrate de agregar esta línea

	if($stmt->execute()){
        header("Location: ../index.php");
    }
    else{
        print("error");
    }
}

?>