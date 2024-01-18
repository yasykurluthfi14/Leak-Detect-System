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
            <h1>Kelola Timeline</h1>
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
                <br>
                <a href="#" type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>ID Proyek</th>
                    <th>Mulai</th>
                    <th>Sampai</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $p = $koneksi->query('SELECT * FROM timeline');
                    $no = 1;
                    while ($data = $p->fetch_assoc()): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['kegiatan']; ?></td>
                      <td><?php echo $data['id_proyek']; ?></td>
                      <td><?php echo $data['start_date']; ?></td>
                      <td><?php echo $data['end_date']; ?></td>
                      <td><img src="../assets/img/<?php echo $data[
                          'foto'
                      ]; ?>" width="35" height="40"></td>
                      <td><?php echo $data['status']; ?></td>
                      <td><a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#edit<?php echo $data[
                          'id_timeline'
                      ]; ?>"><i class="fas fa-edit"></i></a> |
                          <a class ="btn btn-danger btn-md pull-right" href="fungsi/hapus/hapus.php?kelolatimeline=<?= $data[
                              'id_timeline'
                          ] ?>"onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fas fa-trash"></i></a></td>    
                      </td>
                    </tr>

                    <div class="modal fade" id="edit<?php echo $data[
                        'id_timeline'
                    ]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Timeline</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/edit/edit_kelolatimeline.php" method="POST" enctype="multipart/form-data">

                            <?php
                            $id = $data['id_timeline'];
                            $query_edit = $koneksi->query(
                                "SELECT * FROM timeline WHERE id_timeline='$id'"
                            );

                            while ($row = $query_edit->fetch_assoc()) { ?>
                                <input type="hidden" required class="form-control"  value="<?php echo $row[
                                    'id_timeline'
                                ]; ?>" name="id_timeline">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Kegiatan :</label>
                                    <input type="text" required class="form-control" placeholder="Kegiatan" value="<?php echo $row[
                                        'kegiatan'
                                    ]; ?>" name="kegiatan">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">ID Proyek</label>
                                    <input type="number" required class="form-control" placeholder="ID Proyek" value="<?php echo $row[
                                        'id_proyek'
                                    ]; ?>" name="id_proyek">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Mulai :</label>
                                    <input type="date" required class="form-control" value="<?php echo $row[
                                        'start_date'
                                    ]; ?>" name="start_date">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Sampai :</label>
                                    <input type="date" required class="form-control" value="<?php echo $row[
                                        'end_date'
                                    ]; ?>"  name="end_date">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Foto :</label>
                                    <input type="file" required class="form-control" placeholder="Foto" value="<?php echo $row[
                                        'foto'
                                    ]; ?>" name="foto">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Status :</label>
                                    <input type="text" required class="form-control" placeholder="Status" value="<?php echo $row[
                                        'status'
                                    ]; ?>" name="status">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary">Submit</button>
                            </div>
                            <?php }
                            ?>        
                          </form>
                        </div>
                      </div>  
                    </div>
                    <?php endwhile;
                    ?>
                  </tbody>
                  <tfoot>
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>ID Proyek</th>
                    <th>Mulai</th>
                    <th>Sampai</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tfoot>
                </table>

                  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Timeline</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/tambah/tambah_kelolatimeline.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" required class="form-control" name="id_timeline">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Kegiatan :</label>
                                    <input type="text" required class="form-control" placeholder="Kegiatan"  name="kegiatan">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">ID Proyek</label>
                                    <input type="number" required class="form-control" placeholder="ID Proyek"  name="id_proyek">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Mulai :</label>
                                    <input type="date" required class="form-control" name="start_date">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Sampai :</label>
                                    <input type="date" required class="form-control"  name="end_date">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Foto :</label>
                                    <input type="file" required class="form-control" placeholder="Foto"  name="foto">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Status :</label>
                                    <input type="text" required class="form-control" placeholder="Status"  name="status">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary">Submit</button>
                            </div>  
                          </form>
                        </div>
                      </div>  
                    </div>
                 
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
 
<?php include 'footer.php';
?>
