<?php include("coneLog.php");?>
<?php

print_r($_POST);

//Lee el inicio de sesion y lo compara con la base de datos
if(!empty($_POST['id']) and !empty($_POST['password'])){
    $id = $_POST['id'];
    $passw = $_POST['password'];
    // Agarra la contraseña lo del usuario en donde encuentro el id correspondiente
    $sql = "UPDATE `users` SET  `password` = :password  WHERE `id` = :id; ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $passw = password_hash( $_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $passw);

    //Si se ejecuta correctamente redirecciona a la pagina de index
    if($stmt->execute()){
        header("location: index.php");
    }
    else{
        print("error");
    }
}



?>

<a href="perfil.php">redirigir</a>