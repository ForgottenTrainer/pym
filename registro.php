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

            header("Location:login.php");
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

<style type="text/css">
    body {
        background: linear-gradient(
            rgba(0,0,0,0.5),
            rgba(0,0,0,0.5)
        ),url('https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
    .bg-transparent {
        backdrop-filter: blur(10px);
    }

    .btn-roger {
        background: linear-gradient( hsl(228,66%,53%), hsl(228,66%,47%) );
        padding: 14px 28px;
        border-radius: .5rem;
        box-shadow: 0 4px 8px hsla(228, 66%, 45%, .25);
        cursor: pointer;
        transition: .3s;
        color: #fff;
    }
</style>

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

    <div class="container">
    <br />
    <br>
    <br />
    <br>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4"></div>
            
            <div class="col-md-4 ">
                <div class="card text-start bg-transparent">
                  <div class="card-body">
                  <div class="p-3 mb-2 text-white rounded"><h1 class="display-5 fw-bold">Registro</h1></div>
                    <form action="registro.php" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="text-white form-label">Nombre y apellido</label>
                            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="text-white form-label">Correo</label>
                            <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="text-white form-label">Contraseña</label>
                            <input name="contra" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-roger text-white">Registrarse</button>
                        <a href="./login.php" class="btn btn-secondary">Ingresar</a>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

</html>