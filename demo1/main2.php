<?php
 session_start();
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
 }
 ?>
 <?php include '../konek.php';?>
<!doctype html>
<html lang="en">

<div id="preloader"></div>
  <head>

  
  	<title>Desa Sangkanjoyo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="header/css/style.css">

	</head>
	<body>
		
		<div class="container-fluid px-md-5">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
					<div class="col-md-6 text-center">
						<a class="navbar-brand" href="main2.php">
							<br> <!-- Tambahkan baris ini untuk memberikan sedikit ruang di atas gambar -->
							<img src="../demo1/img/pekalongan.png" width="100" height="auto" alt="Desa Sangkanjoyo">
							<a class="navbar-brand" href="main2.php">Desa Sangkanjoyo <span>Kecamatan Kajen, Kabupaten Pekalongan</span></a>
						</a>
					</div>
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
							<form action="#" class="searchform order-lg-last">
			          
			        </form>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<!-- <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a> -->
		    		</p>
	        </div>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container-fluid">
			<?php
			if ($hak_akses == "Sekdes") {
			?>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav m-auto">
				<li class="nav-item"><a href="?halaman=beranda" class="nav-link">Dashboard</a></li>

				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
				<div class="dropdown-menu" aria-labelledby="laporanDropdown">
					<a class="dropdown-item" href="?halaman=laporan_perbulan">Perbulan</a>
					<a class="dropdown-item" href="?halaman=laporan_pertahun">Pertahun</a>
				</div>
				</li>

				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pengaturanDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengaturan</a>
				<div class="dropdown-menu" aria-labelledby="pengaturanDropdown">
					<a class="dropdown-item" href="logout.php">Keluar</a>
				</div>
				</li>
			</ul>
			</div>
			<?php } ?>

			<?php
			if ($hak_akses == "Staf") {
			?>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav m-auto">
				<li class="nav-item"><a href="?halaman=beranda" class="nav-link">Dashboard</a></li>

				<li class="nav-item"><a href="?halaman=tampil_user" class="nav-link">Data User</a></li>

				<li class="nav-item"><a href="?halaman=permohonan_surat" class="nav-link">Cetak Surat</a></li>

				<li class="nav-item"><a href="?halaman=surat_dicetak" class="nav-link">Surat Selesai</a></li>


				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="pengaturanDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengaturan</a>
				<div class="dropdown-menu" aria-labelledby="pengaturanDropdown">
					<a class="dropdown-item" href="logout.php">Keluar</a>
				</div>
				</li>
			</ul>
			</div>
			<?php } ?>
		</div>
		</nav>
    <!-- END nav -->

	<div class="container">
		<div class="main-panel">
				<div class="content">
				<?php
          if(isset($_GET['halaman'])){
            $hal = $_GET['halaman'];
            switch($hal){
              case 'beranda';
                include 'beranda2.php';
              break;
              case 'ubah_pemohon';
                include 'ubah_pemohon.php';
			  break;
			  case 'tampil_pemohon';
                include 'tampil_pemohon.php';
			  break;
			  case 'request_sktm';
                include 'request_sktm.php';
			  break;
			  case 'request_sku';
                include 'request_sku.php';
			  break;
			  case 'request_skp';
                include 'request_skp.php';
			  break;
			  case 'request_skd';
                include 'request_skd.php';
			  break;
			  case 'tampil_status';
                include 'status_request.php';
			  break;
			  case 'belum_acc_sktm';
                include 'belum_acc_sktm.php';
			  break;
			  case 'belum_acc_sku';
                include 'belum_acc_sku.php';
			  break;
			  case 'belum_acc_skp';
                include 'belum_acc_skp.php';
			  break;
			  case 'belum_acc_skd';
                include 'belum_acc_skd.php';
			  break;
			  case 'sudah_acc_sktm';
                include 'acc_sktm.php';
			  break;
			  case 'sudah_acc_sku';
                include 'acc_sku.php';
			  break;
			  case 'sudah_acc_skp';
                include 'acc_skp.php';
			  break;
			  case 'sudah_acc_skd';
                include 'acc_skd.php';
			  break;
			  case 'detail_sktm';
                include 'detail_sktm.php';
			  break;
			  case 'detail_sku';
                include 'detail_sku.php';
			  break;
			  case 'detail_skp';
                include 'detail_skp.php';
			  break;
			  case 'detail_skd';
                include 'detail_skd.php';
			  break;
			  case 'cetak_sktm';
                include 'cetak_sktm.php';
			  break;
			  case 'tampil_user';
                include 'tampil_user.php';
			  break;
			  case 'tambah_user';
                include 'tambah_user.php';
			  break;
			  case 'ubah_user';
                include 'ubah_user.php';
			  break;
			  case 'view_sktm';
                include 'view_sktm.php';
			  break;
			  case 'view_sku';
                include 'view_sku.php';
			  break;
			  case 'view_skp';
                include 'view_skp.php';
			  break;
			  case 'view_skd';
                include 'view_skd.php';
			  break;
			  case 'view_cetak_sktm';
                include 'view_cetak_sktm.php';
			  break;
			  case 'view_cetak_sku';
                include 'view_cetak_sku.php';
			  break;
			  case 'view_cetak_skp';
                include 'view_cetak_skp.php';
			  break;
			  case 'view_cetak_skd';
                include 'view_cetak_skd.php';
			  break;
			  case 'surat_dicetak';
                include 'surat_dicetak.php';
              break;
			  case 'laporan_perbulan';
                include 'laporan_perbulan.php';
			  break;
			  case 'laporan_pertahun';
                include 'laporan_pertahun.php';
			  break;
			  case 'permohonan_surat';
                include 'permohonan_surat.php';
              break;
              default:
                echo "<center>HALAMAN KOSONG</center>";
              break;
            }
          }else{
            include 'beranda2.php';
          }
        ?>
				</div>
		</div>
	</div>
	</section>

	<script src="header/js/jquery.min.js"></script>
  <script src="header/js/popper.js"></script>
  <script src="header/js/bootstrap.min.js"></script>
  <script src="header/js/main.js"></script>

	</body>
</html>

