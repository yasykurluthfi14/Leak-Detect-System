<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_dinas = $_POST['id_dinas'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];


		mysqli_query($koneksi, "UPDATE before_dinas SET start_date='$start_date', end_date ='$end_date' WHERE id_dinas= '$id_dinas'");
		header("location:../../ubahjadwal.php?alert=berhasil");

}


 
 