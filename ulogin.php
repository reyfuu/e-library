<?php

include 'connect.php';

$id=$_GET['id'];

$result= mysqli_query($conn,"SELECT * FROM `login` WHERE username='$id'");


if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $password=$_POST['password'];


    try{
      $result= mysqli_query($conn, "UPDATE login SET username='$username', password='$password' WHERE username='$username'");

    }catch (mysqli_sql_exception $e){
      var_dump($e);
      exit;
    }


   

    $check= mysqli_affected_rows($conn);
    if($check> 0){
     
        header("Location:login.php");
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
  <title>Update Login</title>

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
   

      <form action="ulogin.php" method="post">
        <?php while($row= mysqli_fetch_assoc($result)):  ?>
          
          <label for="title">Username</label>
          <input type="text" class="form-control"  name="username" value="<?= $row["username"];?>">
          <label for="name">password</label>
          <input type="password" class="form-control"  name="password" value="<?= $row['password']; ?>">
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
