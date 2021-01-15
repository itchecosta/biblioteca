<?php
class Util {


	

	
	function Util() {
	}
	
	static function recuperavars() {
			$mensagem = "";
			foreach($_REQUEST as $campo_nome=>$campo_valor ) {
				
				if (($campo_nome != "senha__pw")) {
				
						$mensagem .=  "  <strong>$campo_nome:</strong> ". utf8_decode($campo_valor) ."<br />\n";
						$mensagem .=  "  <br />\n";
				}
						
			}
			
			return $mensagem;
			
	}
	
	static function keyuser() {
		//CHAVE DE CRIPTOGRAFIA DE CRIPTOGRAFIA
		$chave = substr(md5(date("dmY").date("His").rand(1, 300000)),0,20 );
		
		return $chave;
	}
	
	
	static function encrypt($frase, $chave, $crypt)
{
  $retorno = "";

  if ($frase=='') return '';

  if($crypt)
  {
    $string = $frase;
    $i = strlen($string)-1;
    $j = strlen($chave);
     do
    {
      $retorno .= ($string{$i} ^ $chave{$i % $j});
    }while ($i--);

    $retorno = strrev($retorno);
    $retorno = base64_encode($retorno);
  }
  return $retorno;
}	



	
	
	
	static function normaliza($string){
		//$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
		//$b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
		//$string = ($string);
		//$string = strtr($string, utf8_decode($a), $b); //substitui letras acentuadas por &quot;normais&quot;
		//$string = str_replace(&quot; &quot;,&quot;&quot;,$string); // retira espaco
		//$string = strtolower($string); // passa tudo para minusculo
		//return strtoupper(utf8_encode($string)); //finaliza, gerando uma saída para a funcao
		return (($string)); //finaliza, gerando uma saída para a funcao
	}
	
	
	
	static  function geraTimestamp($data) {
		  $partes = explode('/', $data);
		  return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
		  }
		  
		  
	static function dif_entre2_datas($datai, $dataf) {
	
		  
		  // Cria uma função que retorna o timestamp de uma data no formato DD/MM/AAAA
		
		  
		  // Usa a função criada e pega o timestamp das duas datas:
		  $time_inicial = Util::geraTimestamp($datai);
		  $time_final = Util::geraTimestamp($dataf);
		  
		  // Calcula a diferença de segundos entre as duas datas:
		  $diferenca = $time_final - $time_inicial; // 19522800 segundos
		  
		  // Calcula a diferença de dias
		  $dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
		  
		  return $dias;
	
	}
	
	
	static function relogio() {

echo "<script language=\"JavaScript\">\n";
echo "function tS(){ x=new Date(); x.setTime(x.getTime()); return x; }\n";
echo "function lZ(x){ return (x>9)?x:'0'+x; }\n";
echo "function dT(){\n";
echo "  if(fr==0){ fr=1;\n";
echo "  document.write('<font size=2 face=Arial><span id=\"tP\">'+eval(oT)+'</span></font>');\n";
echo "  	}\n";
echo "		tP.innerText=eval(oT);\n";
echo "		setTimeout('dT()',1000);\n";
echo "	}\n";
echo "var fr=0,oT=\"lZ(tS().getHours())+':'+lZ(tS().getMinutes())+':'+lZ(tS().getSeconds())+' '\";\n";
echo "</script>\n";
echo "<script language=\"JavaScript\">dT();</script>\n";


}
	
	
	
	//Mostra a data
	static function cadeado($sIcone = false){
   		if(!$sIcone){
			$sIcone = 'ico-cadeado.png';
		}
		
		$var = "<img src='img/".$sIcone."' alt='Acesso Restrito' title='Acesso Restrito'/>";
   		return $var;
    }
	
	/*
	//Mostra a data
	static function cadeado(){
   		$var = "<img src=\"img/ico-cadeado_login.gif\" alt=\"Acesso Restrito\" title=\"Acesso Restrito\"/>";
   		return $var;
    }
	*/
 
 	static function MeuIp() {
		return @$_SERVER["HTTP_X_FORWARDED_FOR"]." - ".@$_SERVER["REMOTE_ADDR"];
		
	}
 
