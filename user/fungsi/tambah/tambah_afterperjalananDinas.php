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
 
		mysqli_query($koneksi, "INSERT INTO progress (id_progress, nama_progress, id_timeline, tanggal, keterangan, status, kodeuser)
        VALUES ('$id_progress','$nama_progress','$id_timeline','$tanggal','$keterangan','$status','$kodeuser')");
		header("location:../../kelola_progress.php?alert=berhasil");
	
}

 