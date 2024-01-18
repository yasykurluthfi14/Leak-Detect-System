<?php 
require '../config.php';
include 'header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validasi Perjalanan Dinas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Unit Kerja</th>
                    <th>Posisi Area</th>
                    <th>Maksud Perjalanan Dinas</th>
                    <th>Area Tujuan</th>
                    <th>Transportasi yang Digunakan</th>
                    <th>Berkas</th>
                    <th>Status Perjalanan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $p = $koneksi->query("SELECT * FROM before_dinas");
                      $no = 1;
                      while($data = $p->fetch_assoc()) :
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['nama'] ?></td>
                      <td><?php echo $data['jabatan'] ?></td>
                      <td><?php echo $data['unit_kerja'] ?></td>
                      <td><?php echo $data['posisi_area'] ?></td>
                      <td><?php echo $data['deskripsi'] ?></td>
                      <td><?php echo $data['area_tujuan'] ?></td>
                      <td><?php echo $data['transportasi'] ?></td>
                      <td><?php echo $data['berkas'] ?></td>
                      <td><?php echo $data['status_perjalanan'] ?></td>
                      <td><a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#edit<?php echo $data['id_dinas']; ?>"><i class="fas fa-check"></i></a></td>
                    </tr>

                    <div class="modal fade" id="edit<?php echo $data['id_dinas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/edit/edit_beforeperjalananDinas.php" method="POST" enctype="multipart/form-data">

                            <?php
                            $id= $data['id_dinas']; 
                            $query_edit = $koneksi->query("SELECT * FROM before_dinas WHERE id_dinas='$id'");

                            while ($row = $query_edit->fetch_assoc()){  
                            ?>
                                <input type="hidden" required class="form-control"  value="<?php echo $row['id_dinas']; ?>" name="id_dinas">

                                <div class="form-group">
                                    Apakah Anda Setuju Validasi Data Ini?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?php 
                                }
                            ?>        
                          </form>
                        </div>
                      </div>  
                    </div>
                    <?php
                      endwhile;
                    ?>
                  </tbody>
                  <tfoot>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Unit Kerja</th>
                    <th>Posisi Area</th>
                    <th>Maksud Perjalanan Dinas</th>
                    <th>Area Tujuan</th>
                    <th>Transportasi yang Digunakan</th>
                    <th>Berkas</th>
                    <th>Status Perjalanan</th>
                    <th>Action</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
include 'footer.php'
?>