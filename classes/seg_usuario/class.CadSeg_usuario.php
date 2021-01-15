<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 24/02/2016 - 15:25:29

include_once dirname(__FILE__).'/class.CadSeg_usuario_Pai.php';

class CadSeg_usuario extends CadSeg_usuario_Pai{

	function getSeg_usuarioPorLogin($sLogin) { 
    if($rs = $this->cadSeg_usuarioBD->getSeg_usuarioPorLogin($sLogin))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function desativarSeg_usuario($seg_usuario) { 
    return $this->cadSeg_usuarioBD->desativarSeg_usuario($seg_usuario->getId_seg_usuario());
  }

  function alterarSenhaSeg_usuario($seg_usuario,$senha) { 
    return $this->cadSeg_usuarioBD->alterarSenhaSeg_usuario($seg_usuario->getId_seg_usuario(),addslashes(htmlspecialchars ($seg_usuario->getSenha())));
  }

}
?>