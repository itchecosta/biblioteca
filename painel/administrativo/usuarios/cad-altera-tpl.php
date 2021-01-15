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
            <small>cadastro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Usuário</a></li>
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
                  <h3 class="box-title">Dados do Usuário</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form data-toggle="validator" role="form" id="form" enctype="multipart/form-data" action="process.php" method="post" {VALIDA_SENHA}>
                  <div class="box-body">
                    <div class="form-group col-xs-8">
                      <label for="fNome">Nome</label>
                      <input type="text" class="form-control" id="fNome" name="fNome" placeholder="Nome completo" value="{USUARIO}" required>
                    </div>
                      <div class="form-group col-xs-4">
                      <label for="fLogin">Login</label>
                      <input type="text" class="form-control" id="fLogin" name="fLogin" placeholder="login" value="{LOGIN}" required>
                    </div>
                     <div class="form-group col-xs-8">
                      <label for="fEmail">Email</label>
                      <input type="email" class="form-control" id="fEmail" name="fEmail" placeholder="E-mail" value="{EMAIL}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="fGrupo">Grupo</label>
                        <select class="form-control select2" id="fGrupo" name="fGrupo" style="width: 100%;" required>
                            <!-- BEGIN GRUPO_BLOCK -->
                            <option value="{IDGRUPO}" {SELECTED_GRUPO} >{GRUPO}</option>
                            <!-- END GRUPO_BLOCK-->
                        </select>
                      </div>
                      
                    <!-- BEGIN SENHA_BLOCK -->
                    {INPUT_SENHA}

                    <!-- END SENHA_BLOCK-->
                    
                    <div class="form-group col-xs-8">
                      <label for="fImagem">Foto</label>
                      <input type="file" id="fImagem" name="fImagem">
                      <p class="help-block">JPG e PNG. Tamanho de 100x100</p>
                    </div>
                    <div class="form-group col-xs-4">
                      <label for="fImagem">Foto Atual</label>
                          {IMAGEM}
                        <p class="help-block"></p>
                    </div>
                    
                    <div class="checkbox col-xs-4">
                      <label>
                        <input type="hidden" id="fPublicado" name="fPublicado" value="1" >
                      </label>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" id="operacao" name="operacao" value="{OP}" >
                    <input type="hidden" id="fId" name="fId" value="{IDUSUARIO}" >
                    <input type="hidden" id="fImagemAtual" name="fImagemAtual" value="{IMAGEMATUAL}" >
                    <input type="hidden" id="fDataCadastro" name="fDataCadastro" value="{DATACADASTRO}" >
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
