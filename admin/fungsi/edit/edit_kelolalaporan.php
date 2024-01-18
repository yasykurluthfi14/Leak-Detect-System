<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_hasil = $_POST['id_hasil'];
$id_progress = $_POST['id_progress'];
$status_progress = $_POST['status_progress'];
$keterangan = $_POST['keterangan'];
$validasi = $_POST['validasi'];

		mysqli_query($koneksi, "UPDATE output_progress SET id_progress='$id_progress', status_progress ='$status_progress', keterangan ='$keterangan',validasi ='$validasi' WHERE id_hasil= '$id_hasil'");
		header("location:../../laporan.php?alert=berhasil");

}


 
 