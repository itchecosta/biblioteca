<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_transacao_Pai.php';

class CadSeg_transacao extends CadSeg_transacao_Pai{


	function getSeg_transacaoTodos($id_categoria_tipo_transacao,$sTransacao) { 
	    if($rs = $this->cadSeg_transacaoBD->getSeg_transacaoTodos($id_categoria_tipo_transacao,$sTransacao))
	      return $this->arrayToObject(array_shift($rs));
	    else
	      return false;
	}


}
?>