<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadSeg_permissaoBD_Pai extends CadBD{

  function CadSeg_permissaoBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirSeg_permissao($id_tipo_transacao, $id_grupo_usuario, $dt_permissao, $publicado, $ativo) { 
    $sql = " INSERT INTO seg_permissao
                  VALUES('$id_tipo_transacao', '$id_grupo_usuario', '$dt_permissao', '$publicado', '$ativo')";
    return $this->executarIUD($sql);
  }

  function alterarSeg_permissao($id_tipo_transacao, $id_grupo_usuario, $dt_permissao, $publicado, $ativo) { 
    $sql = " UPDATE seg_permissao
               SET dt_permissao = 'dt_permissao',
                   publicado = '$publicado', 
                   ativo = '$ativo'
               WHERE id_tipo_transacao = '$id_tipo_transacao' AND id_grupo_usuario = '$id_grupo_usuario'";
    return $this->executarIUD($sql);
  }

  function excluirSeg_permissao($id_tipo_transacao, $id_grupo_usuario) { 
    $sql = " DELETE FROM seg_permissao
              WHERE
               id_tipo_transacao = '$id_tipo_transacao' AND 
               id_grupo_usuario = '$id_grupo_usuario'";
    return $this->executarIUD($sql);
  }

  function getSeg_permissao($id_tipo_transacao, $id_grupo_usuario) { 
    $sql = " SELECT * FROM seg_permissao
               WHERE
                    ativo = '1'
                AND id_tipo_transacao = '$id_tipo_transacao' 
                AND id_grupo_usuario = '$id_grupo_usuario'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllSeg_permissao($ini,$num) { 
    $sql = " SELECT * FROM seg_permissao
            WHERE
                  ativo = '1'
      ORDER BY
                    id_tipo_transacao, id_grupo_usuario";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>