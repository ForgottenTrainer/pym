<?php
include "cabacera.php";

if(isset($user['nombre'])){
    include "helpers/user.php";
    include 'helpers/conversations.php';
    include 'helpers/last_chat.php';
    //Extraemos los datos del Usuario
    $users = getUser($user['nombre'], $conn);
    //Obteniendo las conversaciones de los usuarios
    $conversations = getConversation($user['id'], $conn);
}
?>
<style>

.w-400 {
    width: 400px;
}

.fs-xs {
    font-size: 1rem;
}

.w-10{
    width: 10%;
}

a{
    text-decoration: none;
}

.online {
    width: 10px;
    height: 10px;
    background: green;
    border-radius: 50%;
}

.chat-box {
    overflow-y: auto;
    max-height: 50vh;
}

</style>

<div class="container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-2 w-400 rounded shadow">
            <div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                     <img src="perfiles/<?php echo $users['perfil']; ?>" height="80" width="80" class="rounded-circle" />
                     <h3 class="fs-xs m-2"> <?php echo $users['nombre']; ?> </h3>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" placeholder="Buscar" class="form-control me-2" aria-label="Search" id="searchText" />
                <button class="btn btn-success" id="searchBtn"><i class='bx bx-search-alt'></i></button>
            </div>
            <ul class="list-group mvh-50 overflow-auto chat-box" id="chatList">
            <?php if(!empty($conversations)){ ?>
                <?php foreach($conversations as $conversation){ ?>
                <li class="list-group-item">
                    <a href="chats.php?users=<?= $conversation['nombre']; ?>" class="d-flex justify-content-between align-items-center p-2">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" width="50" height="50" src="perfiles/<?= $conversation['perfil']; ?>" />
                            <h3 class="fs-xs m-2"> <?= $conversation['nombre']; ?> </h3>
                            <small>
                                <?php 
                                    //echo lastChat($_SESSION['id'], $conversation['id'], $conn);
                                ?>
                            </small>
                        </div>
                        <!--<div title="online">
                            <div class="online"></div>
                        </div> -->
                    </a>
                </li>
                <?php } ?>
            <?php }
            else { ?>
                <div class="alert alert-info" role="alert">
                   Ups, por ahora no hay nada
                </div>
            <?php } ?>
            </ul>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        //Busqueda
        $("#searchText").on("input",function(){
            var searchText = $(this).val();
            if(searchText == "") return;
            $.post('ajax/search.php',
                {
                    key: searchText
                },
                function(data, status){
                    $("#chatList").html(data);
                });
        });

        //Busqueda por boton
        $("#searchBtn").on("click",function(){
            var searchText = $("#searchText").val();
            if(searchText == "") return;
            $.post('ajax/search.php',
                {
                    key: searchText
                },
                function(data, status){
                    $("#chatList").html(data);
                });
        })
    })
</script>

<?php include("pie.php"); ?>