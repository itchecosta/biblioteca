<?php 


require_once("../constantes.php");
require_once(PATH."valida_usuario.php");
require_once(PATH."../classes/class.Fachada.php");

ini_set("display_errors", 1 ); error_reporting(1);

if (@$_REQUEST["operacao"] == "cadastrar") {

$fachada = new Fachada();

$id 			= addslashes(@$_REQUEST["id"]);
$nm_livro 			= addslashes(@$_REQUEST["nm_livro"]);
$slug 			= Util::createSlug(@$_REQUEST["nm_livro"]);
$descricao 			= addslashes(@$_REQUEST["descricao"]);

/* // -------------------------------------------------------------------------->
 //UPLOAD DAS IMAGENS */
 
 $imagem = @$_FILES['imagem']['name'];
 $tipoarquivo = isset($_FILES["imagem"]) ? $_FILES["imagem"] : FALSE;
 
 $uploaddir = "../data/con-livro/";

 /* //SALVA A IMAGEM NA PASTA */
 @move_uploaded_file($_FILES['imagem']['tmp_name'], dirname(__FILE__)."/".$uploaddir. $_FILES['imagem']['name']);
 
 
if ($imagem != "") { /*//impede que salva so a data em vez da imagem */

	  $imagem = date("His") . ereg_replace("[^a-zA-Z0-9_.]", "", 
	  strtr($imagem, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
	  "aaaaeeiooouucAAAAEEIOOOUUC_"));
  
 }
 
  @rename($uploaddir. $_FILES['imagem']['name'], dirname(__FILE__)."/".$uploaddir. strtolower($imagem));

$imagem          = strtolower($imagem); 

/*// -------------------------------------------------------------------------->*/


$status 			= addslashes(@$_REQUEST["status"]);
$dt_cadastro 			= date("Y-m-d H:i:s");
$dt_alt 			= addslashes(@$_REQUEST["dt_alt"]);
$publicado 			= addslashes(@$_REQUEST["publicado"]);
$ativo 			= 1;

$data__hd 			= Util::getDataAtual();
$hora__hd 			= Util::getHoraAtual();
$ip__hd 			= $_SERVER["HTTP_X_FORWARDED_FOR"]." - ".$_SERVER["REMOTE_ADDR"];


$ObjCon_livro = new Con_livro($id,$nm_livro,$slug,$descricao,$imagem,$status,$dt_cadastro,$dt_alt,$publicado,$ativo);

$inserir = $fachada->inserirCon_livro($ObjCon_livro);

 header("Location: index.php?op=sucess");

}




if (@$_REQUEST["operacao"] == "alterar") {

$fachada = new Fachada();

$idcon_livro 		= addslashes(@$_REQUEST["fId"]);
$nm_livro 			= addslashes(@$_REQUEST["nm_livro"]);
$slug 			= Util::createSlug(@$_REQUEST["nm_livro"]);
$descricao 			= addslashes(@$_REQUEST["descricao"]);
/*--------------------------------------------------------------------------> UPLOAD DAS IMAGENS*/ 
$imagem = @$_FILES['imagem']['name'];
$tipoarquivo = isset($_FILES["imagem"]) ? $_FILES["imagem"] : FALSE;
$uploaddir = "../data/con-livro/";
/*SALVA A IMAGEM NA PASTA*/ 
@move_uploaded_file($_FILES['imagem']['tmp_name'], dirname(__FILE__)."/".$uploaddir. $_FILES['imagem']['name']);
if ($imagem != "") { /*//impede que salva so a data em vez da imagem */	  
	$imagem = date("His") . ereg_replace("[^a-zA-Z0-9_.]", "", 	  
			strtr($imagem, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 	  
			"aaaaeeiooouucAAAAEEIOOOUUC_"));
}   
@rename($uploaddir. $_FILES['imagem']['name'], dirname(__FILE__)."/".$uploaddir. strtolower($imagem));
$imagem          = (!empty($_FILES['imagem']['name'])) ? strtolower($imagem) : $_REQUEST["fImagemAtual"];
/*-------------------------------------------------------------------------->*/
$status 			= addslashes(@$_REQUEST["status"]);
$dt_cadastro 			= addslashes(@$_REQUEST["dt_cadastro"]);
$dt_alt 			= date("Y-m-d H:i:s");
$publicado 			= addslashes(@$_REQUEST["publicado"]);
$ativo 			= addslashes(@$_REQUEST["ativo"]);


$ObjCon_livro = $fachada->getCon_livro($idcon_livro);

$ObjCon_livro->setNm_livro($nm_livro);
$ObjCon_livro->setSlug($slug);
$ObjCon_livro->setDescricao($descricao);
$ObjCon_livro->setImagem($imagem);
$ObjCon_livro->setStatus($status);
$ObjCon_livro->setDt_cadastro($dt_cadastro);
$ObjCon_livro->setDt_alt($dt_alt);
$ObjCon_livro->setPublicado($publicado);
$ObjCon_livro->setAtivo($ativo);

$alterar = $fachada->alterarCon_livro($ObjCon_livro);

 header("Location: index.php?op=sucess");

}






if (@$_REQUEST["operacao"] == "excluir") {

$fachada = new Fachada();

$idcon_livro 		= addslashes(@$_REQUEST["nId"]);

$Objcon_livro = $fachada->getCon_livro($idcon_livro);




$excluir = $fachada->desativarCon_livro($Objcon_livro);

 header("Location: index.php?op=sucess");

}

 ?>