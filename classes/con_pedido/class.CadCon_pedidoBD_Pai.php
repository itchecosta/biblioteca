<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:06

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadCon_pedidoBD_Pai extends CadBD{

  function CadCon_pedidoBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirCon_pedido($id_usuario, $id_livro, $status, $dt_cadastro, $dt_alt, $ativo) { 
    $sql = " INSERT INTO con_pedido
(id_usuario, id_livro, status, dt_cadastro, dt_alt, ativo)
 VALUES('$id_usuario', '$id_livro', '$status', '$dt_cadastro', '$dt_alt', '$ativo')";
    return $this->executarIUD($sql);
  }

  function alterarCon_pedido($id, $id_usuario, $id_livro, $status, $dt_cadastro, $dt_alt, $ativo) { 
    $sql = " UPDATE con_pedido
              SET
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

  function excluirCon_pedido($id) { 
    $sql = " DELETE FROM con_pedido
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function getCon_pedido($id) { 
    $sql = " SELECT * FROM con_pedido
               WHERE
                 id = '$id'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllCon_pedido($ini,$num) { 
    $sql = " SELECT * FROM con_pedido
      ORDER BY
                    id DESC";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>