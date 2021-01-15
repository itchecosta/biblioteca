<?php
require_once("../../constantes.php");
require_once("../../valida_usuario.php");
require_once("../../../classes/class.Fachada.php");
require_once("../../../classes/class.FachadaSeguranca.php");

ini_set("display_errors", 1 ); error_reporting(1);

$fachada = new Fachada();
$FachadaSeguranca = new FachadaSeguranca();

$bPermissaoVisualizar = $_SESSION['oLoginAdm']->verificaPermissao("Grupos","Visualizar");
$nIdTipoTransacao = $FachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Grupos","Visualizar");

if(!$bPermissaoVisualizar) {
	$sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION['oLoginAdm']->oUsuario->getNm_usuario()." tentou acessar a lista de grupos de usuários do sistema, porém não possui permissão para isso!";
	$oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION['oLoginAdm']->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date('Y-m-d H:i:s'));

	$inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

	$_SESSION['sMsgPermissao'] = ACESSO_NEGADO;
	header("location: ../../index.php?bErro=1");
	exit();
}else{
	$sObjeto = "Usuário ".$_SESSION['oLoginAdm']->oUsuario->getNm_usuario()." acessou a lista de grupos de usuários do sistema!";
	$oTransacao = new Seg_transacao("",$nIdTipoTransacao,$_SESSION['oLoginAdm']->getIdUsuario(),$sObjeto,Util::MeuIp(),date('Y-m-d H:i:s'),1,1);
	$inserirTransacao = $FachadaSeguranca->inserirSeg_transacao($oTransacao);
}


//Instancia a classe de Templates
$tpl = new Template("index-tpl.php");

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

//lista de usuários
$voGrupoUsuario = $FachadaSeguranca->getAllSeg_grupo_usuario(NULL,NULL);

if(count($voGrupoUsuario) > 0){
    foreach($voGrupoUsuario as $oGrupoUsuario){
        
        $tpl->IDGRUPO = $oGrupoUsuario->getId_seg_grupo_usuario();
        $tpl->GRUPO = $oGrupoUsuario->getNm_grupo_usuario();
        
    $tpl->block("LISTA_GRUPO_BLOCK");
    }
}else{
    $tpl->block("GRUPO_VAZIO");
}

$tpl->CAMINHO = CAMINHO;
//Carrega o Template da pagina
$tpl->show();


?>
