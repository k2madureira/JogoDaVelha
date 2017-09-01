function envia(){
	

	event.preventDefault();

	var $ = document.querySelector.bind(document);
	var casa="zombi";
	var campoPalavra = $("#palavra");
	var palavra = campoPalavra.value;
	

	if(!palavra){
		 msgErro();
	}else{
		gameStart(palavra);
	}
	
}

function msgErro(){

	var $=document.querySelector.bind(document);
	var msg = $("#erro");
	var erro="Preenchido o campo deve ser. Jovem padawan!";


				    setTimeout(function(){

			            msg.classList.remove("invisivel");
			            msg.textContent = erro;
			        	

			       	},500);
			      	setTimeout(function(){       

			                    clearInterval(erro);
			                    msg.classList.add("invisivel");
			                    msg.textContent='';
			                   
			             },6000);
			      	
}

function gameStart(palavra){

	var requisicao = "palavra";

	$.ajax({
		type:"POST",
		url:"php/forca.php",
		data:{palavra:palavra,requisicao:requisicao},
		cache:false,
		beforeSend:function(){console.log("partiu game...");},
		success:function(data){

			 window.location.reload();
		}
	});
}



