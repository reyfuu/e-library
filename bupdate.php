<?php

include 'connect.php';

$id=$_GET['id'];

$result= mysqli_query($conn,"SELECT * FROM `books` WHERE idbook='$id'");


if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $result= mysqli_query($conn, "select* from login where username='$username' and password='$password'");

    $check= mysqli_num_rows($result);
    if($check> 0){
        $_SESSION['username']= ['username'];
        header("Location:dashboard.php");
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
   

      <form action="bupdate.php" method="post">
        <?php while($row= mysqli_fetch_assoc($result)):  ?>
          
          <label for="title">Title</label>
          <input type="text" class="form-control"  name="title" value="<?= $row["title"];?>">
          <label for="name">Name</label>
          <input type="text" class="form-control"  name="name" value="<?= $row['name']; ?>">
          <label for="publication">Publication Year</label>
          <input type="text" class="form-control"  name="publication" value="<?= $row['publication year']; ?>">
          <label for="edition">Edition</label>
          <input type="text" class="form-control"  name="edition" value="<?= $row['edition'] ;?>">
          <label for="status">Status</label>
          <input type="text" class="form-control"  name="status" value="<?= $row['status'] ;?>">
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
