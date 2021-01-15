<header class="main-header">
    <!-- Logo -->
    <a href="{CAMINHO}index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{SITE_FAVICON}" alt="{SITE_TITULO}" style="width: 35px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{SITE_LOGO}" alt="{SITE_TITULO}" style="width: 100px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li>
            <a href="{HOST}" class="btn" title="Ver o Site" target="_blank">
              <i class="fa fa-eye fa-lg"></i>
            </a>
          </li>
          <li>
            <a href="{HOST}/webmail" class="btn" title="Acessar Webmail" target="_blank">
              <i class="fa fa-envelope fa-lg"></i>
            </a>
          </li>
          <li>
            <a href="http://bit.ly/2uzZi1E" class="btn" title="Suporte via WhatsApp" target="_blank">
              <i class="fa fa-whatsapp fa-lg"></i>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{IMAGEM_USUARIO}" class="img-circle" alt="User Image" width="19" height="19" >
              <span class="hidden-xs">{NOMEUSUARIO}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{IMAGEM_USUARIO}" class="img-circle" alt="User Image" width="90" height="90" >
                <p>
                  {NOMEUSUARIO} - {NOMEGRUPO}
                  <small>Usuário desde: {MES}/{ANO}</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{CAMINHO}administrativo/usuarios/cad-altera.php?nId={IDUSUARIO_LOGADO}&sOP=2" class="btn btn-default btn-flat" title="Ver Perfil">
                    <i class="fa fa-user fa-lg text-success"></i> Perfil
                  </a>
                </div>
                <div class="pull-left" style="padding-left: 20px;">
                  <a href="{CAMINHO}administrativo/usuarios/alt-senha.php?nId={IDUSUARIO_LOGADO}&sOP=2" class="btn btn-default btn-flat" title="Alterar Senha">
                    <i class="fa fa-unlock-alt fa-lg text-warning"></i> Senha
                  </a>
                </div>
                <div class="pull-right">
                  <a href="{CAMINHO}administrativo/login/processa.php?sOP=Logoff" class="btn btn-default btn-flat" title="Sair">
                    <i class="fa fa-sign-out fa-lg text-danger"></i> Sair
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>