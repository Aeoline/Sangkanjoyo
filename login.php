<?php
include 'konek.php';

if (isset($_POST['login'])) {
  $nik = $_POST['nik'];
  $password = $_POST['password'];

  $sql_login = "SELECT * FROM data_user WHERE nik='$nik' AND password='$password'";
  $query_login = mysqli_query($konek, $sql_login);
  $data_login = mysqli_fetch_array($query_login, MYSQLI_ASSOC);
  $jumlah_login = mysqli_num_rows($query_login);

  if ($jumlah_login > 0) {
    session_start();
    $_SESSION['hak_akses'] = $data_login['hak_akses'];
    $_SESSION['nama'] = $data_login['nama'];
    $_SESSION['password'] = $data_login['password'];
    $_SESSION['nik'] = $data_login['nik'];
    
    echo "<script language='javascript'>swal('Selamat...', 'Login Berhasil!', 'success');</script>";
    echo '<meta http-equiv="refresh" content="3; url=demo1/main.php">';
    exit;
  } else {
    echo "<script language='javascript'>swal('Gagal...', 'Login Gagal', 'error');</script>";
    echo '<meta http-equiv="refresh" content="3; url=login.php">';
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<div id="preloader"></div>

<head>
  <title>Halaman Login Pemohon</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->

  
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="">
          <span class="login100-form-title p-b-26">
            Masuk
          </span>
          <span class="login100-form-title p-b-48">
            <img src="demo1/img/pekalongan.png" style="width: 150px; height: auto;"  alt="Pekalongan" />
          </span>

          <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
            <input class="input100" type="text" name="nik">
            <span class="focus-input100" data-placeholder="NIK"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i id="eye-icon" class="zmdi zmdi-eye"></i>
            </span>
            <input id="password-input" class="input100" type="password" name="password">
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" type="submit" name="login">
                Masuk
              </button>
            </div>
          </div>

          <div class="text-center p-t-115">
            <span class="txt1">
              Belum Punya Akun?
            </span>

            <a class="txt2" href="register.php">
              Daftar Disini
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

<script>
  var eyeIcon = document.getElementById("eye-icon");
  var passwordInput = document.getElementById("password-input");

  eyeIcon.addEventListener("click", function () {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("zmdi-eye");
      eyeIcon.classList.add("zmdi-eye-off");
    } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("zmdi-eye-off");
      eyeIcon.classList.add("zmdi-eye");
    }
  });
</script>

</html>