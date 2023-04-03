<?php 
include "../coneLog.php";

if(!empty($_FILES['archivo'])){
	$fecha= new DateTime();
	$id = $_POST['id'];
    $perfil = $fecha->getTimestamp()."".$_FILES['archivo']['name'];
    $perfil_temp = $_FILES['archivo']['tmp_name'];

    move_uploaded_file($perfil_temp, "../imagenes/".$perfil);

	$sql = "UPDATE servicio SET imagen = :imagen WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":imagen", $perfil);
    $stmt->bindParam(":id", $id); // Asegúrate de agregar esta línea

	if($stmt->execute()){
        header("Location: ../index.php");
    }
    else{
        print("error");
    }
}


?>