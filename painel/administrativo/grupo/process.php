<?php
require_once("../../constantes.php");
require_once("../../valida_usuario.php");
require_once("../../../classes/class.Fachada.php");
require_once("../../../classes/class.FachadaSeguranca.php");

ini_set("display_errors", 1 ); error_reporting(1);

if (@$_REQUEST["operacao"] == "cadastrar") {

$fachada = new FachadaSeguranca();

$id 			        = addslashes((@$_REQUEST["fId"]));
$nm_grupo_usuario 		= addslashes((@$_REQUEST["fNome"]));
$dt_grupo_usuario 		= (@$_REQUEST["fDataCadastro"] != '') ? $_REQUEST["fDataCadastro"] : date('Y-m-d H:i:s');
$publicado 				= 1;
$ativo 			        = 1;
    
$ObjSeg_grupo_usuario = new Seg_grupo_usuario($id,$nm_grupo_usuario,$dt_grupo_usuario,$publicado,$ativo);

$inserir = $fachada->inserirSeg_grupo_usuario($ObjSeg_grupo_usuario);

 header("Location: index.php?op=sucess");

}


if (@$_REQUEST["operacao"] == "alterar") {

$fachada = new FachadaSeguranca();

$id 			        = addslashes((@$_REQUEST["fId"]));
$nm_grupo_usuario 		= addslashes((@$_REQUEST["fNome"]));
$dt_grupo_usuario 		= (@$_REQUEST["fDataCadastro"] != '') ? $_REQUEST["fDataCadastro"] : date('Y-m-d H:i:s');
$publicado 		       = 1;
$ativo 			        = 1;
     
$ObjSeg_grupo_usuario = $fachada->getSeg_grupo_usuario($id);

    if($ObjSeg_grupo_usuario != ''){

        $ObjSeg_grupo_usuario->setNm_grupo_usuario($nm_grupo_usuario);
        $ObjSeg_grupo_usuario->setDt_grupo_usuario($dt_grupo_usuario);
        $ObjSeg_grupo_usuario->setPublicado($publicado);
        $ObjSeg_grupo_usuario->setAtivo($ativo);

        $alterar = $fachada->alterarSeg_grupo_usuario($ObjSeg_grupo_usuario);

        header("Location: index.php?op=sucess");
    } else {
        header("Location: index.php?op=error");
    }

}


if (@$_REQUEST["operacao"] == "excluir") {

$fachada = new FachadaSeguranca();

$idseg_grupo_usuario 		= addslashes(@$_REQUEST["nId"]);

$Objseg_grupo_usuario = $fachada->getSeg_grupo_usuario($idseg_grupo_usuario);

$excluir = $fachada->excluirSeg_grupo_usuario($Objseg_grupo_usuario);

 header("Location: index.php?op=sucess");

}?>