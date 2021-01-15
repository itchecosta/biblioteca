<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 10/05/2019 - 14:10:54

class Seg_tipo_transacao{

  function Seg_tipo_transacao($id_tipo_transacao, $id_categoria_tipo_transacao, $transacao, $dt_tipo_transacao, $publicado, $ativo){
   $this->id_tipo_transacao = $id_tipo_transacao;
   $this->id_categoria_tipo_transacao = $id_categoria_tipo_transacao;
   $this->transacao = $transacao;
   $this->dt_tipo_transacao = $dt_tipo_transacao;
   $this->publicado = $publicado;
   $this->ativo = $ativo;
  }

  function setAll($id_categoria_tipo_transacao = false, $transacao = false, $dt_tipo_transacao = false, $publicado = false, $ativo = false){
    if($id_categoria_tipo_transacao !== false)
      $this->setId_categoria_tipo_transacao($id_categoria_tipo_transacao);
    if($transacao !== false)
      $this->setTransacao($transacao);
    if($dt_tipo_transacao !== false)
      $this->setDt_tipo_transacao($dt_tipo_transacao);
    if($publicado !== false)
      $this->setPublicado($publicado);
    if($ativo !== false)
      $this->setAtivo($ativo);
  }

  function getId_tipo_transacao(){ return $this->id_tipo_transacao;}

  function getId_categoria_tipo_transacao(){ return $this->id_categoria_tipo_transacao;}

  function getTransacao(){ return $this->transacao;}

  function getDt_tipo_transacao(){ return $this->dt_tipo_transacao;}

  function getPublicado(){ return $this->publicado;}

  function getAtivo(){ return $this->ativo;}

  function setId_tipo_transacao($x){ $this->id_tipo_transacao = $x;}

  function setId_categoria_tipo_transacao($x){ $this->id_categoria_tipo_transacao = $x;}

  function setTransacao($x){ $this->transacao = $x;}

  function setDt_tipo_transacao($x){ $this->dt_tipo_transacao = $x;}

  function setPublicado($x){ $this->publicado = $x;}

  function setAtivo($x){ $this->ativo = $x;}

}
?>