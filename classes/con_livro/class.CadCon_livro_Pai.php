<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:05

include_once dirname(__FILE__).'/class.CadCon_livroBD.php';
include_once dirname(__FILE__).'/class.Con_livro.php';

class CadCon_livro_Pai{
  var $cadCon_livroBD;

  function CadCon_livro_Pai($conexao = ''){
    $this->cadCon_livroBD = new CadCon_livroBD($conexao);
  }

  function inserirCon_livro($con_livro) { 
    return $this->cadCon_livroBD->inserirCon_livro(addslashes(htmlspecialchars($con_livro->getNm_livro())), addslashes(htmlspecialchars($con_livro->getSlug())), $con_livro->getDescricao(), addslashes(htmlspecialchars($con_livro->getImagem())), $con_livro->getStatus(), Util::converteDataBanco($con_livro->getDt_cadastro()), Util::converteDataBanco($con_livro->getDt_alt()), $con_livro->getPublicado(), $con_livro->getAtivo());
  }

  function alterarCon_livro($con_livro) { 
    return $this->cadCon_livroBD->alterarCon_livro($con_livro->getId(), addslashes(htmlspecialchars($con_livro->getNm_livro())), addslashes(htmlspecialchars($con_livro->getSlug())), $con_livro->getDescricao(), addslashes(htmlspecialchars($con_livro->getImagem())), $con_livro->getStatus(), Util::converteDataBanco($con_livro->getDt_cadastro()), Util::converteDataBanco($con_livro->getDt_alt()), $con_livro->getPublicado(), $con_livro->getAtivo());
  }

  function excluirCon_livro($con_livro) { 
    return $this->cadCon_livroBD->excluirCon_livro($con_livro->getId());
  }

  function arrayToObject($va){ 
    return new Con_livro($va['id'], $va['nm_livro'], $va['slug'], $va['descricao'], $va['imagem'], $va['status'], $va['dt_cadastro'], $va['dt_alt'], $va['publicado'], $va['ativo']);
  }

  function getCon_livro($id) { 
    if($rs = $this->cadCon_livroBD->getCon_livro($id))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllCon_livro($ini,$num) { 
    if($rs = $this->cadCon_livroBD->getAllCon_livro($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>