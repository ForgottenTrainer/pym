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

if (isset($user['nombre'])){

	if(isset($_POST['message']) && isset($_POST['to_id'])){
		
	

	//Obtener la data de la otra persona y almacenarla dentro de la variable
	$message = $_POST['message'];
	$to_id = $_POST['to_id'];
	//Obtener el usuario logueado [nombre] de la session

	$from_id = $_SESSION['id'];
	$sql = "INSERT INTO chats (from_id, to_id, message) VALUES (?,?,?)";
	$stmt = $conn->prepare($sql);
	$res = $stmt->execute([$from_id, $to_id, $message]);

	if($res){
		//Verificar que sea la primera conversacion entre ellos

		$sql2 = "SELECT * FROM conversation WHERE (user_1=? AND user_2=?) OR (user_2=? AND user_1=?)";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->execute([$from_id, $to_id, $from_id, $to_id]);

		if($stmt2->rowCount() == 0){
			//Insertalos en la tabla de conversacion
			$sql3 = "INSERT INTO conversation (user_1, user_2) VALUES (?,?)";
			$stmt3 = $conn->prepare($sql3);
			$stmt3->execute([$from_id, $to_id]);

		}
		?>
		<p class="rtext align-self-end border rounded p-2 mb-1"> <?= $message ?> </p>
			<?php
		}

	}
}
else {
	header("Location: ../chat.php");
	exit;
}

?>