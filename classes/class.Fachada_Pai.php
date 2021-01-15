<?php 
// Powered by Gerador de Metódo - https://www.newboxinfo.com.br/
// Artefato gerado em 11/01/2021 - 22:25:07

include_once dirname(__FILE__).'/con_info_geral/class.CadCon_info_geral.php';
include_once dirname(__FILE__).'/con_livro/class.CadCon_livro.php';
include_once dirname(__FILE__).'/con_livro_usuario/class.CadCon_livro_usuario.php';
include_once dirname(__FILE__).'/con_pedido/class.CadCon_pedido.php';
include_once dirname(__FILE__).'/seg_categoria_tipo_transacao/class.CadSeg_categoria_tipo_transacao.php';
include_once dirname(__FILE__).'/seg_grupo_usuario/class.CadSeg_grupo_usuario.php';
include_once dirname(__FILE__).'/seg_permissao/class.CadSeg_permissao.php';
include_once dirname(__FILE__).'/seg_tipo_transacao/class.CadSeg_tipo_transacao.php';
include_once dirname(__FILE__).'/seg_transacao/class.CadSeg_transacao.php';
include_once dirname(__FILE__).'/seg_transacao_acesso/class.CadSeg_transacao_acesso.php';
include_once dirname(__FILE__).'/seg_usuario/class.CadSeg_usuario.php';
include_once dirname(__FILE__).'/class.Conexao.php';
include_once dirname(__FILE__).'/class.Util.php';
include_once dirname(__FILE__).'/class.Paginacao.php';
include_once dirname(__FILE__).'/class.Constante.php';
include_once dirname(__FILE__).'/dompdf/dompdf_config.inc.php';
include_once dirname(__FILE__).'/Template.class.php';


class Fachada_Pai{
  var $conexao;

  function Fachada_Pai(){
    $this->conexao = NULL;
  }

  function getConexao(){
    return $this->conexao;
  }

  function iniciarTransacao(){
    $this->conexao = new Conexao();
    $this->conexao->iniciarTrans();
  }

  function commitTransacao(){
    $this->conexao->commitTrans();
    $this->conexao = NULL;
  }

  function rollBackTransacao(){
    $this->conexao->rollBackTrans();
    $this->conexao = NULL;
  }

//Metodos da Classe Con_info_geral

  function inserirCon_info_geral($con_info_geral) { 
    $cadCon_info_geral = new CadCon_info_geral($this->getConexao());
    return $cadCon_info_geral->inserirCon_info_geral($con_info_geral);
  }

  function alterarCon_info_geral($con_info_geral) { 
    $cadCon_info_geral = new CadCon_info_geral($this->getConexao());
    return $cadCon_info_geral->alterarCon_info_geral($con_info_geral);
  }

  function excluirCon_info_geral($con_info_geral) { 
    $cadCon_info_geral = new CadCon_info_geral($this->getConexao());
    return $cadCon_info_geral->excluirCon_info_geral($con_info_geral);
  }

  function getCon_info_geral($id) { 
    $cadCon_info_geral = new CadCon_info_geral();
    return $cadCon_info_geral->getCon_info_geral($id);
  }

  function getAllCon_info_geral($ini = NULL, $num = NULL) { 
    $cadCon_info_geral = new CadCon_info_geral();
    return $cadCon_info_geral->getAllCon_info_geral($ini, $num);
  }

//Metodos da Classe Con_livro

  function inserirCon_livro($con_livro) { 
    $cadCon_livro = new CadCon_livro($this->getConexao());
    return $cadCon_livro->inserirCon_livro($con_livro);
  }

  function alterarCon_livro($con_livro) { 
    $cadCon_livro = new CadCon_livro($this->getConexao());
    return $cadCon_livro->alterarCon_livro($con_livro);
  }

  function excluirCon_livro($con_livro) { 
    $cadCon_livro = new CadCon_livro($this->getConexao());
    return $cadCon_livro->excluirCon_livro($con_livro);
  }

  function getCon_livro($id) { 
    $cadCon_livro = new CadCon_livro();
    return $cadCon_livro->getCon_livro($id);
  }

  function getAllCon_livro($ini = NULL, $num = NULL) { 
    $cadCon_livro = new CadCon_livro();
    return $cadCon_livro->getAllCon_livro($ini, $num);
  }

//Metodos da Classe Con_livro_usuario

  function inserirCon_livro_usuario($con_livro_usuario) { 
    $cadCon_livro_usuario = new CadCon_livro_usuario($this->getConexao());
    return $cadCon_livro_usuario->inserirCon_livro_usuario($con_livro_usuario);
  }

  function alterarCon_livro_usuario($con_livro_usuario) { 
    $cadCon_livro_usuario = new CadCon_livro_usuario($this->getConexao());
    return $cadCon_livro_usuario->alterarCon_livro_usuario($con_livro_usuario);
  }

  function excluirCon_livro_usuario($con_livro_usuario) { 
    $cadCon_livro_usuario = new CadCon_livro_usuario($this->getConexao());
    return $cadCon_livro_usuario->excluirCon_livro_usuario($con_livro_usuario);
  }

