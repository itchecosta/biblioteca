<?php
require_once("../../constantes.php");
require_once("../../valida_usuario.php");
require_once("../../../classes/class.Fachada.php");
require_once("../../../classes/class.FachadaSeguranca.php");

ini_set("display_errors", 1 ); error_reporting(1);

if (@$_REQUEST["operacao"] == "cadastrar") {

$fachada = new FachadaSeguranca();

$id 			          = addslashes(@$_REQUEST["fId"]);
$id_grupo_usuario 	= addslashes(@$_REQUEST["fGrupo"]);
$nm_usuario 			  = addslashes(@$_REQUEST["fNome"]);
$email 			        = addslashes(@$_REQUEST["fEmail"]);
$login 			        = addslashes(@$_REQUEST["fLogin"]);
$senha 			        = md5(@$_REQUEST["fSenhaUsuario"]);
//$imagem 			    = addslashes(@$_REQUEST["fImagem"]);
$dt_usuario 			  = date('Y-m-d H:i:s');
$ativo 			        = 1;

// -------------------------------------------------------------------------->
 //UPLOAD DAS IMAGENS
 $imagem = @$_FILES['fImagem']['name'];
 $tipoarquivo = isset($_FILES["fImagem"]) ? $_FILES["fImagem"] : FALSE;
 
    $uploaddir = "../../data/seg-usuario/";

 //SALVA A IMAGEM NA PASTA
 @move_uploaded_file($_FILES['fImagem']['tmp_name'], dirname(__FILE__)."/".$uploaddir. $_FILES['fImagem']['name']);
 
 
if ($imagem != "") { //impede que salva so a data em vez da imagem 

	  $imagem = date("His") . ereg_replace("[^a-zA-Z0-9_.]", "", 
	  strtr($imagem, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
	  "aaaaeeiooouucAAAAEEIOOOUUC_"));
  
 }
 
  @rename($uploaddir. $_FILES['fImagem']['name'], dirname(__FILE__)."/".$uploaddir. strtolower($imagem));

// -------------------------------------------------------------------------->
$imagem 			= strtolower($imagem);
    
    
$ObjSeg_usuario = new Seg_usuario($id,$id_grupo_usuario,$nm_usuario,$email,$login,$senha,$imagem,$dt_usuario,$ativo);

// print_r($ObjSeg_usuario);die;

$inserir = $fachada->inserirSeg_usuario($ObjSeg_usuario);

 header("Location: index.php?op=sucess");

}


if (@$_REQUEST["operacao"] == "alterar") {

$fachada = new FachadaSeguranca();

$id = $_REQUEST["fId"];

$ObjSeg_usuario = $fachada->getSeg_usuario($id);

if($ObjSeg_usuario != ''){

    $id 			         = addslashes(@$_REQUEST["fId"]);
    $id_grupo_usuario  = addslashes(@$_REQUEST["fGrupo"]);
    $nm_usuario 			 = addslashes(@$_REQUEST["fNome"]);
    $email 			       = addslashes(@$_REQUEST["fEmail"]);
    $login 			       = addslashes(@$_REQUEST["fLogin"]);
    // $senha 			       = md5(@$_REQUEST["fSenhaUsuario"]);
    //$imagem 			   = addslashes(@$_REQUEST["fImagem"]));
    $dt_usuario 			 = (@$_REQUEST["fDataCadastro"] != '') ? $_REQUEST["fDataCadastro"] : date('Y-m-d H:i:s');
    $ativo 			       = 1;

    if($_FILES['fImagem']['name'] != ''){
        // -------------------------------------------------------------------------->
         //UPLOAD DAS IMAGENS
         $imagem = @$_FILES['fImagem']['name'];
         $tipoarquivo = isset($_FILES["fImagem"]) ? $_FILES["fImagem"] : FALSE;

         $uploaddir = "../../data/seg-usuario/";
        
        //print_r(dirname(__FILE__)."/".$uploaddir. $_FILES['fImagem']['name']);die;

        //SALVA A IMAGEM NA PASTA
         @move_uploaded_file($_FILES['fImagem']['tmp_name'], $uploaddir. $_FILES['fImagem']['name']);


        if ($imagem != "") { //impede que salva so a data em vez da imagem 

              $imagem = date("His") . ereg_replace("[^a-zA-Z0-9_.]", "", 
              strtr($imagem, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
              "aaaaeeiooouucAAAAEEIOOOUUC_"));

         }

          @rename($uploaddir. $_FILES['fImagem']['name'], $uploaddir. strtolower($imagem));

        // -------------------------------------------------------------------------->
    } else {
        $imagem 		= addslashes((@$_REQUEST["fImagem"] != '') ? strtolower($imagem) : $ObjSeg_usuario->getImagem());
    }
     

        $ObjSeg_usuario->setId_grupo_usuario($id_grupo_usuario);
        $ObjSeg_usuario->setNm_usuario($nm_usuario);
        $ObjSeg_usuario->setLogin($login);
        $ObjSeg_usuario->setEmail($email);
        // $ObjSeg_usuario->setSenha($senha);
        $ObjSeg_usuario->setImagem($imagem);
        $ObjSeg_usuario->setDt_usuario($dt_usuario);
        $ObjSeg_usuario->setAtivo($ativo);

        $alterar = $fachada->alterarSeg_usuario($ObjSeg_usuario);

         header("Location: index.php?op=sucess");
    } else {
        header("Location: index.php?op=error");
    }

}

if (@$_REQUEST["operacao"] == "excluir") {

  $fachada = new FachadaSeguranca();

  $idseg_usuario 		= addslashes(@$_REQUEST["nId"]);

  $Objseg_usuario = $fachada->getSeg_usuario($idseg_usuario);

  $excluir = $fachada->desativarSeg_usuario($Objseg_usuario);

   header("Location: index.php?op=sucess");

}

if (@$_REQUEST["operacao"] == "alterarSenha") {

  $fachada = new FachadaSeguranca();

  $idseg_usuario    = addslashes(@$_REQUEST["fId"]);
  $senha            = md5(@$_REQUEST["fSenhaUsuario"]);

  $Objseg_usuario = $fachada->getSeg_usuario($idseg_usuario);

  $Objseg_usuario->setSenha($senha);

  $alterarSenha = $fachada->alterarSenhaSeg_usuario($Objseg_usuario);

   header("Location: index.php?op=sucess");

}

?>