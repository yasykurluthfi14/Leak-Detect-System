<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_dinas = $_POST['id_dinas'];
$anggaran = $_POST['anggaran'];
$status_anggaran = 'Waiting Confirmation';

		mysqli_query($koneksi, "UPDATE before_dinas SET  anggaran='$anggaran', status_anggaran ='$status_anggaran' WHERE id_dinas= '$id_dinas'");
		header("location:../../anggaran.php?alert=berhasil");

}


 
 