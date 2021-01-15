<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 24/02/2016 - 15:25:29

include_once dirname(__FILE__).'../../class.CadBD.php';

class CadSeg_usuarioBD_Pai extends CadBD{

  function CadSeg_usuarioBD_Pai($conexao = ""){
    $this->CadBD($conexao);
  }

  function inserirSeg_usuario($id_grupo_usuario, $nm_usuario, $email, $login, $senha, $imagem, $dt_usuario, $ativo) { 
    $sql = " INSERT INTO seg_usuario
                (id_grupo_usuario, nm_usuario, email, login, senha, imagem, dt_usuario, ativo)
                  VALUES('$id_grupo_usuario', '$nm_usuario', '$email', '$login', '$senha', '$imagem', '$dt_usuario', '$ativo')";
    return $this->executarInsAuto($sql);
  }

  function alterarSeg_usuario($id_seg_usuario, $id_grupo_usuario, $nm_usuario, $email, $login, $senha, $imagem, $dt_usuario, $ativo) { 
    $sql = " UPDATE seg_usuario
              SET
               id_grupo_usuario = '$id_grupo_usuario',
               nm_usuario = '$nm_usuario',
               email = '$email',
               login = '$login',
               senha = '$senha',
               imagem = '$imagem',
               dt_usuario = '$dt_usuario',
               ativo = '$ativo'
              WHERE
               id_seg_usuario = '$id_seg_usuario'";
    return $this->executarIUD($sql);
  }

  function excluirSeg_usuario($id_seg_usuario) { 
    $sql = " DELETE FROM seg_usuario
              WHERE
               id_seg_usuario = '$id_seg_usuario'";
    return $this->executarIUD($sql);
  }

  function getSeg_usuario($id_seg_usuario) { 
    $sql = " SELECT * FROM seg_usuario
               WHERE
                  ativo = '1'
                 and id_seg_usuario = '$id_seg_usuario'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function getAllSeg_usuario($ini,$num) { 
    $sql = " SELECT * FROM seg_usuario
              WHERE
                ativo = '1'
              ORDER BY
                    nm_usuario ASC";
    if(($ini !== NULL) && ($num !== NULL))
	    $sql .=" LIMIT $ini,$num ";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

}
?>