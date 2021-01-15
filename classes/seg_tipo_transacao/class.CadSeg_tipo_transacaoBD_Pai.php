<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 10/05/2019 - 14:10:54

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadSeg_tipo_transacaoBD_Pai extends CadBD{

  function CadSeg_tipo_transacaoBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirSeg_tipo_transacao($id_categoria_tipo_transacao, $transacao, $dt_tipo_transacao, $publicado, $ativo) { 
    $sql = " INSERT INTO seg_tipo_transacao
                (id_categoria_tipo_transacao, transacao, dt_tipo_transacao, publicado, ativo)
                  VALUES('$id_categoria_tipo_transacao', '$transacao', '$dt_tipo_transacao', '$publicado', '$ativo')";
    return $this->executarInsAuto($sql);
  }

  function alterarSeg_tipo_transacao($id_tipo_transacao, $id_categoria_tipo_transacao, $transacao, $dt_tipo_transacao, $publicado, $ativo) { 
    $sql = " UPDATE seg_tipo_transacao
              SET
               id_categoria_tipo_transacao = '$id_categoria_tipo_transacao',
               transacao = '$transacao',
               dt_tipo_transacao = '$dt_tipo_transacao',
               publicado = '$publicado',
               ativo = '$ativo'
              WHERE
               id_tipo_transacao = '$id_tipo_transacao'";
    return $this->executarIUD($sql);
  }

  function excluirSeg_tipo_transacao($id_tipo_transacao) { 
    $sql = " DELETE FROM seg_tipo_transacao
              WHERE
               id_tipo_transacao = '$id_tipo_transacao'";
    return $this->executarIUD($sql);
  }

  function getSeg_tipo_transacao($id_tipo_transacao) { 
    $sql = " SELECT * FROM seg_tipo_transacao
              WHERE
                  ativo = '1'
                 AND id_tipo_transacao = '$id_tipo_transacao'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllSeg_tipo_transacao($ini,$num) { 
    $sql = " SELECT * FROM seg_tipo_transacao
              WHERE
                  ativo = '1'
      ORDER BY
                    id_tipo_transacao";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>