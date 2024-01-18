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
            <h1>Kelola Data User</h1>
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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $p = $koneksi->query("SELECT * FROM login ");
                      $no = 1;
                      while($data = $p->fetch_assoc()) :
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['nama'] ?></td>
                      <td><?php echo $data['username'] ?></td>
                      <td><?php echo $data['role'] ?></td>
                      <td><a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#edit<?php echo $data['id']; ?>"><i class="fas fa-edit"></i></a> |
                          <a class ="btn btn-danger btn-md pull-right" href="fungsi/hapus/hapus.php?kelolauser_admin=<?=$data['id']?>"onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fas fa-trash"></i></a></td>    
                      </td>
                    </tr>

                    <div class="modal fade" id="edit<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/edit/edit_kelolauseradmin.php" method="POST">

                            <?php
                            $id= $data['id']; 
                            $query_edit = $koneksi->query("SELECT * FROM login WHERE id='$id'");

                            while ($row = $query_edit->fetch_assoc()){  
                            ?>
                                <input type="hidden" required class="form-control"  value="<?php echo $row['id']; ?>" name="id">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama :</label>
                                    <input type="text" required class="form-control" placeholder="Nama" value="<?php echo $row['nama']; ?>" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Username :</label>
                                    <input type="text" required class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Role :</label>
                                    <input type="text" required class="form-control" required readonly value="<?php echo $row['role']; ?>" name="role">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Password :</label>
                                    <input type="password" required class="form-control" placeholder="Password"  name="password">
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
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>

                  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/tambah/tambah_kelolauseradmin.php" method="POST">
                                <input type="hidden" required class="form-control" name="id">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama :</label>
                                    <input type="text" required class="form-control" placeholder="Nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Username :</label>
                                    <input type="text" required class="form-control" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Role :</label>
                                    <input type="text" required class="form-control" placeholder="Role" name="role">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Password :</label>
                                    <input type="password" required class="form-control" placeholder="Password"  name="password">
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