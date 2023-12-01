<?php

include 'connect.php';

$id=$_GET['id'];

$result= mysqli_query($conn,"SELECT * FROM `barang` WHERE idbarang='$id'");


if(isset($_POST['submit'])){

    $idBarang=$_POST['idBarang'];
    $nama=$_POST['nama'];
    $stok=intval($_POST['stok']);
    $status=$_POST['status'];

    try{
      $result= mysqli_query($conn, "UPDATE barang SET namabarang='$nama', stok='$stok', status='$status'  WHERE idbarang='$idBarang'");

    }catch (mysqli_sql_exception $e){
      var_dump($e);
      exit;
    }


   

    $check= mysqli_affected_rows($conn);
    if($check> 0){
     
        header("Location:barang.php");
    }
    else{
        echo "<script>
            alert('data gagal di update');
        </script>";
    }


} 



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Book</title>

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

    <div class="card-body">
   

      <form action="ubarang.php" method="post">
      <input type="hidden" name="idBarang" value="<?= $id ?>">
        <?php while($row= mysqli_fetch_assoc($result)):  ?>
          
          <label for="title">Nama Barangf</label>
          <input type="text" class="form-control"  name="nama" value="<?= $row["namabarang"];?>">
          <label for="name">Stok</label>
          <input type="text" class="form-control"  name="stok" value="<?= $row['stok']; ?>">
          <label for="name">Status</label>
          <input type="text" class="form-control"  name="status" value="<?= $row['status']; ?>">
          <?php endwhile; ?>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="container">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
