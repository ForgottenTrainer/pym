<?php include("cabacera.php"); ?>

<style>

.w-400 {
    width: 400px;
}
</style>

<div class="container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-2 w-400 rounded shadow">
            <div class="d-flex mb-3 bg-light justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                     <img src="perfiles/<?php echo $user['perfil']; ?>" class="w-25 rounded-circle" />
                     
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("pie.php"); ?>