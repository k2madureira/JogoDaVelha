<?php
	session_start();
	

	$requisicao = $_POST['requisicao'];

	switch ($requisicao) {
		case 'palavra':
			
			$txt = '-';
			$palavra = $_POST['palavra'];
			$palavra=strtoupper($palavra);
			$tamanho = strlen($palavra);
			$acertos = str_repeat($txt, $tamanho);
			

			$_SESSION['palavra'] = $palavra;
			$_SESSION['tamanho'] = $tamanho;
			$_SESSION['acertos'] = $acertos;
			echo 'vamos iniciar o game!';


		break;
		case 'letra':

			$palavra = $_SESSION['palavra'];
			$letra = $_POST['letra'];
			$letra = strtoupper($letra);
			$busca = strrchr($palavra, $letra);
		
				if($busca){

					montaPalavra($letra);

				}else{

					echo 'errou';
				}
		
		break;

		case 'restart':
			session_destroy();
		break;

		default:
			# code...
			break;
	}


	function montaPalavra($letra){

		$tam 			= $_SESSION['tamanho'];
		$palavra 		= $_SESSION['palavra'];
		$String_acertos = $_SESSION['acertos'];

		$contAcerto = 0;
		$contErro   = 0;
		//&nbsp	

		for($i=0;$i<$tam;$i++){

			if($letra==$palavra[$i]){
		
				$String_acertos[$i] = $letra.'&nbsp	';
				$_SESSION['acertos'] = $String_acertos;
				
			}

		}

		echo $_SESSION['acertos'];
		
		

	}

	

?>