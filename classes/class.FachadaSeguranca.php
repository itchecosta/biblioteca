<?php
//á
include_once(dirname(__FILE__)."/class.FachadaSeguranca_Pai.php");

class FachadaSeguranca extends FachadaSeguranca_Pai{

	function __construct(){
	}

	function desativarSeg_usuario($seg_usuario) { 
	    $cadSeg_usuario = new CadSeg_usuario($this->getConexao());
	    return $cadSeg_usuario->desativarSeg_usuario($seg_usuario);
	  }

	 function alterarSenhaSeg_usuario($seg_usuario,$senha) { 
	    $cadSeg_usuario = new CadSeg_usuario($this->getConexao());
	    return $cadSeg_usuario->alterarSenhaSeg_usuario($seg_usuario,$senha);
	  }
	
	function recuperaTipoTransacaoPorDescricaoCategoria($sDescricao,$sTransacao) {
		$oTipoTransacao = new CadSeg_tipo_transacao();
 		$oCategoriaTipoTransacao = new CadSeg_categoria_tipo_transacao();
		$oFachadaSeguranca = new FachadaSeguranca();

		$oCategoriaTipoTransacao = $oCategoriaTipoTransacao->getSeg_categoria_tipo_transacaoPorDescricao($sDescricao);

		if(count($oCategoriaTipoTransacao) == 1){
			if(is_object($oCategoriaTipoTransacao)){
				$categoria = $oCategoriaTipoTransacao->getDescricao();

				$oTipoTransacao = $oTipoTransacao->recuperaTipoTransacao($categoria,$sTransacao);
				
				if(count($oTipoTransacao) == 1){
					return $oTipoTransacao->getId_tipo_transacao();
				}//if(count($voTipoTransacao) == 1){
			}//if(is_object($oCategoriaTipoTransacao)){
		}//if(count($voCategoriaTipoTransacao) == 1){
		return false;
	}

	//RECUPERA TIPO TRANSAÇÃO POR CATEGORIA
	function getAllSeg_tipo_transacaoPorCategoria($id_categoria,$ini = NULL, $num = NULL) { 
		$oTipoTransacao = new CadSeg_tipo_transacao();
		return $oTipoTransacao->getAllSeg_tipo_transacaoPorCategoria($id_categoria,$ini = NULL, $num = NULL);
	}

  //
  function getSeg_usuarioPorLogin($sLogin) { 
    $cadSeg_usuario = new CadSeg_usuario();
    return $cadSeg_usuario->getSeg_usuarioPorLogin($sLogin);
  }

  //EXCLUIR TIPO TRANSAÇÃO POR CATEGORIA
    function excluirSeg_tipo_transacaoPorCategoria($idcategoria) { 
      $cadSeg_tipo_transacao = new CadSeg_tipo_transacao();
      return $cadSeg_tipo_transacao->excluirSeg_tipo_transacaoPorCategoria($idcategoria);
    }

    //EXCLUIR AS PERMISSÕES POR TIPO TRANSAÇÃO
    function excluirSeg_permissaoPorTipoTransacao($id_tipo_transacao) { 
      $cadSeg_permissao = new CadSeg_permissao();
      return $cadSeg_permissao->excluirSeg_permissaoPorTipoTransacao($id_tipo_transacao);
    }

  //
  function desativaPermissaoPorGrupoUsuario($id_grupo_usuario) { 
    $cadSeg_permissao = new CadSeg_permissao();
    return $cadSeg_permissao->desativaPermissaoPorGrupoUsuario($id_grupo_usuario);
  }

  //
  function desativaPermissaoPorTipoTransacao($id_tipo_transacao) { 
    $cadSeg_permissao = new CadSeg_permissao();
    return $cadSeg_permissao->desativaPermissaoPorTipoTransacao($id_tipo_transacao);
  }

  // RECUPERA TODAS AS PERMISSÕES DO GRUPO DE USUÁRIO
  function getAllSeg_permissaoPorGrupo($id_grupo_usuario,$ini = NULL, $num = NULL) { 
    $cadSeg_permissao = new CadSeg_permissao();
    return $cadSeg_permissao->getAllSeg_permissaoPorGrupo($id_grupo_usuario,$ini = NULL, $num = NULL);
  }
	
  //
  function verificaPermissao($id_tipo_transacao,$vPermissao) {
		$oPermissaoBD = new CadSeg_permissao();
		$bResultado = false;
		if(count($vPermissao)){
			foreach($vPermissao as $oPermissao){
				if($oPermissao->getId_tipo_transacao() == $id_tipo_transacao)
					$bResultado = true;
			}
			return $bResultado;
		}
		return false;
	}


}
?>