<?php 

include 'connect.php';
session_start();

$id=$_GET['id'];

$result= mysqli_query($conn,"SELECT namabarang FROM `barang` WHERE idbarang='$id'");

$result1= mysqli_query($conn,"SELECT * FROM pinjam ");
$rowCount= mysqli_num_rows($result1);
$rowCount+=1;
 $idPinjam='PJBR'. strval($rowCount);

if(isset($_POST['submit'])){
  $namaBarang=$_POST['namaBarang'];
  $nama=$_SESSION['siswa'];
  $date=$_POST['date'];
  $tanggalKembali= strtotime($date);
  $tanggalKembali= strtotime("+7 day", $tanggalKembali);
  $tanggalKembali= date('Y/m/d', $tanggalKembali);
  $stok=$_POST['stok'];

  $idbarangTemp= null;
  $noIndukTemp= null;
  
  $idBarang= mysqli_query($conn,"SELECT idbarang,stok FROM barang WHERE namabarang='$namaBarang'");
  $noInduk= mysqli_query($conn,"SELECT idSiswa,noInduk FROM siswa WHERE nama='$nama'");


  while($row= mysqli_fetch_array($idBarang)){
    $idbarangTemp=$row['idbarang'];
    $stokTemp=$row['stok'];
  }
  var_dump($idbarangTemp);
  while($row1=mysqli_fetch_array($noInduk)){
    $noIndukTemp=$row1['noInduk'];
    $idSiswaTemp=$row1['idSiswa'];
  }
  $stokTemp-= intval($stok);
  if($stokTemp >0){
    $status='available';
  }else{
    $status='unavailable';
  }
try{
  mysqli_query($conn,"INSERT INTO `pinjam` (`idpinjam`,`idSiswa`,`noInduk`,`idbarang`,`namaBarang`,`namaSiswa`,`tanggalPinjam`,
  `tanggalKembali`,`status`) 
  VALUES ('$idPinjam','$idSiswaTemp','$noIndukTemp','$idbarangTemp','$namaBarang','$nama','$date','$tanggalKembali','pinjam')");
   
}catch (mysqli_sql_exception $e){
  var_dump($e);
  exit;
}
  

  if(mysqli_affected_rows($conn)> 0){
    mysqli_query($conn, "UPDATE barang SET  status='$status',stok='$stokTemp'  WHERE idbarang='$idbarangTemp'");
    header("Location: dpBarang.php");
  }else{
    echo "gagal";
    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Pinjam Barang</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <p class="dropdown-item">Admin</p>
        <a href="index.php" class="dropdown-item">
          Logout
          <i class="fas fa-sign-out" ></i>
        </a>
      </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem Peminjaman</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
          <a  class="nav-link active">
              <p>
                 Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="dpBarang.php" class="nav-link">
                <p>
                  Barang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="dpBuku.php" class="nav-link">
                <p>
                  Buku
                </p>
              </a>
            </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 
      <div class="container ">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="container">
          <div class="card">
            <div class="card-body">
            <form action="psbarang.php" method="post">
              <?php while($row= mysqli_fetch_assoc($result)): ?>
            <label for="title">Nama Barang</label>
            <input type="text" name="namaBarang" class="form-control my-3 py-2" value="<?= $row['namabarang'] ?>" required readonly>
            <label for="">Stok</label>
            <input type="number" name="stok" class="form-control my-3 py-2" required>
            <label for="title">Tanggal</label>
            <input type="date" name="date" class="form-control my-3 py-2" required>
            <div class="text-center">
            <button type="submit" name="submit" value="submit" class="btn btn-dark">Submit</button>
            </div>
            <?php endwhile ?>
          </form>
            </div>
          </div>
 
          </div>
        </div>

       
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
