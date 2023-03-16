<?php

function getConversation($id, $conn){
    //Obtener todas las conversacion con el usuario logueado

    $sql = "SELECT * FROM `conversation` WHERE user_1=? OR user_2=? ORDER BY conversation_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id, $id]);

    if($stmt->rowCount() > 0){
        $conversations = $stmt->fetchAll();
        //Creando un arreglo vacio hacia el almacenamiento de la conversacion del usuario

        $user_data = [];
        //El bucle que lanzara las conversaciones

        foreach($conversations as $conversation){
            #Si la conversacion de user_1 es igual al id del usuario
            if($conversation['user_1'] == $id){
                $sql2 = "SELECT nombre, usuario, perfil FROM users  WHERE id=?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute([$conversation['user_2']]);
            }
            else {
                $sql2 = "SELECT nombre, usuario, perfil FROM users  WHERE id=?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute([$conversation['user_1']]);
            }
            $allConversations = $stmt2->fetchAll();
            //Poniendo la informacion dentro del arreglo
            array_push($user_data, $allConversations[0]);
        }
        return $user_data;
    }
    else {
        $conversations = [];
        return $conversations;
    }
}

?>