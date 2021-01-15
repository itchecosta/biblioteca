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
            Gerência de Permissões de Grupos de Usuários
            <small>{GRUPO}</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Administrativo</a></li>
            <li><a href="{CAMINHO}administrativo/grupo/index.php">Grupo</a></li>
            <li class="active">Permissões</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-xs-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Dados de Permissões</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" enctype="multipart/form-data" action="process.php" method="post">
                  <div class="box-body">
                  <!-- BEGIN CATEGORIA_BLOCK -->
                    <div class="form-group form-hover col-xs-12">
                      <label for="fNome">{CATEGORIA}</label> <br/>
                      <!-- BEGIN TRANSACAO_BLOCK -->
                      <div class="checkbox col-xs-2" style="margin-top: 0px;">
                        <label for="">
                          <input type="checkbox" class="minimal" id="fTipoTransacao[]" name="fTipoTransacao[]" value="{IDTRANSACAO}" checked="{SELECTED}" > {TRANSACAO}
                        </label>
                      </div>
                      <!-- END TRANSACAO_BLOCK -->
                    </div>
                  <!-- END CATEGORIA_BLOCK -->
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" id="operacao" name="operacao" value="{OP}" >
                    <input type="hidden" id="fId" name="fId" value="{IDGRUPO}" >
                    <!-- <input type="hidden" id="fDataCadastro" name="fDataCadastro" value="{DATACADASTRO}" > -->
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
    <!-- iCheck 1.0.1 -->
    <script src="{CAMINHO}plugins/iCheck/icheck.min.js"></script>
     <!-- SlimScroll -->
    <script src="{CAMINHO}plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{CAMINHO}plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{CAMINHO}dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{CAMINHO}dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      /*$(function () {
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue'
        });
      });*/
    </script>

  </body>
</html>
