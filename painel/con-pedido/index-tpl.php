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
            Gerência de Con_pedido            <small><a class="btn btn-xs btn-social btn-primary" href="{CAMINHO}con-pedido/cad-altera.php?sOP=1" title="Cadastrar" ><i class="fa fa-plus" aria-hidden="true"></i> Adicionar novo</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Con_pedido</a></li>
            <li class="active">Consulta</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         
         
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Lista de Con_pedido</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      		                      <th>
            					Usuario			                    </th>
			                		                      <th>
            					Livro			                    </th>
			                		                      <th>
            					Status			                    </th>
			                		                      <th>
            					Dt_cadastro			                    </th>
			                		                      <th>
            					Dt_alt			                    </th>
			                		                      <th>
            					Ativo			                    </th>
			                                          <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- BEGIN CON_PEDIDO_BLOCK -->
                       <tr>

	                		             			<td>{ID_USUARIO}</td>
                			             			<td>{ID_LIVRO}</td>
                			             			<td>{STATUS}</td>
                			             			<td>{DT_CADASTRO}</td>
                			             			<td>{DT_ALT}</td>
                			             			<td>{ATIVO}</td>
                		             

                        <td>
                            <a class="btn btn-xs btn-social btn-info" href="{CAMINHO}con-pedido/cad-altera.php?nId={ID}&sOP=2" title="Editar" ><i class="fa fa-edit"></i>Editar</a>
                            <a class="btn btn-xs btn-social btn-danger" href="{CAMINHO}con-pedido/process.php?nId={ID}&operacao=excluir" title="Excluir" ><i class="fa fa-trash-o"></i>Excluir</a>
                        </td>
                      </tr>
                      <!-- END CON_PEDIDO_BLOCK -->
                      <!-- BEGIN CON_PEDIDO_VAZIO -->
                      <tr>
                                                    <th>
                        Usuario                            </th>
                                                    <th>
                        Livro                            </th>
                                                    <th>
                        Status                            </th>
                                                    <th>
                        Dt_cadastro                            </th>
                                                    <th>
                        Dt_alt                            </th>
                                                    <th>
                        Ativo                            </th>
                                                <td>-</td>
                      </tr>
                      <!-- END CON_PEDIDO_VAZIO -->
                      
                    </tbody>
                    <tfoot>
                      <tr>
                                                    <th>
                        Usuario                            </th>
                                                    <th>
                        Livro                            </th>
                                                    <th>
                        Status                            </th>
                                                    <th>
                        Dt_cadastro                            </th>
                                                    <th>
                        Dt_alt                            </th>
                                                    <th>
                        Ativo                            </th>
                                                <th>Ações</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     
      {RODAPE}
      
        <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

 <!-- jQuery 2.1.4 -->
    <script src="{CAMINHO}plugins/jQuery/jQuery-3.3.1.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{CAMINHO}bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="{CAMINHO}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{CAMINHO}plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{CAMINHO}plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{CAMINHO}plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{CAMINHO}dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{CAMINHO}dist/js/demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
          
<script>
  $(function () {
    $("#example1").DataTable({
      responsive: true,
      "order": [[ 1, "desc" ]]
    });
  });
</script>


  </body>
</html>