<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_transacaoBD.php';
include_once dirname(__FILE__).'/class.Seg_transacao.php';

class CadSeg_transacao_Pai{
  var $cadSeg_transacaoBD;

  function CadSeg_transacao_Pai($conexao = ''){
    $this->cadSeg_transacaoBD = new CadSeg_transacaoBD($conexao);
  }

  function inserirSeg_transacao($seg_transacao) { 
    return $this->cadSeg_transacaoBD->inserirSeg_transacao($seg_transacao->getId_tipo_transacao(), $seg_transacao->getId_usuario(), $seg_transacao->getObjeto(), $seg_transacao->getIp(), Util::converteDataBanco($seg_transacao->getDt_transacao()), $seg_transacao->getPublicado(), $seg_transacao->getAtivo());
  }

  function alterarSeg_transacao($seg_transacao) { 
    return $this->cadSeg_transacaoBD->alterarSeg_transacao($seg_transacao->getId_seg_transacao(), $seg_transacao->getId_tipo_transacao(), $seg_transacao->getId_usuario(), $seg_transacao->getObjeto(), $seg_transacao->getIp(), Util::converteDataBanco($seg_transacao->getDt_transacao()), $seg_transacao->getPublicado(), $seg_transacao->getAtivo());
  }

  function excluirSeg_transacao($seg_transacao) { 
    return $this->cadSeg_transacaoBD->excluirSeg_transacao($seg_transacao->getId_seg_transacao());
  }

  function arrayToObject($va){ 
    return new Seg_transacao($va['id_seg_transacao'], $va['id_tipo_transacao'], $va['id_usuario'], $va['objeto'], $va['ip'], $va['dt_transacao'], $va['publicado'], $va['ativo']);
  }

  function getSeg_transacao($id_seg_transacao) { 
    if($rs = $this->cadSeg_transacaoBD->getSeg_transacao($id_seg_transacao))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllSeg_transacao($ini,$num) { 
    if($rs = $this->cadSeg_transacaoBD->getAllSeg_transacao($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>