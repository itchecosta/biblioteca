<?php
require_once("../../constantes.php");
require_once(PATH."painel/valida_usuario.php");
require_once(PATH."classes/class.Fachada.php");

ini_set("display_errors", 1 ); error_reporting(1);

/*if (@$_REQUEST["operacao"] == "cadastrar") {

$fachada = new Fachada();

$id               = @$_REQUEST["fId"];
$titulo                 = stripslashes(@$_REQUEST["fempresa"]);
$endereco               = stripslashes(@$_REQUEST["fendereco"]);
$resumo                  = stripslashes(@$_REQUEST["fresumo"]);
$dtpublicacao           = Util::datatousa(@$_REQUEST["fDataPublicacao"]);
$Dt_cadastro      = (@$_REQUEST["fDataCadastro"] != '') ? $_REQUEST["fDataCadastro"] : date('Y-m-d H:i:s');
$publicado              = (@$_REQUEST["fPublicado"] != '') ? 1 : 0;
$ativo              = 1;

// -------------------------------------------------------------------------->
 //UPLOAD DAS IMAGENS
 $logo = @$_FILES['fLogo']['name'];
 $tipoarquivo = isset($_FILES["fLogo"]) ? $_FILES["fLogo"] : FALSE;
 
    $uploaddir = ROOT."../data/infogeral/";

 //SALVA A IMAGEM NA PASTA
 @move_uploaded_file($_FILES['fLogo']['tmp_name'], $uploaddir. $_FILES['fLogo']['name']);
 
 
if ($logo != "") { //impede que salva so a data em vez da imagem 

      $logo = date("His") . ereg_replace("[^a-zA-Z0-9_.]", "", 
      strtr($logo, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
      "aaaaeeiooouucAAAAEEIOOOUUC_"));
  
 }
 
  @rename($uploaddir. $_FILES['fLogo']['name'], $uploaddir. strtolower($logo));

// -------------------------------------------------------------------------->
$logo             = strtolower($logo);    
    
$ObjCon_infogeral = new Con_infogeral($id,$titulo,$endereco,$logo,$resumo,$dtpublicacao,$Dt_cadastro,$publicado,$ativo);

$inserir = $fachada->inserirCon_infogeral($ObjCon_infogeral);

 header("Location: index.php?op=sucess");

}*/


