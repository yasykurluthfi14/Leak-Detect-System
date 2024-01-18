<?php 
include 'header.php';
include '../config.php';
include 'fungsi/fungsi_rupiah.php';

$query = "SELECT SUM(anggaran) AS total FROM before_dinas WHERE status_anggaran = 'Confirmed'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
$totalData = $data['total'];

$query2 = "SELECT COUNT(*) AS total FROM before_dinas";
$result2 = mysqli_query($koneksi, $query2);
$data2 = mysqli_fetch_assoc($result2);
$totalData2 = $data2['total'];

$query4 = "SELECT COUNT(*) AS total FROM login";
$result4 = mysqli_query($koneksi, $query4);
$data4 = mysqli_fetch_assoc($result4);
$totalData4 = $data4['total'];


?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Rp <?php echo format_rupiah($totalData) ?></h3>

                <p>Total Anggaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
              <a href="validasi_anggaran.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totalData2 ?></h3>

                <p>Sebelum Perjalanan Dinas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="kelola_perjalananDinas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalData4 ?></h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="kelola_user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include 'footer.php';
?>
 