<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:06

include_once dirname(__FILE__).'/class.CadCon_pedidoBD.php';
include_once dirname(__FILE__).'/class.Con_pedido.php';

class CadCon_pedido_Pai{
  var $cadCon_pedidoBD;

  function CadCon_pedido_Pai($conexao = ''){
    $this->cadCon_pedidoBD = new CadCon_pedidoBD($conexao);
  }

  function inserirCon_pedido($con_pedido) { 
    return $this->cadCon_pedidoBD->inserirCon_pedido($con_pedido->getId_usuario(), $con_pedido->getId_livro(), $con_pedido->getStatus(), Util::converteDataBanco($con_pedido->getDt_cadastro()), Util::converteDataBanco($con_pedido->getDt_alt()), $con_pedido->getAtivo());
  }

  function alterarCon_pedido($con_pedido) { 
    return $this->cadCon_pedidoBD->alterarCon_pedido($con_pedido->getId(), $con_pedido->getId_usuario(), $con_pedido->getId_livro(), $con_pedido->getStatus(), Util::converteDataBanco($con_pedido->getDt_cadastro()), Util::converteDataBanco($con_pedido->getDt_alt()), $con_pedido->getAtivo());
  }

  function excluirCon_pedido($con_pedido) { 
    return $this->cadCon_pedidoBD->excluirCon_pedido($con_pedido->getId());
  }

  function arrayToObject($va){ 
    return new Con_pedido($va['id'], $va['id_usuario'], $va['id_livro'], $va['status'], $va['dt_cadastro'], $va['dt_alt'], $va['ativo']);
  }

  function getCon_pedido($id) { 
    if($rs = $this->cadCon_pedidoBD->getCon_pedido($id))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllCon_pedido($ini,$num) { 
    if($rs = $this->cadCon_pedidoBD->getAllCon_pedido($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>