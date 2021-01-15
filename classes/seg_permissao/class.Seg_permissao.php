<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

class Seg_permissao{

  function Seg_permissao($id_tipo_transacao, $id_grupo_usuario,$dt_permissao,$publicado,$ativo){
   $this->id_tipo_transacao = $id_tipo_transacao;
   $this->id_grupo_usuario 	= $id_grupo_usuario;
   $this->dt_permissao 		= $dt_permissao;
   $this->publicado 		= $publicado;
   $this->ativo 			= $ativo;

  }

  function getId_tipo_transacao(){ return $this->id_tipo_transacao;}

  function getId_grupo_usuario(){ return $this->id_grupo_usuario;}

  function getDt_permissao(){ return $this->dt_permissao;}
  
  function getPublicado(){ return $this->publicado;}

  function getAtivo(){ return $this->ativo;}

  function setId_tipo_transacao($x){ $this->id_tipo_transacao = $x;}

  function setId_grupo_usuario($x){ $this->id_grupo_usuario = $x;}

  function setDt_permissao($x){ $this->dt_permissao = $x;}

  function setPublicado($x){ $this->publicado = $x;}

  function setAtivo($x){ $this->ativo = $x;}

}
?>