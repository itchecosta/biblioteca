<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:05

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadCon_livroBD_Pai extends CadBD{

  function CadCon_livroBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirCon_livro($nm_livro, $slug, $descricao, $imagem, $status, $dt_cadastro, $dt_alt, $publicado, $ativo) { 
    $sql = " INSERT INTO con_livro
(nm_livro, slug, descricao, imagem, status, dt_cadastro, dt_alt, publicado, ativo)
 VALUES('$nm_livro', '$slug', '$descricao', '$imagem', '$status', '$dt_cadastro', '$dt_alt', '$publicado', '$ativo')";
    return $this->executarIUD($sql);
  }

  function alterarCon_livro($id, $nm_livro, $slug, $descricao, $imagem, $status, $dt_cadastro, $dt_alt, $publicado, $ativo) { 
    $sql = " UPDATE con_livro
              SET
               nm_livro = '$nm_livro',
               slug = '$slug',
               descricao = '$descricao',
               imagem = '$imagem',
               status = '$status',
               dt_cadastro = '$dt_cadastro',
               dt_alt = '$dt_alt',
               publicado = '$publicado',
               ativo = '$ativo'
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function excluirCon_livro($id) { 
    $sql = " DELETE FROM con_livro
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function getCon_livro($id) { 
    $sql = " SELECT * FROM con_livro
               WHERE
                 id = '$id'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllCon_livro($ini,$num) { 
    $sql = " SELECT * FROM con_livro
      ORDER BY
                    id DESC";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>