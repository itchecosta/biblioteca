<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_tipo_transacao_Pai.php';

class CadSeg_tipo_transacao extends CadSeg_tipo_transacao_Pai{

	//RECUPERA TIPO TRANSAÇÃO POR CATEGORIA
	function getAllSeg_tipo_transacaoPorCategoria($idcategoria,$ini,$num) { 
		if($rs = $this->cadSeg_tipo_transacaoBD->getAllSeg_tipo_transacaoPorCategoria($idcategoria,$ini,$num))
		  while($va = array_shift($rs))
		    $vet[] = $this->arrayToObject($va);
		else
		  return false;
		return $vet;
	}

	//EXCLUIR TIPO TRANSAÇÃO POR CATEGORIA
	function excluirSeg_tipo_transacaoPorCategoria($idcategoria) { 
    	return $this->cadSeg_tipo_transacaoBD->excluirSeg_tipo_transacaoPorCategoria($idcategoria);
  	}

  	function recuperaTipoTransacao($categoria,$transacao) { 
  		if($rs = $this->cadSeg_tipo_transacaoBD->recuperaTipoTransacao($categoria,$transacao))
	      return $this->arrayToObject(array_shift($rs));
	    else
	      return false;
	}
}
?>