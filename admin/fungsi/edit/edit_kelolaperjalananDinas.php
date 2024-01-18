<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_dinas = $_POST['id_dinas'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$unit_kerja = $_POST['unit_kerja'];
$posisi_area = $_POST['posisi_area'];
$deskripsi = $_POST['deskripsi'];
$area_tujuan = $_POST['area_tujuan'];
$transportasi = $_POST['transportasi'];
$lokasi_awal = $_POST['lokasi_awal'];
$lokasi_akhir = $_POST['lokasi_akhir'];

 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['berkas']['name'];
$ukuran = $_FILES['berkas']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
			
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['berkas']['tmp_name'], '../../../assets/berkas/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "UPDATE before_dinas SET  nama='$nama', jabatan ='$jabatan', unit_kerja='$unit_kerja', 
		posisi_area='$posisi_area', deskripsi='$deskripsi', area_tujuan='$area_tujuan', transportasi='$transportasi', lokasi_awal='$lokasi_awal',
		lokasi_akhir='$lokasi_akhir', berkas ='$xx' WHERE id_dinas= '$id_dinas'");
		header("location:../../kelola_perjalananDinas.php?alert=berhasil");

}


 
 