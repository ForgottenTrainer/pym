<?php
include "cabacera.php";

if(isset($user['nombre'])){
    include "helpers/user.php";
    include 'helpers/conversations.php';
    include 'helpers/last_chat.php';
    include 'helpers/getMessages.php';
    //Extraemos los datos del Usuario
    $users = getUser($user['nombre'], $conn);

    //Obteniendo las conversaciones de los usuarios
    $conversations = getConversation($users['id'], $conn);
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
    color: #875892;
}

.online {
    width: 10px;
    height: 10px;
    background: purple;
    border-radius: 50%;
}

.chat-box {
    overflow-y: auto;
    max-height: 50vh;
}

.m-20 {
    margin: 300px;
}

</style>

<?php 

//Datos del usuario

$currentUserId = $_SESSION['id'];

$sql = "SELECT from_id, to_id, opened FROM chats WHERE to_id = :currentUserId AND opened = 0";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
$stmt->execute();

?>

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
                <?php foreach ($conversations as $conversation) { ?>
                    <li class="list-group-item">
                        <a href="chats.php?users=<?= $conversation['nombre']; ?>" class="d-flex justify-content-between align-items-center p-2">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" width="50" height="50" src="perfiles/<?= $conversation['perfil']; ?>" />
                                <h3 class="fs-xs m-2"> <?= $conversation['nombre']; ?> </h3>
                                <small>
                                    <?php
                                    echo lastChat($_SESSION['id'], $conversation['id'], $conn);
                                    ?>
                                </small>
                            </div>
                            <?php
                            $unreadMessagesCount = getUnreadMessagesCount($currentUserId, $conversation['id'], $conn);
                            if ($unreadMessagesCount > 0) {
                            ?>
                                <span class="position-absolute m-20 translate-middle badge rounded-pill bg-danger notification-badge">Nuevo Mensaje</span>
                            <?php } ?>
                        </a>
                    </li>
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