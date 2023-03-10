<?php include("cabacera.php"); ?>
<?php include("conexion.php"); ?>

<div class="container text-center ">
    <h1 class="pd-5 bold">Working progress, gracias por su paciencia - Se  un vendedor PYM</h1>
    <br />
    <div class="row">
		<div class="col">
			<img class="rounded-circle" width="400" height="400" src="perfiles/<?php echo $user['perfil'];?>">
		</div>
		<div class="col">
		    <div class="p-5 mb-4 bg-light rounded-3">
		        <div class="container-fluid py-5">
					<h1 class="display-5 fw-bold">Hola usuario <?php echo $user['nombre']; ?> </h1>
					<p class="col fs-4">Correo <?php echo $user['usuario']; ?></p>
                    <p class="col fs-4">Usted no cuenta con ningun plan</p>
                    <a class="btn btn-primary" href="perfil.php?id=<?php echo $user['id']; ?>">Regresar al perfil</a>
		    	</div>
			</div>
		</div>
    </div>
    <div class="p-5 mb-4 bg-light rounded-3">
        <h3>Obten los beneficios de ser un vendedor en PYM</h3>
        <p class="color-gray">Haz crecer tu negocio con nosotros, publica tus productos y/o promocion tus servicios</p>
        <a class="btn btn-success" href="#planes">Ver los planes</a>
    </div>
    <hr />
    <br />
    <div class="table-responsive">
        <table class="table" id="planes">
            <thead>
                <tr>
                    <th scope="col">Plan 1</th>
                    <th scope="col">Plan 2</th>
                    <th scope="col">Plan 3</th>
                    <th scope="col">Plan 4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Plan de 1 mes</td>
                    <td>Plan de 3 meses</td>
                    <td>Plan de 6 meses</td>
                    <td>Plan de 1 año</td>
                </tr>
                <tr>
                    <td>Atencio al cliente 24/7</td>
                    <td>Atencio al cliente 24/7</td>
                    <td>Atencio al cliente 24/7</td>
                    <td>Atencio al cliente 24/7</td>
                </tr>
                <tr>
                    <td>Permite crear 10 publicaciones</td>
                    <td>Permite crear 20 publicaciones</td>
                    <td>Permite crear 50 publicaciones</td>
                    <td>Permite crear publicaciones ilimitadas</td>
                </tr>
                <tr>
                    <td>Precio de $$$$</td>
                    <td>Precio de $$$$</td>
                    <td>Precio de $$$$</td>
                    <td>Precio de $$$$</td>
                </tr>
                <tr>
                    <td><button class="btn btn-outline-secondary">Adquirir</button></td>
                    <td><button class="btn btn-outline-danger">Adquirir</button></td>
                    <td><button class="btn btn-outline-primary">Adquirir</button></td>
                    <td><button class="btn btn-outline-success">Adquirir</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include("pie.php"); ?>