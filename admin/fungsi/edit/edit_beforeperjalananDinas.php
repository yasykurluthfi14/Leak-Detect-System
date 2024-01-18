<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_dinas = $_POST['id_dinas'];
$status_perjalanan = 'Confirmed';

		mysqli_query($koneksi, "UPDATE before_dinas SET status_perjalanan='$status_perjalanan' WHERE id_dinas= '$id_dinas'");
		header("location:../../validasi_perjalananDinas.php?alert=berhasil");

}


 
 