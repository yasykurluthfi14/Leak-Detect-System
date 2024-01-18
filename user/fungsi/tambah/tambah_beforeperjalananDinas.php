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
    $status_perjalanan = 'Waiting Confirmation';

    $rand = rand();
    $ekstensi = ['png', 'jpg', 'excel', 'pdf'];
    $filename = $_FILES['berkas']['name'];
    $ukuran = $_FILES['berkas']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);


        $xx = $rand . '_' . $filename;
        move_uploaded_file(
            $_FILES['berkas']['tmp_name'],
            '../../../assets/berkas/' . $rand . '_' . $filename
        );
        mysqli_query(
            $koneksi,
            "INSERT INTO before_dinas (id_dinas, nama, jabatan, unit_kerja, posisi_area, deskripsi, area_tujuan, transportasi, lokasi_awal, lokasi_akhir, berkas, status_perjalanan)
        VALUES ('$id_dinas','$nama','$jabatan','$unit_kerja','$posisi_area','$deskripsi','$area_tujuan','$transportasi','$lokasi_awal','$lokasi_akhir','$xx','$status_perjalanan')"
        );
        header('location:../../before_perjalananDinas.php?alert=berhasil');

}
