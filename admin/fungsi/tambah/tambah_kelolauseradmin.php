<?php 
 
include '../../../config.php';
 
error_reporting(0);
session_start();

if (isset($_POST)) {
    
	$id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = md5($_POST['password']);
 
       
            $sql = "INSERT INTO login (id, nama, username, role, password)
                    VALUES ('$id','$nama','$username','$role','$password')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Tambah data berhasil!')</script>";
                header("Location: ../../kelola_user.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }

}

?>
 