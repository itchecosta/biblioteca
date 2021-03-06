<?php
set_time_limit(999);
ini_set("display_errors", 1);
error_reporting(1);

date_default_timezone_set("America/Sao_Paulo");
include_once dirname(__FILE__)."/adodb/adodb.inc.php";

if(($_SERVER['SERVER_NAME'] == 'www.newboxinfo.com.br') || ($_SERVER['SERVER_NAME'] == 'newboxinfo.com.br')){
	define("ROOT", "https://www.newboxinfo.com.br/sistema_biblioteca/painel/");
	define("HOST",'https://'.$_SERVER['HTTP_HOST'].'/sistema_biblioteca/');

}elseif(($_SERVER['SERVER_NAME'] == 'www.sistema_biblioteca.com.br') || ($_SERVER['SERVER_NAME'] == 'sistema_biblioteca.com.br')){
	define("ROOT", "https://www.sistema_biblioteca.com.br/painel/");
	define("HOST",'https://'.$_SERVER['HTTP_HOST'].'/');

}else {
	//MAQUINAS QUE USAM ESSA Conf
	//ITALO
	define("ROOT", 'http://'.$_SERVER['HTTP_HOST']."/sistema_biblioteca/painel/");
	define("HOST",'http://'.$_SERVER['HTTP_HOST'].'/sistema_biblioteca/');
}

class Conexao {
	var $conexao;
	var $usuario;
	var $senha;
 	var $bdPath;
 	var $bd;
 	var $tipoBd;
 	var $charSet;
 	var $buffers;
 	var $dialect;
 	var $autoCommit;

  function Conexao() {
  		$this->usuario 	= "root";
		$this->senha 	= "";
		$this->bdPath 	= "localhost";
		$this->bd 	= "biblioteca";
		$this->tipoBd 	= "mysqli";
		$this->charSet 	= "ASCII";
		$this->buffers 	= 100;
		$this->dialect 	= 3;
		$this->autoCommit = true;
	    // Cria uma instancia do objeto
		// Configura uma conex�o com a biblioteca
		$this->conexao = NewADOConnection($this->tipoBd);
		$this->conexao->charSet = $this->charSet;
		$this->conexao->buffers = $this->buffers;
		$this->conexao->dialect = $this->dialect;
		// Abre a conex�o com o banco
		
		if (!$this->conexao->Connect($this->bdPath,$this->usuario,$this->senha,$this->bd)) {
		   header("Location: manutencao.php");
		}
  }
	function &fetch_array(&$rs){
		$numeroColunas = $rs->FieldCount();	
		while (!$rs->EOF) {
			for($i=0;$i < $numeroColunas;$i++){
    	   		$coluna = $rs->FetchField($i);
       			$nomeColuna = strtolower($coluna->name);
       			$tipoColuna = $rs->MetaType($coluna->type);
       			if ($tipoColuna == 'D'){
       			    $vetor["$nomeColuna"] = $this->converteData($rs->fields[$i]);
				}else{
       				$vetor["$nomeColuna"] = $rs->fields[$i];
       			}               
     		}
     	$vetorRegistro[] = $vetor;
	 	$rs->MoveNext(); 
		} 	
	return $vetorRegistro;
	}
		
	function converteData($data){
		return $this->converteAmdParaDma($data);
	}

	function &converteMdaParaDma(&$data){
		$data = substr($data,0,10);    
		list($mes,$dia,$ano) = explode("/",$data);
		$data = $dia."/".$mes."/".$ano;
		return $data;
	}
	
	function &converteDmaParaMda(&$data){
		$data = substr($data,0,10);    
		list($dia,$mes,$ano) = explode("/",$data);
		$data = $mes."/".$dia."/".$ano;
		return $data;
	}	

	function &converteDmaParaAmd(&$data){
		$data = substr($data,0,10);    
		list($dia,$mes,$ano) = explode("/",$data);
		$data = $ano."-".$mes."-".$dia;
		return $data;
	}	
	
	function &converteAmdParaDma(&$data){
 		$data = substr($data,0,10);    
		list($ano,$mes,$dia) = explode("-",$data);
		$data = $dia."/".$mes."/".$ano;
		return $data;
	}		
			
	function close(){
		$this->conexao->Close();
	}
	
	function execute($sql){
		$rs = $this->conexao->Execute($sql) or die("Erro na consulta: $sql. <br>" . $this->conexao->ErrorMsg());
		$_SESSION['lastSQL']  = $sql;
		return $rs;
	}
	
	function getAutoCommit(){
		return $this->autoCommit;
	}
	
	function setAutoCommit($bol){
		$this->autoCommit = $bol;
	}
	
	function insertId(){
		return $this->conexao->Insert_id();
	}
	
	function iniciarTrans(){
		$this->setAutoCommit(false);
		$this->conexao->BeginTrans();
	}
	
	function commitTrans(){
		$this->setAutoCommit(true);
		$this->conexao->CommitTrans();
		$this->close();
	}
	
	function rollBackTrans(){
		$this->setAutoCommit(true);
		$this->conexao->RollbackTrans();
		$this->close();
	}
}

?>
