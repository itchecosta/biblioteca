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
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- CLIENTE -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Cliente</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{CAMINHO}cliente/index.php"><i class="fa fa-search"></i>Consultar</a></li>
            <li><a href="{CAMINHO}cliente/cad-altera.php?sOP=1"><i class="fa fa-plus"></i>Cadastrar</a></li>
          </ul>
        </li>
        <!-- ARQUIVOS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Arquivos</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{CAMINHO}arquivo/index.php"><i class="fa fa-search"></i>Consultar</a></li>
            <li><a href="{CAMINHO}arquivo/cad-altera.php?sOP=1"><i class="fa fa-plus"></i>Cadastrar</a></li>
          </ul>
        </li>
        <!-- POSTAGENS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Postagens</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{CAMINHO}postagem/index.php"><i class="fa fa-search"></i>Consultar</a></li>
            <li><a href="{CAMINHO}postagem/cad-altera.php?sOP=1"><i class="fa fa-plus"></i>Cadastrar</a></li>
            <li><a href="{CAMINHO}postagem/autor/index.php"><i class="fa fa-user"></i>Gerenciar Autores</a></li>
            <li><a href="{CAMINHO}postagem/categoria/index.php"><i class="fa fa-user"></i>Gerenciar Categorias</a></li>
            <li><a href="{CAMINHO}postagem/tipo/index.php"><i class="fa fa-user"></i>Gerenciar Tipos</a></li>
          </ul>
        </li>
        <!-- INFORMAÇÕES GERAIS -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span>Informações Gerais</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{CAMINHO}infogeral/cad-altera.php?nId=1&sOP=2"><i class="fa fa-plus"></i>Alterar</a></li>
          </ul>
        </li>
        <!-- ADMINISTRATIVO -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Administrativo</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{CAMINHO}administrativo/usuarios/index.php"><i class="fa fa-user"></i>Usuários</a></li>
            <li><a href="{CAMINHO}administrativo/grupo/index.php"><i class="fa fa-users"></i>Grupo de Usuários</a></li>
            <li><a href="{CAMINHO}administrativo/transacao/index.php"><i class="fa fa-circle-o"></i>Gerenciar Transações</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i>Logs de Transações</a></li>
          </ul>
        </li>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>