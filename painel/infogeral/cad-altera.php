<?php
require_once("../../constantes.php");
require_once(PATH."painel/valida_usuario.php");
require_once(PATH."classes/class.Fachada.php");

ini_set("display_errors", 1 ); error_reporting(1);

$fachada = new Fachada();

//Instancia a classe de Templates
$tpl = new Template("cad-altera-tpl.php");

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

//OPERAÇÃO
$sOP = $_GET['sOP'];
switch($sOP){
    case 1:
        $tpl->OP = 'cadastrar';
    break;
    case 2:
        $tpl->OP = 'alterar';
    break;
}

$oInfogeral = $fachada->getCon_infogeral($_GET['nId']);

if(is_object($oInfogeral)){

    $tpl->IDINFOGERAL     = $oInfogeral->getId();
    $tpl->TITULO         = ($oInfogeral->getTitulo());
    $tpl->ENDERECO        = ($oInfogeral->getEndereco());
    $tpl->SLOGAN          = ($oInfogeral->getSlogan());
    $tpl->DESCRICAO     = ($oInfogeral->getDescricao());
    $tpl->PALAVRAS          = ($oInfogeral->getPalavras());
    $tpl->COPYRIGHT          = ($oInfogeral->getCopyright());
    

    $tpl->LOGOATUAL       = ($oInfogeral->getLogo() != '') ? $oInfogeral->getLogo() : '';
    if($sOP == 2) {
        $tpl->LOGO = ($oInfogeral->getLogo() != '') ? '<img src="{CAMINHO}data/infogeral/'.$oInfogeral->getLogo().'" class="img" alt="User Image" width="50" height="50" >' : '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="50" height="50" >';
    } else {
        $tpl->LOGO = '-';
    }

    $tpl->FAVICONATUAL       = ($oInfogeral->getFavicon() != '') ? $oInfogeral->getFavicon() : '';
    if($sOP == 2) {
        $tpl->FAVICON = ($oInfogeral->getFavicon() != '') ? '<img src="{CAMINHO}data/infogeral/'.$oInfogeral->getFavicon().'" class="img-circle" alt="User Image" width="50" height="50" >' : '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="50" height="50" >';
    } else {
        $tpl->FAVICON = '-';
    }
    
    $tpl->EMAIL             = $oInfogeral->getEmail();
    $tpl->TELEFONE          = ($oInfogeral->getTelefone());
    $tpl->CELULAR           = ($oInfogeral->getCelular());
    
    $tpl->RESUMO            = ($oInfogeral->getResumo());
    $tpl->SOBRE             = ($oInfogeral->getSobre());
    // $tpl->PUBLICADO         = ($oInfogeral->getPublicado() == 1) ? 'checked' : '';
    
    $tpl->DATACADASTRO      = $oInfogeral->getDt_info_geral();

}

$tpl->CAMINHO = ROOT;
//Carrega o Template da pagina
$tpl->show();

?>