<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 24/02/2016 - 15:25:29

class Seg_usuario{

  function Seg_usuario($id_seg_usuario, $id_grupo_usuario, $nm_usuario, $email, $login, $senha, $imagem, $dt_usuario, $ativo){
   $this->id_seg_usuario = $id_seg_usuario;
   $this->id_grupo_usuario = $id_grupo_usuario;
   $this->nm_usuario = $nm_usuario;
   $this->email = $email;
   $this->login = $login;
   $this->senha = $senha;
   $this->imagem = $imagem;
   $this->dt_usuario = $dt_usuario;
   $this->ativo = $ativo;
  }

  function setAll($id_grupo_usuario = false, $nm_usuario = false, $email = false, $login = false, $senha = false, $imagem = false, $dt_usuario = false, $ativo = false){
    if($id_grupo_usuario !== false)
      $this->setId_grupo_usuario($id_grupo_usuario);
    if($nm_usuario !== false)
      $this->setNm_usuario($nm_usuario);
    if($email !== false)
      $this->setEmail($email);
    if($login !== false)
      $this->setLogin($login);
    if($senha !== false)
      $this->setSenha($senha);
    if($imagem !== false)
      $this->setImagem($imagem);
    if($dt_usuario !== false)
      $this->setDt_usuario($dt_usuario);
    if($ativo !== false)
      $this->setAtivo($ativo);
  }

  function getId_seg_usuario(){ return $this->id_seg_usuario;}

  function getId_grupo_usuario(){ return $this->id_grupo_usuario;}

  function getNm_usuario(){ return $this->nm_usuario;}

  function getEmail(){ return $this->email;}

  function getLogin(){ return $this->login;}

  function getSenha(){ return $this->senha;}

  function getImagem(){ return $this->imagem;}

  function getDt_usuario(){ return $this->dt_usuario;}

  function getAtivo(){ return $this->ativo;}

  function setId_seg_usuario($x){ $this->id_seg_usuario = $x;}

  function setId_grupo_usuario($x){ $this->id_grupo_usuario = $x;}

  function setNm_usuario($x){ $this->nm_usuario = $x;}

  function setEmail($x){ $this->email = $x;}

  function setLogin($x){ $this->login = $x;}

  function setSenha($x){ $this->senha = $x;}

  function setImagem($x){ $this->imagem = $x;}

  function setDt_usuario($x){ $this->dt_usuario = $x;}

  function setAtivo($x){ $this->ativo = $x;}

}
?>