	static function recuperaIcone($configuracao){
		switch($configuracao['src']){
			case 'audio':
				$sTitulo = "Galeria de áudio";
			break;
			case 'video':
				$sTitulo = "Galeria de vídeo";
			break;
			case 'imagem':
				$sTitulo = "Galeria de imagem";
			break;
		}
		
		
		if($configuracao['titulo']){
			//	return "<div class='icone_noticia'><a href='".$configuracao['link']."' target='".$configuracao['target']."'><img class='fl' align='middle' style='margin: 0 3px 0 3px; ! important;! important;' src='img/ico-".$configuracao['src'].".png'><p class='mais_sobre_a_noticia'>".$configuracao['titulo']."</p></a></div>";
			return "<a href='".$configuracao['link']."' target='".$configuracao['target']."'><img class='fl' title = '".$sTitulo."' alt = '".$sTitulo."' src='img/ico-".$configuracao['src'].".png'><p class='mais_sobre_a_noticia'>".$configuracao['titulo']."</p></a>";
		
		}else{
			return "<a href='".$configuracao['link']."' target='".$configuracao['target']."'><img title = '".$sTitulo."' alt = '".$sTitulo."' src='img/ico-".$configuracao['src'].".png'></a>";
		}
	}
	
	//Mostra a data
	static function data()
 {
   $var = date("d/m/Y");
   return $var;
 }
 
	
	//Mostra a hora
	 static function hora()
 {
   $var = date("H:i:s");
   return $var;
 }
	
			//redirecionamento em javascript
	static function redirect($url)
	 {
	   $url =  "<script>document.location.href='".$url."'</script>";
	   return  $url;
	}
	
	//Alerta em javascript 
	static function alert($mensagem)
	 {
	   $mensagem =  "<script language='JavaScript'> alert('".$mensagem."'); </script>";
	   return  $mensagem;
	}
	
	
	static function getMsg($mod) {
		
		switch ($mod) {
			case "S" :
				$msg = "A opera&ccedil;&atilde;o foi realizada com sucesso.";
				break;
			case "E" :
				$msg = "A opera&ccedil;&atilde;o n&atilde;o foi realizada com sucesso!";
				break;
			case "N" :
				$msg = "Nenhum registro foi encontrado, verifique os dados informados!";
				break;
		}
		
		return $msg;
	
	}
	
	static function getDataAtual() {
		return date ( "Y-m-d" );
	}
	
	static function getHoraAtual() {
		return date ( "H:i:s" );
	}
	
	static function converteData($data) {
		//return $this->converteAmdParaDma($data);
		return Util::datatousa ( $data );
	}
	
	static function converteDataBanco($data) {
		//return $this->converteDmaParaAmd($data);
		return $data;
	}
	
	static function converteMdaParaDma(&$data) {
		$data = substr ( $data, 0, 10 );
		list ( $mes, $dia, $ano ) = explode ( "/", $data );
		$data = $dia . "/" . $mes . "/" . $ano;
		return $data;
	}
	
	static function converteDmaParaMda(&$data) {
		$data = substr ( $data, 0, 10 );
		list ( $dia, $mes, $ano ) = explode ( "/", $data );
		$data = $mes . "/" . $dia . "/" . $ano;
		return $data;
	}
	
	static function converteDmaParaAmd(&$data) {
		$data = substr ( $data, 0, 10 );
		list ( $dia, $mes, $ano ) = explode ( "/", $data );
		$data = $ano . "-" . $mes . "-" . $dia;
		return $data;
	}
	
	static function converteAmdParaDma(&$data) {
		$data = substr ( $data, 0, 10 );
		list ( $ano, $mes, $dia ) = explode ( "-", $data );
		$data = $dia . "/" . $mes . "/" . $ano;
		return $data;
	}
	
	## funÃ§Ãµes de formataÃ§Ã£o e tratamento de strings
	static function forValorBanco($valor) {
		return str_replace ( ",", ".", $valor );
	}
	
	static function forValor($valor) {
		return str_replace ( ".", ",", $valor );
	}
	
	static function forStringBanco($str) {
		$str = addslashes ( $str );
		return $str;
	}
	
