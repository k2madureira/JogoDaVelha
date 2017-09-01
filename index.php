<?php
	session_start();
	if(!empty($_SESSION['palavra'])){
		header('Location: game.php');
	}
	
	// Alunos: Lenilson madureira, Daiana e Ticiano
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Forca game</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">

</head>
<body>
	<main class="container">
	<header>
		<img src="img/forca.png" id="img-titulo" alt="jogo da forca" class="animated tada">
	</header>
	<aside>
		<img src="img/Bungee_zombie.gif" class="zombii animated rubberBand" alt="zombii">
	</aside>
	<section class="box-formulario-index">
		<form class="formulario-index" method="post" onsubmit="envia();">
		<input type="password" name="palavra" id="palavra" placeholder="Digite uma palavra" >
		<button class ="botao" id="bto-iniciar">Iniciar</button>
		</form>
	</section>

	<div class="label-box-index">
		<p id="label">Palavra:</p>
	</div>
		<div class='erro-msg animated fadeIn invisivel' id="erro"></div>
		<div class="dicas">
				<p> Dicas:</p>
				</br>
				<p> - Não é permitido o uso de acentuações.</p>
				<p> - Não é permitido o uso do "Ç".</p>
				<p> - Ao acertar aparecerá as letras.</p>
				<p> - Você possui apenas 6 vidas.</p>
				<p> - divirta-se.</p>	

		</div>
		
	</main>

	<script src="js/script.js"></script>
	<script src="js/jquery.min.js"></script>

</body>
</html>