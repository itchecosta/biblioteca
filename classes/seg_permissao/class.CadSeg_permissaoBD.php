<?php 
// Powered by ClassGenerator - http://www.marcelioleal.net/classgenerator
// Artefato gerado em 21/09/2015 - 15:38:59

include_once dirname(__FILE__).'/class.CadSeg_permissaoBD_Pai.php';

class CadSeg_permissaoBD extends CadSeg_permissaoBD_Pai{

    //RECUPERA AS PERMISSÕES DO GRUPO
    function getAllSeg_permissaoPorGrupo($idgrupo,$ini,$num) { 
        $sql = " SELECT * FROM seg_permissao
                 WHERE
                  ativo = '1' 
                  AND id_grupo_usuario = $idgrupo
          ORDER BY
                        id_tipo_transacao, id_grupo_usuario";
        if(($ini !== NULL) && ($num !== NULL))
            $sql .=" LIMIT $ini,$num ";
        $rs = $this->con->execute($sql);
        return $this->con->fetch_array($rs);
    }

    //EXCLUIR PERMISSAO POR TIPO TRANSAÇÃO
    function excluirSeg_permissaoPorTipoTransacao($id_tipo_transacao) { 
        $sql = " DELETE FROM seg_permissao
                  WHERE
                   id_tipo_transacao = '$id_tipo_transacao'";
        return $this->executarIUD($sql);
    }

    //DESATIVA PERMISSÃO POR GRUPO DE USUÁRIO
    function desativaPorGrupoUsuario($id_grupo_usuario) { 
      $sql = " UPDATE seg_permissao
               SET publicado = 0, ativo = 0
               WHERE id_grupo_usuario = '$id_grupo_usuario'";
      return $this->executarIUD($sql);
    }

    //DESATIVA PERMISSÃO POR TIPO TRANSAÇÃO
    function desativaPorTipoTransacao($id_tipo_transacao) { 
      $sql = " UPDATE seg_permissao
               SET publicado = 0, ativo = 0
               WHERE id_tipo_transacao = '$id_tipo_transacao";
      return $this->executarIUD($sql);
    }
}
?>