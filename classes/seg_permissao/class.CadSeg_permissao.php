<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_permissao_Pai.php';

class CadSeg_permissao extends CadSeg_permissao_Pai{

    //RECUPERA AS PERMISSÕES DO GRUPO
    function getAllSeg_permissaoPorGrupo($idgrupo,$ini,$num) { 
        if($rs = $this->cadSeg_permissaoBD->getAllSeg_permissaoPorGrupo($idgrupo,$ini,$num))
          while($va = array_shift($rs))
            $vet[] = $this->arrayToObject($va);
        else
          return false;
        return $vet;
    }

    //EXCLUIR AS PERMISSÕES POR TIPO TRANSAÇÃO
    function excluirSeg_permissaoPorTipoTransacao($id_tipo_transacao) { 
		return $this->cadSeg_permissaoBD->excluirSeg_permissaoPorTipoTransacao($id_tipo_transacao);
	}

    //DESATIVA PERMISSÃO POR GRUPO DE USUÁRIO
    function desativaPorGrupoUsuario($id_grupo_usuario) { 
        return $this->cadSeg_permissaoBD->desativaPorGrupoUsuario($id_grupo_usuario);
    }

    //DESATIVA PERMISSÃO POR TIPO TRANSAÇÃO
    function desativaPorTipoTransacao($id_tipo_transacao) { 
        return $this->cadSeg_permissaoBD->desativaPorTipoTransacao($id_tipo_transacao);
    }

}
?>