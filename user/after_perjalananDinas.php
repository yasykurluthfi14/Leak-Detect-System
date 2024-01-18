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
            <h1>Kelola Proyek</h1>
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
                    <th>Nama Proyek</th>
                    <th>Deskripsi</th>
                    <th>Mulai</th>
                    <th>Sampai</th>
                    <th>Foto</th>
                    <th>Pengawas</th>
                    <th>Persentase</th>
                    <th>Kode User</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $p = $koneksi->query('SELECT * FROM proyek');
                    $no = 1;
                    while ($data = $p->fetch_assoc()): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['nama_proyek']; ?></td>
                      <td><?php echo $data['deskripsi']; ?></td>
                      <td><?php echo $data['start_date']; ?></td>
                      <td><?php echo $data['end_date']; ?></td>
                      <td><img src="../assets/img/<?php echo $data[
                          'foto'
                      ]; ?>" width="35" height="40"></td>
                      <td><?php echo $data['pengawas']; ?></td>
                      <td><?php echo $data['persentase']; ?></td>
                      <td><?php echo $data['kodeuser']; ?></td>
                      <td><a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#edit<?php echo $data[
                          'id_proyek'
                      ]; ?>"><i class="fas fa-edit"></i></a> |
                          <a class ="btn btn-danger btn-md pull-right" href="fungsi/hapus/hapus.php?kelolaproyek=<?= $data[
                              'id_proyek'
                          ] ?>"onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fas fa-trash"></i></a></td>    
                      </td>
                    </tr>

                    <div class="modal fade" id="edit<?php echo $data[
                        'id_proyek'
                    ]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/edit/edit_kelolaproyek.php" method="POST" enctype="multipart/form-data">

                            <?php
                            $id = $data['id_proyek'];
                            $query_edit = $koneksi->query(
                                "SELECT * FROM proyek WHERE id_proyek='$id'"
                            );

                            while ($row = $query_edit->fetch_assoc()) { ?>
                                <input type="hidden" required class="form-control"  value="<?php echo $row[
                                    'id_proyek'
                                ]; ?>" name="id">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama Proyek :</label>
                                    <input type="text" required class="form-control" placeholder="Nama Proyek" value="<?php echo $row[
                                        'nama_proyek'
                                    ]; ?>" name="nama_proyek">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Deskripsi :</label>
                                    <input type="text" required class="form-control" placeholder="Deskripsi" value="<?php echo $row[
                                        'deskripsi'
                                    ]; ?>" name="deskripsi">
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
                                    <label for="recipient-name" class="col-form-label">Pengawas :</label>
                                    <input type="text" required class="form-control" placeholder="Pengawas" value="<?php echo $row[
                                        'pengawas'
                                    ]; ?>" name="pengawas">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Persentase :</label>
                                    <input type="text" required class="form-control" placeholder="Persentase" value="<?php echo $row[
                                        'persentase'
                                    ]; ?>" name="persentase">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Kode User :</label>
                                    <input type="text" required class="form-control" placeholder="Kode User" value="<?php echo $row[
                                        'kodeuser'
                                    ]; ?>" name="kodeuser">
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
                    <th>Nama Proyek</th>
                    <th>Deskripsi</th>
                    <th>Mulai</th>
                    <th>Sampai</th>
                    <th>Foto</th>
                    <th>Pengawas</th>
                    <th>Persentase</th>
                    <th>Kode User</th>
                    <th>Action</th>
                  </tfoot>
                </table>

                  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/tambah/tambah_kelolaproyek.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" required class="form-control" name="id_proyek">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama Proyek :</label>
                                    <input type="text" required class="form-control" placeholder="Nama Proyek"  name="nama_proyek">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Deskripsi :</label>
                                    <input type="text" required class="form-control" placeholder="Deskripsi"  name="deskripsi">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Mulai :</label>
                                    <input type="date" required class="form-control"  name="start_date">
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
                                    <label for="recipient-name" class="col-form-label">Pengawas :</label>
                                    <input type="text" required class="form-control" placeholder="Pengawas"  name="pengawas">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Persentase :</label>
                                    <input type="text" required class="form-control" placeholder="Persentase"  name="persentase">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Kode User :</label>
                                    <input type="text" required class="form-control" placeholder="Kode User" name="kodeuser">
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
