<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:06

include_once dirname(__FILE__).'/class.CadCon_livro_usuarioBD.php';
include_once dirname(__FILE__).'/class.Con_livro_usuario.php';

class CadCon_livro_usuario_Pai{
  var $cadCon_livro_usuarioBD;

  function CadCon_livro_usuario_Pai($conexao = ''){
    $this->cadCon_livro_usuarioBD = new CadCon_livro_usuarioBD($conexao);
  }

  function inserirCon_livro_usuario($con_livro_usuario) { 
    return $this->cadCon_livro_usuarioBD->inserirCon_livro_usuario($con_livro_usuario->getId_pedido(), $con_livro_usuario->getId_usuario(), $con_livro_usuario->getId_livro(), $con_livro_usuario->getStatus(), Util::converteDataBanco($con_livro_usuario->getDt_cadastro()), Util::converteDataBanco($con_livro_usuario->getDt_alt()), $con_livro_usuario->getAtivo());
  }

  function alterarCon_livro_usuario($con_livro_usuario) { 
    return $this->cadCon_livro_usuarioBD->alterarCon_livro_usuario($con_livro_usuario->getId(), $con_livro_usuario->getId_pedido(), $con_livro_usuario->getId_usuario(), $con_livro_usuario->getId_livro(), $con_livro_usuario->getStatus(), Util::converteDataBanco($con_livro_usuario->getDt_cadastro()), Util::converteDataBanco($con_livro_usuario->getDt_alt()), $con_livro_usuario->getAtivo());
  }

  function excluirCon_livro_usuario($con_livro_usuario) { 
    return $this->cadCon_livro_usuarioBD->excluirCon_livro_usuario($con_livro_usuario->getId());
  }

  function arrayToObject($va){ 
    return new Con_livro_usuario($va['id'], $va['id_pedido'], $va['id_usuario'], $va['id_livro'], $va['status'], $va['dt_cadastro'], $va['dt_alt'], $va['ativo']);
  }

  function getCon_livro_usuario($id) { 
    if($rs = $this->cadCon_livro_usuarioBD->getCon_livro_usuario($id))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllCon_livro_usuario($ini,$num) { 
    if($rs = $this->cadCon_livro_usuarioBD->getAllCon_livro_usuario($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>