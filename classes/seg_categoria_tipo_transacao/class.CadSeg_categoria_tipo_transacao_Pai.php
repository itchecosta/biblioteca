<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_categoria_tipo_transacaoBD.php';
include_once dirname(__FILE__).'/class.Seg_categoria_tipo_transacao.php';

class CadSeg_categoria_tipo_transacao_Pai{
  var $cadSeg_categoria_tipo_transacaoBD;

  function CadSeg_categoria_tipo_transacao_Pai($conexao = ''){
    $this->cadSeg_categoria_tipo_transacaoBD = new CadSeg_categoria_tipo_transacaoBD($conexao);
  }

  function inserirSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao) { 
    return $this->cadSeg_categoria_tipo_transacaoBD->inserirSeg_categoria_tipo_transacao(addslashes(htmlspecialchars ($seg_categoria_tipo_transacao->getDescricao())), Util::converteDataBanco($seg_categoria_tipo_transacao->getDt_categoria_tipo_transacao()), $seg_categoria_tipo_transacao->getPublicado(), $seg_categoria_tipo_transacao->getAtivo());
  }

  function alterarSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao) { 
    return $this->cadSeg_categoria_tipo_transacaoBD->alterarSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao->getId(), addslashes(htmlspecialchars ($seg_categoria_tipo_transacao->getDescricao())), Util::converteDataBanco($seg_categoria_tipo_transacao->getDt_categoria_tipo_transacao()), $seg_categoria_tipo_transacao->getPublicado(), $seg_categoria_tipo_transacao->getAtivo());
  }

  function excluirSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao) { 
    return $this->cadSeg_categoria_tipo_transacaoBD->excluirSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao->getId());
  }

  function arrayToObject($va){ 
    return new Seg_categoria_tipo_transacao($va['id'], $va['descricao'], $va['dt_categoria_tipo_transacao'], $va['publicado'], $va['ativo']);
  }

  function getSeg_categoria_tipo_transacao($id) { 
    if($rs = $this->cadSeg_categoria_tipo_transacaoBD->getSeg_categoria_tipo_transacao($id))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllSeg_categoria_tipo_transacao($ini,$num) { 
    if($rs = $this->cadSeg_categoria_tipo_transacaoBD->getAllSeg_categoria_tipo_transacao($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>