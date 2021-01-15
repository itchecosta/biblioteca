<?php
require_once("../../constantes.php");
require_once("../../valida_usuario.php");
require_once("../../../classes/class.Fachada.php");
require_once("../../../classes/class.FachadaSeguranca.php");

ini_set("display_errors", 1 ); error_reporting(1);

$fachada = new Fachada();
$FachadaSeguranca = new FachadaSeguranca();

//Instancia a classe de Templates
$tpl = new Template("cad-altera-tpl.php");

//HEAD
$tpl->addFile("HEAD", "../../layout/head-tpl.php");
include_once('../../layout/head.php');

//TOPO
$tpl->addFile("TOPO", "../../layout/header-tpl.php");
//include_once('../../layout/header.php');

//menu principal do sistema
$tpl->addFile("MENU", "../../layout/menu-tpl.php");
include_once('../../layout/menu.php');

//RODAPE
$tpl->addFile("RODAPE", "../../layout/footer-tpl.php");
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


if ($sOP == 2) {
	$oGrupoUsuario = $FachadaSeguranca->getSeg_grupo_usuario($_GET['nId']);
		if(is_object($oGrupoUsuario)){

		    $tpl->IDGRUPO = $oGrupoUsuario->getId_seg_grupo_usuario();
		    $tpl->GRUPO = $oGrupoUsuario->getNm_grupo_usuario();
		    
		    $tpl->DATACADASTRO = $oGrupoUsuario->getDt_grupo_usuario();
		}
}

$tpl->CAMINHO = CAMINHO;
//Carrega o Template da pagina
$tpl->show();


?>
