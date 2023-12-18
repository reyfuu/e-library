<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){

    $username=$_POST['siswa'];
    $password=$_POST['password'];

    $result= mysqli_query($conn, "UPDATE login SET password='$password' WHERE username='$username'");
    $check= mysqli_affected_rows($conn);
    if($check> 0){

        header("Location:index.php");
      }
    else{
        echo "<script>
            alert('username / password yang anda masukkan salah');
        </script>";
    }


} 



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lupa Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <b>Reset Password</b>
    </div>
    <div class="card-body">
   <?php 
    $query='SELECT username FROM login ';
    $result=mysqli_query($conn,$query);
   ?>
  
      <form action="lupa.php" method="post">
        <div class="input-group mb-3">
          <select name="siswa" class="form-control">
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <option value="<?= $row['username'] ;?>"><?= $row['username'] ;?></option>
            <?php endwhile ?>
          </select>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="container">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
          </div>
          <br>

          <!-- /.col -->
        </div>
      </form>

  <br>


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
