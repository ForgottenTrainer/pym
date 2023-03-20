<?php include("cabacera.php"); ?>
<?php  

if(isset($user['nombre'])){

	include "helpers/user.php";
	include "helpers/chas.php";
	include "helpers/opened.php";

	if(!isset($_GET['users'])){
		header("Location: chat.php");
		exit;
	}
	//Datos del usuario
	$chatWith = getUser($_GET['users'], $conn);
	
	if(empty($chatWith)){
		header("Location: chat.php");
		exit;
	}	

	$chats = getChats($_SESSION['id'], $chatWith['id'], $conn);

	

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

.fs-sm {
	font-size: 1.4rem;
}

small {
	color: #bbb;
	font-size: 0.7rem;
	text-align: right;
}

.rtext {
	width: 65%;
	background: #f8f9fa;
	color: #444;
}
.ltext {
	width: 65%;
	background: #8278d9;
	color: #fff;
}

.chat-box {
	overflow-x: hidden;
	overflow-y: auto;
	max-height: 50vh;
}

textarea {
	resize: none;
}

</style>
<div class="container">
	<div class="d-flex justify-content-center align-items-center vh-100">
		<div class="w-400 shadow p-4 rounded">
			<a href="chat.php?id=<?php echo $user['id']; ?>" class="fs-4 link-dark">&#8592;</a>
			
			<div class="d-flex align-items-center">
				<img src="perfiles/<?= $chatWith['perfil'] ?>" height="55" width="55" class="rounded-circle"/>
				<h3 class="display-4 fs-sm m-2">
					<?= $chatWith['nombre'] ?> <br>
					<div class="d-flex align-items-center">
						<div class="online"></div>
						<small class="d-block p-1">Online</small>
					</div>
				</h3>
			</div>
			<div class="shadow p-4 rounded d-flex flex-column mt-2 h-50 chat-box" id="chatBox">
				<?php if(!empty($chats)) { 
					foreach($chats as $chat) {
						if($chat['from_id'] == $user['id']){?>
							<p class="rtext align-self-end border rounded p-2 mb-1"> <?= $chat['message'] ?> 
							<small class="d-block"> <?= $chat['created_at'] ?> </small>
							</p>

						<?php }else {?>
							<p class="ltext align-self-start border rounded p-2 mb-1"><?= $chat['message'] ?> 
							<small class="d-block"> <?= $chat['created_at'] ?> </small></p>
						<?php } ?>
				 <?php }} else {?>	
					<div class="alert alert-info" role="alert">
					  Comienza la conversacion
					</div>

				 <?php } ?>	
			</div>
			<div class="input-group mb-3">
				<textarea cols="3" class="form-control" id="message"></textarea>
				<button class="btn btn-primary" id="sendBtn"><i class='bx bx-send'></i></button>
			</div>
		</div>
	</div>
</div>
<script>
	var scrollDown = function(){
		let chatBox = document.getElementById("chatBox");
		chatBox.scrollTop = chatBox.scrollHeight;

	}
	scrollDown();

    $(document).ready(function(){
    	$("#sendBtn").on('click', function(){
	    	message = $("#message").val();
	    	if(message == "") return;

	    	$.post("ajax/insert.php",
	    	{
	    		message: message,
	    		to_id: <?= $chatWith['id']; ?>
	    	},
    		function(data, status){
    			$("#message").val("");
    			$("#chatBox").append(data);
    			scrollDown();
	    	});
    	});

	   	//Auto refresh
		let fetchData = function(){
			$.post("ajax/getMessage.php",
					{
						id_2: <?= $chatWith['id'] ?>
					},
	    		function(data, status){
	    			$("#chatBox").append(data);
	    			
		    	});
		}

		fetchData();

		setInterval(fetchData, 500);
    });

</script>

<?php include("pie.php"); ?>