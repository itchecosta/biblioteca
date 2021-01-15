<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

class Seg_transacao{

  function Seg_transacao($id_seg_transacao, $id_tipo_transacao, $id_usuario, $objeto, $ip, $dt_transacao, $publicado, $ativo){
   $this->id_seg_transacao = $id_seg_transacao;
   $this->id_tipo_transacao = $id_tipo_transacao;
   $this->id_usuario = $id_usuario;
   $this->objeto = $objeto;
   $this->ip = $ip;
   $this->dt_transacao = $dt_transacao;
   $this->publicado = $publicado;
   $this->ativo = $ativo;
  }

  function setAll($id_tipo_transacao = false, $id_usuario = false, $objeto = false, $ip = false, $dt_transacao = false, $publicado = false, $ativo = false){
    if($id_tipo_transacao !== false)
      $this->setId_tipo_transacao($id_tipo_transacao);
    if($id_usuario !== false)
      $this->setId_usuario($id_usuario);
    if($objeto !== false)
      $this->setObjeto($objeto);
    if($ip !== false)
      $this->setIp($ip);
    if($dt_transacao !== false)
      $this->setDt_transacao($dt_transacao);
    if($publicado !== false)
      $this->setPublicado($publicado);
    if($ativo !== false)
      $this->setAtivo($ativo);
  }

  function getId_seg_transacao(){ return $this->id_seg_transacao;}

  function getId_tipo_transacao(){ return $this->id_tipo_transacao;}

  function getId_usuario(){ return $this->id_usuario;}

  function getObjeto(){ return $this->objeto;}

  function getIp(){ return $this->ip;}

  function getDt_transacao(){ return $this->dt_transacao;}
  
  function getPublicado(){ return $this->publicado;}

  function getAtivo(){ return $this->ativo;}

  function setId_seg_transacao($x){ $this->id_seg_transacao = $x;}

  function setId_tipo_transacao($x){ $this->id_tipo_transacao = $x;}

  function setId_usuario($x){ $this->id_usuario = $x;}

  function setObjeto($x){ $this->objeto = $x;}

  function setIp($x){ $this->ip = $x;}

  function setDt_transacao($x){ $this->dt_transacao = $x;}

  function setPublicado($x){ $this->publicado = $x;}

  function setAtivo($x){ $this->ativo = $x;}

}
?>