<?php include("coneLog.php"); ?>

<?php

if(!empty($_FILES['archivo'])){
    $fecha= new DateTime();
    $id = $_POST['id'];
    $perfil = $fecha->getTimestamp()."".$_FILES['archivo']['name'];
    $perfil_temp = $_FILES['archivo']['tmp_name'];

    move_uploaded_file($perfil_temp, "perfiles/".$perfil);

    $sql = "UPDATE `users` SET `perfil` = :perfil WHERE `id` = :id; ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':perfil', $perfil);

    if($stmt->execute()){
        header("location: index.php");
    }
    else{
        print("error");
    }
}

?>