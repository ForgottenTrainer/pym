<?php include("coneLog.php");  ?>
<?php include("cabacera.php");?>

<?php

if(isset($_GET['id'])){
    //Lee el id recibido del producto seleccionado
	$id = $_GET['id'];

    //Lee el id del producto y llama al contenido
	$records = $conn->prepare("SELECT * FROM proyecto WHERE id = :id");
	$records->bindParam(':id',$id);
	$records->execute();
	$row = $records->fetch(PDO::FETCH_ASSOC);

    $user_id = $row['user_id'];

    //Lee al usuario el cual subio el producto
    $users = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $users->bindParam(':id', $user_id);
    $users->execute();
    $user = $users->fetch(PDO::FETCH_ASSOC);

}
else {
    echo '
    <div class="m-auto mt-2 w-25 p-3 alert alert-danger" role="alert">
        No se encontro el producto
    </div>
    ';
}
?>


<br />
<div class="container text-center">
  <div class="row">
    <div class="col">
      <img class="rounded" width="550" height="400" src="imagenes/<?php echo $row['imagen'] ?>">
    </div>
    <div class="col">
    <!-- Muestra en pantalla la consulta de base de datos -->
      <h1 class="display-5 fw-bold"><?php echo $row['nombre']; ?> </h1>
      <p class="col-md-8 fs-4 m-auto"> <?php echo $row['descripcion'] ?> </p>
      <p class="col-md-8 "> Categoria: <?php echo $row['categoria']; ?> </p>
      <p class="col-md-8 fs-4 m-auto">$ <?php echo $row['precio'];?> </p>
      <a  href="chats.php?users=<?php echo $user['nombre']; ?>" class="btn btn-success">Contactar vendedor</a>
      <button class="btn btn-danger">Reportar publicacion</button>
      <input type="hidden" value="<?php echo $row['user_id']; ?>"/>
    </div>
  </div>
</div>

<div class="container text-center">
	<div class="row">
		<div class="col">
        <br>
			<span><img class="rounded-circle flex" height="100" width="100" src="perfiles/<?php echo $user['perfil'];?>"> <h3>Nombre del vendedor(a) <?php echo $user['nombre']; ?> </h3> </span>
		</div>
		<div class="col">
			<p class="col-md-8 fs-4"></p>
		</div>
		<div class="col"></div>
	</div>
</div>

<?php include("pie.php"); ?>