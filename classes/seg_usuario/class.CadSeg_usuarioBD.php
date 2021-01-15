<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 24/02/2016 - 15:25:29

include_once dirname(__FILE__).'/class.CadSeg_usuarioBD_Pai.php';

class CadSeg_usuarioBD extends CadSeg_usuarioBD_Pai{

	function getSeg_usuarioPorLogin($sLogin) { 
    $sql = " SELECT * FROM seg_usuario
               WHERE
               	ativo = '1' 
               AND login = '$sLogin'";
    $rs = $this->con->execute($sql);
    return $this->con->fetch_array($rs);
  }

  function desativarSeg_usuario($id_seg_usuario) { 
    $sql = " UPDATE seg_usuario
              SET
               ativo = 0
              WHERE
               id_seg_usuario = '$id_seg_usuario'";
    return $this->executarIUD($sql);
  }

  function alterarSenhaSeg_usuario($id_seg_usuario,$senha) { 
    $sql = " UPDATE seg_usuario
              SET
               senha = '$senha'
              WHERE
               id_seg_usuario = '$id_seg_usuario'";
    return $this->executarIUD($sql);
  }

}
?>