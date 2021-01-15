<?php
require_once("../../constantes.php");
require_once("../../valida_usuario.php");
require_once("../../../classes/class.Fachada.php");
require_once("../../../classes/class.FachadaSeguranca.php");

ini_set("display_errors", 1 ); error_reporting(1);

$fachada = new Fachada();
$FachadaSeguranca = new FachadaSeguranca();

$bPermissaoVisualizar = $_SESSION['oLoginAdm']->verificaPermissao("Transacao","Visualizar");
$nIdTipoTransacao = $FachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Transacao","Visualizar");

if(!$bPermissaoVisualizar) {
    $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION['oLoginAdm']->oUsuario->getNm_usuario()." tentou acessar a lista de Categorias de transações do sistema, porém não possui permissão para isso!";
    $oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION['oLoginAdm']->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date('Y-m-d H:i:s'));

    $inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

    $_SESSION['sMsgPermissao'] = ACESSO_NEGADO;
    header("location: ../../index.php?bErro=1");
    exit();
}else{
    $sObjeto = "Usuário ".$_SESSION['oLoginAdm']->oUsuario->getNm_usuario()." acessou a lista de Categorias de transações do sistema!";
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

//lista de CATEGORIAS
$voCategoriaTipoTransacao = $FachadaSeguranca->getAllSeg_categoria_tipo_transacao(NULL,NULL);

if(count($voCategoriaTipoTransacao) > 0){
    foreach($voCategoriaTipoTransacao as $oCategoriaTipoTransacao){
        
        $tpl->IDCATEGORIA = $oCategoriaTipoTransacao->getId();
        $tpl->CATEGORIA = $oCategoriaTipoTransacao->getDescricao();

        //RECUPERA TODOS TIPO TRANSAÇÃO DAS CATEGORIAS
		$voTipoTransacao = $FachadaSeguranca->getAllSeg_tipo_transacaoPorCategoria($oCategoriaTipoTransacao->getId(),NULL,NULL);
		if(count($voTipoTransacao) > 0){
			foreach ($voTipoTransacao as $key => $oTipoTransacao) {
				# code...
				//$tpl->IDTRANSACAO = $oTipoTransacao->getId();
				$tpl->TRANSACAO = $oTipoTransacao->getTransacao();

				$tpl->block("TRANSACAO_BLOCK");
			}
		}
        
    $tpl->block("LISTA_CATEGORIA_BLOCK");
    }
}else{
    $tpl->block("CATEGORIA_VAZIO");
}



$tpl->CAMINHO = CAMINHO;
//Carrega o Template da pagina
$tpl->show();


?>