if (@$_REQUEST["operacao"] == "alterar") {

$fachada = new Fachada();

$id = ($_REQUEST["fId"] != '') ? $_REQUEST["fId"] : $_POST["fId"];

$ObjCon_infogeral = $fachada->getCon_infogeral($id);

if($ObjCon_infogeral != ''){

$id                     = (@$_REQUEST["fId"] != '') ? @$_REQUEST["fId"] : $ObjCon_infogeral->getId();
$titulo                   = (@$_REQUEST["fTitulo"] != '') ? stripslashes((@$_REQUEST["fTitulo"])) : $ObjCon_infogeral->getTitulo();
$slogan                   = (@$_REQUEST["fSlogan"] != '') ? stripslashes((@$_REQUEST["fSlogan"])) : $ObjCon_infogeral->getSlogan();
$descricao                   = (@$_REQUEST["fDescricao"] != '') ? stripslashes((@$_REQUEST["fDescricao"])) : $ObjCon_infogeral->getDescricao();
$palavras                   = (@$_REQUEST["fPalavras"] != '') ? stripslashes((@$_REQUEST["fPalavras"])) : $ObjCon_infogeral->getPalavras();
$copyright                   = (@$_REQUEST["fCopyright"] != '') ? stripslashes((@$_REQUEST["fCopyright"])) : $ObjCon_infogeral->getCopyright();
$endereco                = (@$_REQUEST["fEndereco"] != '') ? stripslashes((@$_REQUEST["fEndereco"])) : $ObjCon_infogeral->getEndereco();
$resumo               = (@$_REQUEST["fResumo"] != '') ? stripslashes(@$_REQUEST["fResumo"]) : $ObjCon_infogeral->getResumo();
$sobre               = (@$_REQUEST["fSobre"] != '') ? stripslashes(@$_REQUEST["fSobre"]) : $ObjCon_infogeral->getSobre();

$email               = (@$_REQUEST["fEmail"] != '') ? stripslashes(@$_REQUEST["fEmail"]) : $ObjCon_infogeral->getEmail();
$telefone               = (@$_REQUEST["fTelefone"] != '') ? stripslashes(@$_REQUEST["fTelefone"]) : $ObjCon_infogeral->getTelefone();
$celular               = (@$_REQUEST["fCelular"] != '') ? stripslashes(@$_REQUEST["fCelular"]) : $ObjCon_infogeral->getCelular();

$Dt_infogeral            = (@$_REQUEST["fDataCadastro"] != '') ? $_REQUEST["fDataCadastro"] : date('Y-m-d H:i:s');
$publicado              = 1;
$ativo                  = 1;

if($_FILES['fLogo']['name'] != ''){
    // -------------------------------------------------------------------------->
     //UPLOAD DAS IMAGENS
     $logo = @$_FILES['fLogo']['name'];
     $tipoarquivo = isset($_FILES["fLogo"]) ? $_FILES["fLogo"] : FALSE;

     $uploaddir = "../data/infogeral/";
    
    //print_r(dirname(__FILE__)."/".$uploaddir. $_FILES['fLogo']['name']);die;

    //SALVA A IMAGEM NA PASTA
     @move_uploaded_file($_FILES['fLogo']['tmp_name'], dirname(__FILE__)."/".$uploaddir. $_FILES['fLogo']['name']);


    if ($logo != "") { //impede que salva so a data em vez da imagem 

          $logo = date("His") . ereg_replace("[^a-zA-Z0-9_.]", "", 
          strtr($logo, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
          "aaaaeeiooouucAAAAEEIOOOUUC_"));

     }

      @rename($uploaddir. $_FILES['fLogo']['name'], dirname(__FILE__)."/".$uploaddir. strtolower($logo));

    // -------------------------------------------------------------------------->
} else {
    $logo         = addslashes(utf8_decode((@$_REQUEST["fLogo"] != '') ? strtolower($logo) : $ObjCon_infogeral->getLogo()));
}

if($_FILES['fFavicon']['name'] != ''){
    // -------------------------------------------------------------------------->
     //UPLOAD DAS IMAGENS
     $favicon = @$_FILES['fFavicon']['name'];
     $tipoarquivo = isset($_FILES["fFavicon"]) ? $_FILES["fFavicon"] : FALSE;

     $uploaddir = "../data/infogeral/";
    
    //print_r(dirname(__FILE__)."/".$uploaddir. $_FILES['fFavicon']['name']);die;

    //SALVA A IMAGEM NA PASTA
     @move_uploaded_file($_FILES['fFavicon']['tmp_name'], dirname(__FILE__)."/".$uploaddir. $_FILES['fFavicon']['name']);


    if ($favicon != "") { //impede que salva so a data em vez da imagem 

          $favicon = date("His") . ereg_replace("[^a-zA-Z0-9_.]", "", 
          strtr($favicon, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
          "aaaaeeiooouucAAAAEEIOOOUUC_"));

     }

      @rename($uploaddir. $_FILES['fFavicon']['name'], dirname(__FILE__)."/".$uploaddir. strtolower($favicon));

    // -------------------------------------------------------------------------->
} else {
    $favicon         = addslashes(utf8_decode((@$_REQUEST["fFavicon"] != '') ? strtolower($favicon) : $ObjCon_infogeral->getFavicon()));
}

        $ObjCon_infogeral->setTitulo($titulo);
        $ObjCon_infogeral->setSlogan($slogan);
        $ObjCon_infogeral->setDescricao($descricao);
        $ObjCon_infogeral->setPalavras($palavras);
        $ObjCon_infogeral->setCopyright($copyright);
        $ObjCon_infogeral->setEndereco($endereco);
        $ObjCon_infogeral->setResumo($resumo);
        $ObjCon_infogeral->setSobre($sobre);
        $ObjCon_infogeral->setEmail($email);
        $ObjCon_infogeral->setTelefone($telefone);
        $ObjCon_infogeral->setCelular($celular);
        $ObjCon_infogeral->setLogo($logo);
        $ObjCon_infogeral->setFavicon($favicon);
        $ObjCon_infogeral->setDt_info_geral($Dt_infogeral);
        $ObjCon_infogeral->setPublicado($publicado);
        $ObjCon_infogeral->setAtivo($ativo);

        $alterar = $fachada->alterarCon_infogeral($ObjCon_infogeral);

         header("Location: index.php?op=sucess");
    } else {
        header("Location: index.php?op=error");
    }

}


/*if (@$_REQUEST["operacao"] == "excluir") {

$fachada = new Fachada();

$idCon_infogeral    = stripslashes(@$_REQUEST["nId"]);

$ObjCon_infogeral = $fachada->getCon_infogeral($idCon_infogeral);

$excluir = $fachada->excluirCon_infogeral($ObjCon_infogeral);

 header("Location: index.php?op=sucess");

}*/
?>