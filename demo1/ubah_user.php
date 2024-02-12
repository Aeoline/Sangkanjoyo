<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
    if(isset($_GET['nik'])){
        $nik = $_GET['nik'];
        $sql = "SELECT * FROM data_user WHERE nik='$nik'";
        $query = mysqli_query($konek,$sql);
        $data=mysqli_fetch_array($query,MYSQLI_BOTH);
        $username = $data['nik'];
        $password = $data['password'];
        $nama = $data['nama'];
		$jekel = $data['jekel'];
		$tempat = $data['tempat_lahir'];
		$tanggal = $data['tanggal_lahir'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];
		$hak_akses = $data['hak_akses'];
		$rt = $data['rt'];
		$rw = $data['rw'];
		$pekerjaan = $data ['pekerjaan'];
		$no_kk = $data['no_kk'];
    }
?>


<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST">
							<div class="card" style="margin-top: 20px; margin-bottom: 20px;">
								<div class="card-header">
									<div class="card-title">UBAH USER</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>NIK</label>
													<input type="number" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik;?>" readonly>
												</div>
												<div class="form-group">
													<label>NO KK</label>
													<input type="text" name="no_kk" class="form-control" placeholder="NO KK Anda.." value="<?= $no_kk;?>">
												</div>
												<div class="form-group">
													<label>Nama Lengkap</label>
													<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nama;?>">
												</div>
												<div class="form-check">
													<label>Jenis Kelamin</label><br/>
													<label class="form-radio-label">
														<input class="form-radio-input" type="radio" name="jekel" value="<?= $jekel?>"  checked="">
														<span class="form-radio-sign">Laki-Laki</span>
													</label>
													<label class="form-radio-label ml-3">
														<input class="form-radio-input" type="radio" name="jekel" value="<?= $jekel?>">
														<span class="form-radio-sign">Perempuan</span>
													</label>
												</div>

												<div class="form-group">
													<label>Hak Akses</label>
													<select name="hak_akses" class="form-control">
														<option value="Pemohon" <?php if($hak_akses=="Pemohon") echo 'selected'?>>Pemohon</option>
														<option value="Sekdes" <?php if($hak_akses=="Sekdes") echo 'selected'?>>Sekdes</option>
														<option value="Staf" <?php if($hak_akses=="Staf") echo 'selected'?>>Staf</option>
													</select>
												</div>

												<div class="form-group">
													<label>Tempat Lahir</label>
													<input type="text" name="tempat" class="form-control" value="<?= $tempat;?>" placeholder="Tempat Lahir Anda..">
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<input type="date" name="tgl" class="form-control" value="<?= $tanggal;?>">
												</div>
											</div>
											<div class="col-md-6 col-lg-6">
												<div class="form-group">
													<label>Agama</label>
													<select name="agama" class="form-control">
														<option value="">Pilih Agama Anda</option>
														<option <?php if( $agama=='Islam'){echo "selected"; } ?> value='Islam'>Islam</option>
														<option <?php if( $agama=='Katolik'){echo "selected"; } ?> value='Kristen'>Katolik</option>
														<option <?php if( $agama=='Kristen'){echo "selected"; } ?> value='Kristen'>Kristen</option>
														<option <?php if( $agama=='Hindu'){echo "selected"; } ?> value='Hindu'>Hindu</option>
														<option <?php if( $agama=='Budha'){echo "selected"; } ?> value='Budha'>Budha</option>
													</select>
												</div>
												<div class="form-group">
													<label for="comment">Alamat</label>
													<textarea class="form-control" name="alamat" rows="5"><?= $alamat?></textarea>
												</div>				
												<div>
												
													<div class="form-group" style="display: inline-block; width: 48.5%;">
														<label>RT</label>
														<input type="text" name="rt" class="form-control" value="<?php echo $rt; ?>" placeholder="RT Anda..">
													</div>
													<div class="form-group" style="display: inline-block; width: 48.5%; margin-left: 10px;">
														<label>RW</label>
														<input type="text" name="rw" class="form-control" value="<?php echo $rw; ?>" placeholder="RW Anda..">
													</div>
												</div>
												<div class="form-group">
													<label>Telepon</label>
													<input type="number" name="telepon" class="form-control" value="<?= $telepon?>" placeholder="Telepon Anda..">
												</div>
												<div class="form-group">
													<label>Status Warga</label>
													<select name="status_warga" class="form-control">
														<option disabled="" selected="">Pilih Status Warga</option>
														<option <?php if( $status_warga=='Sekolah'){echo "selected"; } ?> value='Sekolah'>Sekolah</option>
														<option <?php if( $status_warga=='Kerja'){echo "selected"; } ?> value='Kerja'>Kerja</option>
														<option <?php if( $status_warga=='Belum Bekerja'){echo "selected"; } ?> value='Belum Bekerja'>Belum Bekerja</option>
													</select>
												</div>
												<div class="form-group">
													<label>Pekerjaan</label>
													<input type="text" name="pekerjaan" class="form-control" value="<?= $pekerjaan;?>" placeholder="Pekerjaan Anda..">
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" value="<?php echo $password;?>" class="form-control">
                                                </div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="ubah" class="btn btn-success ml-3 px-3 mb-2">Ubah</button>
									<a href="?halaman=beranda" class="btn btn-danger px-3 mb-2">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['ubah'])){
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tgl = $_POST['tgl'];
	$jekel = $_POST['jekel'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$status_warga = $_POST['status_warga'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	$no_kk = $_POST['no_kk'];
	$pekerjaan = $_POST['pekerjaan'];
	$rt = $_POST['rt'];
	$rw = $_POST['rw'];

	$sql = "UPDATE data_user SET
	nama='$nama',
	tanggal_lahir='$tgl',
	tempat_lahir='$tempat',
	jekel='$jekel',
	agama='$agama',
	alamat='$alamat',
	status_warga='$status_warga',
	password='$password',
	hak_akses='$hak_akses' WHERE nik=$nik";
	$query = mysqli_query($konek,$sql);
	$no_kk = $_POST['no_kk'];
	$pekerjaan = $_POST['pekerjaan'];
	$rt = $_POST['rt'];
	$rw = $_POST['rw'];

	if($query){
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_user">';
	  }
}
	
?>