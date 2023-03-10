<?php include "coneLog.php" ?>

<?php
session_start();
if($_POST){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if(!empty($_POST['usuario']) and !empty($_POST['password'])){
        
        $records = $conn->prepare('SELECT id,usuario,password FROM users WHERE usuario=:usuario');
        $records->bindParam(':usuario',$_POST['usuario']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
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
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body >
    <div class="container">
    <br />
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4"></div>
            
            <div class="col-md-4 ">
                <div class="card text-start bg-light">
                  <div class="card-body">
                  <div class="p-3 mb-2 bg-dark text-white rounded"><h1>Login</h1></div>
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label  for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name="usuario" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label  for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
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