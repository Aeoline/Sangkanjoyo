<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card mt-3 mb-3">
								<div class="card-header">
									<div class="card-title">FORM TAMBAH USER</div>
								</div>


							

								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIK</label>
													<input type="number" name="nik" class="form-control" placeholder="NIK.." autofocus>
												</div>
												<div class="form-group">
													<label>NO KK</label>
													<input type="text" name="no_kk" class="form-control" placeholder="NO KK Anda..">
												</div>
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda..">
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<select name="jekel" class="form-control">
														<option disabled="" selected="">Pilih Jenis Kelamin</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir Anda..">
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tanggal" class="form-control">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Agama</label>
													<select name="agama" class="form-control">
														<option value="">Pilih Agama Anda</option>
														<option value='Islam'>Islam</option>
														<option value='Kristen'>Katolik</option>
														<option value='Kristen'>Kristen</option>
														<option value='Hindu'>Hindu</option>
														<option value='Budha'>Budha</option>
													</select>
												</div>
												<div class="form-group">
													<label for="comment">Alamat</label>
													<textarea class="form-control" name="alamat" rows="5"></textarea>
												</div>				
												<div>
												
													<div class="form-group" style="display: inline-block; width: 48.5%;">
														<label>RT</label>
														<input type="text" name="rt" class="form-control" placeholder="RT Anda..">
													</div>
													<div class="form-group" style="display: inline-block; width: 48.5%; margin-left: 10px;">
														<label>RW</label>
														<input type="text" name="rw" class="form-control" placeholder="RW Anda..">
													</div>
												</div>
												<div class="form-group">
													<label>Telepon</label>
													<input type="number" name="telepon" class="form-control" placeholder="Telepon Anda..">
												</div>
												<div class="form-group">
													<label>Status Warga</label>
													<select name="status_warga" class="form-control">
														<option disabled="" selected="">Pilih Status Warga</option>
														<option value='Sekolah'>Sekolah</option>
														<option value='Kerja'>Kerja</option>
														<option value='Belum Bekerja'>Belum Bekerja</option>
													</select>
												</div>
												<div class="form-group">
													<label>Pekerjaan</label>
													<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan Anda..">
												</div>

												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" class="form-control" placeholder="Password..">
												</div>
												<div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option disabled="" selected="">Pilih Hak Akses</option>
														<option value="Pemohon">Pemohon</option>
														<option value="Sekdes">Sekretaris Desa</option>
														<option value="Staf">Staf</option>
													</select>
												</div>
											</div>
									</div>
								</div>

								<div class="card-action">
									<button name="simpan" class="btn btn-success ml-3 px-3 mb-2">Simpan</button>
									<a href="?halaman=tampil_user" class="btn btn-danger px-3 mb-2">Batal</a>
								</div>

							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['simpan'])){
	$nik = $_POST['nik'];
	$no_kk = $_POST['no_kk'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	$nama = $_POST['nama'];
	$jekel = $_POST['jekel'];
	$tempat = $_POST['tempat'];
	$tanggal = $_POST['tanggal'];
	$status_warga = $_POST['status_warga'];
	$alamat = $_POST['alamat'];
	$agama = $_POST['agama'];
	$rt = $_POST['rt'];
	$rw = $_POST['rw'];
	$telepon = $_POST['telepon'];
	$pekerjaan = $_POST['pekerjaan'];

	$sql = "INSERT INTO data_user (nik, password, hak_akses, nama, jekel, tempat_lahir, tanggal_lahir, status_warga, alamat, no_kk, agama, rt, rw, telepon, pekerjaan) 
VALUES ('$nik', '$password', '$hak_akses', '$nama', '$jekel', '$tempat', '$tanggal', '$status_warga', '$alamat', '$no_kk', '$agama', '$rt', '$rw', '$telepon', '$pekerjaan')";
	$query = mysqli_query($konek,$sql);

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_user">';
	  }
}
?>