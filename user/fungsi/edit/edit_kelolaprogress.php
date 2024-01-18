<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_progress = $_POST['id_progress'];
$nama_progress = $_POST['nama_progress'];
$id_timeline = $_POST['id_timeline'];
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];
$kodeuser = $_POST['kodeuser'];

		mysqli_query($koneksi, "UPDATE progress SET nama_progress='$nama_progress', id_timeline ='$id_timeline', tanggal ='$tanggal',keterangan ='$keterangan',status ='$status',kodeuser ='$kodeuser' WHERE id_progress= '$id_progress'");
		header("location:../../kelola_progress.php?alert=berhasil");

}


 
 