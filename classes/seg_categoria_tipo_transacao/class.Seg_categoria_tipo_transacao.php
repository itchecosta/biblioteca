<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

class Seg_categoria_tipo_transacao{

  function Seg_categoria_tipo_transacao($id, $descricao, $dt_categoria_tipo_transacao, $publicado, $ativo){
   $this->id = $id;
   $this->descricao = $descricao;
   $this->dt_categoria_tipo_transacao = $dt_categoria_tipo_transacao;
   $this->publicado = $publicado;
   $this->ativo = $ativo;
   
  }

  function setAll($descricao = false, $dt_categoria_tipo_transacao = false, $publicado = false, $ativo = false){
    if($descricao !== false)
      $this->setDescricao($descricao);
    if($dt_categoria_tipo_transacao !== false)
      $this->setDt_categoria_tipo_transacao($dt_categoria_tipo_transacao);
    if($publicado !== false)
      $this->setPublicado($publicado);
    if($ativo !== false)
      $this->setAtivo($ativo);
  }

  function getId(){ return $this->id;}

  function getDescricao(){ return $this->descricao;}

  function getDt_categoria_tipo_transacao(){ return $this->dt_categoria_tipo_transacao;}

  function getPublicado(){ return $this->publicado;}

  function getAtivo(){ return $this->ativo;}

  function setId($x){ $this->id = $x;}

  function setDescricao($x){ $this->descricao = $x;}

  function setDt_categoria_tipo_transacao($x){ $this->dt_categoria_tipo_transacao = $x;}

  function setPublicado($x){ $this->publicado = $x;}

  function setAtivo($x){ $this->ativo = $x;}

}
?>