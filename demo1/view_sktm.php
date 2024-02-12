<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
	if(isset($_GET['id_request_sktm'])){
		$id=$_GET['id_request_sktm'];
		$sql = "SELECT * FROM data_request_sktm natural join data_user WHERE id_request_sktm='$id'";
		$query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $id=$data['id_request_sktm'];
        $nik = $data['nik'];
        $no_kk = $data['no_kk'];
        $pekerjaan = $data['pekerjaan'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tgl));
        $format3 = date('d F Y', strtotime($tgl2));
        $tanggal_lahir = date('d F Y', strtotime($tgl));
		$agama = $data['agama'];
		$jekel = $data['jekel'];
		$nama = $data['nama'];
		$alamat = $data['alamat'];
        $status_warga = $data['status_warga'];
        $keperluan = $data['keperluan'];
        $request = $data['request'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
        if($acc==0){
            $acc="BELUM TTD";
        }elseif($acc==1){
           $acc;
        }
        $no_surat  = $data['no_surat'];

        $bulan = date('n'); // Mendapatkan nomor bulan saat ini

        // Daftar angka Romawi
        $angkaRomawi = array(
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        );

        $bulanRomawi = $angkaRomawi[$bulan]; // Mendapatkan angka Romawi berdasarkan nomor bulan saat ini
        $rt = $data['rt'];
        $rw = $data['rw'];
        $no_surat_rt=$data['no_surat_rt'];
	}
?>
 <div class="panel-header bg-primary-gradient">
					<div class="page-inner py-1">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold"></h2>
							</div>
						</div>
					</div>
                </div>
                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height mb-3">
								<div class="card-body ">
								    <div class="card-tools">
                                    <form action="" method="POST">
                                            <div class="form-group">
                                                <input type="date" name="tgl_acc" class="form-control">

                                                <div class="form-group mt-3">
													<label>Nomor Surat (Contoh: 12)</label>
													<input type="text" name="no_surat" class="form-control" placeholder="Nomor Surat" autofocus>
												</div>

                                                <div class="form-group mt-3">
													<label>Nomor Surat RT (Contoh: 12 / Ds.22 / I / 2024)</label>
													<input type="text" name="no_surat_rt" class="form-control" placeholder="Nomor Surat RT" autofocus>
												</div>

                                                <div class="form-group">
                                                    <input type="submit" name="ttd" value="ACC" class="btn btn-primary btn-sm px-4 mt-3">
                                                </div>
                                                
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ttd'])){
                                            $ket="Surat sedang dalam proses cetak";
                                            $tgl = $_POST['tgl_acc'];
                                            $no_surat= $_POST['no_surat'];
                                            $no_surat_rt= $_POST['no_surat_rt'];
                                            $update = mysqli_query($konek, "UPDATE data_request_sktm SET acc='$tgl', status=2, keterangan='$ket', no_surat_rt='$no_surat_rt',no_surat='$no_surat/ Ds.22 / $bulanRomawi / " . date('Y') . "' WHERE id_request_sktm=$id");
                                            if($update){
                                                echo "<script language='javascript'>swal('Selamat...', 'ACC Sekretaris Desa Berhasil', 'success');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sktm">';
                                            }else{
                                                echo "<script language='javascript'>swal('Gagal...', 'ACC Sekretaris Desa Gagal', 'error');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_sktm">';
                                            }

                                        }
                                        ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
                                    <table border="0" align="center">
                                        <table border="0" align="center">
                                            <tr>
                                            <td><img src="img/pekalongan.png" width="70" height="87" alt=""></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                                <td>
                                                    <center>
                                                        <font size="4">PEMERINTAHAN KABUPATEN PEKALONGAN</font><br>
                                                        <font size="4">KECAMATAN KAJEN</font><br>
                                                        <font size="5"><b>DESA SANGKANJOYO</b></font><br>
                                                        <font size="2"><i>Jalan Desa Sangkanjoyo No. 325 | ( 0285 ) 381872 | 51161 </i></font><br>
                                                    </center>
                                                </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="45"><hr color="black"></td>
                                            </tr>
                                        </table>
                                      
                                        
                                        <table class="mx-auto" >
                                            <tr>
                                                <td class="pl-5" width="600px">No.  Kode Desa / Kelurahan : <br>33.26.08.22</td>
                                            </tr>
                                        </table>

                                        <br>
                                        <table border="0" align="center">
                                            <tr>
                                                <td>
                                                    <center>
                                                        <font size="4"><b>SURAT KETERANGAN TIDAK MAMPU</b></font><br>
                                                        <hr style="margin:0px" color="black">
                                                        <span>No : &nbsp;&nbsp;&nbsp;&nbsp;/ Ds.22 / &nbsp;&nbsp;&nbsp;&nbsp; / <?php echo date('Y'); ?></span>
                                                    </center>
                                                </td>
                                                
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <table border="0" align="center">
                                            <tr>
                                                <td style="width:500px;">
                                                    Yang bertanda tangan dibawah ini, 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:500px;">
                                                Berdasarkan Surat Keterangan Ketua Rt <?php echo $rt ?> Rw <?php echo $rw ?> , No.  &nbsp;&nbsp; / &nbsp;&nbsp; / <?php echo date('Y'); ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        
                                        <table border="0" align="center" type="1">
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td><?php echo $nama;?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat, Tanggal Lahir</td>
                                                <td>:</td>
                                                <td><?php echo $tempat.", ".$tanggal_lahir;?></td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>:</td>
                                                <td><?php echo $agama;?></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td>:</td>
                                                <td><?php echo $pekerjaan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?php echo $alamat;?></td>
                                            </tr>
                                            <tr>
                                                <td>No. NIK</td>
                                                <td>:</td>
                                                <td><?php echo $nik;?></td>
                                            </tr>
                                            <tr>
                                                <td>No. KK</td>
                                                <td>:</td>
                                                <td><?php echo $no_kk;?></td>
                                            </tr>
                                            <tr>
                                                <td>Keperluan</td>
                                                <td>:</td>
                                                <td><?php echo $keperluan;?></td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <?php 
                                                    
                                                    if($request=="TIDAK MAMPU"){
                                                        $request="Surat Keterangan Tidak Mampu";
                                                    }
                                                    if($request=="Usaha"){
                                                        $request="Yang bersangkutan diatas Benar-benar mempunyai usaha $usaha";
                                                    }
                                                
                                                ?>
                                                <td><?php echo $request;?></td>
                                            </tr>
                                        </table>
                                        <br>
                                        <table border="0" align="center" >
                                            <tr>
                                                <td style="width:500px;">
                                                Demikian surat ini diberikan kepada yang bersangkutan agar dapat dipergunakan untuk sebagaimana mestinya.
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <br>
                                        <table align="center">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <th width="400px"></th>
                                                <th align="right">Sangkanjoyo, <?php echo $format4;?></th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <th></th>
                                                <td></td>
                                                <td align="center">Kepala Desa Sangkanjoyo</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="15"></td>
                                                <td></td>
                                                <td rowspan="15"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr><tr>
                                                <td></td>
                                            </tr><tr>
                                                <td></td>
                                            </tr><tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <td></td>
                                                <td align="center">RUDI HARTONO</td>
                                            </tr>
                                        </table>
                                    </table>

								</div>
                                <div  class="mx-auto" style="width:500px; ">
                                    <p>Catatan : *) Apabila ruangan ini tidak mencukupi harap ditulis pada lembar sebaliknya Dan dibubuhi stempel Desa/Kelurahan </p>
                                </div>
                            </div>
						</div>
					</div>
			</div>
    </table>