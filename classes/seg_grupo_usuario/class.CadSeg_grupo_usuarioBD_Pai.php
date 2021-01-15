<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadSeg_grupo_usuarioBD_Pai extends CadBD{

  function CadSeg_grupo_usuarioBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirSeg_grupo_usuario($nm_grupo_usuario, $dt_grupo_usuario, $publicado, $ativo) { 
    $sql = " INSERT INTO seg_grupo_usuario
                (nm_grupo_usuario, dt_grupo_usuario, publicado, ativo)
                  VALUES('$nm_grupo_usuario', '$dt_grupo_usuario', '$publicado', '$ativo')";
    return $this->executarInsAuto($sql);
  }

  function alterarSeg_grupo_usuario($id_seg_grupo_usuario, $nm_grupo_usuario, $dt_grupo_usuario, $publicado, $ativo) { 
    $sql = " UPDATE seg_grupo_usuario
              SET
               nm_grupo_usuario = '$nm_grupo_usuario',
               dt_grupo_usuario = '$dt_grupo_usuario',
               publicado = '$publicado',
               ativo = '$ativo'
              WHERE
               id_seg_grupo_usuario = '$id_seg_grupo_usuario'";
    return $this->executarIUD($sql);
  }

  function excluirSeg_grupo_usuario($id_seg_grupo_usuario) { 
    $sql = " DELETE FROM seg_grupo_usuario
              WHERE
               id_seg_grupo_usuario = '$id_seg_grupo_usuario'";
    return $this->executarIUD($sql);
  }

  function getSeg_grupo_usuario($id_seg_grupo_usuario) { 
    $sql = " SELECT * FROM seg_grupo_usuario
               WHERE
                  ativo = '1'
                AND id_seg_grupo_usuario = '$id_seg_grupo_usuario'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllSeg_grupo_usuario($ini,$num) { 
    $sql = " SELECT * FROM seg_grupo_usuario
              WHERE
                  ativo = '1'
              ORDER BY
                    id_seg_grupo_usuario";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>