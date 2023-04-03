<?php 
include "cabacera.php";

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$records = $conn->prepare("SELECT * FROM servicio WHERE id = :id");
	$records->bindParam(':id',$id);
	$records->execute();
	$row = $records->fetch(PDO::FETCH_ASSOC);
}

?>

<div class="row justify-content-center align-items-center g-2">
    
    <div class="col-md-4 ">
        <div class="card text-start bg-transparent">
          <div class="card-body">
          <div class="p-3 mb-2 text-white rounded"><h1 class="display-5 fw-bold text-black">Modificar</h1></div>
            <form action="helpers/actualizarServicio.php" method="post">
                <div class="mb-3">
                    <input value="<?php echo $row['id']; ?>" name="id" type="hidden" />
                    <label for="exampleInputEmail1" class="text-white form-label">Titulo</label>
                    <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
        					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        					  Modificar imagen
        					</button>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Re seleccione la categoria</label>
                    <select class="form-select" name="categoria" aria-label="Default select example">
                        <option selected>Escolares</option>
                        <option value="Plomeria">Plomeria</option>
                        <option value="Limpieza">Electricidad</option>
                        <option value="Hogar">Hogar</option>
                        <option value="Renta">Renta</option>
                        <option value="Herreria">Herreria</option>
                        <option value="Veterinaria">Veterinaria</option>
                        <option value="Cerrajeria">Cerrajeria</option>
                        <option value="Tecnologia">Tecnologia</option>
                        <option value="Carpinteria">Carpinteria</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                    <input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>" class="form-control" name="descripcion">
                </div>
                <button class="btn btn-outline-primary w-100">Actualizar</button>
            </form>
          </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar imagen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="helpers/updImgServicio.php" method="post" enctype="multipart/form-data">
	        <div class="mb-3">
              <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
	            <label for="exampleInputText" class="form-label">Imagen</label>
	            <input type="file" class="form-control mb-4" name="archivo"> 
	        </div> 
          <button type="submit" class="btn btn-outline-primary w-100">Cambiar</button>       	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include("pie.php"); ?>