	static function forString($str) {
		$str = stripslashes ( $str );
		return $str;
	}
	
	static function encode() {
		$vetParametros = func_get_args ();
		while ( $parametro = array_shift ( $vetParametros ) ) {
			$vetEncode [] .= urlencode ( $parametro );
		}
		return implode ( "|", $vetEncode );
	}
	
	static function decode($codigo) {
		$vetVarDecode = explode ( "|", $codigo );
		while ( $varDecode = urldecode ( array_shift ( $vetVarDecode ) ) ) {
			$vetVar [] = $varDecode;
		}
		return $vetVar;
	}
	
	static function iterateMenu($vetor, $atributoLabel, $atributoValor = false, $valorPadrao = false) {
		foreach ( $vetor as $objeto ) {
			$strValor = "\$objeto->get" . (($atributoValor) ? $atributoValor : $atributoLabel) . "()";
			if (is_array ( $atributoLabel ))
				for($i = 0; $i < count ( $atributoLabel ); $i ++)
					$strLabel .= "\$objeto->get" . $atributoLabel [$i] . "()" . (($i == count ( $atributoLabel ) - 1) ? '' : '." - ".');
			else
				$strLabel = "\$objeto->get" . $atributoLabel . "()";
			
			eval ( "\$strValor = $strValor;" );
			eval ( "\$strLabel = $strLabel;" );
			print "<option value='" . $strValor . "'" . (($valorPadrao) ? (($strValor == $valorPadrao) ? "selected " : "") : '') . " >" . $strLabel . "</option>\n";
			$strLabel = '';
		}
	}
	
	static function viewAgregation($pk, $nameObject, $property) {
		if (is_array ( $pk ))
			$pk = implode ( ",", $pk );
		eval ( "\$object = Fachada::get$nameObject($pk);" );
		if ($object)
			eval ( "\$valor = \$object->get$property();" );
		return $valor;
	}
	
	// NOVOS
	

	/*
	 * Transforma segundos em horas, minutos e segundos
	 * Exemplo: 61 s = 00:01:01
	 * */
	
	static function segundosToHms($s) {
		return gmdate ( 'H:i:s', $s );
	}
	
	/*
	 * Retorna os X primeiros caracteres da string
	 * */
	
	static function limitaStr($str, $limit) {
		
		if (strlen ( $str ) > $limit) {
			$str = substr ( $str, 0, $limit );
			$ultChr = strrpos ( $str, ' ' );
			$str = substr ( $str, 0, $ultChr ) . '...';
		}
		
		return $str;
	}
	
	/*
	 * Remove as tags html de uma string
	 * */
	
	static function removeHTML($str) {
		$str = strip_tags ( $str );
		$str = trim ( $str );
		return $str;
	}
	
	/*
	 * Texto a ser inserido nos links, a depender do tipo de operacao
	 * */
	
	static function getTextoLink($mod) {
		
		switch ($mod) {
			case "C" :
				$msg = "[Continuar Cadastrando]";
				break;
			case "V" :
				$msg = "[Voltar]";
				break;
		}
		
		return $msg;
	
	}
	
	//funÃ§Ã£o para calcula idade
	static function CalcularIdade($nascimento) {
		$hoje = date ( "d-m-Y" ); //pega a data d hoje
		$aniv = explode ( "/", $nascimento ); //separa a data de nascimento em array, utilizando o simbolo de - como separador
		$atual = explode ( "-", $hoje ); //separa a data de hoje em array
		

		$idade = $atual [2] - $aniv [2];
		
		if ($aniv [1] > $atual [1]) //verifica se o mas de nascimento e maior que o mes atual
		{
			$idade --; //tira um ano, ja que ele nao fez aniversario ainda
		} elseif ($aniv [1] == $atual [1] && $aniv [0] > $atual [0]) //verifica se o dia de hoje e maior que o dia do aniversario
		{
			$idade --; //tira um ano se nao fez aniversario ainda
		}
		return $idade; //retorna a idade da pessoa em anos
	}
	
	static function validar_data($data) {
		
		list ( $dia, $mes, $ano ) = explode ( "/", $data );
		
		if (checkdate ( $mes, $dia, $ano )) {
			return true;
		} else {
			return false;
		}
	}
	
