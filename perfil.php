<?php include ("cabacera.php"); ?>
<?php include ("conexion.php"); ?>
<?php

if(isset($_GET['id'])) $id = $_GET['id'];

$sql = "SELECT * FROM users  WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$count = $stmt->rowCount();

if($count > 0){
    $datos = $stmt->fetch();
}

?>

<div class="container">
	<div class="row">
		<div class="col">
			<img class="rounded-circle mtru-4" width="400" height="400" src="perfiles/<?php echo $user['perfil'];?>">
		</div>
		<div class="col">
		    <div class="p-5 mb-4 bg-light rounded-3">
		        <div class="container-fluid py-5">
					<h1 class="display-5 fw-bold">Bienvenido/a <?php echo $user['nombre']; ?> </h1>
					<p class="col-md-8 fs-4">Correo <?php echo $user['usuario']; ?> </p>
					<p class="col-md-8">Su rol es <?php echo $user['roll']; ?> <a class="btn btn-outline-success" href="premium.php?id=<?php echo $user['id'];?>">Se un vendedor</a> </p>
					<a href="modificar.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-primary">Modificar informacion</a>
		    	</div>
			</div>
		</div>
	</div>
    <form action="udPerfil.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="hidden" name="id" value="<?php echo $datos['id']; ?>"/>
            <label for="exampleInputFile" class="form-label">Imagen</label>
            <input type="file" class="form-control w-50" name="archivo" />
            <button class="btn btn-primary mt-3" type="submit">Cambiar imagen de perfil</button>
        </div>
    </form>
</div>
