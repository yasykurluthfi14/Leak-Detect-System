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

        
            $sql = "UPDATE login SET nama='$nama', username ='$username', role ='$role', password ='$password' WHERE id= '$id'";

            if(mysqli_query($koneksi, $sql)){
           
                echo "<script>alert('Edit data berhasil!')</script>";
                header("Location: ../../kelola_user.php ");
            }else{
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }

			
	
         
   
}






?>
 