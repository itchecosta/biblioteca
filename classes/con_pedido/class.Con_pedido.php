<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:06

class Con_pedido{

  function Con_pedido($id, $id_usuario, $id_livro, $status, $dt_cadastro, $dt_alt, $ativo){
   $this->id = $id;
   $this->id_usuario = $id_usuario;
   $this->id_livro = $id_livro;
   $this->status = $status;
   $this->dt_cadastro = $dt_cadastro;
   $this->dt_alt = $dt_alt;
   $this->ativo = $ativo;
  }

  function setAll($id_usuario = false, $id_livro = false, $status = false, $dt_cadastro = false, $dt_alt = false, $ativo = false){
    if($id_usuario !== false)
      $this->setId_usuario($id_usuario);
    if($id_livro !== false)
      $this->setId_livro($id_livro);
    if($status !== false)
      $this->setStatus($status);
    if($dt_cadastro !== false)
      $this->setDt_cadastro($dt_cadastro);
    if($dt_alt !== false)
      $this->setDt_alt($dt_alt);
    if($ativo !== false)
      $this->setAtivo($ativo);
  }

  function getId(){ return $this->id;}

  function getId_usuario(){ return $this->id_usuario;}

  function getId_livro(){ return $this->id_livro;}

  function getStatus(){ return $this->status;}

  function getDt_cadastro(){ return $this->dt_cadastro;}

  function getDt_alt(){ return $this->dt_alt;}

  function getAtivo(){ return $this->ativo;}

  function setId($x){ $this->id = $x;}

  function setId_usuario($x){ $this->id_usuario = $x;}

  function setId_livro($x){ $this->id_livro = $x;}

  function setStatus($x){ $this->status = $x;}

  function setDt_cadastro($x){ $this->dt_cadastro = $x;}

  function setDt_alt($x){ $this->dt_alt = $x;}

  function setAtivo($x){ $this->ativo = $x;}

}
?>