  function getCon_livro_usuario($id) { 
    $cadCon_livro_usuario = new CadCon_livro_usuario();
    return $cadCon_livro_usuario->getCon_livro_usuario($id);
  }

  function getAllCon_livro_usuario($ini = NULL, $num = NULL) { 
    $cadCon_livro_usuario = new CadCon_livro_usuario();
    return $cadCon_livro_usuario->getAllCon_livro_usuario($ini, $num);
  }

//Metodos da Classe Con_pedido

  function inserirCon_pedido($con_pedido) { 
    $cadCon_pedido = new CadCon_pedido($this->getConexao());
    return $cadCon_pedido->inserirCon_pedido($con_pedido);
  }

  function alterarCon_pedido($con_pedido) { 
    $cadCon_pedido = new CadCon_pedido($this->getConexao());
    return $cadCon_pedido->alterarCon_pedido($con_pedido);
  }

  function excluirCon_pedido($con_pedido) { 
    $cadCon_pedido = new CadCon_pedido($this->getConexao());
    return $cadCon_pedido->excluirCon_pedido($con_pedido);
  }

  function getCon_pedido($id) { 
    $cadCon_pedido = new CadCon_pedido();
    return $cadCon_pedido->getCon_pedido($id);
  }

  function getAllCon_pedido($ini = NULL, $num = NULL) { 
    $cadCon_pedido = new CadCon_pedido();
    return $cadCon_pedido->getAllCon_pedido($ini, $num);
  }

//Metodos da Classe Seg_categoria_tipo_transacao

  function inserirSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao) { 
    $cadSeg_categoria_tipo_transacao = new CadSeg_categoria_tipo_transacao($this->getConexao());
    return $cadSeg_categoria_tipo_transacao->inserirSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao);
  }

  function alterarSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao) { 
    $cadSeg_categoria_tipo_transacao = new CadSeg_categoria_tipo_transacao($this->getConexao());
    return $cadSeg_categoria_tipo_transacao->alterarSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao);
  }

  function excluirSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao) { 
    $cadSeg_categoria_tipo_transacao = new CadSeg_categoria_tipo_transacao($this->getConexao());
    return $cadSeg_categoria_tipo_transacao->excluirSeg_categoria_tipo_transacao($seg_categoria_tipo_transacao);
  }

  function getSeg_categoria_tipo_transacao($id) { 
    $cadSeg_categoria_tipo_transacao = new CadSeg_categoria_tipo_transacao();
    return $cadSeg_categoria_tipo_transacao->getSeg_categoria_tipo_transacao($id);
  }

  function getAllSeg_categoria_tipo_transacao($ini = NULL, $num = NULL) { 
    $cadSeg_categoria_tipo_transacao = new CadSeg_categoria_tipo_transacao();
    return $cadSeg_categoria_tipo_transacao->getAllSeg_categoria_tipo_transacao($ini, $num);
  }

//Metodos da Classe Seg_grupo_usuario

  function inserirSeg_grupo_usuario($seg_grupo_usuario) { 
    $cadSeg_grupo_usuario = new CadSeg_grupo_usuario($this->getConexao());
    return $cadSeg_grupo_usuario->inserirSeg_grupo_usuario($seg_grupo_usuario);
  }

  function alterarSeg_grupo_usuario($seg_grupo_usuario) { 
    $cadSeg_grupo_usuario = new CadSeg_grupo_usuario($this->getConexao());
    return $cadSeg_grupo_usuario->alterarSeg_grupo_usuario($seg_grupo_usuario);
  }

  function excluirSeg_grupo_usuario($seg_grupo_usuario) { 
    $cadSeg_grupo_usuario = new CadSeg_grupo_usuario($this->getConexao());
    return $cadSeg_grupo_usuario->excluirSeg_grupo_usuario($seg_grupo_usuario);
  }

  function getSeg_grupo_usuario($id_seg_grupo_usuario) { 
    $cadSeg_grupo_usuario = new CadSeg_grupo_usuario();
    return $cadSeg_grupo_usuario->getSeg_grupo_usuario($id_seg_grupo_usuario);
  }

  function getAllSeg_grupo_usuario($ini = NULL, $num = NULL) { 
    $cadSeg_grupo_usuario = new CadSeg_grupo_usuario();
    return $cadSeg_grupo_usuario->getAllSeg_grupo_usuario($ini, $num);
  }

//Metodos da Classe Seg_permissao

  function inserirSeg_permissao($seg_permissao) { 
    $cadSeg_permissao = new CadSeg_permissao($this->getConexao());
    return $cadSeg_permissao->inserirSeg_permissao($seg_permissao);
  }

  function getAllSeg_permissao($ini = NULL, $num = NULL) { 
    $cadSeg_permissao = new CadSeg_permissao();
    return $cadSeg_permissao->getAllSeg_permissao($ini, $num);
  }

