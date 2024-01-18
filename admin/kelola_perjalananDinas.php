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
            <h1>Kelola Perjalanan Dinas</h1>
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
                    <th>Jabatan</th>
                    <th>Unit Kerja</th>
                    <th>Posisi Area</th>
                    <th>Maksud Perjalanan Dinas</th>
                    <th>Area Tujuan</th>
                    <th>Transportasi yang Digunakan</th>
                    <th>Berkas</th>
                    <th>Status</th>
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
                      <td><a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#edit<?php echo $data['id_dinas']; ?>"><i class="fas fa-edit"></i></a> |
                          <a class ="btn btn-danger btn-md pull-right" href="fungsi/hapus/hapus.php?kelolaperjalananDinas=<?=$data['id_dinas']?>"onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fas fa-trash"></i></a></td>    
                      </td>
                    </tr>

                    <div class="modal fade" id="edit<?php echo $data['id_dinas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Perjalanan Dinas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/edit/edit_kelolaperjalananDinas.php" method="POST" enctype="multipart/form-data">

                            <?php
                            $id= $data['id_dinas']; 
                            $query_edit = $koneksi->query("SELECT * FROM before_dinas WHERE id_dinas='$id'");

                            while ($row = $query_edit->fetch_assoc()){  
                            ?>
                                <input type="hidden" required class="form-control"  value="<?php echo $row['id_dinas']; ?>" name="id_dinas">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama :</label>
                                    <input type="text" required class="form-control" placeholder="Nama" value="<?php echo $row['nama']; ?>" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Jabatan :</label>
                                    <input type="text" required class="form-control" placeholder="Jabatan" value="<?php echo $row['jabatan']; ?>" name="jabatan">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Unit Kerja :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['unit_kerja']; ?>" name="unit_kerja">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Posisi Area :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['posisi_area']; ?>" name="posisi_area">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Maksud Perjalanan Dinas :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['deskripsi']; ?>" name="deskripsi">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Area Tujuan :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['area_tujuan']; ?>" name="area_tujuan">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Transportasi yang Digunakan :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['transportasi']; ?>" name="transportasi">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Berkas :</label>
                                    <input type="file" required class="form-control" value="<?php echo $row['berkas']; ?>"  name="berkas">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Lokasi Awal :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['lokasi_awal']; ?>"  name="lokasi_awal">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Lokasi Akhir :</label>
                                    <input type="text" required class="form-control" value="<?php echo $row['lokasi_akhir']; ?>"  name="lokasi_akhir">
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
                    <th>Status</th>
                    <th>Action</th>
                  </tfoot>
                </table>

                  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Perjalanan Dinas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="fungsi/tambah/tambah_kelolaperjalananDinas.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" required class="form-control" name="id_dinas">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama :</label>
                                    <input type="text" required class="form-control" placeholder="Nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Jabatan :</label>
                                    <input type="text" required class="form-control" placeholder="Jabatan" name="jabatan">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Unit Kerja :</label>
                                    <input type="text" required class="form-control"  name="unit_kerja">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Posisi Area :</label>
                                    <input type="text" required class="form-control"  name="posisi_area">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Maksud Perjalanan Dinas :</label>
                                    <input type="text" required class="form-control"  name="deskripsi">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Area Tujuan :</label>
                                    <input type="text" required class="form-control"  name="area_tujuan">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Transportasi :</label>
                                    <input type="text" required class="form-control"  name="transportasi">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Lokasi Awal :</label>
                                    <input type="text" required class="form-control"  name="lokasi_awal">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Lokasi Akhir :</label>
                                    <input type="text" required class="form-control"  name="lokasi_akhir">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Berkas :</label>
                                    <input type="file" required class="form-control"  name="berkas">
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