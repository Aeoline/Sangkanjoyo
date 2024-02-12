<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
if(isset($_GET['id_request_skp'])){
    $id=$_GET['id_request_skp'];
	$tampil_nik = "SELECT * FROM data_request_skp NATURAL JOIN data_user WHERE id_request_skp=$id";
	$query = mysqli_query($konek,$tampil_nik);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$nik = $data['nik'];
    $nama = $data['nama'];
    $keperluan = $data['keperluan'];
    $ktp = $data['scan_ktp'];
    $kk = $data['scan_kk'];
	$penghasilan = $data['penghasilan'];
}
?>
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card" style="margin-top: 20px; margin-bottom: 20px;">
								<div class="card-header">
									<div class="card-title">UBAH SURAT KETERANGAN PENGHASILAN</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
                                                <div class="form-group">
													<label>NIK</label>
													<input type="text" name="nik" class="form-control" value="<?= $nik.' - '.$nama;?>" readonly>
												</div>
												<div class="form-group">
													<label>Keperluan</label>
													<input type="text" name="keperluan" class="form-control" value="<?= $keperluan;?>" placeholder="Keperluan Anda..">
												</div>
												<div class="form-group">
													<label>Penghasilan</label>
													<input type="number" name="penghasilan" class="form-control" value="<?= $penghasilan;?>" placeholder="Penghasilan Anda..">
												</div>
											</div>
											<div class="col-md-5">
												<div class="card mb-3 mt-3">
													<div class="card-header">
														<h4 class="card-title">KTP</h4>
													</div>
													<div class="card-body">
														<div class="row justify-content-md-center">
																		<img src="../dataFoto/scan_ktp/<?php echo $ktp;?>" width="400" height="250" alt="">
																	
														</div>
													</div>
												</div>
												<div class="card">
													<div class="card-header">
														<h4 class="card-title">KK</h4>
													</div>
													<div class="card-body">
														<div class="row justify-content-md-center">
														<img src="../dataFoto/scan_kk/<?php echo $kk;?>" width="400" height="250" alt="">
														</div>
													</div>
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success ml-3 px-3 mb-2">Ubah</button>
									<a href="?halaman=tampil_status" class="btn btn-danger px-3 mb-2">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
	$keperluan = $_POST['keperluan'];
	$nama_ktp = isset($_FILES['ktp']);
	$file_ktp = $_POST['nik']."_".".jpg";
	$nama_kk = isset($_FILES['kk']);
    $file_kk = $_POST['nik']."_".".jpg";
	$penghasilan = $_POST['penghasilan'];
	$sql = "UPDATE data_request_skp SET keperluan='$keperluan', penghasilan='$penghasilan' WHERE id_request_skp=$id";
	$query = mysqli_query($konek,$sql);

	if($query){
		// copy($_FILES['ktp']['tmp_name'],"../dataFoto/scan_ktp/".$file_ktp);
		// copy($_FILES['kk']['tmp_name'],"../dataFoto/scan_kk/".$file_kk);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }
}
	
?>