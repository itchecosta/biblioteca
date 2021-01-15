<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

class Seg_grupo_usuario{

  function Seg_grupo_usuario($id_seg_grupo_usuario, $nm_grupo_usuario, $dt_grupo_usuario, $publicado, $ativo){
   $this->id_seg_grupo_usuario = $id_seg_grupo_usuario;
   $this->nm_grupo_usuario = $nm_grupo_usuario;
   $this->dt_grupo_usuario = $dt_grupo_usuario;
   $this->publicado = $publicado;
   $this->ativo = $ativo;
  }

  function setAll($nm_grupo_usuario = false, $dt_grupo_usuario = false, $publicado = false, $ativo = false){
    if($nm_grupo_usuario !== false)
      $this->setNm_grupo_usuario($nm_grupo_usuario);
    if($dt_grupo_usuario !== false)
      $this->setDt_grupo_usuario($dt_grupo_usuario);
    if($publicado !== false)
      $this->setPublicado($publicado);
    if($ativo !== false)
      $this->setAtivo($ativo);
  }

  function getId_seg_grupo_usuario(){ return $this->id_seg_grupo_usuario;}

  function getNm_grupo_usuario(){ return $this->nm_grupo_usuario;}

  function getDt_grupo_usuario(){ return $this->dt_grupo_usuario;}

  function getPublicado(){ return $this->publicado;}

  function getAtivo(){ return $this->ativo;}

  function setId_seg_grupo_usuario($x){ $this->id_seg_grupo_usuario = $x;}

  function setNm_grupo_usuario($x){ $this->nm_grupo_usuario = $x;}

  function setDt_grupo_usuario($x){ $this->dt_grupo_usuario = $x;}

  function setPublicado($x){ $this->publicado = $x;}
  
  function setAtivo($x){ $this->ativo = $x;}

}
?>