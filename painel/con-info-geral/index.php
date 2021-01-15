<?php
				require_once("../constantes.php");
				require_once(PATH."valida_usuario.php");
				require_once(PATH."../classes/class.Fachada.php");

				ini_set("display_errors", 1 ); error_reporting(1);

				$fachada = new Fachada();

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

				//METODOS QUE RECUPERA UM Con_info_geral --------------------------------------------->
				$ObjCon_info_geral = $fachada->getAllCon_info_geral(NULL,NULL);
				if(count($ObjCon_info_geral) > 0){
					foreach ($ObjCon_info_geral as $campo ) {

						$tpl->ID   	= $campo->getID();
						
				$tpl->TITULO   	= (stripcslashes($campo->getTitulo()));	
				$tpl->SLOGAN   	= (stripcslashes($campo->getSlogan()));	
				$tpl->DESCRICAO   	= (stripcslashes($campo->getDescricao()));	
				$tpl->PALAVRAS   	= (stripcslashes($campo->getPalavras()));	
				$tpl->COPYRIGHT   	= (stripcslashes($campo->getCopyright()));	
				$tpl->ENDERECO   	= (stripcslashes($campo->getEndereco()));	
				$tpl->TELEFONE   	= (stripcslashes($campo->getTelefone()));	
				$tpl->CELULAR   	= (stripcslashes($campo->getCelular()));	
				$tpl->EMAIL   	= (stripcslashes($campo->getEmail()));	

// -------------------------------------------------------------------------->
//IMAGENS
if((ROOT."data/con-info-geral/".$campo->getLogo())) {
	$tpl->LOGO = '<img src="{CAMINHO}data/con-info-geral/'.$campo->getLogo().'" class="img-circle" alt="User Image" width="100" height="100" >';
} else {
    $tpl->LOGO = '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
}

// -------------------------------------------------------------------------->



// -------------------------------------------------------------------------->
//IMAGENS
if((ROOT."data/con-info-geral/".$campo->getFavicon())) {
	$tpl->FAVICON = '<img src="{CAMINHO}data/con-info-geral/'.$campo->getFavicon().'" class="img-circle" alt="User Image" width="100" height="100" >';
} else {
    $tpl->FAVICON = '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
}

// -------------------------------------------------------------------------->


				$tpl->RESUMO   	= (stripcslashes($campo->getResumo()));	
				$tpl->DT_CADASTRO   	= (stripcslashes($campo->getDt_cadastro()));	
				$tpl->PUBLICADO   	= (stripcslashes(($campo->getPublicado() == 1) ? "<i style='color:green;' id=.$campo->getPublicado().' class='fa fa-circle' ></i>" : "<i style='color:red;' id=.$campo->getPublicado().' class='fa fa-circle' ></i>"));	
				$tpl->ATIVO   	= (stripcslashes($campo->getAtivo()));	

							$tpl->block("CON_INFO_GERAL_BLOCK");
					}

				} else {

					$tpl->block("CON_INFO_GERAL_VAZIO");
				}

				$tpl->CAMINHO = CAMINHO;
				//Carrega o Template da pagina
				$tpl->show();


			?>