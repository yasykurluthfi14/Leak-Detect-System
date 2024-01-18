<?php 
session_start();

	include '../../../config.php';

	if(isset($_GET['produk'])){
		$id_produk= $_GET['produk'];

		if(!empty($id_produk)){
			mysqli_query($koneksi,"delete from produk where id_produk='$id_produk'");

			header("location:../../produk.php");
		}

	
		
	}
	if(isset($_GET['kelolauser_admin'])){
		$id= $_GET['kelolauser_admin'];

		if(!empty($id)){
			mysqli_query($koneksi,"DELETE FROM login WHERE id='$id'");

			header("location:../../kelola_user.php");
		}	
	}

	if(isset($_GET['beforeperjalananDinas'])){
		$id= $_GET['beforeperjalananDinas'];

		if(!empty($id)){
			mysqli_query($koneksi,"DELETE FROM before_dinas WHERE id_dinas='$id'");

			header("location:../../before_perjalananDinas.php");
		}	
	}

	if(isset($_GET['kelolamaterial'])){
		$id= $_GET['kelolamaterial'];

		if(!empty($id)){
			mysqli_query($koneksi,"DELETE FROM material WHERE id_material='$id'");

			header("location:../../kelola_material.php");
		}	
	}

	if(isset($_GET['kelolaprogress'])){
		$id= $_GET['kelolaprogress'];

		if(!empty($id)){
			mysqli_query($koneksi,"DELETE FROM progress WHERE id_progress='$id'");

			header("location:../../kelola_progress.php");	
		}	
	}

	if(isset($_GET['kelolalaporan'])){
		$id= $_GET['kelolalaporan'];

		if(!empty($id)){
			mysqli_query($koneksi,"DELETE FROM output_progress WHERE id_hasil='$id'");

			header("location:../../laporan.php");	
		}	
	}


	if(isset($_GET['kelolatimeline'])){
			$id= $_GET['kelolatimeline'];

			if(!empty($id)){
				mysqli_query($koneksi,"DELETE FROM timeline WHERE id_timeline='$id'");

				header("location:../../kelola_timeline.php");
			}	
	}


	if(isset($_GET['id']) AND isset($_GET['id_produk'])){
		$id= $_GET['id'];
		$id_produk= $_GET['id_produk'];



		if(!empty($id) AND !empty($id_produk)){
			mysqli_query($koneksi,"delete from jenis_produk where id='$id'");

			header("location:../../jenis_produk.php?id_produk=$id_produk");
		}

	
		
	}

	if(isset($_GET['pemesanan'])){
		$id_pemesanan= $_GET['pemesanan'];

		if(!empty($id_pemesanan)){
			mysqli_query($koneksi,"delete from pemesanan where id_pemesanan='$id_pemesanan'");

			header("location:../../pemesanan.php");
		}

	
		
	}
    
    
	
   
?>