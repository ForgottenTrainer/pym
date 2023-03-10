<?php include ("coneLog.php")?>

<?php

session_start();
if (isset($_SESSION['id'])){

    $records = $conn->prepare('SELECT id, usuario, password, nombre, perfil, roll FROM users WHERE id = :id');
    $records->bindParam(':id',$_SESSION['id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($results) > 0){
      $user = $results;
    }


}
else {
  header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>PYM</title>
    <link rel="shortcut icon" href="./logos/logo5.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="bg-light ">
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
              <img src="./logos/logo5.png" width="85" height="56">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php?id=<?php echo $user['id']; ?>">Perfil</a>
                </li>
                <li class="nav-item">
                    <a href="chat.php?id=<?php echo $user['id']; ?>" class="btn btn-primary position-relative">
                      <i class='bx bx-conversation'></i> chat
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                        <span class="visually-hidden">unread messages</span>
                      </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mas opciones
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="portafolio.php">Subir producto</a></li>
                    <li><a class="dropdown-item" href="servicio.php">Subir servicio</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="cerrar.php">Salir</a></li>
                </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>


