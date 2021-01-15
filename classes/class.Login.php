<?php
//á
require_once("class.FachadaSeguranca.php");

class Login {
	var $oUsuario;
	var $vPermissao;
	
	function setUsuario($oUsuario){
		$this->oUsuario = $oUsuario;
	}
	
	function getUsuario(){
		return $this->oUsuario;
	}
	
	function setvPermissao($vPermissao){
		$this->vPermissao = $vPermissao;
	}
	
	function getvPermissao(){
		return $this->vPermissao;
	}
	
	function getIdUsuario(){
		return $this->oUsuario->getId_seg_usuario();
	}
	
	function logarUsuarioPainel($sLogin,$sSenha){
		//ATENCAO O LOGIN PRECISA SER PASSADO NO UTF8_DECODE PARA O BANCO POIS É UM TEXTO LITERAL, A SENHA NÃO PRECISA POIS SERÁ COMPARADA DE IGUAL PARA IGUAL
		$oFachadaSeguranca = new FachadaSeguranca();
		//$vWhereUsuario = array("login = '".utf8_decode($sLogin)."'","publicado = 1","ativo = 1");
		$oUsuario = $oFachadaSeguranca->getSeg_usuarioPorLogin($sLogin);

			if(is_object($oUsuario)){

				// print_r($oUsuario);print_r(md5($sSenha));exit;

				if ($oUsuario->getSenha() == md5($sSenha)){

						$nIdTipoTransacaoAcesso = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Login");
						$sObjetoAcesso = "Login efetuado com sucesso. Login do usuário: ".$_POST['fLogin'];
						$oTransacaoAcesso = new Seg_transacao_acesso(NULL,$nIdTipoTransacaoAcesso,$oUsuario->getId_seg_usuario(),$sObjetoAcesso,Util::MeuIp(),date('Y-m-d H:i:s'));
						
						$inserirAcesso = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);
						
						$this->setUsuario($oUsuario);
						
						$voPermissao = $oFachadaSeguranca->getAllSeg_permissaoPorGrupo($oUsuario->getId_grupo_usuario(),NULL,NULL);
						
						$this->setvPermissao($voPermissao);

						return true;
				}else{
					$nIdTipoTransacaoAcesso = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Login");
					$sObjetoAcesso = "VERIFICAR  ERRO 4: Tentativa de Login falhou. USUÁRIO EXISTE MAS HOUVE ERRO NA SENHA. Login do usuário: ".$_POST['fLogin']." Senha: ".$_POST['fSenha'];
					$oTransacaoAcesso = new Seg_transacao_acesso(NULL,$nIdTipoTransacaoAcesso,$oUsuario->getId_seg_usuario(),$sObjetoAcesso,Util::MeuIp(),date('Y-m-d H:i:s'));

					$inserirAcesso = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

					return false;
				}//if ($oUsuario->getSenha() == $sSenha){
			}else{
				$nIdTipoTransacaoAcesso = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Acesso","Login");
				$sObjetoAcesso = "VERIFICAR ERRO 5: Tentativa de Login falhou. USUARIO NÃO ENCONTRADO. Login do usuário: ".$_POST['fLogin']." Senha: ".$_POST['fSenha'];
				$oTransacaoAcesso = new Seg_transacao_acesso(NULL,$nIdTipoTransacaoAcesso,$sLogin,$sObjetoAcesso,Util::MeuIp(),date('Y-m-d H:i:s'));

				$inserirAcesso = $oFachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);
			}//if(is_object($oUsuario)){

		return false;
	}
	
	function alteraSenhaUsuario($sLogin,$sSenhaAtual,$sSenhaNova){
		$oFachadaSeguranca = new FachadaSeguranca();
		$vWhereUsuario = array("login = '".utf8_decode($sLogin)."'","publicado = 1","ativo = 1");
		$voUsuario = $oFachadaSeguranca->recuperaTodosUsuario($sBanco,$vWhereUsuario);
		if(count($voUsuario) == 1){
			$oUsuario = $voUsuario[0];
			if(is_object($oUsuario)){
				if ($oUsuario->getSenha() == $sSenhaAtual){
					$oUsuario->setSenha($sSenhaNova);
					return ($oFachadaSeguranca->alteraUsuario($oUsuario));
				}//if ($oUsuario->getSenha() == $sSenhaAtual){
			}//if(is_object($oUsuario)){
		}//if(count($voUsuario) == 1){
		return false;
	}
	
	function verificaPermissao($sDescricao,$sTransacao){
		$oFachadaSeguranca = new FachadaSeguranca();
		$nIdTipoTransacao = $oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria($sDescricao,$sTransacao);
		$voPermissao = $this->getvPermissao();
		if (count($voPermissao) > 0){
			foreach($voPermissao as $oPermissao){
				if ($oPermissao->getId_tipo_transacao() == $nIdTipoTransacao){
					return true;
				}
			}
		}
		return false;
	}
	
	function recuperaTipoTransacaoPorDescricaoCategoria($sDescricao,$sTransacao){
		$oFachadaSeguranca = new FachadaSeguranca();
		return ($oFachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria($sDescricao,$sTransacao));
	}
	
}
?>