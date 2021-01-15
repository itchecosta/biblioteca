<?php

				require_once("../constantes.php");
				require_once(PATH."valida_usuario.php");
				require_once(PATH."../classes/class.Fachada.php");
				require_once(PATH."../classes/class.FachadaSeguranca.php");

				ini_set("display_errors", 1 ); error_reporting(1);

				$fachada = new Fachada();
				$FachadaSeguranca = new FachadaSeguranca();

				$bPermissaoVisualizar = $_SESSION["oLoginAdm"]->verificaPermissao("Livro","Visualizar");
				$nIdTipoTransacao = $FachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Livro","Visualizar");

				if(!$bPermissaoVisualizar) {
				    $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou acessar a lista de Livro do sistema, porém não possui permissão para isso!";
				    $oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date("Y-m-d H:i:s"));

				    $inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

				    $_SESSION["sMsgPermissao"] = ACESSO_NEGADO;
				    header("location: ../index.php?bErro=1");
				    exit();
				}else{
				    $sObjeto = "Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." acessou a lista de Livro do sistema!";
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

				//METODOS QUE RECUPERA UM Con_livro --------------------------------------------->
				$ObjCon_livro = $fachada->getAllCon_livro(NULL,NULL);
				if(count($ObjCon_livro) > 0){
					foreach ($ObjCon_livro as $campo ) {

						$tpl->ID   	= $campo->getID();
						
				$tpl->NM_LIVRO   	= (stripcslashes($campo->getNm_livro()));	
				$tpl->SLUG   	= '<a href="'.$campo->getSlug().'" target="_blank" >'.$campo->getSlug().'&nbsp;&nbsp;&nbsp;<i class="fa fa-external-link"></i></a>';	
				$tpl->DESCRICAO   	= (stripcslashes($campo->getDescricao()));	

/* // -------------------------------------------------------------------------->
//IMAGENS */

if((ROOT."data/con-livro/".$campo->getImagem())) {
	$tpl->IMAGEM = '<img src="{CAMINHO}data/con-livro/'.$campo->getImagem().'" class="img-fluid" alt="User Image" width="100" height="100" >';
} else {
    $tpl->IMAGEM = '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
}

/*// -------------------------------------------------------------------------->*/


				$tpl->STATUS   	= ($campo->getStatus() == 1) ? 'Disponível' : 'Indisponível';	
				$tpl->DT_CADASTRO   	= (stripcslashes($campo->getDt_cadastro()));	
				$tpl->DT_ALT   	= (stripcslashes($campo->getDt_alt()));	
				$tpl->PUBLICADO   	= (stripcslashes(($campo->getPublicado() == 1) ? "<i style='color:green;' id=.$campo->getPublicado().' class='fa fa-circle' ></i>" : "<i style='color:red;' id=.$campo->getPublicado().' class='fa fa-circle' ></i>"));	
				//$tpl->ATIVO   	= (stripcslashes($campo->getAtivo()));	

							$tpl->block("CON_LIVRO_BLOCK");
					}

				} else {

					$tpl->block("CON_LIVRO_VAZIO");
				}

				$tpl->CAMINHO = CAMINHO;
				//Carrega o Template da pagina
				$tpl->show();


			?>