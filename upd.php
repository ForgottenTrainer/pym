<?php include("coneLog.php");?>
<?php

print_r($_POST);

if(!empty($_POST['id']) and !empty($_POST['usuario']) and !empty($_POST['nombre'])){
    //Mediante el envio del usuario se lee el id del usuario y la imagen a cambiar

    $fecha= new DateTime();
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];

    //Actualiza los datos
    $sql = "UPDATE `users` SET `usuario` = :usuario, `nombre` = :nombre WHERE `id` = :id; ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':nombre', $nombre);

    //Si se hizo correctamente se enviara al index.
    if($stmt->execute()){
        header("location: index.php");
    }
    else{
        print("error");
    }
}



?>

<a href="perfil.php?id=<?php echo $datos['id']; ?>">redirigir</a>