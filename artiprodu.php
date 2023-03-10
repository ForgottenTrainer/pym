<?php include("cabacera.php"); ?>
<?php include("conexion.php"); ?>

<?php

if($_GET['categoria']){
    $categoria = $_GET['categoria'];
    $sql = $conn->prepare("SELECT * FROM `proyecto` WHERE categoria = :categoria");
    $sql->bindParam(':categoria',$categoria);
    $sql->execute();
    $filtro = $sql->fetchAll(PDO::FETCH_ASSOC);

}
else {
    echo '
    <div class="m-auto mt-2 w-25 p-3 alert alert-danger" role="alert">
        No se encontro el producto
    </div>
    ';
}
?>

<div class="container">
    <h1 class="title"> <?php echo $categoria; ?> </h1>
    <br/>
    <br>
    <div class="row ro-cols-1 row-cols-md-3 g-4">
        <?php foreach($filtro as $proyectos) { ?>
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