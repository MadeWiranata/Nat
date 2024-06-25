<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>wiranata</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/kunci/kk.min.js'); ?>"></script>
  <link href='<?= base_url() ?>picture/logo.png' rel='shortcut icon'>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b></b>
    </div>
    <div class="login-box-body">
      <div class="login-box-msg" align-center="center">
        <img src='<?= base_url() ?>picture/logo.png' alt="Image" style="width:50px;height:60px;" />
      </div>
      <form action="<?= site_url('login/process') ?>" method="post">
        <div class="panel-body">
          <div class="form-group">
            <input type="text" name="username" class="form-control input-lg" placeholder="Enter Username" required>
            <span class="glyphicon fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Enter Password" required />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-eye-close" style="cursor:pointer"></span>
              </span>
            </div>
          </div>
          
            <div class="form-group">
              <button type="submit" name="login" style="width: 100%; float: center" class="btn-sm btn-primary btn-md float-center fa fa-sign-in"> Login</button>
            </div>
          
      </form>
    </div>
  </div>
</body>

</html>
<script>
  $(document).ready(function() {
    $(".glyphicon").bind("click", function() {
      if ($('#password').attr('type') == 'password') {
        $('#password').attr('type', 'text');
        $('.glyphicon').removeClass('glyphicon-eye-open');
        $('.glyphicon').addClass('glyphicon-eye-close');
      } else if ($('#password').attr('type') == 'text') {
        $('#password').attr('type', 'password');
        $('.glyphicon').removeClass('glyphicon-eye-close');
        $('.glyphicon').addClass('glyphicon-eye-open');
      }
    })
  });
</script>