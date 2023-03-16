<?php

function getUser($nombre, $conn){
    $sql = "SELECT * FROM users WHERE nombre=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre]);

    if($stmt->rowCount() === 1){
        $user = $stmt->fetch();
        return $user;
    }
    else {
        $user = [];
        return $user;
    }
}
?>