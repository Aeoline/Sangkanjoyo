<?php
  if(!isset($_SESSION)) 
  { 
	  session_start(); 
  } 
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
 $nama = $_SESSION['nama'];
 $nik = $_SESSION['nik'];
 }
 ?>
 <?php
    if($hak_akses=="Pemohon"){
 ?>
<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="pb-2 fw-bold">Halo <?php echo $nama;?>!</h2>
								<h5 class="op-7 mb-2">Sebelum Anda Request Surat Keterangan Lengkapi Biodata Anda, Klik Biodata Anda</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="?halaman=tampil_pemohon" class="btn btn-sm btn-primary btn-round"><span class="btn-label">
									<i class="fas fa-user"></i> Biodata Anda</a>
							</div>
						</div>
					</div>
				</div>
				

				
				
				<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="col-md-4 mb-3">
				<div class="card" style="width: 18rem;">
					<img src="https://images.pexels.com/photos/2174974/pexels-photo-2174974.jpeg?cs=srgb&dl=pexels-quang-nguyen-vinh-2174974.jpg&fm=jpg" class="card-img-top" alt="Surat Keterangan Tidak Mampu">
					<div class="card-body">
					<h5 class="card-title">Surat Keterangan <br>Tidak Mampu</h5>
					<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
					<a href="?halaman=request_sktm" class="btn btn-primary">Buat Surat</a>
					</div>
				</div>
				</div>

				<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<img src="https://www.mibreit-photo.com/blog/wp-content/uploads/2023/02/Java-Indonesia-Landscape-Photography.jpg" class="card-img-top" alt="SKU">
					<div class="card-body">
					<h5 class="card-title">Surat Keterangan <br> Usaha</h5>
					<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
					<a href="?halaman=request_sku" class="btn btn-primary">Buat Surat</a>
					</div>
				</div>
				</div>

				<div class="col-md-4 mb-3">
				<div class="card" style="width: 18rem;">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHWDY-ogVTZKCbdJYi_51nsOvpwqGRLqDDfQ&usqp=CAU" class="card-img-top" alt="SKP">
					<div class="card-body">
					<h5 class="card-title">Surat Keterangan Penghasilan</h5>
					<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
					<a href="?halaman=request_skp" class="btn btn-primary">Buat Surat</a>
					</div>
				</div>
				</div>
			</div>

			<div class="row mt--2">
				<div class="col-md-4 mb-3">
				<!-- <div class="card" style="width: 18rem;">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTfUaon-XY-F2ZZqr-Bj-GF3y-SJ7Fc777qA&usqp=CAU" class="card-img-top" alt="SKD">
					<div class="card-body">
					<h5 class="card-title">Surat Keterangan Domisili</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<a href="?halaman=request_skd" class="btn btn-primary">Buat Surat</a>
					</div>
				</div>
				</div> -->
			</div>
			</div>
	</div>
</div>
<?php
    }elseif($hak_akses=="Staf"){
 ?>
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Halo <?php echo $hak_akses;?>!</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner">
					<!-- Card -->
					<h3 class="fw-bold text-uppercase">JUMLAH REQUEST SURAT KETERANGAN SUDAH ACC</h3>
					<!-- Card With Icon States Background -->
					<div class="row">
						<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row align-items-center">
											<a href="?halaman=sudah_acc_sktm">
												<div class="col-icon">
													<div class="icon-big text-center icon-primary bubble-shadow-small">
														<i class="flaticon-envelope-1"></i>
													</div>
												</div>
											</a>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<p class="card-category">SKTM</p>
													<?php
													$sql = "SELECT * FROM data_request_sktm WHERE status=1";
													$query = mysqli_query($konek,$sql);
													$data = mysqli_fetch_array($query,MYSQLI_BOTH);
													$count = mysqli_num_rows($query);
													$status = $data['status'];

													// if($status=="1"){
													// 	$count ="Belum ada request";
													// }
												
													
												?>
													<h4 class="card-title"><?php echo $count;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<a href="?halaman=sudah_acc_sku">
											<div class="col-icon">
												<div class="icon-big text-center icon-success bubble-shadow-small">
													<i class="flaticon-envelope-1"></i>
												</div>
											</div>
										</a>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">SKU</p>
												<?php
													$sql = "SELECT * FROM data_request_sku WHERE status=1";
													$query = mysqli_query($konek,$sql);
													$data = mysqli_fetch_array($query,MYSQLI_BOTH);
													$count = mysqli_num_rows($query);
													$status = $data['status'];

													// if($status=="1"){
													// 	$count ="Belum ada request";
													// }
												
													
												?>
												<h4 class="card-title"><?php echo $count;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<a href="?halaman=sudah_acc_skp">
											<div class="col-icon">
												<div class="icon-big text-center icon-warning bubble-shadow-small">
													<i class="flaticon-envelope-1"></i>
												</div>
											</div>
										</a>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">SKP</p>
												<?php
													$sql = "SELECT * FROM data_request_skp WHERE status=1";
													$query = mysqli_query($konek,$sql);
													$data = mysqli_fetch_array($query,MYSQLI_BOTH);
													$count = mysqli_num_rows($query);
													$status = $data['status'];

													// if($status=="1"){
													// 	$count ="Belum ada request";
													// }
												
													
												?>
												<h4 class="card-title"><?php echo $count;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<a href="?halaman=sudah_acc_skd">
											<div class="col-icon">
												<div class="icon-big text-center icon-secondary bubble-shadow-small">
													<i class="flaticon-envelope-1"></i>
												</div>
											</div>
										</a>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">SKD</p>
												<?php
												//	$sql = "SELECT * FROM data_request_skd WHERE status=1";
												//	$query = mysqli_query($konek,$sql);
												//	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
												//	$count = mysqli_num_rows($query);
												//	$status = $data['status']
											
													
												?>
												<h4 class="card-title"><?php
												// echo $count;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
<?php
    }elseif($hak_akses=="Sekdes"){
 ?>
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Halo <?php echo $hak_akses;?>!</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner">
					<!-- Card -->
					<h4 class="page-title">TAMPIL REQUEST SURAT KETERANGAN</h4>
					<!-- Card With Icon States Background -->
					<div class="row">
						<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-round">
									<div class="card-body ">
										<div class="row align-items-center">
											<a href="?halaman=belum_acc_sktm">
												<div class="col-icon">
													<div class="icon-big text-center icon-primary bubble-shadow-small">
														<i class="flaticon-envelope-1"></i>
													</div>
												</div>
											</a>
											<div class="col col-stats ml-3 ml-sm-0">
												<div class="numbers">
													<p class="card-category">SKTM</p>
													<?php
													$sql = "SELECT * FROM data_request_sktm WHERE status=0";
													$query = mysqli_query($konek,$sql);
													$data = mysqli_fetch_array($query,MYSQLI_BOTH);
													$count = mysqli_num_rows($query);
													$status = $data['status'];

													if($status=="1"){
														$count ="Belum ada request";
													}
												
													
												?>
													<h4 class="card-title"><?php echo $count;?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<a href="?halaman=belum_acc_sku">
											<div class="col-icon">
												<div class="icon-big text-center icon-success bubble-shadow-small">
													<i class="flaticon-envelope-1"></i>
												</div>
											</div>
										</a>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">SKU</p>
												<?php
													$sql = "SELECT * FROM data_request_sku WHERE status=0";
													$query = mysqli_query($konek,$sql);
													$data = mysqli_fetch_array($query,MYSQLI_BOTH);
													$count = mysqli_num_rows($query);
													$status = $data['status'];

													if($status=="1"){
														$count ="Belum ada request";
													}
												
													
												?>
												<h4 class="card-title"><?php echo $count;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<a href="?halaman=belum_acc_skp">
											<div class="col-icon">
												<div class="icon-big text-center icon-warning bubble-shadow-small">
													<i class="flaticon-envelope-1"></i>
												</div>
											</div>
										</a>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">SKP</p>
												<?php
													$sql = "SELECT * FROM data_request_skp WHERE status=0";
													$query = mysqli_query($konek,$sql);
													$data = mysqli_fetch_array($query,MYSQLI_BOTH);
													$count = mysqli_num_rows($query);
													$status = $data['status'];

													if($status=="1"){
														$count ="Belum ada request";
													}
												
													
												?>
												<h4 class="card-title"><?php echo $count;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<a href="?halaman=belum_acc_skd">
											<div class="col-icon">
												<div class="icon-big text-center icon-secondary bubble-shadow-small">
													<i class="flaticon-envelope-1"></i>
												</div>
											</div>
										</a>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">SKD</p>
												<?php
													// $sql = "SELECT * FROM data_request_skd WHERE status=0";
													// $query = mysqli_query($konek,$sql);
													// $data = mysqli_fetch_array($query,MYSQLI_BOTH);
													// $count = mysqli_num_rows($query);
													// $status = $data['status'];

													// if($status=="1"){
													// 	$count ="Belum ada request";
													// }
												
													
												?>
												<h4 class="card-title"><?php 
												// echo $count;?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
 <?php
    }
 ?>
 