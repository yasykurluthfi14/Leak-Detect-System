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
            <h1>Output Progress</h1>
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
                    <th>ID Progress</th>
                    <th>Status Progress</th>
                    <th>Keterangan</th>
                    <th>Validasi</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $p = $koneksi->query("SELECT * FROM output_progress");
                      $no = 1;
                      while($data = $p->fetch_assoc()) :
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['id_progress'] ?></td>
                      <td><?php echo $data['status_progress'] ?></td>
                      <td><?php echo $data['keterangan'] ?></td>
                      <td><?php echo $data['validasi'] ?></td>
                      <td><a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#edit<?php echo $data['id_hasil']; ?>"><i class="fas fa-edit"></i></a> |
                          <a class ="btn btn-danger btn-md pull-right" href="fungsi/hapus/hapus.php?kelolalaporan=<?=$data['id_hasil']?>"onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fas fa-trash"></i></a></td>    
                      </td>
                    </tr>

                    <div class="modal fade" id="edit<?php echo $data['id_hasil']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Output Progress</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/edit/edit_kelolalaporan.php" method="POST">

                            <?php
                            $id= $data['id_hasil']; 
                            $query_edit = $koneksi->query("SELECT * FROM output_progress WHERE id_hasil='$id'");

                            while ($row = $query_edit->fetch_assoc()){  
                            ?>
                                <input type="hidden" required class="form-control"  value="<?php echo $row['id_hasil']; ?>" name="id_hasil">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">ID Progress :</label>
                                    <input type="text" required class="form-control" placeholder="ID Progress" value="<?php echo $row['id_progress']; ?>" name="id_progress">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Status Progress :</label>
                                    <input type="text" required class="form-control" placeholder="Status Progress" value="<?php echo $row['status_progress']; ?>" name="status_progress">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Keterangan :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['keterangan']; ?>" name="keterangan">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Validasi :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['validasi']; ?>"  name="validasi">
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
                    <th>ID Progress</th>
                    <th>Status Progress</th>
                    <th>Keterangan</th>
                    <th>Validasi</th>
                    <th>Action</th>
                  </tfoot>
                </table>

                  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Output Progress</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/tambah/tambah_kelolalaporan.php" method="POST">
                                <input type="hidden" required class="form-control" name="id_hasil">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">ID Progress :</label>
                                    <input type="text" required class="form-control" placeholder="ID Progress"name="id_progress">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Status Progress :</label>
                                    <input type="text" required class="form-control" placeholder="Status Progress" name="status_progress">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Keterangan :</label>
                                    <input type="text" required class="form-control" name="keterangan">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Validasi :</label>
                                    <input type="text" required class="form-control"  name="validasi">
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
 
<?php
include 'footer.php'
?>