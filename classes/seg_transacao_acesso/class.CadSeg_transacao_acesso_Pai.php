<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_transacao_acessoBD.php';
include_once dirname(__FILE__).'/class.Seg_transacao_acesso.php';

class CadSeg_transacao_acesso_Pai{
  var $cadSeg_transacao_acessoBD;

  function CadSeg_transacao_acesso_Pai($conexao = ''){
    $this->cadSeg_transacao_acessoBD = new CadSeg_transacao_acessoBD($conexao);
  }

  function inserirSeg_transacao_acesso($seg_transacao_acesso) { 
    return $this->cadSeg_transacao_acessoBD->inserirSeg_transacao_acesso($seg_transacao_acesso->getId_tipo_transacao(), $seg_transacao_acesso->getId_usuario(), $seg_transacao_acesso->getObjeto(), $seg_transacao_acesso->getIp(), Util::converteDataBanco($seg_transacao_acesso->getDt_transacao()));
  }

  function alterarSeg_transacao_acesso($seg_transacao_acesso) { 
    return $this->cadSeg_transacao_acessoBD->alterarSeg_transacao_acesso($seg_transacao_acesso->getId_tipo_transacao(), $seg_transacao_acesso->getId_usuario(), $seg_transacao_acesso->getObjeto(), $seg_transacao_acesso->getIp(), Util::converteDataBanco($seg_transacao_acesso->getDt_transacao()));
  }

  function excluirSeg_transacao_acesso($seg_transacao_acesso) { 
    return $this->cadSeg_transacao_acessoBD->excluirSeg_transacao_acesso($seg_transacao_acesso->getId_transacao_acesso());
  }

  function arrayToObject($va){ 
    return new Seg_transacao_acesso($va['id_transacao_acesso'], $va['id_tipo_transacao'], $va['id_usuario'], $va['objeto'], $va['ip'], $va['dt_transacao']);
  }

  function getSeg_transacao_acesso($id_transacao_acesso) { 
    if($rs = $this->cadSeg_transacao_acessoBD->getSeg_transacao_acesso($id_transacao_acesso))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllSeg_transacao_acesso($ini,$num) { 
    if($rs = $this->cadSeg_transacao_acessoBD->getAllSeg_transacao_acesso($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>