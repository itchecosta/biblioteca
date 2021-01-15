<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_grupo_usuarioBD.php';
include_once dirname(__FILE__).'/class.Seg_grupo_usuario.php';

class CadSeg_grupo_usuario_Pai{
  var $cadSeg_grupo_usuarioBD;

  function CadSeg_grupo_usuario_Pai($conexao = ''){
    $this->cadSeg_grupo_usuarioBD = new CadSeg_grupo_usuarioBD($conexao);
  }

  function inserirSeg_grupo_usuario($seg_grupo_usuario) { 
    return $this->cadSeg_grupo_usuarioBD->inserirSeg_grupo_usuario(addslashes(htmlspecialchars ($seg_grupo_usuario->getNm_grupo_usuario())), Util::converteDataBanco($seg_grupo_usuario->getDt_grupo_usuario()), $seg_grupo_usuario->getPublicado(), $seg_grupo_usuario->getAtivo());
  }

  function alterarSeg_grupo_usuario($seg_grupo_usuario) { 
    return $this->cadSeg_grupo_usuarioBD->alterarSeg_grupo_usuario($seg_grupo_usuario->getId_seg_grupo_usuario(), addslashes(htmlspecialchars ($seg_grupo_usuario->getNm_grupo_usuario())), Util::converteDataBanco($seg_grupo_usuario->getDt_grupo_usuario()), $seg_grupo_usuario->getPublicado(), $seg_grupo_usuario->getAtivo());
  }

  function excluirSeg_grupo_usuario($seg_grupo_usuario) { 
    return $this->cadSeg_grupo_usuarioBD->excluirSeg_grupo_usuario($seg_grupo_usuario->getId_seg_grupo_usuario());
  }

  function arrayToObject($va){ 
    return new Seg_grupo_usuario($va['id_seg_grupo_usuario'], $va['nm_grupo_usuario'], $va['dt_grupo_usuario'], $va['publicado'], $va['ativo']);
  }

  function getSeg_grupo_usuario($id) { 
    if($rs = $this->cadSeg_grupo_usuarioBD->getSeg_grupo_usuario($id))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllSeg_grupo_usuario($ini,$num) { 
    if($rs = $this->cadSeg_grupo_usuarioBD->getAllSeg_grupo_usuario($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>