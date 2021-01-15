<?php
require_once("../../constantes.php");
require_once("../../valida_usuario.php");
require_once("../../../classes/class.Fachada.php");
require_once("../../../classes/class.FachadaSeguranca.php");

ini_set("display_errors", 1 ); error_reporting(1);

if (@$_REQUEST["operacao"] == "cadastrar") {

	$fachada = new FachadaSeguranca();

	$id 			        		    = addslashes(utf8_decode(@$_REQUEST["fId"]));
	$categoria_tipo_transacao 			= addslashes(utf8_decode(@$_REQUEST["fNome"]));
	$dt_categoria_tipo_transacao		= date('Y-m-d H:i:s');
        
	$ObjSeg_categoria_tipo_transacao = new Seg_categoria_tipo_transacao($id,$categoria_tipo_transacao,$dt_categoria_tipo_transacao,1,1);

	//CADASTRO DE CATEGORIA
	if($nIdCategoriaTipoTransacao = $fachada->inserirSeg_categoria_tipo_transacao($ObjSeg_categoria_tipo_transacao)){

		//VERIFICA SE EXISTE AO MENOS UM TIPO DE TRANSAÇÃO
		if(count($_REQUEST['fTipoTransacao']) > 0){
			foreach ($_REQUEST['fTipoTransacao'] as $key => $sTransacao) {
				# code...
				if($sTransacao != ''){

					$ObjSeg_tipo_transacao = new Seg_tipo_transacao($idTipo,$nIdCategoriaTipoTransacao,$sTransacao,date('Y-m-d H:i:s'),1,1);

					//CADASTRO DE TIPO DE TRANSAÇÃO
					if($nIdTipoTransacao = $fachada->inserirSeg_tipo_transacao($ObjSeg_tipo_transacao)){

						$ObjSeg_permissao = new Seg_permissao($nIdTipoTransacao,1,date('Y-m-d H:i:s'),1,1);

						//CADASTRA PERMISSÃO DE USUÁRIO AO GRUPO ADMINISTRADOR DO NOVO TIPO DE TRANSAÇÃO
						$inserir = $fachada->inserirSeg_permissao($ObjSeg_permissao);

					}
				}
			}

		}

		header("Location: index.php?op=sucess");

	} else {
		header("Location: index.php?op=error");
	}

}


if (@$_REQUEST["operacao"] == "alterar") {

$fachada = new FachadaSeguranca();

	$id 			        = addslashes(utf8_decode(@$_REQUEST["fId"]));
	$categoria_tipo_transacao 			= addslashes(utf8_decode(@$_REQUEST["fNome"]));
       
	$ObjSeg_categoria_tipo_transacao = $fachada->getSeg_categoria_tipo_transacao($id);

    if($ObjSeg_categoria_tipo_transacao != ''){

        $ObjSeg_categoria_tipo_transacao->setDescricao($categoria_tipo_transacao);

        if($alterar = $fachada->alterarSeg_categoria_tipo_transacao($ObjSeg_categoria_tipo_transacao)){

        	$vsTransacaoAuxiliar = array();
			//VERIFICA SE EXISTE AO MENOS UM TIPO DE TRANSAÇÃO
			if(count($_REQUEST['fTipoTransacao']) > 0){

				//RECUPERA OS TIPO DE TRANSAÇÃO POR CATEGORIA
				$voTipoTransacaoAuxiliar = $fachada->getAllSeg_tipo_transacaoPorCategoria($id,NULL,NULL);
				if(count($voTipoTransacaoAuxiliar) > 0){
					foreach ($voTipoTransacaoAuxiliar as $key => $oTipoTransacaoAuxiliar) {
						# code...
						if(is_object($oTipoTransacaoAuxiliar)){
							array_push($vsTransacaoAuxiliar,$oTipoTransacaoAuxiliar->getTransacao());
						}
					}
				}

				foreach ($_REQUEST['fTipoTransacao'] as $key => $sTransacao) {
					# code...
					if($sTransacao != ''){
						//VERIFICA SE TIPO TRANSAÇÃO JÁ NÃO ESTÁ CADASTRADO
						if(!in_array($sTransacao,$vsTransacaoAuxiliar)){
							$ObjSeg_tipo_transacao = new Seg_tipo_transacao($idTipo,$id,$sTransacao);
							$nIdTipoTransacao = $fachada->inserirSeg_tipo_transacao($ObjSeg_tipo_transacao);

							//CADASTRO DE TIPO DE TRANSAÇÃO
							if($nIdTipoTransacao = $fachada->inserirSeg_tipo_transacao($ObjSeg_tipo_transacao)){

								$ObjSeg_permissao = new Seg_permissao($nIdTipoTransacao,1);

								//CADASTRA PERMISSÃO DE USUÁRIO AO GRUPO ADMINISTRADOR DO NOVO TIPO DE TRANSAÇÃO
								$inserir = $fachada->inserirSeg_permissao($ObjSeg_permissao);

							}
						}

					}
				}

			}
        }

        header("Location: index.php?op=sucess");
    } else {
        header("Location: index.php?op=error");
    }

}


if (@$_REQUEST["operacao"] == "excluir") {

	$fachada = new FachadaSeguranca();

	$idseg_categoria_tipo_transacao 		= addslashes(@$_REQUEST["nId"]);

	$Objseg_categoria_tipo_transacao = $fachada->getSeg_categoria_tipo_transacao($idseg_categoria_tipo_transacao);
	if(is_object($Objseg_categoria_tipo_transacao)){

		$voTipoTransacaoAuxiliar = $fachada->getAllSeg_tipo_transacaoPorCategoria($idseg_categoria_tipo_transacao,NULL,NULL);
		if(count($voTipoTransacaoAuxiliar) > 0){
			foreach($voTipoTransacaoAuxiliar as $oTipoTransacaoAuxiliar){
				if(is_object($oTipoTransacaoAuxiliar)){
					$nIdTipoTransacao = $oTipoTransacaoAuxiliar->getId();
					if($nIdTipoTransacao)
						$fachada->excluirSeg_permissaoPorTipoTransacao($nIdTipoTransacao);
				}
			}
			$fachada->excluirSeg_tipo_transacaoPorCategoria($idseg_categoria_tipo_transacao);
		}

	}

	$excluir = $fachada->excluirSeg_categoria_tipo_transacao($Objseg_categoria_tipo_transacao);

	 header("Location: index.php?op=sucess");

}?>