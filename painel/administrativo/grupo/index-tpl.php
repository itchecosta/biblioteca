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
            Gerência de Grupos de Usuários
            <small><a class="btn btn-xs btn-social btn-primary" href="{CAMINHO}administrativo/grupo/cad-altera.php?&sOP=1" title="Cadastrar" ><i class="fa fa-plus" aria-hidden="true"></i>Adicionar novo</a></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{CAMINHO}index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Administrativo</a></li>
            <li><a href="#">Grupo</a></li>
            <li class="active">Consulta</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         
         
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Lista de Grupos de Usuários</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Grupo</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- BEGIN LISTA_GRUPO_BLOCK -->
                       <tr>
                        <td>{GRUPO}</td>
                         <td>
                            <a class="btn btn-xs btn-social btn-warning" href="{CAMINHO}administrativo/permissao/cad-altera.php?nId={IDGRUPO}&sOP=2" title="Editar Permissões" ><i class="fa fa-unlock"></i>Permissões</a>
                            <a class="btn btn-xs btn-social btn-info" href="{CAMINHO}administrativo/grupo/cad-altera.php?nId={IDGRUPO}&sOP=2" title="Editar" ><i class="fa fa-edit"></i>Editar</a>
                            <a class="btn btn-xs btn-social btn-danger" href="{CAMINHO}administrativo/grupo/process.php?nId={IDGRUPO}&operacao=excluir" title="Excluir" ><i class="fa fa-trash-o"></i>Excluir</a>
                        </td>
                      </tr>
                      <!-- END LISTA_GRUPO_BLOCK -->
                      <!-- BEGIN GRUPO_VAZIO -->
                      <tr>
                        <td>Other browsers</td>
                        <td>-</td>
                      </tr>
                      <!-- END GRUPO_VAZIO -->
                      
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Grupo</th>
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
    <script src="{CAMINHO}plugins/jQuery/jQuery-2.1.4.min.js"></script>
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
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>


  </body>
</html>
