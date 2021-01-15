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

$nIdUsuario = $_GET['nId'];
$oUsuario = $FachadaSeguranca->getSeg_usuario($nIdUsuario);

$bPermissao = $_SESSION["oLoginAdm"]->verificaPermissao("Usuario",ucfirst($tpl->OP));
$nIdTipoTransacao = $FachadaSeguranca->recuperaTipoTransacaoPorDescricaoCategoria("Usuario",ucfirst($tpl->OP));
if(is_object($oUsuario)){
  $sNomeUsuario = $oUsuario->getNm_usuario();
}

if(!$bPermissao) {
  if($sOP == 1){
      $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na gerência de con_banner, porém não possui permissão para isso!";
  }else{
      if(isset($nIdUsuario) && $nIdUsuario != "" && $nIdUsuario != 0) {
          $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." dados do usuário ".$sNomeUsuario." de id: ".$nIdUsuario.", porém não possui permissão para isso!";
      }else{
          $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na gerência de usuários, entretanto o id do usuário não foi carregado corretamente, a informação de id carregada no sistema foi o id: ".$nIdUsuario.". De qualquer forma este usuário não possui permissão para ".ucfirst($tpl->OP)." informações na gerência de usuários!";
      }
  }

    $oTransacaoAcesso = new Seg_transacao_acesso("",$nIdTipoTransacao,$_SESSION["oLoginAdm"]->getIdUsuario(),$sObjetoAcesso,Util::MeuIp(),date("Y-m-d H:i:s"));

    $inserirAcesso = $FachadaSeguranca->inserirSeg_transacao_acesso($oTransacaoAcesso);

    $_SESSION["sMsgPermissao"] = ACESSO_NEGADO;
    header("location: ../../index.php?bErro=1");
    exit();
}else{
    if($sOP == 1){

      $sObjeto = "Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." acessou a gerência de usuários para ".ucfirst($tpl->OP)." informações";
    
    } else{  
      if(($sOP == 2) && (is_object($oUsuario))) {
          $sObjeto .= " de usuário ".$sNomeUsuario." de Id: ".$nIdUsuario;

      } else {
        $sObjetoAcesso = "VERIFICAR: Usuário ".$_SESSION["oLoginAdm"]->oUsuario->getNm_usuario()." tentou ".ucfirst($tpl->OP)." informações na gerência de usuários, entretanto o id do usuário não corresponde a nenhum usuário cadastrado, entretanto o id do usuário não foi carregado corretamente, a informação de id carregada no sistema foi o id: : ".$nIdUsuario.". Apesar do usuário possui permissão!";

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

    if(is_object($oUsuario)){

        $tpl->IDUSUARIO = $oUsuario->getId_seg_usuario();
        $tpl->USUARIO = $oUsuario->getNm_usuario();
        $tpl->LOGIN = $oUsuario->getLogin();
        $tpl->EMAIL = $oUsuario->getEmail();
        $tpl->IMAGEMATUAL = ($oUsuario->getImagem() != '') ? $oUsuario->getImagem() : '';
        if($sOP == 2) {
            $tpl->IMAGEM = ($oUsuario->getImagem() != '') ? '<img src="{CAMINHO}data/seg-usuario/'.$oUsuario->getImagem().'" class="img-circle" alt="User Image" width="100" height="100" >' : '<img src="{CAMINHO}dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="100" height="100" >';
        } else {
            $tpl->IMAGEM = '-';
        }
        
        $tpl->DATACADASTRO = $oUsuario->getDt_usuario();
        
        $nIdGrupo = $oUsuario->getId_grupo_usuario();
    }

}

if ($sOP == 1) {

    $tpl->VALIDA_SENHA = '';

    $tpl->INPUT_SENHA = '<div class="form-group col-xs-4">
                          <label for="fSenha">Senha</label>
                          <input type="password" class="form-control" id="fSenhaUsuario" name="fSenhaUsuario" placeholder="de 6 a 8 digitos" data-minlength="6" required>
                          <div class="help-block">Mínimo de 6 caracteres.</div>
                        </div>
                        
                        <div class="form-group col-xs-4">
                          <label for="fSenhaConf">Confirmar Senha</label>
                          <input type="password" class="form-control" id="fSenhaUsuarioConf" name="fSenhaUsuarioConf" placeholder="confirmar senha" data-match="#fSenhaUsuario" data-match-error="Confirmação da senha não confere." required>
                          <div class="help-block with-errors"></div>
                        </div>';

    $tpl->block("SENHA_BLOCK");
} else {

    $tpl->VALIDA_SENHA = '';

    $tpl->INPUT_SENHA = '';
    $tpl->block("SENHA_BLOCK");
}

$voGrupo = $fachada->getAllSeg_grupo_usuario(NULL,NULL);

foreach ($voGrupo as $oGrupo){
     $tpl->IDGRUPO = $oGrupo->getId_seg_grupo_usuario();
     $tpl->GRUPO = $oGrupo->getNm_grupo_usuario();

     if (@$nIdGrupo == $oGrupo->getId_seg_grupo_usuario()){
        $tpl->SELECTED_GRUPO = "selected";
     }else{
        $tpl->SELECTED_GRUPO = "";
     }

     $tpl->block("GRUPO_BLOCK");
}

$tpl->CAMINHO = CAMINHO;
//Carrega o Template da pagina
$tpl->show();


?>
