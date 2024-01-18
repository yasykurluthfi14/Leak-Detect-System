<?php 
 include 'config.php';
  
 error_reporting(0);
 session_start();

 if (isset($_POST['submit'])) {
     $username = $_POST['username'];
     $password = md5($_POST['password']);
  
     $sql = "SELECT * FROM login WHERE username ='$username' AND password ='$password'";
     
     $result = mysqli_query($koneksi, $sql);
     
     if ($result->num_rows > 0 ) {
         $row = mysqli_fetch_assoc($result);
        
        if ($row['role']=="admin" ){
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("location:admin/dashboard_admin.php");
        } 
        else if ($row['role'] == "user"){
            $_SESSION['id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("location: user/dashboard_user.php");
        }
        else if ($row['role'] == "manajer"){
          $_SESSION['id'] = $row['id'];
          $_SESSION['nama'] = $row['nama'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['role'] = $row['role'];
          header("location: manajer/dashboard_manajer.php");
      }      
     }else {
         echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
     }
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets2/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets2/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Form</b>Login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <div class="col-4">
            <a href="index.php" type="button" class="btn btn-warning btn-block">Back</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets2/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets2/dist/js/adminlte.min.js"></script>
</body>
</html>
