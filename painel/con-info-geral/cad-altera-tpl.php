<!DOCTYPE html>
<html>
  {HEAD}

  <!-- jQuery 2.1.4 -->
    <script src="{CAMINHO}plugins/jQuery/jQuery-3.3.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{CAMINHO}bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{CAMINHO}plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{CAMINHO}plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{CAMINHO}dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{CAMINHO}dist/js/demo.js"></script>
    <!-- date-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{CAMINHO}plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="{CAMINHO}plugins/timepicker/bootstrap-timepicker.min.js"></script>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    <script src="{CAMINHO}plugins/validator/validator.min.js"></script>
    
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
            Gerência de Con_info_geral            <small>cadastro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Con_info_geral</a></li>
            <li class="active">Cadastro</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Dados da Con_info_geral</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" enctype="multipart/form-data" action="process.php" method="post">
                  <div class="box-body">

				
            <div class="form-group col-xs-3">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{TITULO}" required>
            </div>

        
            <div class="form-group col-xs-3">
              <label for="slogan">Slogan</label>
              <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Slogan" value="{SLOGAN}" required>
            </div>

        
            <div class="form-group col-xs-3">
              <label for="descricao">Descricao</label>
              <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descricao" value="{DESCRICAO}" required>
            </div>

        
            <div class="form-group col-xs-3">
              <label for="palavras">Palavras</label>
              <input type="text" class="form-control" id="palavras" name="palavras" placeholder="Palavras" value="{PALAVRAS}" required>
            </div>

        
            <div class="form-group col-xs-3">
              <label for="copyright">Copyright</label>
              <input type="text" class="form-control" id="copyright" name="copyright" placeholder="Copyright" value="{COPYRIGHT}" required>
            </div>

        
            <div class="form-group col-xs-3">
              <label for="endereco">Endereco</label>
              <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereco" value="{ENDERECO}" required>
            </div>

        
            <div class="form-group col-xs-3">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="{TELEFONE}" required>
            </div>

        
            <div class="form-group col-xs-3">
              <label for="celular">Celular</label>
              <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="{CELULAR}" required>
            </div>

        
            <div class="form-group col-xs-3">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{EMAIL}" required>
            </div>

        
            <div class="form-group col-xs-4">
              <label for="logo">Logo</label>
              <input type="file" id="logo" name="logo">
              <p class="help-block">JPG e PNG. Tamanho de 100x100</p>
            </div>
            <div class="form-group col-xs-4">
              <label for="logo">Logo Atual</label>
                  {LOGO}
                <p class="help-block"></p>
            </div>

        
            <div class="form-group col-xs-4">
              <label for="favicon">Favicon</label>
              <input type="file" id="favicon" name="favicon">
              <p class="help-block">JPG e PNG. Tamanho de 100x100</p>
            </div>
            <div class="form-group col-xs-4">
              <label for="favicon">Favicon Atual</label>
                  {FAVICON}
                <p class="help-block"></p>
            </div>

                    <div class="form-group col-xs-6">
              <label for="resumo">Resumo</label>
              <textarea name="resumo" id="resumo" cols="80" rows="10">{RESUMO}</textarea>
            </div>
      
          <script>
            $(function () {
              CKEDITOR.replace('resumo');              
            });
          </script>

        
					<input name="dt_cadastro" type="hidden" id="dt_cadastro" value="{DT_CADASTRO}">
                                		  
				
            <div class="form-group col-xs-3">
              <label for="publicado">Publicado</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <input class="form-check-input" type="checkbox" id="publicado" name="publicado" value="1" {CHECKED_PUBLICADO}>
                </div>
                <input type="text" class="form-control" value="Publicado" readonly>
              </div><!-- /.input group -->
            </div>

        
					<input name="ativo" type="hidden" id="ativo" value="{ATIVO}">
                                		  
				 
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" id="operacao" name="operacao" value="{OP}" >
                    <input type="hidden" id="fId" name="fId" value="{IDCON_INFO_GERAL}" >
                    <input type="hidden" id="fLogoAtual" name="fLogoAtual" value="{LOGOATUAL}" >
                    <input type="hidden" id="fFaviconAtual" name="fFaviconAtual" value="{FAVICONATUAL}" >
                    <!-- <input type="hidden" id="fDataCadastro" name="fDataCadastro" value="{DATACADASTRO}" > -->
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

    <script>
      $(function () {
        $('#form').validator();
        //Initialize Select2 Elements
        $(".select2").select2();
      });
    </script>

  </body>
</html>