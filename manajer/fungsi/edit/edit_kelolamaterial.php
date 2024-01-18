<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_material = $_POST['id_material'];
$nama_material = $_POST['nama_material'];
$jumlah = $_POST['jumlah'];
$satuan = $_POST['satuan'];
$id_proyek = $_POST['id_proyek'];
$status = $_POST['status'];
$kodeuser = $_POST['kodeuser'];

 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../../../assets/img/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "UPDATE material SET nama_material='$nama_material', jumlah ='$jumlah', satuan ='$satuan',id_proyek ='$id_proyek',foto ='$xx',status ='$status',kodeuser ='$kodeuser' WHERE id_material= '$id_material'");
		header("location:../../kelola_material.php?alert=berhasil");
	
}


 
 