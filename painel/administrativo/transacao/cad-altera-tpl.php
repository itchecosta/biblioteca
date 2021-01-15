<!DOCTYPE html>
<html>
  {HEAD}
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      {TOPO}

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      {MENU}

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Gerência de Categorias de Transações
            <small>cadastro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Administrativo</a></li>
            <li><a href="{CAMINHO}administrativo/transacao/index.php">Categoria</a></li>
            <li class="active">Cadastro</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Dados da Categoria</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" enctype="multipart/form-data" action="process.php" method="post">
                  <div class="box-body">
                    <div class="form-group col-xs-8">
                      <label for="fNome">Nome</label>
                      <input type="text" class="form-control" id="fNome" name="fNome" placeholder="Nome da categoria" value="{CATEGORIA}" required>
                    </div>
                    
                    <div class="checkbox col-xs-8">
                      <label>
                        <!-- BEGIN TRANSACAO_BLOCK -->
                        <input type="checkbox" name="fTipoTransacao[]" id="fTipoTransacao[]" value="Visualizar" />Visualizar<br />
                        <input type="checkbox" name="fTipoTransacao[]" id="fTipoTransacao[]" value="Cadastrar" />Cadastrar<br />
                        <input type="checkbox" name="fTipoTransacao[]" id="fTipoTransacao[]" value="Alterar" />Alterar<br />
                        <input type="checkbox" name="fTipoTransacao[]" id="fTipoTransacao[]" value="Excluir" />Excluir<br />
                        <input type="checkbox" name="fTipoTransacao[]" id="fTipoTransacao[]" value="Desativar" />Desativar<br />
                        <!-- END TRANSACAO_BLOCK -->
                        <!-- BEGIN LISTA_TRANSACAO_BLOCK -->
                        <input type="checkbox" name="fTipoTransacao[]" id="fTipoTransacao[]" value="{TRANSACAO}" checked="{CHECKED}" />{TRANSACAO}<br />
                        <!-- END LISTA_TRANSACAO_BLOCK -->
                      </label>
                    </div>

                    <br /><br />

                    <div class="form-group col-xs-8">
                      Selecione a quantidade de novas transações:<br />
                      <select class="form-control select2 col-md-2" name="fQtd" id="fQtd" onChange="JavaScript: montaLinha(this.value);">
                          <option value="">Selecione</option>
                         <!-- BEGIN INDICE_BLOCK -->
                          <option value="{INDICE}">{INDICE}</option>
                          <!-- END INDICE_BLOCK -->
                      </select>
                    </div>

                    <div class="form-group col-xs-8" id="divTransacao"></div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" id="operacao" name="operacao" value="{OP}" >
                    <input type="hidden" id="fId" name="fId" value="{IDCATEGORIA}" >
                    <button type="submit" class="btn btn-primary">{OP}</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            
          </div>   <!-- /.row -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      {RODAPE}
      
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{CAMINHO}plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{CAMINHO}bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="{CAMINHO}plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="{CAMINHO}plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{CAMINHO}plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{CAMINHO}dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{CAMINHO}dist/js/demo.js"></script>
    
    <script src="{CAMINHO}plugins/validator/validator.min.js"></script>
    
    <script>
      $(function () {
        $('#form').validator();
        //Initialize Select2 Elements
        $(".select2").select2();
      });
    </script>

    <script language="javascript">
      function montaLinha(nValor) {
        if(nValor) {
          sHtml = "";
          for(var i=1;i<=nValor;i++) {
            sHtml += "Transação: <input type='text' class=form-control' name='fTipoTransacao[]' id='fTipoTransacao[]' size='20' placeholder='Nova Transação' ><br /><br />";
          }
          window.document.getElementById('divTransacao').innerHTML = sHtml;
        }

      }
    </script>

  </body>
</html>
