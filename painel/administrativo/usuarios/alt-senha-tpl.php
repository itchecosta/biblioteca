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
            Gerência de Usuário
            <small>Alterar Senha</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Usuário</a></li>
            <li class="active">Alterar Senha</li>
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
                  <h3 class="box-title">Alterar Senha do Usuário</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form data-toggle="validator" role="form" id="form" enctype="multipart/form-data" action="process.php" method="post">
                  <div class="box-body">
                    <div class="form-group col-xs-4">
                          <label for="fSenha">Senha</label>
                          <input type="password" class="form-control" id="fSenhaUsuario" name="fSenhaUsuario" placeholder="de 6 a 8 digitos" data-minlength="6" required>
                          <div class="help-block">Mínimo de 6 caracteres.</div>
                        </div>
                        
                        <div class="form-group col-xs-4">
                          <label for="fSenhaConf">Confirmar Senha</label>
                          <input type="password" class="form-control" id="fSenhaUsuarioConf" name="fSenhaUsuarioConf" placeholder="confirmar senha" data-match="#fSenhaUsuario" data-match-error="Confirmação da senha não confere." required>
                          <div class="help-block with-errors"></div>
                        </div>
                    
                    <div class="checkbox col-xs-4">
                      <label>
                        <input type="hidden" id="fPublicado" name="fPublicado" value="1" >
                      </label>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" id="operacao" name="operacao" value="alterarSenha" >
                    <input type="hidden" id="fId" name="fId" value="{IDUSUARIO}" >
                    <button type="submit" class="btn btn-social btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{OP}</button>
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
  </body>
</html>
