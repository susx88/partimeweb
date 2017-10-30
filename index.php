
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | Partime</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <meta name="author" content="" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" />

    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" /> -->
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="assets/js/access.js"></script>

  </head>
  <body class="login-page bg-login">
    <div class="login-box">
      <div style="color:#3c8dbc" class="login-logo">
        <img style="margin-top:-12px" src="assets/img/logo-blue.png" alt="Logo" height="50"> <b>PARTIME WEB CRM</b>
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Por favor Inicie Sesión</p>
        <br/>
        <form action="login-check.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" id="username" placeholder="Rut" autocomplete="off" required />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" id="password"  onkeydown="esEnter();" placeholder="Contraseña" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div id="errorMessageImg" style="height: 25px; margin-top: -10px; margin-bottom: 5px; text-align: center;">
          </div>
          <div class="row">
            <div class="col-xs-12">
              <input type="button" onclick="validLogin()" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Ingresar" />
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->

      <div id="errorMessage" style="display: none">
        <div class='alert alert-danger alert-dismissable'>
          
          <span id="tituloError"><h4>  <i class='icon fa fa-times-circle'></i> Error al entrar!</h4></span>
         <span id="mensajeError">Usuario o la contraseña es incorrecta, vuelva a verificar su nombre de usuario y contraseña.</span>
        </div>
      </div>
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

  </body>
</html>