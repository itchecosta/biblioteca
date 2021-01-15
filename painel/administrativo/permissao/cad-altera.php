<?php
require_once("../../constantes.php");
require_once("../../valida_usuario.php");
require_once("../../../classes/class.Fachada.php");
require_once("../../../classes/class.FachadaSeguranca.php");

ini_set("display_errors", 1 ); error_reporting(1);

$fachada = new Fachada();
$FachadaSeguranca = new FachadaSeguranca();

//Instancia a classe de Templates
$tpl = new Template("cad-altera-tpl.php");

//HEAD
$tpl->addFile("HEAD", "../../layout/head-tpl.php");
include_once('../../layout/head.php');

//TOPO
$tpl->addFile("TOPO", "../../layout/header-tpl.php");
//include_once('../../layout/header.php');

//menu principal do sistema
$tpl->addFile("MENU", "../../layout/menu-tpl.php");
include_once('../../layout/menu.php');

//RODAPE
$tpl->addFile("RODAPE", "../../layout/footer-tpl.php");
//include_once('../../layout/footer.php');

//OPERAÇÃO
$sOP = $_GET['sOP'];
switch($sOP){
    case 1:
        $tpl->OP = 'cadastrar';
    break;
    case 2:
        $tpl->OP = 'alterar';
    break;
}

$voCategoriaTipoTransacao = $FachadaSeguranca->getAllSeg_categoria_tipo_transacao(NULL,NULL);

$oGrupoUsuario = $FachadaSeguranca->getSeg_grupo_usuario($_GET['nId']);

$voPermissao = $FachadaSeguranca->getAllSeg_permissaoPorGrupo($_GET['nId'],NULL,NULL);

//RECUPERA TODAS AS CATEGORIAS
if(count($voCategoriaTipoTransacao) > 0){
	foreach ($voCategoriaTipoTransacao as $key => $oCategoriaTipoTransacao) {
		# code...
		//$tpl->IDCATEGORIATIPO = $oCategoriaTipoTransacao->geId();
		$tpl->CATEGORIA = $oCategoriaTipoTransacao->getDescricao();

		//RECUPERA TODOS TIPO TRANSAÇÃO DAS CATEGORIAS
		$voTipoTransacao = $FachadaSeguranca->getAllSeg_tipo_transacaoPorCategoria($oCategoriaTipoTransacao->getId(),NULL,NULL);
		if(count($voTipoTransacao) > 0){
			foreach ($voTipoTransacao as $key => $oTipoTransacao) {
				# code...
				$tpl->IDTRANSACAO = $oTipoTransacao->getId_tipo_transacao();
				$tpl->TRANSACAO = $oTipoTransacao->getTransacao();

				//RECUPERA TODAS AS PERMISSÕES DOS TIPO DE TRANSAÇÃO PARA O GRUPO DE USUÁRIO
				if (count($voPermissao) > 0){
					foreach($voPermissao as $key => $oPermissao){
						#code...
						if ($oPermissao->getId_tipo_transacao() == $oTipoTransacao->getId_tipo_transacao()){
							$tpl->SELECTED = "checked";
						} else {
							$tpl->SELECTED = "";
						}
					}
				}

				$tpl->block("TRANSACAO_BLOCK");
			}
		}


		$tpl->block("CATEGORIA_BLOCK");
	}
}

if(is_object($oGrupoUsuario)){

    $tpl->IDGRUPO = $oGrupoUsuario->getId_seg_grupo_usuario();
    $tpl->GRUPO = $oGrupoUsuario->getNm_grupo_usuario();
    
}

$tpl->CAMINHO = CAMINHO;
//Carrega o Template da pagina
$tpl->show();


?>