	static function validar_email($email) {
		if (eregi ( "^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$", $email, $check )) {
			return true;
		} else
			return false;
	}
	
	static function validar_te($titulo) {
		$te = ereg_replace ( '[^0-9]', '', $titulo );
		$te = str_pad ( $te, 12, "0", STR_PAD_LEFT );
		$ignore_list = array ('000000000000' );
		
		if (strlen ( $te ) != 12 || in_array ( $te, $ignore_list ) || intval ( substr ( $te, 8, 2 ) ) == 0 || intval ( substr ( $te, 8, 2 ) ) > 28) {
			return false;
		} else {
			$d1 = $d2 = 0;
			
			for($i = 0; $i < 8; $i ++) {
				$d1 += $te [$i] * (10 - ($i + 1));
			}
			
			$d1 %= 11;
			
			if ($d1 == 0) {
				if (substr ( $te, 8, 2 ) == "01" || substr ( $te, 8, 2 ) == "02") {
					$d1 = 1;
				}
			} elseif ($d1 == 1) {
				$d1 = 0;
			} else {
				$d1 = 11 - $d1;
			}
			
			if ($d1 != substr ( $te, 10, 1 )) {
				return false;
			}
			
			// Validating second digit
			for($i = 8; $i < 10; $i ++) {
				$d2 += $te [$i] * (13 - ($i + 1));
			}
			
			$d2 = ($d2 + $d1 * 2) % 11;
			
			if ($d2 == 0) {
				if (substr ( $te, 8, 2 ) == "01" || substr ( $te, 8, 2 ) == "02") {
					$d2 = 1;
				}
			} elseif ($d2 == 1) {
				$d2 = 0;
			} else {
				$d2 = 11 - $d2;
			}
			
			if ($d2 != substr ( $te, 11, 1 )) {
				return false;
			}
			
			return true;
		}
		
		return false;
	}
	
	static function validar_cpf($cpf) {
		$erro = false;
		$aux_cpf = "";
		for($j = 0; $j < strlen ( $cpf ); $j ++)
			if (substr ( $cpf, $j, 1 ) >= "0" and substr ( $cpf, $j, 1 ) <= "9")
				$aux_cpf .= substr ( $cpf, $j, 1 );
		if (strlen ( $aux_cpf ) != 11)
			$erro = true;
		else {
			$cpf1 = $aux_cpf;
			$cpf2 = substr ( $cpf, - 2 );
			$controle = "";
			$start = 2;
			$end = 10;
			for($i = 1; $i <= 2; $i ++) {
				$soma = 0;
				for($j = $start; $j <= $end; $j ++)
					$soma += substr ( $cpf1, ($j - $i - 1), 1 ) * ($end + 1 + $i - $j);
				if ($i == 2)
					$soma += $digito * 2;
				$digito = ($soma * 10) % 11;
				if ($digito == 10)
					$digito = 0;
				$controle .= $digito;
				$start = 3;
				$end = 11;
			}
			if ($controle != $cpf2)
				$erro = true;
		}
		return $erro;
	}
	
	static function validar_Cep($cep) {
		$cep = trim ( $cep );
		$avaliaCep = ereg ( "^[0-9]{5}[0-9]{3}$", $cep );
		if ($avaliaCep != true) {
			return false;
		} else {
			return true;
		}
	}
	
	static function validar_telefone($telefone) {
		$telefone = trim ( $telefone );
		$avaliar_tel = ereg ( "^[0-9]{2}[0-9]{4}[0-9]{4}$", $telefone );
		

		if ($avaliar_tel != true) {
			return false;
		} else {
			return true;
		}
	}
	
