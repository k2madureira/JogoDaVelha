var tentativas = [];
var acertos = [];
var acertosLetras = [];
var erros = 0;
var cont =0;

function verificaLetra(){
	event.preventDefault();
	var $ = document.querySelector.bind(document);
	var campLetra   = $("#letra");
	
	var letra = campLetra.value;

	

	
	enviaLetra(letra);
}


function enviaLetra(letra){

	var requisicao = "letra";
	var campTamanho = document.querySelector("#tamanho");
	var campPalavra = document.querySelector("#palavra");
	var campAcertos = document.querySelector("#acertos");
	var campLetra = document.querySelector("#letra");
	var campErros = document.querySelector("#erros");
	var game = document.querySelector(".game");
	var ganhou = document.querySelector("#ganhou");
	var perdeu = document.querySelector("#perdeu");
	var perdeuP = document.querySelector("#perdeuP");
	var form = document.querySelector(".box-formulario");

	var imgCabeca = document.querySelector("#cabeca");
	var imgCorpo = document.querySelector("#corpo");
	var imgBdireito = document.querySelector("#bdireito");
	var imgBesquerdo = document.querySelector("#besquerdo");
	var imgPdireita = document.querySelector("#pdireita");
	var imgPesquerda = document.querySelector("#pesquerda");

	var palavra = campPalavra.textContent;
	var tamanho = campTamanho.textContent;
	var stringAcerto = campAcertos.textContent;

	
	$.ajax({
		type:"POST",
		url:"php/forca.php",
		data:{letra:letra,requisicao:requisicao},
		cache:false,
		beforeSend:function(){console.log("");},
		success:function(data){

					

			if(erros >=6){

				 
					setTimeout(function(){
    						game.classList.add('box-invisivel');	
							perdeu.classList.remove('box-invisivel');
							perdeuP.textContent = 'Perdeu, tente novamente!!.' + "A palavra era : "+palavra;
                        },4000);

					
					
					
			}else{
			
			if(data == 'errou'){
					
				tentativas.push(letra);	
				mostraTentativas();
				erros = erros +1;
				campErros.textContent = erros;
				campErros.classList.remove('box-invisivel');
				campLetra.value = '';

				 if(erros == 1){
				 	imgCabeca.classList.remove('invisivel');
				}if(erros == 2){
					imgCorpo.classList.remove('invisivel');
				}if(erros == 3){
					imgBdireito.classList.remove('invisivel');
				}if(erros == 4){
					imgBesquerdo.classList.remove('invisivel');
				}if(erros == 5){
					imgPesquerda.classList.remove('invisivel');
				}if(erros == 6){
					imgPdireita.classList.remove('invisivel');
				}




			}else{

				acertos.push(data);
				var aux = data;

				mostraAcertos(aux,letra);


			}
			}
		}
	});
}

function restartGame(){

	var requisicao = "restart";

	$.ajax({
		type:"POST",
		url:"php/forca.php",
		data:{requisicao:requisicao},
		cache:false,
		beforeSend:function(){console.log("novo game...");},
		success:function(data){

			 window.location.reload();
		}
	});
}

function mostraTentativas(){

	var $ = document.querySelector.bind(document);
	var tentaLetra   = $("#tentaletra");

	for(var i =0; i < tentativas.length; i++){

		tentaLetra.textContent = tentativas;
	}
}

function mostraAcertos(aux,letra){

	var $ = document.querySelector.bind(document);

	var game 		 = $(".game");
	var ganhou 		 = $("#ganhou");
	var campTamanho  = $("#tamanho");
	var campAcertos  = $("#acertos")
	var campLetras   = $("#letras");
	var campPalavra  = $("#palavra");
	var form 		 = $(".box-formulario");
	
	var tamanho = campTamanho.textContent;
	var acertou = campAcertos.textContent;
	var palavra = campPalavra.textContent;
	var s_Acertos = campAcertos.textContent;

	campLetras.textContent = aux;


	if(aux == palavra){

				
					form.classList.add("invisivel"); 

					 setTimeout(function(){

		                    game.classList.add('box-invisivel');
							ganhou.classList.remove('box-invisivel');
                        },4000);

			}


}