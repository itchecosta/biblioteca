<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_categoria_tipo_transacao_Pai.php';

class CadSeg_categoria_tipo_transacao extends CadSeg_categoria_tipo_transacao_Pai{


	//RECUPERA TODOS POR DESCRICAO
	function getSeg_categoria_tipo_transacaoPorDescricao($descricao) { 
	    if($rs = $this->cadSeg_categoria_tipo_transacaoBD->getSeg_categoria_tipo_transacaoPorDescricao($descricao))
	      return $this->arrayToObject(array_shift($rs));
	    else
	      return false;
	}


}
?>