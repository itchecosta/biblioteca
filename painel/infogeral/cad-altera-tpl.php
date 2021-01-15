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
            Gerência de Informações Gerais
            <small>cadastro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Informações Gerais</a></li>
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
                  <h3 class="box-title">Dados da Informações Gerais</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" enctype="multipart/form-data" action="process.php" method="post">
                  <div class="box-body">
                    <div class="form-group col-xs-6">
                      <label for="fTitulo">Título do Site <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="fTitulo" name="fTitulo" placeholder="Título do site" value="{TITULO}" required>
                    </div>

                    <div class="form-group col-xs-6">
                      <label for="fEmail">E-mail de Contato <span style="color: red;">*</span></label>
                      <input type="email" class="form-control" id="fEmail" name="fEmail" placeholder="E-mail" value="{EMAIL}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
                      <p class="help-block" style="color: red;">(para receber contato)</p>
                    </div>

                    <div class="form-group col-xs-3">
                      <label for="fTelefone">Telefone <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="fTelefone" name="fTelefone" placeholder="919999-99999" value="{TELEFONE}" >
                      <p class="help-block" style="color: red;">Ex: 91999999999</p>
                    </div>

                    <div class="form-group col-xs-3">
                      <label for="fCelular">WhatsApp</label>
                      <input type="text" class="form-control" id="fCelular" name="fCelular" placeholder="91999999999" value="{CELULAR}" >
                      <p class="help-block" style="color: red;">Ex: 91999999999 (para o link direto)</p>
                    </div>

                    <div class="form-group col-xs-6">
                      <label for="fEndereco">Endereço <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="fEndereco" name="fEndereco" placeholder="Endereço completo" value="{ENDERECO}" >
                      <p class="help-block" style="color: red;">Ex: Endereço completo</p>
                    </div>

                    <div class="form-group col-xs-4">
                      <label for="fLogo">Logo <span style="color: red;">*</span></label>
                      <input type="file" id="fLogo" name="fLogo">
                      <p class="help-block">JPG e PNG. Tamanho de 120x80</p>
                    </div>
                    <div class="form-group col-xs-4">
                      <label for="fFavicon">Favicon <span style="color: red;">*</span></label>
                      <input type="file" id="fFavicon" name="fFavicon">
                      <p class="help-block">JPG e PNG. Tamanho de 60X60</p>
                    </div>
                    
                    <div class="form-group col-xs-2">
                      <label for="fLogo">Logo Atual</label>
                          {LOGO}
                        <p class="help-block">60X60</p>
                    </div>

                    <div class="form-group col-xs-2">
                      <label for="fFavicon">Favicon Atual</label>
                          {FAVICON}
                        <p class="help-block">60X60</p>
                    </div> 

                  
                    <div class="form-group col-xs-3">
                      <label for="fSlogan">Slogan</label>
                      <input type="text" class="form-control" id="fSlogan" name="fSlogan" placeholder="Slogan" value="{SLOGAN}" >
                    </div>

                    <div class="form-group col-xs-3">
                      <label for="fDescricao">Descrição do Site <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="fDescricao" name="fDescricao" placeholder="Descrição" value="{DESCRICAO}" >
                      <p class="help-block" style="color: red;">(meta tag 'descripton')</p>
                    </div>

                    <div class="form-group col-xs-3">
                      <label for="fPalavras">Palavras-chave <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="fPalavras" name="fPalavras" placeholder="Palavras" value="{PALAVRAS}" >
                      <p class="help-block" style="color: red;">Obs: Separar por vírgula. (meta tag 'keywords')</p>
                    </div>

                    <div class="form-group col-xs-3">
                      <label for="fCopyright">Copyright <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="fCopyright" name="fCopyright" placeholder="Copyright" value="{COPYRIGHT}" >
                      <p class="help-block" style="color: red;">(rodapé)</p>
                    </div>

                    
                    <div class="form-group col-xs-12">
                      <label for="fResumo">Resumo <span style="color: red;">*</span></label>
                      <textarea name="fResumo" id="fResumo" cols="80" rows="10">{RESUMO}</textarea>
                    </div>    

                    <div class="form-group col-xs-12">
                      <label for="fSobre">Sobre a Empresa <span style="color: red;">*</span></label>
                      <textarea name="fSobre" id="fSobre" cols="80" rows="10">{SOBRE}</textarea>
                    </div>          

                    <!-- <div class="checkbox col-xs-8">
                      <label>
                        <input type="checkbox" id="fPublicado" name="fPublicado" value="1" checked="{PUBLICADO}" > Publicado
                      </label>
                    </div> -->
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" id="operacao" name="operacao" value="{OP}" >
                    <input type="hidden" id="fId" name="fId" value="{IDINFOGERAL}" >
                    <input type="hidden" id="fLogoAtual" name="fLogoAtual" value="{LOGOATUAL}" >
                    <input type="hidden" id="fFaviconAtual" name="fFaviconAtual" value="{FAVICONATUAL}" >
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
    <script src="{CAMINHO}plugins/datepicker/datepicker3.css"></script>
    <script src="{CAMINHO}plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('fResumo');
        CKEDITOR.replace('fSobre');
        
      });
    </script>
  </body>
</html>
