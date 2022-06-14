
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
          <div class="login-logo">
            <a href=""><b>Admin</b>SIG</a>
              </div>
              <!-- /.login-logo -->
              <div class="login-box-body">
                  <p class="login-box-msg">Login terlebih dahulu untuk memulai</p>
                  <form action="<?=site_url('auth/process')?>" method="POST">
                      <div class="form-group has-feedback">
                          <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                      <div class="row">
                          <div class="col-xs-8">
                      </div>
                      <div class="col-xs-12">
                        <div class="" style="width: 100%">
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <div class="" style="width: 100%; margin-top : 10px; text-align: center">
                            <a href="<?= base_url() ?>auth/forgotPassword">Lupa password</a>
                        </div>
                      </div>
                    <!-- /.col -->
                  </div>
                </form>
          </div>
          <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

</body>
</html>
