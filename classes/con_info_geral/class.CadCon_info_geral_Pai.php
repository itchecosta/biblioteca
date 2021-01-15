<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:05

include_once dirname(__FILE__).'/class.CadCon_info_geralBD.php';
include_once dirname(__FILE__).'/class.Con_info_geral.php';

class CadCon_info_geral_Pai{
  var $cadCon_info_geralBD;

  function CadCon_info_geral_Pai($conexao = ''){
    $this->cadCon_info_geralBD = new CadCon_info_geralBD($conexao);
  }

  function inserirCon_info_geral($con_info_geral) { 
    return $this->cadCon_info_geralBD->inserirCon_info_geral(addslashes(htmlspecialchars($con_info_geral->getTitulo())), addslashes(htmlspecialchars($con_info_geral->getSlogan())), addslashes(htmlspecialchars($con_info_geral->getDescricao())), addslashes(htmlspecialchars($con_info_geral->getPalavras())), addslashes(htmlspecialchars($con_info_geral->getCopyright())), addslashes(htmlspecialchars($con_info_geral->getEndereco())), addslashes(htmlspecialchars($con_info_geral->getTelefone())), addslashes(htmlspecialchars($con_info_geral->getCelular())), addslashes(htmlspecialchars($con_info_geral->getEmail())), addslashes(htmlspecialchars($con_info_geral->getLogo())), addslashes(htmlspecialchars($con_info_geral->getFavicon())), $con_info_geral->getResumo(), Util::converteDataBanco($con_info_geral->getDt_cadastro()), $con_info_geral->getPublicado(), $con_info_geral->getAtivo());
  }

  function alterarCon_info_geral($con_info_geral) { 
    return $this->cadCon_info_geralBD->alterarCon_info_geral($con_info_geral->getId(), addslashes(htmlspecialchars($con_info_geral->getTitulo())), addslashes(htmlspecialchars($con_info_geral->getSlogan())), addslashes(htmlspecialchars($con_info_geral->getDescricao())), addslashes(htmlspecialchars($con_info_geral->getPalavras())), addslashes(htmlspecialchars($con_info_geral->getCopyright())), addslashes(htmlspecialchars($con_info_geral->getEndereco())), addslashes(htmlspecialchars($con_info_geral->getTelefone())), addslashes(htmlspecialchars($con_info_geral->getCelular())), addslashes(htmlspecialchars($con_info_geral->getEmail())), addslashes(htmlspecialchars($con_info_geral->getLogo())), addslashes(htmlspecialchars($con_info_geral->getFavicon())), $con_info_geral->getResumo(), Util::converteDataBanco($con_info_geral->getDt_cadastro()), $con_info_geral->getPublicado(), $con_info_geral->getAtivo());
  }

  function excluirCon_info_geral($con_info_geral) { 
    return $this->cadCon_info_geralBD->excluirCon_info_geral($con_info_geral->getId());
  }

  function arrayToObject($va){ 
    return new Con_info_geral($va['id'], $va['titulo'], $va['slogan'], $va['descricao'], $va['palavras'], $va['copyright'], $va['endereco'], $va['telefone'], $va['celular'], $va['email'], $va['logo'], $va['favicon'], $va['resumo'], $va['dt_cadastro'], $va['publicado'], $va['ativo']);
  }

  function getCon_info_geral($id) { 
    if($rs = $this->cadCon_info_geralBD->getCon_info_geral($id))
      return $this->arrayToObject(array_shift($rs));
    else
      return false;
  }

  function getAllCon_info_geral($ini,$num) { 
    if($rs = $this->cadCon_info_geralBD->getAllCon_info_geral($ini,$num))
      while($va = array_shift($rs))
        $vet[] = $this->arrayToObject($va);
    else
      return false;
    return $vet;
  }

}
?>