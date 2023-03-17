<?php include("coneLog.php"); ?>
<?php

//Lee si se envio informacion en caso de obtener informacion ejecuta el codigo
if($_POST){
    //print_r($_POST);
    //Lee los datos enviado por el usuario
    $usuario = $_POST['correo'];
    $password = $_POST['contra'];
    $nombre = $_POST['nombre'];
    $roll = 'usuario';

    //Compara que no haya datos vacios
    if($usuario != '' and $password != '' and $nombre != ''){
        //Inserta los valores a la base de datos
        $sql = "INSERT INTO users (usuario, password, nombre, roll) VALUES (:usuario, :password, :nombre, :roll)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        //Encripta la contraseña
        $passw = password_hash( $_POST['contra'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $passw);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':roll',$roll);

        //Si se cumple los requisitos se envia una alerta de success
        if($stmt->execute()){
            echo '
            <div class="m-auto mt-2 w-25 p-3 alert alert-success" role="alert">
                Se creo el usuario correctamente
            </div>
            ';
        }
        else {
            echo '
            <div class="m-auto mt-2 w-25 p-3 alert alert-danger" role="alert">
               No se pudo crear el usuario, hay un error en con contrasenia
            </div>
            ';
        }
    }
    else {
        echo '
        <div class="m-auto mt-2 w-25 p-3 alert alert-danger" role="alert">
            Favor de llenar todos los campos
        </div>
        ';
    }


}


?>
<!doctype html>
<html lang="en">

<head>
  <title>Registro - PYM</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="./logos/logo5.png" type="image/x-icon">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body >
    <div class="container m-auto w-50">
        <h1>Registro</h1>
        <form action="registro.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre y apellido</label>
                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="contra" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
            <a href="./login.php" class="btn btn-secondary">Loguearse</a>
        </form>
    </div>
</body>

</html>