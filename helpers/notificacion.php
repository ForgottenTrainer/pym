<?php
session_start();

// Conexión a la base de datos y configuración
include ("../coneLog.php");

// Consulta para buscar mensajes no abiertos para el usuario actual
$query = "SELECT * FROM chats WHERE to_id = :to_id AND opened = 0";
$stmt = $conn->prepare($query);
$stmt->bindParam(':to_id', $_SESSION['id']);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver el resultado en formato JSON
echo json_encode($result);
?>




