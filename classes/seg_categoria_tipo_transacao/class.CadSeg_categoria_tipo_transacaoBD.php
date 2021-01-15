<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_categoria_tipo_transacaoBD_Pai.php';

class CadSeg_categoria_tipo_transacaoBD extends CadSeg_categoria_tipo_transacaoBD_Pai{


	//RECUPERA TODOS POR DESCRICAO
	function getSeg_categoria_tipo_transacaoPorDescricao($descricao) { 
	    $sql = " SELECT * FROM seg_categoria_tipo_transacao
	               WHERE
	                 descricao = '$descricao'
	                 	ORDER BY id DESC limit 1";
	    $rs = $this->con->execute($sql);
	    return $this->con->fetch_array($rs);
	}


}
?>