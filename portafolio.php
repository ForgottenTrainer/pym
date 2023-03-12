<?php include("cabacera.php"); ?>
<?php include("conexion.php"); ?>
<?php
//Lee el id de usuario
$user_id = $_SESSION['id'];
$user = $_SESSION['id'];

if(isset($_SESSION['id'])){
    //Le el id del usuario y lo inserta en la base de datos
    $records = $conn->prepare('SELECT id, nombre, perfil, roll FROM users WHERE id = :id');
    $records->bindParam(':id', $user_id);
    $records->execute();
}

if($_POST){
    //print_r($_POST);
    //Lee los datos enviados del formulario y si estan completos los inserta a la base de datos.
    $fecha= new DateTime();
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $fecha->getTimestamp()."". $_FILES['archivo']['name'];
    $imagen_temporal = $_FILES['archivo']['tmp_name'];
    $categoria = $_POST['categoria'];

    if($nombre != '' and $descripcion != '' and !empty($imagen)){
        move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

        $ObjConexion = new conexion();
        //Inserta los datos enviados por el usuario a la base de datos
        $sql="INSERT INTO `proyecto` (`id`, `nombre`, `imagen`, `descripcion`,`precio`,`categoria`, `user_id`) VALUES (NULL, '$nombre', '$imagen', '$descripcion','$precio','$categoria','$user_id');";
        $ObjConexion->ejecutar($sql);
    }
    else{
        echo '
        <div class="m-auto mt-2 w-25 p-3 alert alert-danger" role="alert">
            Favor de llenar todos los campos
        </div>
        <br />
        ';
    }

}

if($_GET){
    //Le la peticion de borrar articulo, una vez lo tenga procede a eliminar el articulo
    $id=$_GET['borrar'];

    $ObjConexion = new conexion();
    $imagen = $ObjConexion->consultar("SELECT imagen FROM `proyecto` WHERE id=".$id);
    unlink(("imagenes/".$imagen[0]['imagen']));

    $sql="DELETE FROM `proyecto` WHERE `proyecto`.`id` =".$id;
    $ObjConexion->ejecutar($sql);

}

//Leer el apartado de la base de datos ('productos')
$ObjConexion = new conexion();
$resultado=$ObjConexion->consultar("SELECT * FROM `proyecto`");


?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del articulo
                </div>
                <div class="card-body shadow p-3">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Titulo</label>
                            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Titulo para tu articulo</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Imagen</label>
                            <input type="file" class="form-control" name="archivo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Categorias</label>
                            <select class="form-select" name="categoria" aria-label="Default select example">
                                <option selected>Vehiculos</option>
                                <option value="Muebles">Muebles</option>
                                <option value="Ropa">Ropa</option>
                                <option value="Electronica">Electronica</option>
                                <option value="Cosmeticos">Cosmeticos</option>
                                <option value="Juguetes">Juguetes</option>
                                <option value="Libros">Libros</option>
                                <option value="Mascotas">Mascotas</option>
                                <option value="Naturistas">Naturistas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" >Precio</label>
                            <input type="number" class="form-control" name="precio" value="0"  id="precio">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                            <textarea type="text" class="form-control" name="descripcion"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    Recuerda llenar de manera correcta la informacion dentro del formulario.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="table-responsive">
                <h3 class="title">Productos</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mediante un ciclo foreach lee todos los productos de la base de datos que este asociado al id del vendedor -->

                        <?php foreach ($resultado as $proyecto){ ?>
                            <?php if ($proyecto['user_id'] == $user){?>
                                <tr class="">
                                    <td><?php echo $proyecto['id']; ?></td>
                                    <td><?php echo $proyecto['nombre']; ?></td>
                                    <td><img width="100" height="100" src="imagenes/<?php echo $proyecto['imagen']; ?>" ></td>
                                    <td> <?php echo $proyecto['descripcion']; ?></td>
                                    <td> <?php echo $proyecto['precio']; ?> </td>
                                    <td> <?php echo $proyecto ['categoria']; ?> </td>
                                    <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Borrar</a></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<br>

<?php include("pie.php");?>