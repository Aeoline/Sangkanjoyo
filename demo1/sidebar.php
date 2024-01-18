<?php
 session_start();
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
 $nama = $_SESSION['nama'];
 $nik = $_SESSION['nik'];
 }
 ?>

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
  rel="stylesheet" />

<link rel="stylesheet" href="../assets/vendor/fonts/materialdesignicons.css" />

<!-- Menu waves for no-customizer fix -->
<link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

<!-- Page CSS -->

<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../assets/js/config.js"></script>
</head>

<body>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo me-1">
                <span style="color: var(--bs-primary)">
                </span>
              </span>
              <span class="app-brand-text demo menu-text fw-semibold ms-2">Materio</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            
            <!-- Apps -->
            <li class="menu-item">
              <a
                href="../demo1/main.php"
                class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                <div data-i18n="Email">Dashboard</div>
              </a>
            </li>

			
            <li class="menu-header fw-medium mt-4">
              <span class="menu-header-text">Fitur</span>
            </li>

            <?php
						 	if($hak_akses=="Pemohon"){
						 ?>

          <li class="menu-item">
              <a href="?halaman=tampil_pemohon" class="menu-link">
                  <i class="menu-icon tf-icons mdi mdi-message-outline"></i>
                  <div data-i18n="Chat">Biodata Anda</div>
              </a>
          </li>
          <li class="menu-item">
              <a href="?halaman=tampil_status" class="menu-link">
                  <i class="menu-icon tf-icons mdi mdi-calendar-blank-outline"></i>
                  <div data-i18n="Calendar">Status Request</div>
                  <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div>
              </a>
          </li>

            <?php
							}
						?>

            <li class="menu-header fw-medium mt-4">
              <span class="menu-header-text"></span>
            </li>


            <li class="menu-item">
              <a
                href="../demo1/auth/logout.php"
                class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-view-grid-outline"></i>
                <div data-i18n="Kanban">Logout</div>
              </a>
            </li>
            
      

            <div class="content-backdrop fade">
            
            </div>
          </div>
          
          <!-- Content wrapper -->
                        </body>