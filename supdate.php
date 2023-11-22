<?php

include 'connect.php';

$id=$_GET['id'];

$result= mysqli_query($conn,"SELECT * FROM `student` WHERE noInduk='$id'");


if(isset($_POST['submit'])){

    $noInduk=$_POST['id'];
    $name=$_POST['name'];
    $class=$_POST['class'];


    try{
      $result= mysqli_query($conn, "UPDATE student SET name='$name', class='$class'  WHERE noInduk='$noInduk'");

    }catch (mysqli_sql_exception $e){
      var_dump($e);
      exit;
    }


   

    $check= mysqli_affected_rows($conn);
    if($check> 0){
     
        header("Location:student.php");
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
  <title>Update Student</title>

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
   

      <form action="supdate.php" method="post">
      <input type="hidden" name="id" value="<?= $id ?>">
        <?php while($row= mysqli_fetch_assoc($result)):  ?>
          

          <label for="name">Name</label>
          <input type="text" class="form-control"  name="name" value="<?= $row['name']; ?>">
          <label for="class">Class</label>
          <input type="text" class="form-control"  name="class" value="<?= $row['class']; ?>">
  
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
