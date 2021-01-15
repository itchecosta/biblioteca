
<!DOCTYPE html>
<html>
{HEAD}

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Sistema</b>Padrão</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Logar para abrir uma sessão</p>

    <form action="administrativo/login/processa.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Login" id="fLogin" name="fLogin">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Senha" id="fSenha" name="fSenha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="hidden" name="sOP" id="sOP" value="Logar" />
          <!-- <input type="button" class="btn btn-primary btn-block btn-flat" id="login" value="Entrar"/> -->
          <button id="login" class="btn btn-primary btn-block btn-flat">
           <i class="fas fa-sign-in-alt"></i> Entrar
          </button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="#">Esqueci minha senha</a><br>
    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->




<!-- jQuery 2.2.3 -->
<script src="{CAMINHO}plugins/jQuery/jQuery-3.3.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{CAMINHO}bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{CAMINHO}plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
    $('#login').click(function(e){

        e.preventDefault();

        var fLogin   = $("#fLogin").val();
        var fSenha   = $("#fSenha").val();
        var sOP    = $("#sOP").val();

        // console.log(fLogin);

        $.ajax({
                type: 'POST',
                url: 'administrativo/login/processa.php',
                data: {
                    fLogin: fLogin,
                    fSenha: fSenha,
                    sOP: sOP
                },
                dataType : "json",
                success: function (response) {
                    // console.log(response);

                    if (response.success == true) {

                        Swal.fire({
                            title: "Seja bem-vindo!",
                            text: response.msg, 
                            type:"success",
                            showConfirmButton: false,
                            timer: 2000,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                  Swal.getContent().querySelector('strong')
                                    .textContent = Swal.getTimerLeft()
                                }, 100)
                              }
                        });
                        setTimeout(function(){
                            location.href="index.php";
                        }, 2000)

                    } else if (response.success == false) {

                        Swal.fire({
                            type: 'error',
                            title: 'Login falhou...',
                            text: response.msg
                        });

                    }
                }
        });
    });
</script>

</body>
</html>
