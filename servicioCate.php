<?php include("cabacera.php"); ?>
<?php
include("conexion.php");

$ObjConexion = new conexion();
$proyecto = $ObjConexion->consultar("SELECT * FROM `servicio`");



?>
<style>
    a {
        text-decoration: none;
        color: #000;
    }
</style>

<div class="container">
    <h3 class="title">Servicios</h3>
    <br>     <!-- Envia de manera personalizada las categorias que eliga el usuario -->

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Filtros
      </button>
      <ul class="dropdown-menu">
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Escolares"; ?>">Escolares </a></div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Plomeria"; ?>"> Plomeria </a></div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Electricidad"; ?>"> Electricidad </a></div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Hogar"; ?>"> Hogar </a></div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Renta"; ?>"> Renta </a></div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Herreria"; ?>" > Herreria </a></div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Veterinaria"; ?>">Veterinaria </a> </div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Cerrajeria"; ?>" > Cerrajeria </a> </div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Tecnologia"; ?>" > Tecnologia </a> </div></li>
        <li><div class="col"> <a href="artiserv.php?categoria=<?php echo "Carpinteria"; ?>"> Carpinteria </a> </div></li>
      </ul>
    </div>
    <br/>
    <br>
    <div class="row ro-cols-1 row-cols-md-3 g-4">
        <?php foreach($proyecto as $proyectos) {?>
            <div class="card m-2 shadow p-3 mb-5" style="width: 18rem;" id="<?php echo $proyectos['categoria']; ?>">
                <img width="100" height="200" src="imagenes/<?php echo $proyectos['imagen']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $proyectos['nombre']; ?></h5>
                    <a href="<?php echo'servArt.php?id='.$proyectos['id']; ?>" class="btn btn-primary mb-2 w-100">Checar articulo</a>
                    <a href="#" class="btn btn-success w-100">Contactar vendedor</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include("pie.php"); ?>