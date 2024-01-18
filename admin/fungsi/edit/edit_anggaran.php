<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_dinas = $_POST['id_dinas'];
$status_anggaran = 'Confirmed';

		mysqli_query($koneksi, "UPDATE before_dinas SET status_anggaran ='$status_anggaran' WHERE id_dinas= '$id_dinas'");
		header("location:../../validasi_anggaran.php?alert=berhasil");

}


 
 