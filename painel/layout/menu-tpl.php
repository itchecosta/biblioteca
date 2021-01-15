<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{IMAGEM_USUARIO}" class="img-circle" alt="User Image" width="45" height="45" >
        </div>
        <div class="pull-left info">
          <p>{NOMEUSUARIO}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <a href="{CAMINHO}administrativo/login/processa.php?sOP=Logoff" style="float:right;">
            <i class="fa fa-sign-out text-danger"></i> Sair
          </a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
    	
        <!-- CON_LIVRO -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Gerenciar Livros</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{CAMINHO}con-livro/index.php"><i class="fa fa-search"></i>Consultar</a></li>
            <li><a href="{CAMINHO}con-livro/cad-altera.php?sOP=1"><i class="fa fa-plus"></i>Cadastrar</a></li>
          </ul>
        </li>

    	
        <!-- CON_LIVRO_USUARIO -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Gerenciar Con Livro Usuario</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{CAMINHO}con-livro-usuario/index.php"><i class="fa fa-search"></i>Consultar</a></li>
            <li><a href="{CAMINHO}con-livro-usuario/cad-altera.php?sOP=1"><i class="fa fa-plus"></i>Cadastrar</a></li>
          </ul>
        </li>

    	
        <!-- CON_PEDIDO -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Gerenciar Pedidos</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{CAMINHO}con-pedido/index.php"><i class="fa fa-search"></i>Consultar</a></li>
            <li><a href="{CAMINHO}con-pedido/cad-altera.php?sOP=1"><i class="fa fa-plus"></i>Cadastrar</a></li>
          </ul>
        </li>

    	  
        
        <!-- INFORMAÇÕES GERAIS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span>Informações Gerais</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{CAMINHO}con-info-geral/cad-altera.php?nId=1&sOP=2"><i class="fa fa-plus"></i>Alterar</a></li>
          </ul>
        </li>
        <!-- ADMINISTRATIVO -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Administrativo</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{CAMINHO}administrativo/usuarios/alt-senha.php?nId={IDUSUARIO_LOGADO}&sOP=2"><i class="fa fa-unlock-alt"></i>Alterar Senha</a></li>
            <li><a href="{CAMINHO}administrativo/usuarios/index.php"><i class="fa fa-user"></i>Usuários</a></li>
            <li><a href="{CAMINHO}administrativo/grupo/index.php"><i class="fa fa-users"></i>Grupo de Usuários</a></li>
            <li><a href="{CAMINHO}administrativo/transacao/index.php"><i class="fa fa-circle-o"></i>Gerenciar Transações</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i>Logs de Transações</a></li>
          </ul>
        </li>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>