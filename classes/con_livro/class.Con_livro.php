<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:05

class Con_livro{

  function Con_livro($id, $nm_livro, $slug, $descricao, $imagem, $status, $dt_cadastro, $dt_alt, $publicado, $ativo){
   $this->id = $id;
   $this->nm_livro = $nm_livro;
   $this->slug = $slug;
   $this->descricao = $descricao;
   $this->imagem = $imagem;
   $this->status = $status;
   $this->dt_cadastro = $dt_cadastro;
   $this->dt_alt = $dt_alt;
   $this->publicado = $publicado;
   $this->ativo = $ativo;
  }

  function setAll($nm_livro = false, $slug = false, $descricao = false, $imagem = false, $status = false, $dt_cadastro = false, $dt_alt = false, $publicado = false, $ativo = false){
    if($nm_livro !== false)
      $this->setNm_livro($nm_livro);
    if($slug !== false)
      $this->setSlug($slug);
    if($descricao !== false)
      $this->setDescricao($descricao);
    if($imagem !== false)
      $this->setImagem($imagem);
    if($status !== false)
      $this->setStatus($status);
    if($dt_cadastro !== false)
      $this->setDt_cadastro($dt_cadastro);
    if($dt_alt !== false)
      $this->setDt_alt($dt_alt);
    if($publicado !== false)
      $this->setPublicado($publicado);
    if($ativo !== false)
      $this->setAtivo($ativo);
  }

  function getId(){ return $this->id;}

  function getNm_livro(){ return $this->nm_livro;}

  function getSlug(){ return $this->slug;}

  function getDescricao(){ return $this->descricao;}

  function getImagem(){ return $this->imagem;}

  function getStatus(){ return $this->status;}

  function getDt_cadastro(){ return $this->dt_cadastro;}

  function getDt_alt(){ return $this->dt_alt;}

  function getPublicado(){ return $this->publicado;}

  function getAtivo(){ return $this->ativo;}

  function setId($x){ $this->id = $x;}

  function setNm_livro($x){ $this->nm_livro = $x;}

  function setSlug($x){ $this->slug = $x;}

  function setDescricao($x){ $this->descricao = $x;}

  function setImagem($x){ $this->imagem = $x;}

  function setStatus($x){ $this->status = $x;}

  function setDt_cadastro($x){ $this->dt_cadastro = $x;}

  function setDt_alt($x){ $this->dt_alt = $x;}

  function setPublicado($x){ $this->publicado = $x;}

  function setAtivo($x){ $this->ativo = $x;}

}
?>