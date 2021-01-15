<?php

				require_once("../constantes.php");
				require_once(PATH."valida_usuario.php");
				require_once(PATH."../classes/class.Fachada.php");
				require_once(PATH."../classes/class.FachadaSeguranca.php");

				ini_set("display_errors", 1 ); error_reporting(1);

				$fachada = new Fachada();
				$FachadaSeguranca = new FachadaSeguranca();

				$bPermissaoVisualizar = $_SESSION["oLoginAdm"]->verificaPermissao("LivroUsuario","Visualizar");
				$nIdTipoTransacao = $FachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("LivroUsuario","Visualizar");

				if(!$bPermissaoVisualizar) {
				    $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou acessar a lista de LivroUsuario do sistema, porém não possui permissão para isso!";
				    $oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date("Y-m-d H:i:s"));

				    $inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

				    $_SESSION["sMsgPermissao"] = ACESSO_NEGADO;
				    header("location: ../index.php?bErro=1");
				    exit();
				}else{
				    $sObjeto = "Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." acessou a lista de LivroUsuario do sistema!";
				    $oTransacao = new Seg_transacao("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjeto,Util::MeuIp(),date("Y-m-d H:i:s"),1,1);
				    $inserirTransacao = $FachadaSeguranca->inserirSeg_transacao($oTransacao);
				}

				//Instancia a classe de Templates
				$tpl = new Template("index-tpl.php");

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

				//METODOS QUE RECUPERA UM Con_livro_usuario --------------------------------------------->
				$ObjCon_livro_usuario = $fachada->getAllCon_livro_usuario(NULL,NULL);
				if(count($ObjCon_livro_usuario) > 0){
					foreach ($ObjCon_livro_usuario as $campo ) {

						$tpl->ID   	= $campo->getID();
						

							$tpl->block("CON_LIVRO_USUARIO_BLOCK");
					}

				} else {

					$tpl->block("CON_LIVRO_USUARIO_VAZIO");
				}

				$tpl->CAMINHO = CAMINHO;
				//Carrega o Template da pagina
				$tpl->show();


			?>