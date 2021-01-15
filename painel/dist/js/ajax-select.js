
//MÉTODO RESPONSÁVEL POR INICIALIZAR O OBJETO XMLHTTPREQUEST
function inicializaXlmHttp(){
	try{
    	oXmlHttp = new XMLHttpRequest();
	}catch(ee){
   		try{
        	oXmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    	}catch(e){
        	try{
            	oXmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        	}catch(E){
				oXmlHttp = false;
        	}
		}
    }
	return oXmlHttp;
}

//FUNÇÃO RESPONSÁVEL POR MONTAR O SELECT
function montaSelect(sDestino,sConteudo,sOrigem){
	//alert(sOrigem);
	oSelect = document.getElementById(sDestino);
	sConteudo = sConteudo.replace(/\+/g," ");
    sConteudo = unescape(sConteudo);
	limpaSelect(oSelect);
	vLinha = sConteudo.split('&');
	
	if(sConteudo) {
		//ADICIONA O SELECIONE
		//oOption = new Option("Selecione","");
		//oSelect.options[0] = oOption;
	
		for(var i = 0 ; i < vLinha.length ; i++){
			vCampo = vLinha[i].split('=');
			oOption = new Option(vCampo[1],vCampo[0]);
			if(sOrigem == oOption.value)
				oOption.selected = true;
			oSelect.options[oSelect.length] = oOption;
		}
	} else {
		//ADICIONA O SELECIONE
		oOption = new Option("Não há itens cadastrados no sistema","");
		oSelect.options[0] = oOption;
	
	}
}

//MÉTODO RESPONSÁVEL POR LIMPAR O OBJETO SELECT
function limpaSelect(oSelect){
	while(oSelect.length != 0){
		oSelect.remove(0);
	}
}

/*
MÉTODO RESPONSÁVEL POR RECUPERAR O CONTEÚDO QUE IRÁ COMPOR O SELECT
nIdSelect => ID DO OBJETO HTML SELECT QUE SERÁ MONTADO
nIdCategoria => ID DA CATEGORIA NO BANCO DE DADOS QUE SERVIRÁ DE FILTRO PARA MONTAGEM DO SELECT
nIdSelecionado => ID DA OPÇÃO QUE FICARÁ MARCADA NO SELECT MONTADO
sDocumento => LOCALIZAÇÃO DO DOCUMENTO QUE ESTÁ REALIZANDO A CONSULTA AO BANCO
*/
function recuperaConteudoSelect(sDestino,sOrigem,sDocumento){
	//alert(sOrigem);
	oOption = new Option();
	oOption.value = '';
	oOption.text = 'Aguarde...Carregando';
	oOption.selected = true;
	oSelect = document.getElementById(sDestino);
	oSelect.options[oSelect.options.length] = oOption;
	oXmlHttp = inicializaXlmHttp();
	oXmlHttp.open("GET",sDocumento+"?sOrigem="+sOrigem,true);
	//alert(sDocumento+"?sOrigem="+sOrigem);
	oXmlHttp.onreadystatechange = function(){
		if(oXmlHttp.readyState == 4){
			if(oXmlHttp.status == 200){
				var sConteudo = oXmlHttp.responseText;
				montaSelect(sDestino,sConteudo,sOrigem);
			} else 
				alert('Problemas na conex&atilde;o com o servidor! Tente novamente');
		}//if(oXmlHttp.readyState == 4)
	}
	oXmlHttp.send(null);
}
