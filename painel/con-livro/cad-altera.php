<?php
			require_once("../constantes.php");
			require_once(PATH."valida_usuario.php");
			require_once(PATH."../classes/class.Fachada.php");
			require_once(PATH."../classes/class.FachadaSeguranca.php");

			ini_set("display_errors", 1 ); error_reporting(1);

			$fachada = new Fachada();
			$FachadaSeguranca = new FachadaSeguranca();

			//Instancia a classe de Templates
			$tpl = new Template("cad-altera-tpl.php");

			//OPERAÇÃO
			$sOP = $_GET["sOP"];
			switch($sOP){
			    case 1:
			        $tpl->OP = "cadastrar";
			    break;
			    case 2:
			        $tpl->OP = "alterar";
			    break;
			}

			//METODOS QUE RECUPERA UM Con_livro --------------------------------------------->
			$idcon_livro = $_GET["nId"];
			$ObjCon_livro = $fachada->getCon_livro($idcon_livro);

			$bPermissao = $_SESSION["oLoginAdm"]->verificaPermissao("Livro",ucfirst($tpl->OP));
			$nIdTipoTransacao = $FachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Livro",ucfirst($tpl->OP));

			if(!$bPermissao) {
				if($sOP == 1){
			        $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na gerência de con_livro, porém não possui permissão para isso!";
			    }else{
			        if(isset($idcon_livro) && $idcon_livro != "" && $idcon_livro != 0) {
			            $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." dados do Livro do registro de id: ".$idcon_livro.", porém não possui permissão para isso!";
			        }else{
			            $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na gerência de Livro, entretanto o id do Livro não foi carregado corretamente, a informação de id carregada no sistema foi o id: ".$idcon_livro.". De qualquer forma este usuário não possui permissão para ".ucfirst($tpl->OP)." informações na gerência de Livro!";
			        }
			    }

			    $oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date("Y-m-d H:i:s"));

			    $inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

			    $_SESSION["sMsgPermissao"] = ACESSO_NEGADO;
			    header("location: ../index.php?bErro=1");
			    exit();
			}else{

				if($sOP == 1){
				    $sObjeto = "Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." acessou a gerência de Livro para ".ucfirst($tpl->OP)." informações";
				 } else{

    				if(($sOP == 2) && (is_object($ObjCon_livro))) {
	        			$sObjeto .= " Livro do registro de Id: ".$idcon_livro;
					} else {

						$sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na Livro, entretanto o id da Livro não foi carregado corretamente, a informação de id carregada no sistema foi o id: ".$idcon_livro.". Apesar do usuário possui permissão!";

			            $oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date("Y-m-d H:i:s"));
			            $inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

			            $_SESSION["sMsgPermissao"] = ACESSO_NEGADO;
			            header("location: ../../index.php?bErro=1");
			            exit();
			        }
			    }

			    $oTransacao = new Seg_transacao("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjeto,Util::MeuIp(),date("Y-m-d H:i:s"),1,1);
			    $inserirTransacao = $FachadaSeguranca->inserirSeg_transacao($oTransacao);
			}

			//HEAD
			$tpl->addFile("HEAD", PATH."layout/head-tpl.php");
			include_once(PATH."layout/head.php");

			//TOPO
			$tpl->addFile("TOPO", PATH."layout/header-tpl.php");
			// include_once(PATH."layout/header.php");

			//menu principal do sistema
			$tpl->addFile("MENU", PATH."layout/menu-tpl.php");
			include_once(PATH."layout/menu.php");

			//RODAPE
			$tpl->addFile("RODAPE", PATH."layout/footer-tpl.php");
			//include_once("../../layout/footer.php");

			if($sOP == 2) {

				
				if(is_object($ObjCon_livro)){
					$tpl->IDCON_LIVRO  	= $idcon_livro;
				

					
				$tpl->NM_LIVRO   	= (stripcslashes($ObjCon_livro->getNm_livro()));	
				$tpl->SLUG   	= (stripcslashes($ObjCon_livro->getSlug()));	
				$tpl->DESCRICAO   	= (stripcslashes($ObjCon_livro->getDescricao()));	

/* // -------------------------------------------------------------------------->
//IMAGENS */

$tpl->IMAGEMATUAL       = ($ObjCon_livro->getImagem() != '') ? $ObjCon_livro->getImagem() : '';
    if($sOP == 2) {
        $tpl->IMAGEM = ($ObjCon_livro->getImagem() != '') ? '<img src="{CAMINHO}data/con-livro/'.$ObjCon_livro->getImagem().'" class="img-fluid" alt="User Image" width="100" height="100" >' : '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
    } else {
        $tpl->IMAGEM = '-';
    }

/*// -------------------------------------------------------------------------->*/


				$tpl->CHECKED_STATUS_1   	= ($ObjCon_livro->getStatus() == 1) ? 'checked' : "";	
				$tpl->CHECKED_STATUS_2   	= ($ObjCon_livro->getStatus() == 2) ? 'checked' : "";	
				$tpl->DT_CADASTRO   	= (stripcslashes($ObjCon_livro->getDt_cadastro()));	
				//$tpl->DT_ALT   	= (stripcslashes($ObjCon_livro->getDt_alt()));	
				$tpl->CHECKED_PUBLICADO   	= ($ObjCon_livro->getPublicado() == 1) ? 'checked' : "";	
				$tpl->ATIVO   	= (stripcslashes($ObjCon_livro->getAtivo()));	

					
				}

			}

			

			$tpl->CAMINHO = CAMINHO;
			//Carrega o Template da pagina
			$tpl->show();

		?>