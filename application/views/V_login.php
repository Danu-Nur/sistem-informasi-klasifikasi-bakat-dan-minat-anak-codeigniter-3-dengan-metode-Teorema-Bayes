
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>/asset/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
      <?php echo $this->session->flashdata('pesan'); ?>
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url('Welcome') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" id="inputEmail" class="form-control" placeholder="Username" autofocus="autofocus" name="USRNAMA">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
				<?php echo form_error('USRNAMA','<div class="text-danger small ml-2">','</div>'); ?>
				
        <div class="input-group mb-3">
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="PASWORD">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
				<?php echo form_error('PASWORD','<div class="text-danger small ml-2">','</div>'); ?>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>/asset/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>/asset/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
