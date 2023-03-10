<!-- Lee el los modulos de php los cuales los hace funcionar en la pagina index -->
<?php include ("conexion.php"); ?>
<?php include ("coneLog.php"); ?>
<?php include ("cabacera.php"); ?>
<?php

//hace una consulta a la base de datos para leer los productos
$ObjConexion = new conexion();
$proyecto = $ObjConexion->consultar("SELECT * FROM `proyecto`");

?>

<div class="container">

    <div class="row">
        <div class="col">
            <div class=" p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                                                            <!-- Lee el nombre del usuario mediante su sesion iniciada por su id -->
                  <h1 class="display-5 fw-bold">Bienvenido/a <?php echo $user['nombre']; ?> </h1>
                  <p class="col-md-8 fs-4">Date un tour y checa todos los productos y servicios.</p>
                  <a class=" btn btn-primary btn-lg shadow" href="perfil.php?id=<?php echo $user['id']; ?>">Mas informacion</a>
                </div>
            </div>
        </div>
    </div>

    <div class=" mb-4 bg-light rounded-3">
        <div class="row">
            <div class="col">
                <a href="productosCate.php" class="btn btn-outline-primary">Productos</a>
                <span> <a href="servicioCate.php" class="btn btn-outline-success">Servicios</a> </span>
            </div>
        </div>
    </div>
    <h3 class="title">Productos</h3>
    <br>
    <div class="row ro-cols-1 row-cols-md-3 g-4">
    <!-- Mediante un ciclo foreach lee todos los productos de la base de datos que este asociado al id del vendedor -->

        <?php foreach($proyecto as $proyectos) {?>
            <div class="card m-2 shadow-sm p-3 mb-5" style="width: 18rem;" id="<?php echo $proyectos['categoria']; ?>">
                <img width="100" height="200" src="imagenes/<?php echo $proyectos['imagen']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $proyectos['nombre']; ?></h5>
                    <p class="card-text"><?php echo "$".$proyectos['precio']; ?></p>
                    <a href="<?php echo'Articulos.php?id='.$proyectos['id']; ?>" class="btn btn-primary mb-2 w-100">Checar articulo</a>
                    <a href="#" class="btn btn-success w-100">Contactar vendedor</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<?php include("pie.php");?>