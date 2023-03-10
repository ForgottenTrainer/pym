<?php include("coneLog.php");?>
<?php

print_r($_POST);

if(!empty($_POST['id']) and !empty($_POST['password'])){
    $id = $_POST['id'];
    $passw = $_POST['password'];

    $sql = "UPDATE `users` SET  `password` = :password  WHERE `id` = :id; ";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $passw = password_hash( $_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $passw);

    if($stmt->execute()){
        header("location: index.php");
    }
    else{
        print("error");
    }
}



?>

<a href="perfil.php">redirigir</a>