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

			//METODOS QUE RECUPERA UM Con_livro_usuario --------------------------------------------->
			$idcon_livro_usuario = $_GET["nId"];
			$ObjCon_livro_usuario = $fachada->getCon_livro_usuario($idcon_livro_usuario);

			$bPermissao = $_SESSION["oLoginAdm"]->verificaPermissao("LivroUsuario",ucfirst($tpl->OP));
			$nIdTipoTransacao = $FachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("LivroUsuario",ucfirst($tpl->OP));

			if(!$bPermissao) {
				if($sOP == 1){
			        $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na gerência de con_livro_usuario, porém não possui permissão para isso!";
			    }else{
			        if(isset($idcon_livro_usuario) && $idcon_livro_usuario != "" && $idcon_livro_usuario != 0) {
			            $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." dados do LivroUsuario do registro de id: ".$idcon_livro_usuario.", porém não possui permissão para isso!";
			        }else{
			            $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na gerência de LivroUsuario, entretanto o id do LivroUsuario não foi carregado corretamente, a informação de id carregada no sistema foi o id: ".$idcon_livro_usuario.". De qualquer forma este usuário não possui permissão para ".ucfirst($tpl->OP)." informações na gerência de LivroUsuario!";
			        }
			    }

			    $oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date("Y-m-d H:i:s"));

			    $inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

			    $_SESSION["sMsgPermissao"] = ACESSO_NEGADO;
			    header("location: ../index.php?bErro=1");
			    exit();
			}else{

				if($sOP == 1){
				    $sObjeto = "Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." acessou a gerência de LivroUsuario para ".ucfirst($tpl->OP)." informações";
				 } else{

    				if(($sOP == 2) && (is_object($ObjCon_livro_usuario))) {
	        			$sObjeto .= " LivroUsuario do registro de Id: ".$idcon_livro_usuario;
					} else {

						$sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na LivroUsuario, entretanto o id da LivroUsuario não foi carregado corretamente, a informação de id carregada no sistema foi o id: ".$idcon_livro_usuario.". Apesar do usuário possui permissão!";

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

				
				if(is_object($ObjCon_livro_usuario)){
					$tpl->IDCON_LIVRO_USUARIO  	= $idcon_livro_usuario;
				

									$ID_PEDIDO   	= (stripcslashes($ObjCon_livro_usuario->getId_pedido()));					$ID_USUARIO   	= (stripcslashes($ObjCon_livro_usuario->getId_usuario()));					$ID_LIVRO   	= (stripcslashes($ObjCon_livro_usuario->getId_livro()));					$tpl->CHECKED_STATUS_1   	= ($ObjCon_livro_usuario->getStatus() == 1) ? $ObjCon_livro_usuario->getStatus() : "";					$tpl->CHECKED_STATUS_2   	= ($ObjCon_livro_usuario->getStatus() == 2) ? $ObjCon_livro_usuario->getStatus() : "";					$tpl->DT_CADASTRO   	= (stripcslashes($ObjCon_livro_usuario->getDt_cadastro()));					$tpl->DT_ALT   	= (stripcslashes($ObjCon_livro_usuario->getDt_alt()));					$tpl->ATIVO   	= (stripcslashes($ObjCon_livro_usuario->getAtivo()));	

					
				}

			}

									$ObjPedido = $fachada->getAllCon_pedido(NULL,NULL);
							foreach ($ObjPedido as $campo ) {
								$tpl->PEDIDO_ID   	= $campo->getId();
								$tpl->PEDIDO   	=  ($campo->getPedido());

								if (@$ID_PEDIDO == $campo->getId()) {
									$tpl->SELECTED_PEDIDO   	= "selected";
								}else{
									$tpl->SELECTED_PEDIDO = "";
								}


								$tpl->block("PEDIDO_BLOCK");
							}


												$ObjUsuario = $fachada->getAllCon_usuario(NULL,NULL);
							foreach ($ObjUsuario as $campo ) {
								$tpl->USUARIO_ID   	= $campo->getId();
								$tpl->USUARIO   	=  ($campo->getUsuario());

								if (@$ID_USUARIO == $campo->getId()) {
									$tpl->SELECTED_USUARIO   	= "selected";
								}else{
									$tpl->SELECTED_USUARIO = "";
								}


								$tpl->block("USUARIO_BLOCK");
							}


												$ObjLivro = $fachada->getAllCon_livro(NULL,NULL);
							foreach ($ObjLivro as $campo ) {
								$tpl->LIVRO_ID   	= $campo->getId();
								$tpl->LIVRO   	=  ($campo->getLivro());

								if (@$ID_LIVRO == $campo->getId()) {
									$tpl->SELECTED_LIVRO   	= "selected";
								}else{
									$tpl->SELECTED_LIVRO = "";
								}


								$tpl->block("LIVRO_BLOCK");
							}


						

			$tpl->CAMINHO = CAMINHO;
			//Carrega o Template da pagina
			$tpl->show();

		?>