<?php
			require_once("../constantes.php");
			require_once(PATH."valida_usuario.php");
			require_once(PATH."../classes/class.Fachada.php");

			ini_set("display_errors", 1 ); error_reporting(1);

			$fachada = new Fachada();

			//Instancia a classe de Templates
			$tpl = new Template("cad-altera-tpl.php");

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

			if($sOP == 2) {

				//METODOS QUE RECUPERA UM Con_info_geral --------------------------------------------->
				$idcon_info_geral = $_GET["nId"];
				$ObjCon_info_geral = $fachada->getCon_info_geral($idcon_info_geral);
				if(is_object($ObjCon_info_geral)){
					$tpl->IDCON_INFO_GERAL  	= $idcon_info_geral;
				

					
				$tpl->TITULO   	= (stripcslashes($ObjCon_info_geral->getTitulo()));	
				$tpl->SLOGAN   	= (stripcslashes($ObjCon_info_geral->getSlogan()));	
				$tpl->DESCRICAO   	= (stripcslashes($ObjCon_info_geral->getDescricao()));	
				$tpl->PALAVRAS   	= (stripcslashes($ObjCon_info_geral->getPalavras()));	
				$tpl->COPYRIGHT   	= (stripcslashes($ObjCon_info_geral->getCopyright()));	
				$tpl->ENDERECO   	= (stripcslashes($ObjCon_info_geral->getEndereco()));	
				$tpl->TELEFONE   	= (stripcslashes($ObjCon_info_geral->getTelefone()));	
				$tpl->CELULAR   	= (stripcslashes($ObjCon_info_geral->getCelular()));	
				$tpl->EMAIL   	= (stripcslashes($ObjCon_info_geral->getEmail()));	

// -------------------------------------------------------------------------->
//IMAGENS
	$tpl->LOGOATUAL       = ($ObjCon_info_geral->getLogo() != '') ? $ObjCon_info_geral->getLogo() : '';
    if($sOP == 2) {
        $tpl->LOGO = ($ObjCon_info_geral->getLogo() != '') ? '<img src="{CAMINHO}data/con-info-geral/'.$ObjCon_info_geral->getLogo().'" class="img-circle" alt="User Image" width="100" height="100" >' : '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
    } else {
        $tpl->LOGO = '-';
    }

// -------------------------------------------------------------------------->



// -------------------------------------------------------------------------->
//IMAGENS
$tpl->FAVICONATUAL       = ($ObjCon_info_geral->getFavicon() != '') ? $ObjCon_info_geral->getFavicon() : '';
    if($sOP == 2) {
        $tpl->FAVICON = ($ObjCon_info_geral->getFavicon() != '') ? '<img src="{CAMINHO}data/con-info-geral/'.$ObjCon_info_geral->getFavicon().'" class="img-circle" alt="User Image" width="100" height="100" >' : '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
    } else {
        $tpl->FAVICON = '-';
    }

// -------------------------------------------------------------------------->


				$tpl->RESUMO   	= (stripcslashes($ObjCon_info_geral->getResumo()));	
				$tpl->DT_CADASTRO   	= (stripcslashes($ObjCon_info_geral->getDt_cadastro()));	
				$tpl->CHECKED_PUBLICADO   	= ($ObjCon_info_geral->getPublicado() == 1) ? $ObjCon_info_geral->getPublicado() : "";	
				$tpl->ATIVO   	= (stripcslashes($ObjCon_info_geral->getAtivo()));	

					
				}

			}

			

			$tpl->CAMINHO = CAMINHO;
			//Carrega o Template da pagina
			$tpl->show();

		?>