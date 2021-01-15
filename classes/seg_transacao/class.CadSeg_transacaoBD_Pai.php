<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadSeg_transacaoBD_Pai extends CadBD{

  function CadSeg_transacaoBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirSeg_transacao($id_tipo_transacao, $id_usuario, $objeto, $ip, $dt_transacao, $publicado, $ativo) { 
    $sql = " INSERT INTO seg_transacao
                (id_tipo_transacao, id_usuario, objeto, ip, dt_transacao, publicado, ativo)
                  VALUES('$id_tipo_transacao', '$id_usuario', '$objeto', '$ip', '$dt_transacao', '$publicado', '$ativo')";
    return $this->executarInsAuto($sql);
  }

  function alterarSeg_transacao($id_seg_transacao, $id_tipo_transacao, $id_usuario, $objeto, $ip, $dt_transacao, $publicado, $ativo) { 
    $sql = " UPDATE seg_transacao
              SET
               id_tipo_transacao = '$id_tipo_transacao',
               id_usuario = '$id_usuario',
               objeto = '$objeto',
               ip = '$ip',
               dt_transacao = '$dt_transacao',
               publicado = '$publicado',
               ativo = '$ativo'
              WHERE
               id_seg_transacao = '$id_seg_transacao'";
    return $this->executarIUD($sql);
  }

  function excluirSeg_transacao($id_seg_transacao) { 
    $sql = " DELETE FROM seg_transacao
              WHERE
               id_seg_transacao = '$id_seg_transacao'";
    return $this->executarIUD($sql);
  }

  function getSeg_transacao($id_seg_transacao) { 
    $sql = " SELECT * FROM seg_transacao
               WHERE
                  ativo = '1'
                 AND id_seg_transacao = '$id_seg_transacao'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllSeg_transacao($ini,$num) { 
    $sql = " SELECT * FROM seg_transacao
              WHERE
                  ativo = '1'
      ORDER BY
                    id_seg_transacao";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>