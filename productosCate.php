<?php include("cabacera.php"); ?>
<?php
include("conexion.php");

//Crea una consulta a la base de datos
$ObjConexion = new conexion();
$proyecto = $ObjConexion->consultar("SELECT * FROM `proyecto`");

?>

<div class="container">
    <h3 class="title">Productos</h3>
    <br />
    <div class="row">
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Vehiculos"; ?>" class="btn btn-primary"><i class='bx bx-car'></i> Vehiculos</a></div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Muebles"; ?>" class="btn btn-primary"><i class='bx bx-home'></i> Muebles </a></div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Ropa"; ?>" class="btn btn-primary"><i class='bx bxs-t-shirt'></i> <br/> Ropa </a></div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Electronica"; ?>" class="btn btn-primary"><i class='bx bx-laptop' ></i> Electronica </a></div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Cosmeticos"; ?>" class="btn btn-primary"><i class='bx bxs-magic-wand'></i> Cosmeticos </a></div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Electrodomesticos"; ?>"class="btn btn-primary"><i class='bx bx-tv' ></i> Electrodomesticos </a></div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Juguetes"; ?>"class="btn btn-primary"><i class='bx bxs-balloon' ></i> Juguetes </a> </div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Libros"; ?>"class="btn btn-primary"><i class='bx bx-library' ></i> <br/> Libros </a> </div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Mascotas"; ?>"class="btn btn-primary"><i class='bx bx-bone'></i> Mascotas </a> </div>
        <div class="col"> <a href="artiprodu.php?categoria=<?php echo "Naturistas"; ?>"class="btn btn-primary"><i class='bx bx-leaf'></i> Naturistas </a> </div>
    </div>
    <br/>
    <br>
    <div class="row ro-cols-1 row-cols-md-3 g-4">
        <!-- Mediante un foreach lee la consulta hacia la base de datos -->
        <?php foreach($proyecto as $proyectos) {?>
            <div class="card m-2 shadow p-3 mb-5" style="width: 18rem;" id="<?php echo $proyectos['categoria']; ?>">
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



<?php include("pie.php"); ?>