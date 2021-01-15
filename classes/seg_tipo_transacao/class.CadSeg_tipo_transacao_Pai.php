<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 10/05/2019 - 14:10:54

include_once dirname(__FILE__).'/class.CadSeg_tipo_transacaoBD.php';
include_once dirname(__FILE__).'/class.Seg_tipo_transacao.php';

class CadSeg_tipo_transacao_Pai{
  var $cadSeg_tipo_transacaoBD;

  function CadSeg_tipo_transacao_Pai($conexao = ''){
    $this->cadSeg_tipo_transacaoBD = new CadSeg_tipo_transacaoBD($conexao);
  }

  function inserirSeg_tipo_transacao($seg_tipo_transacao) { 
    return $this->cadSeg_tipo_transacaoBD->inserirSeg_tipo_transacao($seg_tipo_transacao->getId_categoria_tipo_transacao(), addslashes(htmlspecialchars ($seg_tipo_transacao->getTransacao())), Util::converteDataBanco($seg_tipo_transacao->getDt_tipo_transacao()), $seg_tipo_transacao->getPublicado(), $seg_tipo_transacao->getAtivo());
  }

  function alterarSeg_tipo_transacao($seg_tipo_transacao) { 
    return $this->cadSeg_tipo_transacaoBD->alterarSeg_tipo_transacao($seg_tipo_transacao->getId_tipo_transacao(), $seg_tipo_transacao->getId_categoria_tipo_transacao(), addslashes(htmlspecialchars ($seg_tipo_transacao->getTransacao())), Util::converteDataBanco($seg_tipo_transacao->getDt_tipo_transacao()), $seg_tipo_transacao->getPublicado(), $seg_tipo_transacao->getAtivo());
  }

  function excluirSeg_tipo_transacao($seg_tipo_transacao) { 
    return $this->cadSeg_tipo_transacaoBD->excluirSeg_tipo_transacao($seg_tipo_transacao->getId_tipo_transacao());
  }

  function arrayToObject($va){ 
    return new Seg_tipo_transacao($va['id_tipo_transacao'], $va['id_categoria_tipo_transacao'], $va['transacao'], $va['dt_tipo_transacao'], $va['publicado'], $va['ativo']);
  }

  function getSeg_tipo_transacao($id_tipo_transacao) { 
    if($rs = $this->cadSeg_tipo_transacaoBD->getSeg_tipo_transacao($id_tipo_transacao))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllSeg_tipo_transacao($ini,$num) { 
    if($rs = $this->cadSeg_tipo_transacaoBD->getAllSeg_tipo_transacao($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>