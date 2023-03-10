<?php include("coneLog.php");?>
<?php

print_r($_POST);

if(!empty($_POST['id']) and !empty($_POST['usuario']) and !empty($_POST['nombre'])){
    $fecha= new DateTime();
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE `users` SET `usuario` = :usuario, `nombre` = :nombre WHERE `id` = :id; ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':nombre', $nombre);


    if($stmt->execute()){
        header("location: index.php");
    }
    else{
        print("error");
    }
}



?>

<a href="perfil.php?id=<?php echo $datos['id']; ?>">redirigir</a>