<?php

include 'connect.php';

$id=$_GET['id'];

if(isset($_POST['submit'])){

    $idPinjam=$_POST['idPinjam'];
    $date=$_POST['date'];
    $status= $_POST['status'];
    $stok=$_POST['stok'];

    $result1=mysqli_query($conn,"SELECT idbarang,stok FROM pinjam WHERE idpinjam='$idPinjam' ");

    while($row1=mysqli_fetch_assoc($result1)){
      $idbarangTemp=$row1['idbarang'];
      $stokTemp=$row1['stok'];
    }
    try{
      $result= mysqli_query($conn, "UPDATE pinjam SET tanggalkembali='$date',status='$status'  WHERE idpinjam='$idPinjam'");

    }catch (mysqli_sql_exception $e){
      var_dump($e);
      exit;
    }


   $stok= intval($stok)+ intval($stokTemp);

    $check= mysqli_affected_rows($conn);
    if($check> 0){
        mysqli_query($conn, "UPDATE barang SET status='available',stok='$stok'  WHERE idbarang='$idbarangTemp'");
        header("Location:dpaBarang.php");
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
  <title>Update Buku</title>

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
   

      <form action="dpuBarang.php" method="post">
      <input type="hidden" name="idPinjam" value="<?= $id ?>">
       
          
          <label for="title">Tanggal Kembali</label>
          <input type="date" class="form-control"  name="date" required>
          <label for="">Stok</label>
          <input type="text" name="stok" class="form-control" required>
          <label for="">Status</label>
          <input type="text" name="status" class="form-control" required>
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
