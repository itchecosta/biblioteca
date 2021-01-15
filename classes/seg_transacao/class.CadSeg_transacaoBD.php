<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_transacaoBD_Pai.php';

class CadSeg_transacaoBD extends CadSeg_transacaoBD_Pai{


	function getSeg_transacaoTodos($id_categoria_tipo_transacao,$sTransacao) { 
	    $sql = " SELECT * FROM seg_transacao
	               WHERE
	                  ativo = '1'
	                  AND id_categoria_tipo_transacao = '$id_categoria_tipo_transacao'
	                	AND objeto = '$sTransacao'
	                ORDER BY id_seg_transacao DESC limit 0,1";
	    $rs = $this->con->execute($sql);
	    return $this->con->fetch_array($rs);
	}

}
?>