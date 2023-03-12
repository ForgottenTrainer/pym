<?php include("coneLog.php"); ?>

<?php

if(!empty($_FILES['archivo'])){
    //Mediante el envio del usuario se lee el id del usuario y la imagen a cambiar
    $fecha= new DateTime();
    $id = $_POST['id'];
    $perfil = $fecha->getTimestamp()."".$_FILES['archivo']['name'];
    $perfil_temp = $_FILES['archivo']['tmp_name'];

    move_uploaded_file($perfil_temp, "perfiles/".$perfil);

    //Actualiza la imagen
    $sql = "UPDATE `users` SET `perfil` = :perfil WHERE `id` = :id; ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':perfil', $perfil);

    //Si se hizo correctamente se enviara al index.
    if($stmt->execute()){
        header("location: index.php");
    }
    else{
        print("error");
    }
}

?>