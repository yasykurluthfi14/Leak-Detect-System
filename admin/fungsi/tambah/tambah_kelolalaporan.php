<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_hasil = $_POST['id_hasil'];
$id_progress = $_POST['id_progress'];
$status_progress = $_POST['status_progress'];
$keterangan = $_POST['keterangan'];
$validasi = $_POST['validasi'];
 
		mysqli_query($koneksi, "INSERT INTO output_progress (id_hasil, id_progress, status_progress, keterangan, validasi)
        VALUES ('$id_hasil','$id_progress','$status_progress','$keterangan','$validasi')");
		header("location:../../laporan.php?alert=berhasil");
	
}

 