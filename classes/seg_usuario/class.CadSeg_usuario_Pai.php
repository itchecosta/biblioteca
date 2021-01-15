<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 24/02/2016 - 15:25:29

include_once dirname(__FILE__).'/class.CadSeg_usuarioBD.php';
include_once dirname(__FILE__).'/class.Seg_usuario.php';

class CadSeg_usuario_Pai{
  var $cadSeg_usuarioBD;

  function CadSeg_usuario_Pai($conexao = ''){
    $this->cadSeg_usuarioBD = new CadSeg_usuarioBD($conexao);
  }

  function inserirSeg_usuario($seg_usuario) { 
    return $this->cadSeg_usuarioBD->inserirSeg_usuario($seg_usuario->getId_grupo_usuario(), addslashes(htmlspecialchars ($seg_usuario->getNm_usuario())), addslashes(htmlspecialchars ($seg_usuario->getEmail())), addslashes(htmlspecialchars ($seg_usuario->getLogin())), addslashes(htmlspecialchars ($seg_usuario->getSenha())), addslashes(htmlspecialchars ($seg_usuario->getImagem())), Util::converteDataBanco($seg_usuario->getDt_usuario()), $seg_usuario->getAtivo());
  }

  function alterarSeg_usuario($seg_usuario) { 
    return $this->cadSeg_usuarioBD->alterarSeg_usuario($seg_usuario->getId_seg_usuario(), $seg_usuario->getId_grupo_usuario(), addslashes(htmlspecialchars ($seg_usuario->getNm_usuario())), addslashes(htmlspecialchars ($seg_usuario->getEmail())), addslashes(htmlspecialchars ($seg_usuario->getLogin())), addslashes(htmlspecialchars ($seg_usuario->getSenha())), addslashes(htmlspecialchars ($seg_usuario->getImagem())), Util::converteDataBanco($seg_usuario->getDt_usuario()), $seg_usuario->getAtivo());
  }

  function excluirSeg_usuario($seg_usuario) { 
    return $this->cadSeg_usuarioBD->excluirSeg_usuario($seg_usuario->getId_seg_usuario());
  }

  function arrayToObject($va){ 
    return new Seg_usuario($va['id_seg_usuario'], $va['id_grupo_usuario'], $va['nm_usuario'], $va['email'], $va['login'], $va['senha'], $va['imagem'], $va['dt_usuario'], $va['ativo']);
  }

  function getSeg_usuario($id_seg_usuario) { 
    if($rs = $this->cadSeg_usuarioBD->getSeg_usuario($id_seg_usuario))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllSeg_usuario($ini,$num) { 
    if($rs = $this->cadSeg_usuarioBD->getAllSeg_usuario($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>