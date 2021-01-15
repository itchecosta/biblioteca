<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:05

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadCon_info_geralBD_Pai extends CadBD{

  function CadCon_info_geralBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirCon_info_geral($titulo, $slogan, $descricao, $palavras, $copyright, $endereco, $telefone, $celular, $email, $logo, $favicon, $resumo, $dt_cadastro, $publicado, $ativo) { 
    $sql = " INSERT INTO con_info_geral
(titulo, slogan, descricao, palavras, copyright, endereco, telefone, celular, email, logo, favicon, resumo, dt_cadastro, publicado, ativo)
 VALUES('$titulo', '$slogan', '$descricao', '$palavras', '$copyright', '$endereco', '$telefone', '$celular', '$email', '$logo', '$favicon', '$resumo', '$dt_cadastro', '$publicado', '$ativo')";
    return $this->executarIUD($sql);
  }

  function alterarCon_info_geral($id, $titulo, $slogan, $descricao, $palavras, $copyright, $endereco, $telefone, $celular, $email, $logo, $favicon, $resumo, $dt_cadastro, $publicado, $ativo) { 
    $sql = " UPDATE con_info_geral
              SET
               titulo = '$titulo',
               slogan = '$slogan',
               descricao = '$descricao',
               palavras = '$palavras',
               copyright = '$copyright',
               endereco = '$endereco',
               telefone = '$telefone',
               celular = '$celular',
               email = '$email',
               logo = '$logo',
               favicon = '$favicon',
               resumo = '$resumo',
               dt_cadastro = '$dt_cadastro',
               publicado = '$publicado',
               ativo = '$ativo'
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function excluirCon_info_geral($id) { 
    $sql = " DELETE FROM con_info_geral
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function getCon_info_geral($id) { 
    $sql = " SELECT * FROM con_info_geral
               WHERE
                 id = '$id'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllCon_info_geral($ini,$num) { 
    $sql = " SELECT * FROM con_info_geral
      ORDER BY
                    id DESC";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>