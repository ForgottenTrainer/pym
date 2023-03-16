<?php
include("../coneLog.php");

session_start();

$records = $conn->prepare('SELECT id, usuario, password, nombre, perfil, roll FROM users WHERE id = :id');
$records->bindParam(':id',$_SESSION['id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC); //Imprime los resultados
$user = null;
if(count($results) > 0){
  	$user = $results;
}
//Si hay resultado se pasa la variable a user
if(count($results) > 0){
  $user = $results;
}
?>

<?php

if(isset($user['nombre'])) {
//Verificamos que llave sea enviada

    if(isset($_POST['key'])){
        //Creacion del algoritmo de busqueda
        include "../coneLog.php";
        $key = "%{$_POST['key']}%";

        $sql = "SELECT * FROM users WHERE nombre LIKE ? OR usuario LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$key, $key]);
        ?>
        <?php if($stmt->rowCount() > 0){ $users = $stmt->fetchAll();
            foreach($users as $use){
                if($use['id']== $_SESSION['id']) continue;
                    ?>
        <li class="list-group-item">
            <a href="chats.php?users=<?= $use['nombre']; ?>" class="d-flex justify-content-between align-items-center p-2">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" width="50" height="50" src="perfiles/<?= $use['perfil']; ?>" />
                    <h3 class="fs-xs m-2"> <?= $use['nombre']; ?> </h3>
                </div>
                <div title="online">
                    <div class="online"></div>
                </div>
            </a>
        </li>
        <?php } ?>
        <?php }else { ?>
            <div class="alert alert-info text-center">
                <i class='bx bxs-user-x'></i>
                El usuario <?=htmlspecialchars($_POST['key']) ?>
                No se encontro
            </div>
        <?php }
        }
    }else {
    header("location: ../index.php");
}

?>