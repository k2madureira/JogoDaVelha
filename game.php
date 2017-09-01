<?php
include_once 'php/montaGame.php';
	session_start();
	if(empty($_SESSION['palavra'])){
		header('Location: index.php');
	}
	
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

	<div id="tamanho" class="box-invisivel"><?php echo $_SESSION['tamanho']; ?></div>
	<div id="palavra" class="box-invisivel"><?php echo $_SESSION['palavra']; ?></div>
	<div id="acertos" class="box-invisivel"><?php echo $_SESSION['acertos']; ?></div>
	
	<main class="container">
	<div class="game">

	<header>
		<img src="img/forca.png" id="img-titulo" alt="jogo da forca">

	</header>
	<aside>
		<img src="img/arvore.png" class="arvore animated bounce" alt="arvore seca">

	</aside>
	<section class="box-formulario">
		<form method="post" class="formulario" onsubmit="verificaLetra();">
		<input type="text" name="letra" id="letra" placeholder="" maxlength= "1" required autofocus >
		<button class ="botao" id="bto-chutar">Chutar</button>
		</form>
	</section>
	<div class="label-box">
		<p id="label">Letra:</p>
	</div>
	<button class ="botao-restart" id="bto-restart" onclick="restartGame();">Novo</button>

	<section class="game-box">
		
		<div id="letras"></div>
		<div id="espacos"> <?php montaEspaco(); ?></div>

		<section class="box-footer">
			<div class='tentaiva-letra' id='tentaletra'></div>
			<div class="box-titulos">
				<p id="campo-palavra"> Palavra: </p>
				<p id="campo-tentativas"> Letras</br> erradas:</p>
			</div>
	</section>
	</section>
	
	<div class='contErros box-invisivel' id='erros'></div>
	   <div class= "zombiFull">
			<img src="img/zombi2/cabeca.png" class="part-zombi invisivel" id="cabeca">
			<img src="img/zombi2/corpo.png" class="part-zombi invisivel" id="corpo">
			<img src="img/zombi2/braco-direito.png" class="part-zombi invisivel" id="bdireito">
			<img src="img/zombi2/braco-esquerdo.png" class="part-zombi invisivel" id="besquerdo">
			<img src="img/zombi2/perna-direita.png" class="part-zombi invisivel" id="pdireita">
			<img src="img/zombi2/perna-esquerda.png" class="part-zombi invisivel" id="pesquerda">
		</div>
	</div>
	<div class='push'></div>
	<div class="perdeu box-invisivel" id="perdeu">
		<p id="perdeuP"></p> 
		<button class ="botao-restart" id="bto-restart" onclick="restartGame();">Novo</button>
	</div>
	<div class="ganhou box-invisivel" id="ganhou"> Parabéns por finalizar o jogo da forca !!
		<button class ="botao-restart" id="bto-restart" onclick="restartGame();">Novo</button>
	</div>
		
		
	</main>

	<script src="js/verifica.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>