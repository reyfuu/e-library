<?php

include 'connect.php';

$id=$_GET['id'];



if(isset($_POST['submit'])){

    $dateReturn=$_POST['dateReturn'];
    $status=$_POST['status'];
    $id= $_POST['id'];
    try{
      $result= mysqli_query($conn, "UPDATE borrow SET dateReturn='$dateReturn', status='$status'
      where id='$id'");
    }catch (mysqli_sql_exception $e){
      var_dump($e);
      exit;
    }
  

    $check= mysqli_affected_rows($conn);
    if($check> 0){
       
        header("Location:dashboard.php");
    }
    else{
        echo "<script>
            alert('data gagal diupdate');
        </script>";
    }


} 



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update</title>

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
   

      <form action="update.php" method="post">
    
          <input type="hidden" name="id" value="<?= $id ?>">
          <label for="title">Date Return</label>
          <input type="date" class="form-control"  name="dateReturn" >
    
          <label for="status">Status</label>
          <input type="text" class="form-control"  name="status" >
       
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
