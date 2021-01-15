<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadSeg_categoria_tipo_transacaoBD_Pai extends CadBD{

  function CadSeg_categoria_tipo_transacaoBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirSeg_categoria_tipo_transacao($descricao, $dt_categoria_tipo_transacao, $publicado, $ativo) { 
    $sql = " INSERT INTO seg_categoria_tipo_transacao
                (descricao, dt_categoria_tipo_transacao, publicado, ativo)
                  VALUES('$descricao', '$dt_categoria_tipo_transacao', '$publicado', '$ativo')";
    return $this->executarInsAuto($sql);
  }

  function alterarSeg_categoria_tipo_transacao($id, $descricao, $dt_categoria_tipo_transacao, $publicado, $ativo) { 
    $sql = " UPDATE seg_categoria_tipo_transacao
              SET
               descricao = '$descricao',
               dt_categoria_tipo_transacao = '$dt_categoria_tipo_transacao',
               publicado = '$publicado',
               ativo = '$ativo'
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function excluirSeg_categoria_tipo_transacao($id) { 
    $sql = " DELETE FROM seg_categoria_tipo_transacao
              WHERE
               id = '$id'";
    return $this->executarIUD($sql);
  }

  function getSeg_categoria_tipo_transacao($id) { 
    $sql = " SELECT * FROM seg_categoria_tipo_transacao
               WHERE
                ativo = '1'
                 AND id = '$id'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllSeg_categoria_tipo_transacao($ini,$num) { 
    $sql = " SELECT * FROM seg_categoria_tipo_transacao
              WHERE
                  ativo = '1'
              ORDER BY
                    id";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>