<?php include 'konek.php'; ?>
<?php
    if (isset($_POST['login'])) {
        $password = $_POST['password'];
        $hak_akses = $_POST['hak_akses'];

        $sql_login = "SELECT * FROM data_user WHERE hak_akses='$hak_akses' AND password='$password'";
        $query_login = mysqli_query($konek, $sql_login);
        $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
        $jumlah_login = mysqli_num_rows($query_login);

        if ($jumlah_login > 0) {
            session_start();
            $_SESSION['hak_akses'] = $data_login['hak_akses'];
            $_SESSION['password'] = $data_login['password'];

            echo "<script language='javascript'>swal('Selamat...', 'Login Berhasil!', 'success');</script>";
            echo '<meta http-equiv="refresh" content="3; url=demo1/main2.php">';
        } else {
            echo "<script language='javascript'>swal('Gagal...', 'Login Gagal', 'error');</script>";
            echo '<meta http-equiv="refresh" content="3; url=pegawai.php">';
        }
    }
    ?>
    
<!DOCTYPE html>
<html lang="en">



<head>


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Login Pegawai</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="main/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="main/vendors/base/vendor.bundle.base.css">
  <link href="main/css/sweetalert.css" rel="stylesheet" type="text/css">
  <script src="main/js/jquery-2.1.3.min.js"></script>
  <script src="main/js/sweetalert.min.js"></script>                
  <script src="main/js/sweetalert-dev.js"></script>  
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="main/css/style.css">

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
</head>


<style type="text/css">
  body{
    background-image: url("22.PNG");
  }
</style>



<body>
<div id="preloader"></div>
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

                    <div class="wrap-input100">
                        <div class="form-group">
                            <select name="hak_akses" id="" class="form-control text-uppercase">
                                <option value="" selected="selected">Login sebagai</option>
                                <?php
                                $SQL = "SELECT * FROM data_user WHERE hak_akses='Staf' OR hak_akses='Sekdes'";
                                $QUERY = mysqli_query($konek, $SQL);
                                while ($data = mysqli_fetch_array($QUERY, MYSQLI_BOTH)) {
                                    $hak_akses = $data['hak_akses'];
                                    ?>
                                    <option value="<?php echo $hak_akses; ?>"><?php echo $hak_akses; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i id="togglePassword" class="zmdi zmdi-eye"></i>
                        </span>
                        <input id="passwordInput" class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit" name="login">
                                Login
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



    <!-- plugins:js -->
    <script src="main/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="main/js/off-canvas.js"></script>
    <script src="main/js/hoverable-collapse.js"></script>
    <script src="main/js/template.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- endinject -->
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>

    <script>
    var togglePassword = document.getElementById("togglePassword");
    var passwordInput = document.getElementById("passwordInput");

    togglePassword.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            togglePassword.classList.remove("zmdi-eye");
            togglePassword.classList.add("zmdi-eye-off");
        } else {
            passwordInput.type = "password";
            togglePassword.classList.remove("zmdi-eye-off");
            togglePassword.classList.add("zmdi-eye");
        }
    });
    </script>
</body>
</html>
<!-- oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "16"  -->