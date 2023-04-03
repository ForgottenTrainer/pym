<?php include "coneLog.php" ?>

<?php
session_start();

//Lee los datos enviados
if($_POST){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //Compara que los datos no esten vacios
    if(!empty($_POST['usuario']) and !empty($_POST['password'])){
        
        //Hace una consulta a la base de datos
        $records = $conn->prepare('SELECT id,usuario,password FROM users WHERE usuario=:usuario');
        $records->bindParam(':usuario',$_POST['usuario']);
        $records->execute();
        //Compara resultados
        $results = $records->fetch(PDO::FETCH_ASSOC);

        
        //Lee la contraseña encriptada con la enviada por el usuario
        $message = '';
        // Verifica si $results es un array y compara la contraseña encriptada con la enviada por el usuario
        if(is_array($results) && count($results) > 0 && password_verify($_POST['password'], $results['password'])){
            // Si la validación es exitosa se reenvía al usuario al index.php
            $_SESSION['id'] = $results['id'];
            header('location:index.php');
        }
        else{
            echo '
            <div class="m-auto mt-2 w-25 p-3 alert alert-danger" role="alert">
                Datos erroneos favor de verificar sus credenciales
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
        color: #fff;
    }

    .bg-transparent {
        backdrop-filter: blur(10px);
    }

    .btn-roger {
        background: linear-gradient( hsl(228,66%,53%), hsl(228,66%,47%) );
        padding: 15px 29px;
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
  <title>Iniciar sesion - PYM</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="shortcut icon" href="./logos/logo5.png" type="image/x-icon">
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
                  <div class="p-3 mb-2  text-white rounded"><h1 class="display-5 fw-bold">Ingresar</h1></div>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label  for="exampleInputEmail1" class="text-white form-label">Correo</label>
                            <input name="usuario" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="text-white form-text">No compartas tu correo con nadie.</div>
                        </div>
                        <div class="mb-3">
                            <label  for="exampleInputPassword1" class="text-white form-label">Contraseña</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-roger text-white">Ingresar</button>
                        <a href="./registro.php" class="btn btn-secondary">Registrate</a>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

</html>