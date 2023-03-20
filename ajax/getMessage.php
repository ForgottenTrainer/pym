<?php 

include("../coneLog.php");

session_start();

$records = $conn->prepare('SELECT id, usuario, password, nombre, perfil, roll FROM users WHERE id = :id');
$records->bindParam(':id',$_SESSION['id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC); //Imprime los resultados
$user = null;
if(count($results) > 0){
  	$user = $results;
}
//Si hay resultado se pasa la variable a user
if(count($results) > 0){
  $user = $results;
}

?>

<?php 

if(isset($user['nombre'])){
	
	if(isset($_POST['id_2'])){
		$id_1 = $_SESSION['id'];
		$id_2 = $_POST['id_2'];
		$opend = 0;

		$sql = "SELECT * FROM chats WHERE to_id=? AND from_id=? ORDER BY chat_id ASC";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$id_1, $id_2]);

		if($stmt->rowCount() > 0){
			$chats = $stmt->fetchAll();

			#Creando el loop de los chats
			foreach($chats as $chat){
				if($chat['opened'] == 0){
					$opened = 1;
					$chat_id = $chat['chat_id'];
					$sql2 = "UPDATE chats SET opened = ? WHERE chat_id = ?";
					$stmt2 = $conn->prepare($sql2);
					$stmt2->execute([$opened, $chat_id]);
					?>
					<p class="ltext align-self-start border rounded p-2 mb-1"><?= $chat['message'] ?> 
							<small class="d-block"> <?= $chat['created_at'] ?> </small></p>
					<?php						
				}			
			}
		}

	}

}
else {
	header("Location: ../chat.php");
}
?>