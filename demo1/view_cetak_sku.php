<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
	if(isset($_GET['id_request_sku'])){
		$id=$_GET['id_request_sku'];
		$sql = "SELECT * FROM data_request_sku natural join data_user WHERE id_request_sku='$id'";
		$query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $id=$data['id_request_sku'];
        $nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tgl));
        $format3 = date('d F Y', strtotime($tgl2));
		$agama = $data['agama'];
		$jekel = $data['jekel'];
		$nama = $data['nama'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];
        $request = $data['request'];
        $keterangan = $data['keterangan'];
        $status = $data['status'];
        $usaha = $data['usaha'];
        $keperluan = $data['keperluan'];
        $acc = $data['acc'];
        $no_kk = $data['no_kk'];
        $pekerjaan = $data['pekerjaan'];
        $format4 = date('d F Y', strtotime($acc));
        if($format4==0){
            $format4="kosong";
        }elseif($format4==1){
           $format4;
        }

        if($status==3){
            $keterangan="Sudah ACC Sekretaris Desa, surat sedang dalam proses cetak oleh staf";
        }
        $no_surat=$data['no_surat'];

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
        $tanggal_lahir = date('d F Y', strtotime($tgl));
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
						<div class="col-md-6 mb-3">
							<div class="card full-height">
								<div class="card-body">
								    <div class="card-tools">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                            <label>Keterangan</label>
                                                <select name="dicetak" id="" class="form-control" required="">
                                                    <option value="">Pilih</option>
                                                    <option value="Surat dicetak, bisa diambil!">Surat dicetak, bisa diambil!</option>
                                                </select><br>
                                                <!-- <input type="date" name="tgl_acc" class="form-control"> -->
                                                    <input type="submit" name="ttd" value="Kirim" class="btn btn-primary btn-sm">
                                                    <a href="cetak_sku.php?id_request_sku=<?=$id;?>" class="btn btn-primary btn-sm">Cetak</a>
                                                <!-- <div class="form-group">
                                                    <a href="cetak_skd.php?id_request_skd=<?php $id;?>">
                                                        Cetak
                                                    </a>
                                                </div> -->
                                                <!-- <div class="form-group">
                                                   <a href="cetak_skd.php?id_request_skd=<?=$id;?>">a</a>
                                                </div> -->
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ttd'])){
                                            $cetak = $_POST['dicetak'];
                                            $update = mysqli_query($konek,"UPDATE data_request_sku SET keterangan='$cetak', status=3 WHERE id_request_sku=$id");
                                            if($update){
                                                echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sku">';
                                            }else{
                                                echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_sku">';
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
                                                        <font size="4"><b>SURAT KETERANGAN USAHA</b></font><br>
                                                        <hr style="margin:0px" color="black">
                                                        <span>No : <?php echo $no_surat; ?></span>
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
                                                Berdasarkan Surat Keterangan Ketua Rt <?php echo $rt ?> Rw <?php echo $rw ?> , No. <?php echo $no_surat_rt; ?>
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
                                                    $request = "Yang bersangkutan diatas benar-benar";
                                                ?>
                                                <td><?php echo $request;?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <?php 
                                                    $request =  " mempunyai usaha " . $usaha;
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