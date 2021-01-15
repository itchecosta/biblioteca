<?php 

$oInfoGeral = $fachada->getCon_info_geral(1);

$tpl->SITE_TITULO   = $oInfoGeral->getTitulo();

//$tpl->MENU_SIGLA    = Util::cropString($oInfoGeral->getTitulo(),3,'');
//$tpl->SITE_SLOGAN   = $oInfoGeral->getSlogan();
$tpl->SITE_LOGO     = '{CAMINHO}data/con-info-geral/'.$oInfoGeral->getLogo();
$tpl->SITE_FAVICON  = '{CAMINHO}data/con-info-geral/'.$oInfoGeral->getFavicon();

$tpl->NOMEUSUARIO = utf8_encode($_SESSION['oLoginAdm']->oUsuario->getNm_usuario());
$tpl->IDUSUARIO_LOGADO = $_SESSION['oLoginAdm']->oUsuario->getId_seg_usuario();

$oGrupo = $fachada->getSeg_grupo_usuario($_SESSION['oLoginAdm']->oUsuario->getId_grupo_usuario());

$tpl->NOMEGRUPO = utf8_encode($oGrupo->getNm_grupo_usuario());

$data = Util::formataDataHora(Util::datatousa($_SESSION['oLoginAdm']->oUsuario->getDt_usuario()),"dia/Mes");
$vdata = explode('/',$data);
$tpl->MES = (substr($vdata[1],0,3));
$tpl->ANO = $vdata[0];

$tpl->HOST = 'http://'.$_SERVER['HTTP_HOST'];

if((ROOT."data/seg-usuario/".$_SESSION['oLoginAdm']->oUsuario->getImagem())) {
    $tpl->IMAGEM_USUARIO = "{CAMINHO}data/seg-usuario/".$_SESSION['oLoginAdm']->oUsuario->getImagem();
} else {
    $tpl->IMAGEM_USUARIO = "{CAMINHO}dist/img/user2-160x160.jpg";
}

 ?>