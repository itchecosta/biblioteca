<?php
require_once("../../constantes.php");
require_once(PATH."painel/valida_usuario.php");
require_once(PATH."classes/class.Fachada.php");

ini_set("display_errors", 1 ); error_reporting(1);

$fachada = new Fachada();

//Instancia a classe de Templates
$tpl = new Template("index-tpl.php");

//

//HEAD
$tpl->addFile("HEAD", PATH."painel/layout/head-tpl.php");
include_once(PATH.'painel/layout/head.php');

//TOPO
$tpl->addFile("TOPO", PATH."painel/layout/header-tpl.php");
// include_once(PATH.'painel/layout/header.php');

//menu principal do sistema
$tpl->addFile("MENU", PATH."painel/layout/menu-tpl.php");
include_once(PATH.'painel/layout/menu.php');

//RODAPE
$tpl->addFile("RODAPE", PATH."painel/layout/footer-tpl.php");
//include_once('../../layout/footer.php');

//lista de Informações Gerais
$oInfogeral = $fachada->getCon_infogeral(1);

if(count($oInfogeral) > 0){
        $tpl->IDINFOGERAL      = $oInfogeral->getId();
        $tpl->TITULO           = ($oInfogeral->getTitulo());
        $tpl->ENDERECO         = ($oInfogeral->getEndereco());
	    $tpl->RESUMO           = html_entity_decode($oInfogeral->getResumo());
	    
        if((ROOT."data/infogeral/".$oInfogeral->getLogo())) {
            $tpl->LOGO = '<img src="{CAMINHO}data/infogeral/'.$oInfogeral->getLogo().'" class="img-circle" alt="User Image" width="100" height="100" >';
        } else {
            $tpl->LOGO = '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
        }

        if((ROOT."data/infogeral/".$oInfogeral->getFavicon())) {
            $tpl->FAVICON = '<img src="{CAMINHO}data/infogeral/'.$oInfogeral->getFavicon().'" class="img-circle" alt="User Image" width="100" height="100" >';
        } else {
            $tpl->FAVICON = '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
        }
       
    $tpl->block("LISTA_INFOGERAL_BLOCK");
}else{
    $tpl->block("INFOGERAL_VAZIO");
}



$tpl->CAMINHO = ROOT;
//Carrega o Template da pagina
$tpl->show();


?>
