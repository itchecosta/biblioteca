<?php
require_once(PATH."../classes/class.Login.php");

session_start();
//CONTROLE DE SESSAO
//PARA IMPEDIR MULTIPLOS ACESSOS, DESTROI A SESSAO DO USUARIO LOGADO CASO FECHE O NAVEGADOR OU MUDE DE PAGINA
session_set_cookie_params(0, "/", $_SERVER["HTTP_HOST"], 0);

if(!isset($_SESSION['oLoginAdm'])){
	$_SESSION['sMsgPermissao'] = ACESSO_NEGADO;
	header("location: ../index.php?bErro=1");
	exit();
}else {
	//$dUltimoAcesso = $_SESSION["dUltimoAcesso"];
	$dUltimoAcesso = date("Y-m-d H:i:s");
	$dAgora = date("Y-m-d H:i:s");
	$nTempoTranscorrido = (strtotime($dAgora)-strtotime($dUltimoAcesso));
	
	if($nTempoTranscorrido >= 600) {
		//RESETAMOS O LOGIN DO USUARIO CASO TENHA PASSADO MAIS DE 10 MINUTOS DE INATIVIDADE
		$oFachadaSeguranca = new FachadaSeguranca();
		$nIdTipoTransacao = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Logout");
		if(isset($_SESSION['oLoginAdm']) && $_SESSION['oLoginAdm']->getIdUsuario() != "" && $_SESSION['oLoginAdm']->getIdUsuario() != 0){
			$oUsuarioLogoff = $oFachadaSeguranca->getSeg_usuario($_SESSION['oLoginAdm']->getIdUsuario());
			if(is_object($oUsuarioLogoff)){
				//$oUsuarioLogoff->setLogado(0);
				$sObjetoLogado = "Usuário ".$_SESSION['oLoginAdm']->oUsuario->getNmUsuario()." passou mais de 10 minutos em inatividade no sistema, liberando nova possibilidade de acesso para o login: ".$oUsuarioLogoff->getLogin();
				
				$oTransacaoLogado = new Seg_transacao_acesso('',$nIdTipoTransacao,$_SESSION['oLoginAdm']->oUsuario->getNm_usuario(),$sObjetoLogado,Util::MeuIp(),date('Y-m-d H:i:s'));
						
				$inserirAcesso = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoLogado);
				
				//TRANSACAO
				$sObjetoLogoff = "Logout automático efetuado por prazo de mais de 10 minutos de inatividade ocorrido. Usuario: ".$_SESSION['oLoginAdm']->oUsuario->getNmUsuario().", Login do usuário: ".$_SESSION['oLoginAdm']->oUsuario->getLogin();

				$oTransacaoOff = new Seg_transacao_acesso('',$nIdTipoTransacao,$_SESSION['oLoginAdm']->oUsuario->getNm_usuario(),$sObjetoLogoff,Util::MeuIp(),date('Y-m-d H:i:s'));
						
				$inserirOff = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoOff);
			}else{
				//TRANSACAO
				$sObjetoLogoff = "VERIFICAR ERRO INATIVIDADE: Usuário ".$_SESSION['oLoginAdm']->oUsuario->getNm_usuario()." não encontrado no sistema para logout automático!";

				$oTransacaoOff = new Seg_transacao_acesso('',$nIdTipoTransacao,$_SESSION['oLoginAdm']->oUsuario->getNm_usuario(),$sObjetoLogoff,Util::MeuIp(),date('Y-m-d H:i:s'));
						
				$inserirOff = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoOff);
			}//if(is_object($oUsuarioLogoff)){
		}else{
			//TRANSACAO
			$sObjetoLogoff = "VERIFICAR ERRO SESSAO INVALIDA: Tentativa de logout automático, sem nenhuma sessão da área administrativa estar ativa!";

			$oTransacaoOff = new Seg_transacao_acesso('',$nIdTipoTransacao,$_SESSION['oLoginAdm']->oUsuario->getNm_usuario(),$sObjetoLogoff,Util::MeuIp(),date('Y-m-d H:i:s'));
						
			$inserirOff = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoOff);
		}//if(isset($_SESSION['oLoginAdm']) && $_SESSION['oLoginAdm']->getIdUsuario() != "" && $_SESSION['oLoginAdm']->getIdUsuario() != 0){
		
		//session_destroy();
		$_SESSION['oLoginAdm'] = "";
		unset($_SESSION['oLoginAdm']);
		$_SESSION['sMsgPermissao'] = "Deslogado por ficar mais de 10 minutos ocioso!";
		header("location: ../index.php?bErro=0");
		exit();
	//senão, atualizo a data da sessão
	}else
		$_SESSION["dUltimoAcesso"] = $dAgora;
} 

$_SESSION['sMsgPermissao'] = (isset($_SESSION['sMsgPermissao'])) ? $_SESSION['sMsgPermissao'] : "";
?>