<?php
require_once("constantes.php");
require_once("../classes/class.Login.php");
include("../classes/class.Fachada.php");
session_start();


ini_set("display_errors", 1);
error_reporting(1);

$fachada = new Fachada();

if(isset($_SESSION['oLoginAdm'])){
	//Instancia a classe de Templates
	$tpl = new Template("index-tpl.php");

	//HEAD
	$tpl->addFile("HEAD", "layout/head-tpl.php");
	include_once('layout/head.php');

	//TOPO
	$tpl->addFile("TOPO", "layout/header-tpl.php");
	include_once('layout/header.php');

	//menu principal do sistema
	$tpl->addFile("MENU", "layout/menu-tpl.php");
	include_once('layout/menu.php');

	if(is_object($_SESSION['oLoginAdm']->oUsuario)){
		$tpl->MENSAGEM = "";
		if(isset($_SESSION['sMsgPermissao']) && $_SESSION['sMsgPermissao'] != "")
			$tpl->MENSAGEM = $_SESSION['sMsgPermissao'];
		
		//MENU
		//require_once(PATH."painel/includes/menu_lateral.php");
		//$tpl->MENUINICIAL = "current";
	}

	//RODAPE
	$tpl->addFile("RODAPE", "layout/footer-tpl.php");
	include_once('layout/footer.php');
} else{

	//Instancia a classe de Templates
	$tpl = new Template("login-tpl.php");

	//HEAD
	$tpl->addFile("HEAD", "layout/head-tpl.php");
	include_once('layout/head.php');
}

//header("Location: usuario-consult.php");

$tpl->CAMINHO = '';

//Carrega o Template da pagina
$tpl->show();


?>