<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadSeg_transacao_acessoBD_Pai extends CadBD{

  function CadSeg_transacao_acessoBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirSeg_transacao_acesso($id_tipo_transacao, $id_usuario, $objeto, $ip, $dt_transacao) { 
    $sql = " INSERT INTO seg_transacao_acesso
                (id_tipo_transacao, id_usuario, objeto, ip, dt_transacao)
                  VALUES('$id_tipo_transacao', '$id_usuario', '$objeto', '$ip', '$dt_transacao')";

    return $this->executarInsAuto($sql);
  }

  function alterarSeg_transacao_acesso($id_transacao_acesso, $id_tipo_transacao, $id_usuario, $objeto, $ip, $dt_transacao) { 
    $sql = " UPDATE seg_transacao_acesso
              SET
               id_tipo_transacao = '$id_tipo_transacao',
               id_usuario = '$id_usuario',
               objeto = '$objeto',
               ip = '$ip',
               dt_transacao = '$dt_transacao'
              WHERE
               id_transacao_acesso = '$id_transacao_acesso'";
    return $this->executarIUD($sql);
  }

  function excluirSeg_transacao_acesso($id_transacao_acesso) { 
    $sql = " DELETE FROM seg_transacao_acesso
              WHERE
               id_transacao_acesso = '$id_transacao_acesso'";
    return $this->executarIUD($sql);
  }

  function getSeg_transacao_acesso($id_transacao_acesso) { 
    $sql = " SELECT * FROM seg_transacao_acesso
               WHERE
                 id_transacao_acesso = '$id_transacao_acesso'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllSeg_transacao_acesso($ini,$num) { 
    $sql = " SELECT * FROM seg_transacao_acesso
      ORDER BY
                    id_transacao_acesso";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>