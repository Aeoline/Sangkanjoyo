<?php include '../konek.php';?>

<?php
    $tampil_index = "SELECT * FROM data_index";
    $query = mysqli_query($konek, $tampil_index);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $deskripsi = $data['deskripsi'];
    $id = $data['id'];
    $judul = $data['judul'];


    $tampil_info = "SELECT * FROM data_warga";
    $query_info = mysqli_query($konek, $tampil_info);
    $data_info = mysqli_fetch_array($query_info, MYSQLI_BOTH);
    $balita = $data_info['balita'];
    $anak = $data_info['anak'];
    $dewasa = $data_info['dewasa'];
    $lansia = $data_info['lansia'];

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
                        <div class="card-title">UBAH TAMPILAN HALAMAN DEPAN</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
								    <label>Judul Tentang Desa Sangkanjoyo</label>
								    <input type="text" name="judul" class="form-control" placeholder="Judul" value="<?= $judul;?>">
								</div>
                              
                                <div class="form-group">
                                    <label for="comment">Deskripsi Tentang Desa Sangkanjoyo</label>
                                    <textarea class="form-control" name="deskripsi" rows="10" style="height: 200px;"><?= $deskripsi?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">

                                <div class="form-group" style="display: inline-block; width: 48.5%;">
									<label>Balita</label>
									<input type="text" name="balita" class="form-control" value="<?php echo $balita; ?>" placeholder="Jumlah Balita">
                                </div>
								<div class="form-group" style="display: inline-block; width: 48.5%; margin-left: 10px;">
									<label>Anak-Anak</label>
									<input type="text" name="anak" class="form-control" value="<?php echo $anak; ?>" placeholder="Jumlah Anak-anak">
								</div>
                                
                                <div class="form-group" style="display: inline-block; width: 48.5%;">
									<label>Dewasa</label>
									<input type="text" name="dewasa" class="form-control" value="<?php echo $dewasa; ?>" placeholder="Jumlah Dewasa">
                                </div>
								<div class="form-group" style="display: inline-block; width: 48.5%; margin-left: 10px;">
									<label>Lansia</label>
									<input type="text" name="lansia" class="form-control" value="<?php echo $lansia; ?>" placeholder="Jumlah Lansia">
								</div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="card-action">
                        <button name="ubah" class="btn btn-success ml-3 px-3 mb-2">Ubah</button>
                        <a href="?halaman=beranda" class="btn btn-danger px-3 mb-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['ubah'])){
    $deskripsi = $_POST['deskripsi'];
    $judul = $_POST['judul'];
    $balita = $_POST['balita'];
    $anak = $_POST['anak'];
    $dewasa = $_POST['dewasa'];
    $lansia = $_POST['lansia'];

    $sql = "UPDATE data_index SET
    deskripsi = '$deskripsi',
    judul = '$judul'
    WHERE id = '1'";

    $query = mysqli_query($konek, $sql);

    $sql_info = "UPDATE data_warga SET
    balita = '$balita',
    anak = '$anak',
    dewasa = '$dewasa',
    lansia = '$lansia'
    WHERE id = '1'";

    $query_info = mysqli_query($konek, $sql_info);

    if($query && $query_info){
        echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>" ;
        echo '<meta http-equiv="refresh" content="3; url=?halaman=setting_index">';
    }else{
        echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>" ;
        echo '<meta http-equiv="refresh" content="3; url=?halaman=setting_index">';
    }
}
?>