<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?= SITE_NAME ;?></title>
  <link rel="stylesheet" href="_assets/plugins/fontawesome-free/css/all.min.css">    
  <link rel="stylesheet" href="_assets/dist/css/adminlte.min.css"> 
  <link rel="stylesheet" href="_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="_assets/css/intro/introjs.min.css">
  <link rel="icon"       href="_assets/dist/img/icon.png">  

  <script type="text/javascript" src="_assets/jquery-3.6.1.js"></script>
  <script type="text/javascript" src="<?php echo 'js/api.js'."?v=".time(); ?>"></script>

  <style type="text/css">
  body{
    font-family: math !important;
  }
  
  .backdrop-login{
    background-image: url('_assets/dist/img/back_login.jpg');
    background-repeat: round;   
  }
</style>

</head>

<body class="login-page backdrop-login">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline" style="position: fixed; top: 0; right: 0; bottom: 0; background-color: #f6fdffd9; box-shadow: -6px -6px 10px #6cdd6b; border-color: transparent;">
    <div class="card-header text-center">     
      <img src="_assets/dist/img/logoRSSM.png" width="150" height="150"><br>
      <a href="#" class="h1"><b>SIM-</b>RS</a>
      <p class="login-box-msg h6">( <u>Sistem Informasi Manajemen Rumah Sakit</u> )</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masuk untuk memulai session anda</p>
      <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger border-bottom-dangerottom-danger">
          <i class="fa fa-exclamation-circle"></i>
          <?php echo session()->getFlashdata('error'); ?>
        </div>
      <?php endif; ?>
      <form>
        <?= csrf_field(); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="user_names" id="user_names" value="ADMIN">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="0">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingatkan saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-danger btn-block" onclick="login();">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#" onclick="forget();">I forgot my password</a>
      </p>      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<script src="_assets/plugins/jquery/jquery.min.js"></script>
<script src="_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="_assets/dist/js/adminlte.min.js"></script>
<script src="_assets/plugins/toastr/toastr.min.js"></script>
<script src="_assets/css/intro/intro.min.js"></script>
<script src="_assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(e) {
  $("#user_names").trigger('focus');
  $('#user_names').keydown(function( event ) {
    switch(event.which){
      case 13:
      $('#password').trigger('focus');
      break;
    }
  });

  $('#password').keydown(function( event ) {
    switch(event.which){
      case 13:
      login();
      break;
    }
  });
});

function forget(){
  Toast.fire({
    icon: 'warning',
    title: "Hubungi Administrator untuk Lupa Password!!"
  })   
}

const Toast = Swal.mixin({
  toast: true,
  position: 'center',
  showConfirmButton: false,
  timer: 5000
}); 

function login(){
  var param = {
    username: $("#user_names").val().toUpperCase(),
    // password: SHA1($("#password").val())
    password: $("#password").val()
  };
  
  var field = [
    'user_names',
    'password'
  ];
      
  apiPOST("user/login", param, hasil => {
      if(hasil !== null){
        localStorage['data_user'] = JSON.stringify(hasil['data']);
        window.location.href = '.';
      }else{
        $('#user_names').val('');
        $('#password').val('');
      }
  }, field);
}
</script>
</body>
</html>
