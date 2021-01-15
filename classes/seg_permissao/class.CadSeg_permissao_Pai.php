<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_permissaoBD.php';
include_once dirname(__FILE__).'/class.Seg_permissao.php';

class CadSeg_permissao_Pai{
  var $cadSeg_permissaoBD;

  function CadSeg_permissao_Pai($conexao = ''){
    $this->cadSeg_permissaoBD = new CadSeg_permissaoBD($conexao);
  }

  function inserirSeg_permissao($seg_permissao) { 
    return $this->cadSeg_permissaoBD->inserirSeg_permissao($seg_permissao->getId_tipo_transacao(), $seg_permissao->getId_grupo_usuario(), $seg_permissao->getDt_permissao(), $seg_permissao->getPublicado(), $seg_permissao->getAtivo());
  }

  function alterarSeg_permissao($seg_permissao) { 
    return $this->cadSeg_permissaoBD->alterarSeg_permissao($seg_permissao->getId_tipo_transacao(), $seg_permissao->getId_grupo_usuario(), $seg_permissao->getDt_permissao(), $seg_permissao->getPublicado(), $seg_permissao->getAtivo());
  }

  function excluirSeg_permissao($seg_permissao) { 
    return $this->cadSeg_permissaoBD->excluirSeg_permissao($seg_permissao->getId_tipo_transacao(), $seg_permissao->getId_grupo_usuario());
  }

  function arrayToObject($va){ 
    return new Seg_permissao($va['id_tipo_transacao'], $va['id_grupo_usuario'], $va['dt_permissao'], $va['publicado'], $va['ativo']);
  }

  function getSeg_permissao($id_tipo_transacao, $id_grupo_usuario) { 
    if($rs = $this->cadSeg_permissaoBD->getSeg_permissao($id_tipo_transacao, $id_grupo_usuario))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllSeg_permissao($ini,$num) { 
    if($rs = $this->cadSeg_permissaoBD->getAllSeg_permissao($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>