	static function retira_acentos($texto) {
		$array1 = array ("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
		$array2 = array ("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
		return str_replace ( $array1, $array2, $texto );
	}
	
	static function validar_ano($ano) {
		$ano = trim ( $ano );
		$avaliaAno = ereg ( "^[0-9]{4}$", $ano );
		if ($avaliaAno != true) {
			return false;
		} else {
			return true;
		}
	}
	
	
	// Altera a Cor da TR  ------------------------------------------------------------------>
	static function trbg() {
	
	/*
	Variaveis aplicadas no template:
	PARA A LINHA 
	{TRBG} Alterna a cor da linha em branco e cinza e fundo fica verde ao passor o mouse
	
	*/
	//@session_start();
							if (isset($_SESSION["bgcolor"]) == "") { $_SESSION["bgcolor"] = "alt-row"; }
							
							
							if ($_SESSION["bgcolor"] == "alt-row") {
								$color = "#FFFFFF";
								$linha = "class= '#FFFFFF' onMouseOver=\"style.backgroundColor='#EFFEEB'\" onmouseout=\"style.backgroundColor='#FFFFFF'\"";

							}else{
								$color = "alt-row";
								$linha = "class= 'alt-row' onMouseOver=\"style.backgroundColor='#EFFEEB'\" onmouseout=\"style.backgroundColor='#F3F3F3'\"";

							}
							
							$_SESSION["bgcolor"] = $color;
							return $linha;
	
	}
	// Altera a Cor da TR  ------------------------------------------------------------------>
	
		
//DATA DO BRASIL PARA USA
 static function datatousa($data)
 {
     $a = explode("/", $data);
     return @$a[2]."-".@$a[1]."-".@$a[0];
 }

//DATA DO EUA PARA BRASIL
 static function datatopor($data)
  {
     $a = explode("-", $data);
     return @$a[2]."/".@$a[1]."/".@$a[0];
}
	
	
 //MOSTRA O IP
 static function ip()
 {
   $var = @$_SERVER["HTTP_X_FORWARDED_FOR"]." - ".@$_SERVER["REMOTE_ADDR"];
   return $var;
 }
 
 static  function navegador()
 {
   $var = @$_SERVER['HTTP_USER_AGENT'];
   return $var;
 }
 
 
 //FUNCAO MID EM PHP (IGUAL NO ASP
 static function mid($texto, $ini, $fim)
 {
   $texto = Substr($texto, $ini, $fim);
   return $texto;
 }
	
	//CARREGA O FLASH
	static function carregaflash($arquivo,$width,$height) {

	$trataflash =  "<object height=\"". $height."\" width=\"". $width ."\" id=\"undefined\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"><param value=\"". $arquivo ."\" name=\"movie\"/><param value=\"sameDomain\" name=\"allowScriptAccess\"/><param value=\"high\" name=\"quality\"/><param value=\"transparent\" name=\"wmode\"/><embed height=\"". $height."\" width=\"". $width ."\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\" quality=\"high\" src=\"". $arquivo ."\" swliveconnect=\"true\" allowscriptaccess=\"sameDomain\" name=\"undefined\" id=\"undefined\"/></object>\n";
	
	return $trataflash;
}
	
	
	//FUNÃ‡ÃƒO ARA MOSTRAR O DIA DA DATA EM FORMATO STRING ----------------------->>
	static function WeekDay($data) {
	$rs = strftime("%w",strtotime($data));
	switch($rs) {
		case 0: $s = "Domingo"; 	break;
		case 1: $s = "Segunda-feira"; 	break;
		case 2: $s = "Ter&ccedil;a-feira"; 	break;
		case 3: $s = "Quarta-feira"; 	break;
		case 4: $s = "Quinta-feira"; 	break;
		case 5: $s = "Sexta-feira";		break;
		case 6: $s = "S&aacute;bado"; 	break;
	
	}
	return $s;
	
	}
	
	
	//FUNCAO PRE PARA MOSTRAR VALORES EM ARRAY EM HTML -------------------------------------------------------------->
	// MOSTRA AS VARIAVESI POSTADAS PELOS METODOS GET, POS-------------------------------------------------------------->
	// Criador...........: Leonidas Amorim
	// Data..............: 03/04/2010
	static function pre($var) {
		return "<pre>".print_r($var)."</pre>";
	}
	
	//--------------------------------------------------------------------------------------------------------------->
	
	
// MOSTRA AS VARIAVESI POSTADAS PELOS METODOS GET, POS-------------------------------------------------------------->
// Criador...........: LeÃ´nidas Amorim
// Data..............: 03/04/2010
static function request() {

	$valorvar ="";
	 while(list($key, $val) = each($_REQUEST)) {
				 $valorvar .= $key."=".$val."&";
	  }
    
		return $valorvar;
}

static function get() {

	$valorvar ="";
	 while(list($key, $val) = each($_GET)) {
				 $valorvar .= $key."=".$val."&";
	  }
    
		return $valorvar;
}

static function post() {

	$valorvar ="";
	 while(list($key, $val) = each($_POST)) {
				 $valorvar .= $key."=".$val."&";
	  }
    
		return  $valorvar;
}	
	
//----------------------------------------------------------------------------------------------->	
	
	// METODO UTILIZADO PARA RECORTAR UMA STRING UTILIZANDO COMO LIMITADOR A QUANTIDADE DE CARACTERES. 
	// O RETORNO PODE POSSUIR UMA COMPLEMENTO
	// QUALQUER DUVIDA, PERGUNTE PARA O AUTOR.
	// MODO DE USAR: cropString("Youcanuse thePropertyinspectortolink to a particular section.",40,"..."));
	// Autor: Alex Lima
	static function cropString($sString,$nQntChar,$sFim){
		if(strlen($sString) > $nQntChar){
			$sString = substr($sString,0,$nQntChar);
			$sString = substr($sString,0,strrpos($sString," ")).$sFim;
		}
		return $sString;
	}
	
	// METODO PARA FORMATACAO DE DATA E HORA USANDO EXP. REGULAR.
	// QUALQUER DUVIDA, PERGUNTE PARA O AUTOR.
	// Autor: Alex Lima
	// $oUtil->formataDataHora($oNoticia->getDt_noticia(), "Dia, dia/mes/ano, hora:min:seg");
	// METODO PARA FORMATACAO DE DATA E HORA USANDO EXP. REGULAR.
	// QUALQUER DUVIDA, PERGUNTE PARA O AUTOR.
	// Autor: Alex Lima
	// $oUtil->formataDataHora($oNoticia->getDt_noticia(), "Dia, dia/mes/ano, hora:min:seg");
	static function formataDataHora($dData,$sFormato){
		$vsMes = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Mar&ccedil;o", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
		$vsDiaSemana = array (0 => "Domingo", 1 => "Segunda-Feira",2 => "Ter&ccedil;a-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "S&aacute;bado");
		
		list($sData,$sHora) = explode(" ",$dData);
		list($sAno,$sMes,$sDia) = explode("-",$sData);
		list($sHora,$sMinuto,$sSegundo) = explode(":",$sHora);
		
		$nDiaSemana = date("w",strtotime($dData));
		$nMes = date("n",strtotime($dData));
		
		// ARRAY REGEX
		$vsPadrao = array ("Dia" => $vsDiaSemana[$nDiaSemana], "dia" => $sDia, "mes" => $sMes, "Mes" => $vsMes[$nMes], "ano" => $sAno, "hora" => $sHora, "minuto" => $sMinuto, "segundo" => $sSegundo);
		$vsExp = array ("min" => "minuto", "seg" => "segundo");
		//preg_replace  (  mixed $pattern  ,  mixed $replacement  ,  mixed $subject  [,  int $limit = -1  [,  int &$count  ]] )
		//string ereg_replace  (  string $pattern  ,  string $replacement  ,  string $string  )
		
		// FORMATA A DATA USANDO EXPRESSAO REGULAR
		foreach($vsExp as $nChave => $sExp){
			$sFormato = str_replace($nChave, $sExp, $sFormato);
			//$sFormato = ereg_replace($nChave, $sExp, $sFormato);
		}
		
		//echo($sFormato);
		
		foreach($vsPadrao as $nChave => $sPadrao){
			$sFormato = str_replace($nChave, $sPadrao, $sFormato);
		}
		
		return $sFormato;
	}
	
	// METODO RESPONSAVEL POR LIMITA O NUMERO DE OCORRENCIAS DE UM VALOR EM UMA DETERMINADA FUNCAO DE UMA OBJETO
	// ESSE METODO FOI DESENVOLVIDO PARA SER UTILIZADO NA ESTRUTURA DE EXIBICAO DAS NOTICIAS DO PORTAL DOL
	// QUALQUER DUVIDA, PERGUNTE PARA O AUTOR.
	// Autor: Alex Lima
	static function limita($voObjeto, $nMaxOcorencia){
		// VERIFICA SE OS OBJETOS POSSUEM A FUNCAO INDICADA COM O VALOR CORRESPONDENTE
		$voObjetoLimitado = array();
		foreach($voObjeto as $oObjeto){
			if(method_exists($oObjeto,"getFoto")){
				if(call_user_func(array($oObjeto,"getFoto"))){
					// SE TIVER FOTO INCREMENTA O CONTADOR DE OCORRENCIAS
					$nCountOcorencia++;	
					
					// VERIFICA A QUANTIDADE DE OCORENCIAS
					if($nCountOcorencia > $nMaxOcorencia){
						break 1;	
					}else{
						
						// SE TIVER ALGUMA COISA NO ARRAY E NAO TIVER SIDO ENCONTRADO NENHUMA OCORENCIA, ENTAO LIMPA O ARRAY
						if(count($voObjetoLimitado)>0){
							$voObjetoLimitado = array();
						}
						array_push($voObjetoLimitado, $oObjeto);
					}
				}else{
					array_push($voObjetoLimitado, $oObjeto);
				}
			}
		}
		return $voObjetoLimitado;
	}
	

	function removeAcento($str, $enc = "UTF-8"){

		$acentos = array(
		'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
		'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
		'C' => '/&Ccedil;/',
		'c' => '/&ccedil;/',
		'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
		'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
		'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
		'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
		'N' => '/&Ntilde;/',
		'n' => '/&ntilde;/',
		'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
		'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
		'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
		'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
		'Y' => '/&Yacute;/',
		'y' => '/&yacute;|&yuml;/',
		'a.' => '/&ordf;/',
		'o.' => '/&ordm;/');
		
		return preg_replace($acentos,array_keys($acentos), htmlentities($str,ENT_NOQUOTES, $enc));
	}
	
	function redimensionaImagem($imageDirectory, $imageName, $thumbDirectory, $thumbWidth){
		$srcImg = imagecreatefromjpeg("$imageDirectory/$imageName");
		$origWidth = imagesx($srcImg);
		$origHeight = imagesy($srcImg);
		$ratio = $origWidth / $thumbWidth;
		$thumbHeight = $origHeight / $ratio;
		$thumbImg = imagecreatetruecolor($thumbWidth, $thumbHeight);
		imagecopyresized($thumbImg, $srcImg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $origWidth, $origHeight);
		imagejpeg($thumbImg, "$thumbDirectory/$imageName");
	}
	
	// RECUPERA O CSS PELA CATEGORIA
	function recuperaCSSPorCategoria($nIdCategoria){
		switch($nIdCategoria){
			case CATEGORIA_NOTICIA:
				return "cor_noticias";
			break;
			case CATEGORIA_ESPORTE:
				return "cor_esporte";
			break;
			case CATEGORIA_VOCE:
				return "cor_voce";
			break;
			default:
				return "cor_dol";
			break;
		}
	}

	public static function createSlug($string) {

	    $table = array(
	            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
	            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
	            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
	            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
	            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
	            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
	            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
	            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', 
	            '/' => '-', ':' => '-', '.' => '-', '!' => "", '?' => "", '"' => "", 
	            "'" => "",' ' => '-', '+' => '-', '§' => '-', 'º' => '-',
	            '&' => '-', 'ª' => '-', '(' => '-', ')' => '-', '(' => '-', 
	            ')' => '-','\\' => '-', '|' => '-', '_' => '-',  ',' => '-',
	             '~' => '-', '^' => '-', '´' => '-', '`' => '-', ';' => '-',
	              '>' => '-', '<' => '-', '@' => '-', '$' => '-', '%' => '-',
	               '*' => '-', '=' => '-', '[' => '-', ']' => '-', '{' => '-',
	                '}' => '-',  '°' => '-', '¢' => '-', '¬' => '-', '#' => '-',
	    );

	    // -- Remove duplicated spaces
	    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', trim($string));

	    // -- Returns the slug
	    return strtolower(strtr(stripslashes($stripped), $table));


	}
}
?>