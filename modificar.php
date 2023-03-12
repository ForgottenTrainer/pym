<?php include("cabacera.php") ?>
<?php include("conexion.php") ?>

<?php

//Lee el inicio de sesion y lo compara con la base de datos
if(isset($_GET['id'])) $id = $_GET['id'];
// Agarra todo lo del usuario en donde encuentro el id correspondiente
$sql = "SELECT * FROM users  WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$count = $stmt->rowCount();

//Si count es mayor a 0 se crea la variable datos e imprime los resultados
if($count > 0){
    $datos = $stmt->fetch();
}


?>


<div class="container">
    <br />
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-md-4"></div>

        <div class="col-md-4 ">
            <div class="card text-start bg-light">
                <div class="card-body">
                <div class="p-3 mb-2 bg-dark text-white rounded"><h1>Actualizar datos</h1></div>

                <form action="upd.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name='id' value="<?php echo $datos['id']; ?>">
                    <div class="mb-3">
                        <label  for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['nombre']; ?>" >
                    </div>
                    <div class="mb-3">
                        <label  for="exampleInputEmail1" class="form-label">Correo</label>
                        <input name="usuario" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=" <?php echo $datos['usuario']; ?>" >
                        <div id="emailHelp" class="form-text" name="nombre">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                          Cambiar contraseña
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar datos</button>
                </form>
                </div>
                        <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva contraseña</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form method="post" action="pass.php">
                          <input type="hidden" value="<?php echo $datos['id']; ?>"/>
                          <div class="modal-body">
                            <input type="text" class="form-control" name="password" />
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Cambiar</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php include("pie.php") ?>