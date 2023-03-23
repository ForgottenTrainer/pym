<?php include("cabacera.php"); ?>
<?php
include("conexion.php");

//Crea una consulta a la base de datos
$ObjConexion = new conexion();
$proyecto = $ObjConexion->consultar("SELECT * FROM `proyecto`");

?>

<style>
    a {
        text-decoration: none;
        color: #000;
    }
</style>

<div class="container">
    <h3 class="title">Productos</h3>
    <br />
    <!-- Envia de manera personalizada las categorias que eliga el usuario -->
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Filtros
      </button>
      <ul class="dropdown-menu">
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Vehiculos"; ?>" class=""> Vehiculos</a></div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Muebles"; ?>" class=""> Muebles </a></div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Ropa"; ?>" class=""> Ropa </a></div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Electronica"; ?>" class=""> Electronica </a></div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Cosmeticos"; ?>" class=""> Cosmeticos </a></div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Electrodomesticos"; ?>"class=""> Electrodomesticos </a></div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Juguetes"; ?>"class=""> Juguetes </a> </div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Libros"; ?>"class=""> Libros </a> </div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Mascotas"; ?>"class="">Mascotas </a> </div></li>
        <li><div class="col"> <a href="artiprodu.php?categoria=<?php echo "Naturistas"; ?>"class=""> Naturistas </a> </div></li>
      </ul>
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