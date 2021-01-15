<?php 
require_once("../../constantes.php");
include("../../../classes/class.FachadaSeguranca.php");
require_once("../../../classes/class.Login.php");
session_start();

// print_r($_POST);die;

$sOP = (isset($_POST['sOP']) && $_POST['sOP'] != "") ? $_POST['sOP'] : ((isset($_GET['sOP']) && $_GET['sOP'] != "") ? $_GET['sOP'] : "");

if((isset($sOP) && $sOP == "Logar") && ((isset($_POST['fLogin']) && $_POST['fLogin'] == "") || (isset($_POST['fSenha']) && $_POST['fSenha'] == ""))){
	$_SESSION['sMsgPermissao'] = "Informe o login e a senha para ter acesso ao Painel Administrativo!";
	header("Location: ../../index.php?bErro=1");
	echo "0_".$_SESSION['sMsgPermissao'];
	exit();
}

switch($sOP){
	case "Logar":
		$oLoginAdm = new Login();
		if($oLoginAdm->logarUsuarioPainel($_POST['fLogin'],$_POST['fSenha'])) {
			$_SESSION['oLoginAdm'] = $oLoginAdm;
			$_SESSION['sMsgPermissao'] = "";
			$_SESSION["dUltimoAcesso"]= date("Y-m-d H:i:s");
			// $sHeader = "../../index.php?bErro=0";
			$json = json_encode(array('success' => true,'msg' => 'Login efetuado com sucesso!'));
    		die($json);
			//echo "1_";
		} else {
			$_SESSION['sMsgPermissao'] = "Problemas na identificação. Verifique se os seus dados estão corretos.";
			// $sHeader = "../../index.php?bErro=1";
			//echo "2_".$_SESSION['sMsgPermissao'];
			$json = json_encode(array('success' => false,'msg' => 'Problemas na identificação. Verifique se os seus dados estão corretos.'));
    		die($json);
		}
	break;
	case "Logoff":
		$oFachadaSeguranca = new FachadaSeguranca();
		//$nIdTipoTransacao = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Logout",BANCO);
		if(isset($_SESSION['oLoginAdm']) && $_SESSION['oLoginAdm']->getIdUsuario() != "" && $_SESSION['oLoginAdm']->getIdUsuario() != 0){
			$oUsuarioLogoff = $oFachadaSeguranca->getSeg_usuario($_SESSION['oLoginAdm']->getIdUsuario());

			if(is_object($oUsuarioLogoff)){

				$nIdTipoTransacaoLogado = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Logout");
				$sObjetoLogado = "Usuário ".$_SESSION['oLoginAdm']->oUsuario->getNm_usuario()." liberou a disponibilidade de novo login para o usuário: ".$oUsuarioLogoff->getLogin();
				$oTransacaoLogado = new Seg_transacao_acesso('',$nIdTipoTransacaoLogado,$_SESSION['oLoginAdm']->getIdUsuario(),$sObjetoLogado,Util::MeuIp(),date('Y-m-d H:i:s'));
				
				$inserirLogado = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoLogado);
				
				//TRANSACAO
				$nIdTipoTransacaoLogoff = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Logout");
				$sObjetoLogoff = "Logout efetuado. Usuario: ".$_SESSION['oLoginAdm']->oUsuario->getNm_usuario().", Login do usuário: ".$_SESSION['oLoginAdm']->oUsuario->getLogin();
				$oTransacaoLogoff = new Seg_transacao_acesso('',$nIdTipoTransacaoLogoff,$_SESSION['oLoginAdm']->getIdUsuario(),$sObjetoLogoff,Util::MeuIp(),date('Y-m-d H:i:s'));
				
				$inserirLogoff = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoLogoff);

				echo "1";

			}else{
				//TRANSACAO
				$nIdTipoTransacaoLogoff = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Logout");
				$sObjetoLogoff = "VERIFICAR ERRO LOGOFF: Usuário ".$_SESSION['oLoginAdm']->oUsuario->getNm_usuario()." não encontrado no sistema para logoff!";
				$oTransacaoOff = new Seg_transacao_acesso('',$nIdTipoTransacaoLogoff,$_SESSION['oLoginAdm']->getIdUsuario(),$sObjetoLogoff,Util::MeuIp(),date('Y-m-d H:i:s'));
				
				$inserirOff = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoOff);

				echo "1";
			}//if(is_object($oUsuarioLogoff)){
		}else{
			//TRANSACAO
			$nIdTipoTransacaoLogoff = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Logout");
			$sObjetoLogoff = "VERIFICAR: Executado o comando de Logout, sem nenhuma sessão da área administrativa estar ativa!";
			$oTransacaoOff = new Seg_transacao_acesso('',$nIdTipoTransacaoLogoff,$_SESSION['oLoginAdm']->getIdUsuario(),$sObjetoLogoff,Util::MeuIp(),date('Y-m-d H:i:s'));
			
			$inserirOff = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoOff);

			echo "1";
		}//if(isset($_SESSION['oLoginAdm']) && $_SESSION['oLoginAdm']->getIdUsuario() != "" && $_SESSION['oLoginAdm']->getIdUsuario() != 0){
		$_SESSION['sMsgPermissao'] = "";
		$_SESSION['oLoginAdm'] = "";
		unset($_SESSION['oLoginAdm']);
		session_destroy();
		//unset($_SESSION['vsMenu']);
		$sHeader = "../../index.php";
	break;
}
header("Location:$sHeader");
?>