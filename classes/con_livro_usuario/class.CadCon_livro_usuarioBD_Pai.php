<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:06

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadCon_livro_usuarioBD_Pai extends CadBD{

  function CadCon_livro_usuarioBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirCon_livro_usuario($id_pedido, $id_usuario, $id_livro, $status, $dt_cadastro, $dt_alt, $ativo) { 
    $sql = " INSERT INTO con_livro_usuario
(id_pedido, id_usuario, id_livro, status, dt_cadastro, dt_alt, ativo)
 VALUES('$id_pedido', '$id_usuario', '$id_livro', '$status', '$dt_cadastro', '$dt_alt', '$ativo')";
    return $this->executarIUD($sql);
  }

  function alterarCon_livro_usuario($id, $id_pedido, $id_usuario, $id_livro, $status, $dt_cadastro, $dt_alt, $ativo) { 
    $sql = " UPDATE con_livro_usuario
              SET
               id_pedido = '$id_pedido',
               id_usuario = '$id_usuario',
               id_livro = '$id_livro',
               status = '$status',
               dt_cadastro = '$dt_cadastro',
               dt_alt = '$dt_alt',
               ativo = '$ativo'
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function excluirCon_livro_usuario($id) { 
    $sql = " DELETE FROM con_livro_usuario
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function getCon_livro_usuario($id) { 
    $sql = " SELECT * FROM con_livro_usuario
               WHERE
                 id = '$id'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllCon_livro_usuario($ini,$num) { 
    $sql = " SELECT * FROM con_livro_usuario
      ORDER BY
                    id DESC";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>