//Metodos da Classe Seg_tipo_transacao

  function inserirSeg_tipo_transacao($seg_tipo_transacao) { 
    $cadSeg_tipo_transacao = new CadSeg_tipo_transacao($this->getConexao());
    return $cadSeg_tipo_transacao->inserirSeg_tipo_transacao($seg_tipo_transacao);
  }

  function alterarSeg_tipo_transacao($seg_tipo_transacao) { 
    $cadSeg_tipo_transacao = new CadSeg_tipo_transacao($this->getConexao());
    return $cadSeg_tipo_transacao->alterarSeg_tipo_transacao($seg_tipo_transacao);
  }

  function excluirSeg_tipo_transacao($seg_tipo_transacao) { 
    $cadSeg_tipo_transacao = new CadSeg_tipo_transacao($this->getConexao());
    return $cadSeg_tipo_transacao->excluirSeg_tipo_transacao($seg_tipo_transacao);
  }

  function getSeg_tipo_transacao($id_tipo_transacao) { 
    $cadSeg_tipo_transacao = new CadSeg_tipo_transacao();
    return $cadSeg_tipo_transacao->getSeg_tipo_transacao($id_tipo_transacao);
  }

  function getAllSeg_tipo_transacao($ini = NULL, $num = NULL) { 
    $cadSeg_tipo_transacao = new CadSeg_tipo_transacao();
    return $cadSeg_tipo_transacao->getAllSeg_tipo_transacao($ini, $num);
  }

//Metodos da Classe Seg_transacao

  function inserirSeg_transacao($seg_transacao) { 
    $cadSeg_transacao = new CadSeg_transacao($this->getConexao());
    return $cadSeg_transacao->inserirSeg_transacao($seg_transacao);
  }

  function alterarSeg_transacao($seg_transacao) { 
    $cadSeg_transacao = new CadSeg_transacao($this->getConexao());
    return $cadSeg_transacao->alterarSeg_transacao($seg_transacao);
  }

  function excluirSeg_transacao($seg_transacao) { 
    $cadSeg_transacao = new CadSeg_transacao($this->getConexao());
    return $cadSeg_transacao->excluirSeg_transacao($seg_transacao);
  }

  function getSeg_transacao($id_seg_transacao) { 
    $cadSeg_transacao = new CadSeg_transacao();
    return $cadSeg_transacao->getSeg_transacao($id_seg_transacao);
  }

  function getAllSeg_transacao($ini = NULL, $num = NULL) { 
    $cadSeg_transacao = new CadSeg_transacao();
    return $cadSeg_transacao->getAllSeg_transacao($ini, $num);
  }

//Metodos da Classe Seg_transacao_acesso

  function inserirSeg_transacao_acesso($seg_transacao_acesso) { 
    $cadSeg_transacao_acesso = new CadSeg_transacao_acesso($this->getConexao());
    return $cadSeg_transacao_acesso->inserirSeg_transacao_acesso($seg_transacao_acesso);
  }

  function alterarSeg_transacao_acesso($seg_transacao_acesso) { 
    $cadSeg_transacao_acesso = new CadSeg_transacao_acesso($this->getConexao());
    return $cadSeg_transacao_acesso->alterarSeg_transacao_acesso($seg_transacao_acesso);
  }

  function excluirSeg_transacao_acesso($seg_transacao_acesso) { 
    $cadSeg_transacao_acesso = new CadSeg_transacao_acesso($this->getConexao());
    return $cadSeg_transacao_acesso->excluirSeg_transacao_acesso($seg_transacao_acesso);
  }

  function getSeg_transacao_acesso($id_transacao_acesso) { 
    $cadSeg_transacao_acesso = new CadSeg_transacao_acesso();
    return $cadSeg_transacao_acesso->getSeg_transacao_acesso($id_transacao_acesso);
  }

  function getAllSeg_transacao_acesso($ini = NULL, $num = NULL) { 
    $cadSeg_transacao_acesso = new CadSeg_transacao_acesso();
    return $cadSeg_transacao_acesso->getAllSeg_transacao_acesso($ini, $num);
  }

//Metodos da Classe Seg_usuario

  function inserirSeg_usuario($seg_usuario) { 
    $cadSeg_usuario = new CadSeg_usuario($this->getConexao());
    return $cadSeg_usuario->inserirSeg_usuario($seg_usuario);
  }

  function alterarSeg_usuario($seg_usuario) { 
    $cadSeg_usuario = new CadSeg_usuario($this->getConexao());
    return $cadSeg_usuario->alterarSeg_usuario($seg_usuario);
  }

  function excluirSeg_usuario($seg_usuario) { 
    $cadSeg_usuario = new CadSeg_usuario($this->getConexao());
    return $cadSeg_usuario->excluirSeg_usuario($seg_usuario);
  }

  function getSeg_usuario($id_seg_usuario) { 
    $cadSeg_usuario = new CadSeg_usuario();
    return $cadSeg_usuario->getSeg_usuario($id_seg_usuario);
  }

  function getAllSeg_usuario($ini = NULL, $num = NULL) { 
    $cadSeg_usuario = new CadSeg_usuario();
    return $cadSeg_usuario->getAllSeg_usuario($ini, $num);
  }

}
?>