<?php require_once("../constantes.php");require_once(PATH."valida_usuario.php");require_once(PATH."../classes/class.Fachada.php");ini_set("display_errors", 1 ); error_reporting(1);if (@$_REQUEST["operacao"] == "cadastrar") {$fachada = new Fachada();$id 			= addslashes(@$_REQUEST["id"]);$id_usuario 			= addslashes(@$_REQUEST["id_usuario"]);$id_livro 			= addslashes(@$_REQUEST["id_livro"]);$status 			= addslashes(@$_REQUEST["status"]);$dt_cadastro 			= date("Y-m-d H:i:s");$dt_alt 			= addslashes(@$_REQUEST["dt_alt"]);$ativo 			= 1;$data__hd 			= Util::getDataAtual();$hora__hd 			= Util::getHoraAtual();$ip__hd 			= $_SERVER["HTTP_X_FORWARDED_FOR"]." - ".$_SERVER["REMOTE_ADDR"];$ObjCon_pedido = new Con_pedido($id,$id_usuario,$id_livro,$status,$dt_cadastro,$dt_alt,$ativo);$inserir = $fachada->inserirCon_pedido($ObjCon_pedido); header("Location: index.php?op=sucess");}if (@$_REQUEST["operacao"] == "alterar") {$fachada = new Fachada();$idcon_pedido 		= addslashes(@$_REQUEST["fId"]);$id_usuario 			= addslashes(@$_REQUEST["id_usuario"]);$id_livro 			= addslashes(@$_REQUEST["id_livro"]);$status 			= addslashes(@$_REQUEST["status"]);$dt_cadastro 			= addslashes(@$_REQUEST["dt_cadastro"]);$dt_alt 			= addslashes(@$_REQUEST["dt_alt"]);$ativo 			= addslashes(@$_REQUEST["ativo"]);$ObjCon_pedido = $fachada->getCon_pedido($idcon_pedido);$ObjCon_pedido->setId_usuario($id_usuario);$ObjCon_pedido->setId_livro($id_livro);$ObjCon_pedido->setStatus($status);$ObjCon_pedido->setDt_cadastro($dt_cadastro);$ObjCon_pedido->setDt_alt($dt_alt);$ObjCon_pedido->setAtivo($ativo);$alterar = $fachada->alterarCon_pedido($ObjCon_pedido); header("Location: index.php?op=sucess");}if (@$_REQUEST["operacao"] == "excluir") {$fachada = new Fachada();$idcon_pedido 		= addslashes(@$_REQUEST["nId"]);$Objcon_pedido = $fachada->getCon_pedido($idcon_pedido);$excluir = $fachada->desativarCon_pedido($Objcon_pedido); header("Location: index.php?op=sucess");} ?>