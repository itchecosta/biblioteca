<!DOCTYPE html>
<html>
  {HEAD}

  <!-- jQuery 2.1.4 -->
    <script src="{CAMINHO}plugins/jQuery/jQuery-3.3.1.min.js"></script>
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
            Gerência de Con_pedido            <small>cadastro</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Con_pedido</a></li>
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
                  <h3 class="box-title">Dados da Con_pedido</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" enctype="multipart/form-data" action="process.php" method="post">
                  <div class="box-body">

				 

          <div class="form-group col-xs-3">
            <label for="id_usuario">Usuario</label>
            <select class="form-control select2" id="id_usuario" name="id_usuario" style="width: 100%;" required>
                <option value="0">-SELECIONE-</option>
                <!-- BEGIN USUARIO_BLOCK -->
                <option value="{USUARIO_ID}" {SELECTED_USUARIO} >{USUARIO}</option>
                <!-- END USUARIO_BLOCK-->
            </select>
          </div>

			     

          <div class="form-group col-xs-3">
            <label for="id_livro">Livro</label>
            <select class="form-control select2" id="id_livro" name="id_livro" style="width: 100%;" required>
                <option value="0">-SELECIONE-</option>
                <!-- BEGIN LIVRO_BLOCK -->
                <option value="{LIVRO_ID}" {SELECTED_LIVRO} >{LIVRO}</option>
                <!-- END LIVRO_BLOCK-->
            </select>
          </div>

			    
					  <div class="form-check form-check-inline col-xs-3">
              <label for="status">Status</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <input class="form-check-input" type="radio" id="status1" name="status" value="1" {CHECKED_STATUS_1}>
                </div>
                <input type="text" class="form-control" value="SIM" readonly>
              </div><!-- /.input group -->

              <div class="input-group">
                <div class="input-group-addon">
                  <input class="form-check-input" type="radio" id="status2" name="status" value="2" {CHECKED_STATUS_2}>
                </div>
                <input type="text" class="form-control" value="NÃO" readonly>
              </div><!-- /.input group -->

            </div>


        
					<input name="dt_cadastro" type="hidden" id="dt_cadastro" value="{DT_CADASTRO}">
                                		  
				
            <div class="form-group col-xs-3">
              <label for="dt_alt">Dt_alt</label>
              <input type="text" class="form-control" id="dt_alt" name="dt_alt" placeholder="Dt_alt" value="{DT_ALT}" required>
            </div>

        
					<input name="ativo" type="hidden" id="ativo" value="{ATIVO}">
                                		  
				 
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="hidden" id="operacao" name="operacao" value="{OP}" >
                    <input type="hidden" id="fId" name="fId" value="{IDCON_PEDIDO}" >
                    <!-- <input type="hidden" id="fImagemAtual" name="fImagemAtual" value="{IMAGEMATUAL}" >
                    <input type="hidden" id="fDataCadastro" name="fDataCadastro" value="{DATACADASTRO}" > -->
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