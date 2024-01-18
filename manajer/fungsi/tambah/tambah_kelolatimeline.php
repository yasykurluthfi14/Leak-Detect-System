<?php 
include '../../../config.php';

if (isset($_POST)) {

$id_timeline = $_POST['id_timeline'];
$kegiatan = $_POST['kegiatan'];
$id_proyek = $_POST['id_proyek'];
$mulai = $_POST['start_date'];
$sampai = $_POST['end_date'];
$status = $_POST['status'];
 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
			
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../../../assets/img/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO timeline (id_timeline, kegiatan, id_proyek, start_date, end_date, foto, status)
        VALUES ('$id_timeline','$kegiatan','$id_proyek','$mulai','$sampai','$xx','$status')");
		header("location:../../kelola_timeline.php?alert=berhasil");
	
}

 