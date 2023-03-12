<?php include("cabacera.php"); ?>
<?php
include("conexion.php");

$ObjConexion = new conexion();
$proyecto = $ObjConexion->consultar("SELECT * FROM `servicio`");



?>

<div class="container">
    <h3 class="title">Servicios</h3>
    <br>
    <div class="row">
     <!-- Envia de manera personalizada las categorias que eliga el usuario -->
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Escolares"; ?>" class="btn btn-primary"><i class='bx bx-library' ></i> Escolares </a></div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Plomeria"; ?>" class="btn btn-primary"><i class='bx bx-shower'></i>    Plomeria </a></div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Electricidad"; ?>" class="btn btn-primary"><i class='bx bx-plug'></i>  Electricidad </a></div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Hogar"; ?>" class="btn btn-primary"><i class='bx bx-home-heart' ></i> <br/> Hogar </a></div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Renta"; ?>" class="btn btn-primary"><i class='bx bx-home-circle' ></i> <br/> Renta </a></div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Herreria"; ?>" class="btn btn-primary"><i class='bx bx-wrench'></i> <br/> Herreria </a></div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Veterinaria"; ?>" class="btn btn-primary"><i class='bx bxs-dog' ></i> Veterinaria </a> </div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Cerrajeria"; ?>" class="btn btn-primary"><i class='bx bx-lock-open' ></i> Cerrajeria </a> </div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Tecnologia"; ?>" class="btn btn-primary"><i class='bx bx-laptop' ></i> Tecnologia </a> </div>
        <div class="col"> <a href="artiserv.php?categoria=<?php echo "Carpinteria"; ?>" class="btn btn-primary"><i class='bx bxs-tree-alt'></i> Carpinteria </a> </div>
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