<?php include "cabacera.php" ?>

<?php 

if(isset($_POST['busqueda'])){
    $busqueda = "%" . $_POST['busqueda'] . "%";
    $sql = "SELECT * from proyecto WHERE nombre LIKE :busqueda";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':busqueda', $busqueda);
    $stmt->execute();
}

?>

<?php 

if(isset($_POST['busqueda'])){
    $busqueda2 = "%" . $_POST['busqueda'] . "%";
    $sql2 = "SELECT * from servicio WHERE nombre LIKE :busqueda";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(':busqueda', $busqueda2);
    $stmt2->execute();
}

?>

<div class="container">
	<h3 class="title">Productos</h3>
    <br>
    <div class="row ro-cols-1 row-cols-md-3 g-4">
    <!-- Mediante un ciclo foreach lee todos los productos de la base de datos que este asociado al id del vendedor -->
    	<?php if($stmt->rowCount() > 0) { ?>
	        <?php foreach($stmt as $proyectos) {?>
	            <div class="card m-2 shadow-sm p-3 mb-5" style="width: 18rem;" id="<?php echo $proyectos['categoria']; ?>">
	                <img width="100" height="200" src="imagenes/<?php echo $proyectos['imagen']; ?>" class="card-img-top" alt="...">
	                <div class="card-body">
	                    <h5 class="card-title"><?php echo $proyectos['nombre']; ?></h5>
	                    <p class="card-text"><?php echo "$".$proyectos['precio']; ?></p>
	                    <a href="<?php echo'Articulos.php?id='.$proyectos['id']; ?>" class="btn btn-primary mb-2 w-100">Checar articulo</a>
	                    <a href="#" class="btn btn-danger w-100">Reportar publicacion</a>
	                </div>
	            </div>
	        <?php } ?>
        <?php } else { ?>
        	<h1 class="fw-bold">No se encontraron productos</h1>
        <?php } ?>
    </div>
    <h3>Servicios</h3>
    <br>
    <div class="row ro-cols-1 row-cols-md-3 g-4">
    <!-- Mediante un ciclo foreach lee todos los productos de la base de datos que este asociado al id del vendedor -->
		<?php if($stmt2->rowCount() > 0) { ?>
	        <?php foreach($stmt2 as $proyectos) {?>
	            <div class="card m-2 shadow-sm p-3 mb-5" style="width: 18rem;" id="<?php echo $proyectos['categoria']; ?>">
	                <img width="100" height="200" src="imagenes/<?php echo $proyectos['imagen']; ?>" class="card-img-top" alt="...">
	                <div class="card-body">
	                    <h5 class="card-title"><?php echo $proyectos['nombre']; ?></h5>
	                    <a href="<?php echo'servicio.php?id='.$proyectos['id']; ?>" class="btn btn-primary mb-2 w-100">Checar articulo</a>
	                    <a href="#" class="btn btn-danger w-100">Reportar publicacion</a>
	                </div>
	            </div>
	        <?php } ?>
	    <?php } else { ?>
			<h1 class="fw-bold">No se encontraron servicios</h1>
	    <?php } ?>
    </div>
</div>