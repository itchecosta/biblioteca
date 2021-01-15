<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:05

class Con_info_geral{

  function Con_info_geral($id, $titulo, $slogan, $descricao, $palavras, $copyright, $endereco, $telefone, $celular, $email, $logo, $favicon, $resumo, $dt_cadastro, $publicado, $ativo){
   $this->id = $id;
   $this->titulo = $titulo;
   $this->slogan = $slogan;
   $this->descricao = $descricao;
   $this->palavras = $palavras;
   $this->copyright = $copyright;
   $this->endereco = $endereco;
   $this->telefone = $telefone;
   $this->celular = $celular;
   $this->email = $email;
   $this->logo = $logo;
   $this->favicon = $favicon;
   $this->resumo = $resumo;
   $this->dt_cadastro = $dt_cadastro;
   $this->publicado = $publicado;
   $this->ativo = $ativo;
  }

  function setAll($titulo = false, $slogan = false, $descricao = false, $palavras = false, $copyright = false, $endereco = false, $telefone = false, $celular = false, $email = false, $logo = false, $favicon = false, $resumo = false, $dt_cadastro = false, $publicado = false, $ativo = false){
    if($titulo !== false)
      $this->setTitulo($titulo);
    if($slogan !== false)
      $this->setSlogan($slogan);
    if($descricao !== false)
      $this->setDescricao($descricao);
    if($palavras !== false)
      $this->setPalavras($palavras);
    if($copyright !== false)
      $this->setCopyright($copyright);
    if($endereco !== false)
      $this->setEndereco($endereco);
    if($telefone !== false)
      $this->setTelefone($telefone);
    if($celular !== false)
      $this->setCelular($celular);
    if($email !== false)
      $this->setEmail($email);
    if($logo !== false)
      $this->setLogo($logo);
    if($favicon !== false)
      $this->setFavicon($favicon);
    if($resumo !== false)
      $this->setResumo($resumo);
    if($dt_cadastro !== false)
      $this->setDt_cadastro($dt_cadastro);
    if($publicado !== false)
      $this->setPublicado($publicado);
    if($ativo !== false)
      $this->setAtivo($ativo);
  }

  function getId(){ return $this->id;}

  function getTitulo(){ return $this->titulo;}

  function getSlogan(){ return $this->slogan;}

  function getDescricao(){ return $this->descricao;}

  function getPalavras(){ return $this->palavras;}

  function getCopyright(){ return $this->copyright;}

  function getEndereco(){ return $this->endereco;}

  function getTelefone(){ return $this->telefone;}

  function getCelular(){ return $this->celular;}

  function getEmail(){ return $this->email;}

  function getLogo(){ return $this->logo;}

  function getFavicon(){ return $this->favicon;}

  function getResumo(){ return $this->resumo;}

  function getDt_cadastro(){ return $this->dt_cadastro;}

  function getPublicado(){ return $this->publicado;}

  function getAtivo(){ return $this->ativo;}

  function setId($x){ $this->id = $x;}

  function setTitulo($x){ $this->titulo = $x;}

  function setSlogan($x){ $this->slogan = $x;}

  function setDescricao($x){ $this->descricao = $x;}

  function setPalavras($x){ $this->palavras = $x;}

  function setCopyright($x){ $this->copyright = $x;}

  function setEndereco($x){ $this->endereco = $x;}

  function setTelefone($x){ $this->telefone = $x;}

  function setCelular($x){ $this->celular = $x;}

  function setEmail($x){ $this->email = $x;}

  function setLogo($x){ $this->logo = $x;}

  function setFavicon($x){ $this->favicon = $x;}

  function setResumo($x){ $this->resumo = $x;}

  function setDt_cadastro($x){ $this->dt_cadastro = $x;}

  function setPublicado($x){ $this->publicado = $x;}

  function setAtivo($x){ $this->ativo = $x;}

}
?>