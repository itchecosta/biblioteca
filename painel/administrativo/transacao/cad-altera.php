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

$nIdCategoriaTipoTransacao = $_GET['nId'];
$oCategoriaTipoTransacao = $FachadaSeguranca->getSeg_categoria_tipo_transacao($_GET['nId']);

$bPermissao = $_SESSION["oLoginAdm"]->verificaPermissao("Transacao",ucfirst($tpl->OP));
$nIdTipoTransacao = $FachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Transacao",ucfirst($tpl->OP));
if(is_object($oCategoriaTipoTransacao)){
  $sNomeCategoria = $oCategoriaTipoTransacao->getDescricao();
}

if(!$bPermissao) {
  if($sOP == 1){
      $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na gerência de categoria de transações, porém não possui permissão para isso!";
  }else{
      if(isset($nIdCategoriaTipoTransacao) && $nIdCategoriaTipoTransacao != "" && $nIdCategoriaTipoTransacao != 0) {
          $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." dados de categoria de transações ".$sNomeCategoria." de id: ".$nIdCategoriaTipoTransacao.", porém não possui permissão para isso!";
      }else{
          $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na categoria de transações, entretanto o id da categoria de transações não foi carregado corretamente, a informação de id carregada no sistema foi o id: ".$nIdCategoriaTipoTransacao.". De qualquer forma este usuário não possui permissão para ".ucfirst($tpl->OP)." informações na categoria de transações!";
      }
  }

    $oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date("Y-m-d H:i:s"));

    $inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

    $_SESSION["sMsgPermissao"] = ACESSO_NEGADO;
    header("location: ../../index.php?bErro=1");
    exit();
}else{
    if($sOP == 1){

      $sObjeto = "Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." acessou a categoria de transações para ".ucfirst($tpl->OP)." informações";

    } else{

        if(($sOP == 2) && (is_object($oCategoriaTipoTransacao))) {
          $sObjeto .= " de categoria de transação ".$sNomeCategoria." de Id: ".$nIdCategoriaTipoTransacao;
        } else {

            $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na categoria de transações, entretanto o id da categoria de transações não foi carregado corretamente, a informação de id carregada no sistema foi o id: ".$nIdCategoriaTipoTransacao.". Apesar do usuário possui permissão!";

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

if ($_GET['nId'] && $sOP == 2) {
    # code...
    //RECUPERA PERMISSAO POR GRUPO DE USUÁRIO ADMINISTRADOR
    $voPermissao = $FachadaSeguranca->getAllSeg_permissaoPorGrupo(1,NULL,NULL);

    if(is_object($oCategoriaTipoTransacao)){

        $tpl->IDCATEGORIA = $oCategoriaTipoTransacao->getId();
        $tpl->CATEGORIA = $oCategoriaTipoTransacao->getDescricao();

        $voTipoTransacao = $FachadaSeguranca->getAllSeg_tipo_transacaoPorCategoria($oCategoriaTipoTransacao->getId(),NULL,NULL);
        if(count($voTipoTransacao) > 0){
            foreach ($voTipoTransacao as $key => $oTipoTransacao) {
                # code...
                if(is_object($oTipoTransacao)){
                    $tpl->TRANSACAO = $oTipoTransacao->getTransacao();

                    //VERIFICA SE TIPO TRANSAÇÃO ESTÁ PERMITIDO
                    if(count($voPermissao) > 0){
                        foreach ($voPermissao as $key => $oPermissao) {
                            # code...
                            if($oPermissao->getId_tipo_transacao() == $oTipoTransacao->getId_tipo_transacao()){
                                $tpl->CHECKED = 'checked';
                            } else {
                                $tpl->CHECKED = '';
                            }
                        }
                    }
                }

                $tpl->block('LISTA_TRANSACAO_BLOCK');
            }
        }

    } else {
        $tpl->block('TRANSACAO_BLOCK');
    }
} else {
    $tpl->block('TRANSACAO_BLOCK');
}

for($i=1;$i<=20;$i++) {
	$tpl->INDICE = $i;

	$tpl->block('INDICE_BLOCK');
}

$tpl->CAMINHO = CAMINHO;
//Carrega o Template da pagina
$tpl->show();


?>
