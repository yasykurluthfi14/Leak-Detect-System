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
    $ekstensi = ['png', 'jpg', 'jpeg', 'gif'];
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $xx = $rand . '_' . $filename;
    move_uploaded_file(
        $_FILES['foto']['tmp_name'],
        '../../assets/img/foto' . $rand . '_' . $filename
    );
    mysqli_query(
        $koneksi,
        "INSERT INTO material (id_material, nama_material, jumlah, satuan, id_proyek, foto, status, kodeuser)
        VALUES ('$id_material','$nama_material','$jumlah','$satuan','$id_proyek','$xx','$status','$kodeuser')"
    );
    header('location:../../kelola_material.php?alert=berhasil');
}
