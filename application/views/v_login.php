<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel | Verifikasi UJIKOM</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?php echo base_url('images/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/animate/animate.css')?>">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/daterangepicker/daterangepicker.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/util.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css')?>">
<!--===============================================================================================-->
<?php echo $script_captcha; // javascript recaptcha ?>
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
        <form class="login100-form validate-form flex-sb flex-w" method="post" action="<?php echo site_url() ?>/login/aksi_login">
          <span class="login100-form-title p-b-32">
            Admin Login
          </span>
          <div class="" style="width: 100%">
            <div class="<?php if (isset ($class_alert)) {
            echo $class_alert;
          }  ?>"><?php if (isset ($pesan)) {
            echo $pesan;
          }  ?></div>
          </div>
          <!-- <hr><br> -->
          <span class="txt1 p-b-11">
            Username
          </span>
          <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
            <input class="input100" type="text" name="username" >
            <span class="focus-input100"></span>
          </div>
          
          <span class="txt1 p-b-11">
            Password
          </span>

          <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
            <span class="btn-show-pass">
              <i class="fa fa-eye"></i>
            </span>
            <input class="input100" type="password" name="pass" >
            <span class="focus-input100"></span>
          </div>
           <div class="" data-validate = "Password is required">
            <?php echo $captcha // tampilkan recaptcha ?>
          </div>
          <div class="flex-sb-m w-full p-b-48">
            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
              
            </div>
            
            
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/bootstrap/js/popper.js')?>"></script>
  <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/daterangepicker/moment.min.js')?>"></script>
  <script src="<?php echo base_url('vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('js/main.js')?>"></script>

</body>
</html>