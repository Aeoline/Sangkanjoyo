<?php
include 'konek.php';

if (isset($_POST['login'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $hak_akses = "Pemohon";
    $nama = $_POST['nama'];
    $jekel = $_POST['jekel'];
    $kota = $_POST['kota'];
    $tgl = $_POST['tgl'];

    // Periksa apakah NIK sudah terdaftar sebelumnya
    $sql_cek = "SELECT * FROM data_user WHERE nik = '$nik'";
    $query_cek = mysqli_query($konek, $sql_cek);

    if (mysqli_num_rows($query_cek) > 0) {
        echo "<script>alert('NIK sudah terdaftar! Silahkan cek kembali NIK anda!');</script>";
    } else {
        $sql_simpan = "INSERT INTO data_user (nik, password, hak_akses, nama, tanggal_lahir, jekel, tempat_lahir) VALUES ('$nik', '$password', '$hak_akses', '$nama', '$tgl', '$jekel', '$kota')";
        $query_simpan = mysqli_query($konek, $sql_simpan);

        if ($query_simpan) {
          echo "<script language='javascript'>swal('Selamat...', 'Akun Berhasil dibuat!', 'success');</script>";
          echo '<meta http-equiv="refresh" content="3; url=login.php">';
      } else {
          echo "<script language='javascript'>swal('Gagal...', 'Akun Gagal dibuat!', 'error');</script>";
          echo '<meta http-equiv="refresh" content="3; url=register.php">';
      }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halaman Login Pemohon</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST" action="">
          <span class="login100-form-title p-b-26">
            Registrasi Akun
          </span>
          <span class="login100-form-title p-b-48">
            <img src="demo1/img/pekalongan.png" style="width: 150px; height: auto;"  alt="Pekalongan" />
          </span>

          <div class="wrap-input100 validate-input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required autofocus>
            <input class="input100" type="text" name="nik">
            <span class="focus-input100" data-placeholder="NIK"></span>
          </div>

          <div class="wrap-input100 validate-input" required>
            <input class="input100" type="text" name="nama">
            <span class="focus-input100" data-placeholder="Nama"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password">
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="form-group">
            <select name="jekel" id="" class="form-control">
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          <div class="wrap-input100 validate-input" required>
            <input class="input100" type="text" name="kota">
            <span class="focus-input100" data-placeholder="Kota Lahir"></span>
          </div>

          <div class="form-group">
            <input type="date" name="tgl"" class="form-control" required>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" type="submit" name="login">
                Register
              </button>
            </div>
          </div>

          <div class="text-center p-t-115">
            <span class="txt1">
              Sudah punya akun?
            </span>

            <a class="txt2" href="login.php">
              Masuk Disini
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <script src="js/main.js"></script>

</body>
</html>