<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_tipo_transacaoBD_Pai.php';

class CadSeg_tipo_transacaoBD extends CadSeg_tipo_transacaoBD_Pai{

	//RECUPERA TIPO TRANSAÇÃO POR CATEGORIA
	function getAllSeg_tipo_transacaoPorCategoria($idcategoria,$ini,$num) { 
		$sql = " SELECT * FROM seg_tipo_transacao
				 WHERE id_categoria_tipo_transacao = $idcategoria
				 	AND ativo = '1'
	  			ORDER BY
		                id_tipo_transacao";
		if(($ini !== NULL) && ($num !== NULL))
		    $sql .=" LIMIT $ini,$num ";
		$rs = $this->con->execute($sql);
		return $this->con->fetch_array($rs);
	}

	//EXCLUIR TIPO TRANSAÇÃO POR CATEGORIA
	function excluirSeg_tipo_transacaoPorCategoria($idcategoria) { 
		$sql = " DELETE FROM seg_tipo_transacao
		          WHERE id_categoria_tipo_transacao = '$idcategoria'";
		return $this->executarIUD($sql);
	}

	function recuperaTipoTransacao($categoria,$transacao) { 
	    $sql = " SELECT * FROM seg_tipo_transacao
	               WHERE
	              		ativo = '1'
	                 	AND transacao = '$transacao'
	               AND	id_categoria_tipo_transacao in(SELECT id FROM seg_categoria_tipo_transacao WHERE descricao = '$categoria')";
	    $rs = $this->con->execute($sql);
	    return $this->con->fetch_array($rs);
	}

}
?>