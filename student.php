<?php 

include 'connect.php';

if(!empty($_GET['status'])){
  switch($_GET['status']){
    case 'succ':
        $statusType='alert-success';
        $statysMsg='Data sudah berhasil ditambahkan';
        break;
    case 'err':
        $statusType='alert-danger';
        $statysMsg='Data gagal ditambahkan';
        break;
    case 'invalid':
        $statusType='alert-danger';
        $statysMsg='Format salah';
        break;
    default:
      $statusType='';
      $statysMsg='';
      break;
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Dashboard Buku</title>

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
            <a href="dashboard.php" class="nav-link active">
              <p>
                 Dashboard
              </p>
            </a>
         </li>
        <li class="nav-item menu-open">
          <a  class="nav-link active">
              <p>
                 Update dan Delete
                <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="barang.php" class="nav-link">
                <p>
                  Barang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="buku.php" class="nav-link">
                <p>
                  Buku
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="student.php" class="nav-link">
                <p>
                  Siswa
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link">
                <p>
                  Login
                </p>
              </a>
            </li>
          </ul>
          <li class="nav-item menu-open">
          <a  class="nav-link active">
              <p>
                 Tambah
                <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add.php" class="nav-link">
                <p>
                  Buku
                </p>
              </a>
            </li>
          </li>
          <li class="nav-item">
           <a href="sadd.php" class="nav-link">
              <p>
               Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
           <a href="badd.php" class="nav-link">
              <p>
               Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
           <a href="ladd.php" class="nav-link">
              <p>
               Login
              </p>
            </a>
          </li>
          </ul>
          <li class="nav-item menu-open">
          <a  class="nav-link active">
              <p>
                 Pinjam
                <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="dpaBuku.php" class="nav-link">
                <p>
                  Buku
                </p>
              </a>
            </li>
          </li>
          <li class="nav-item">
           <a href="dpaBarang.php" class="nav-link">
              <p>
               Barang 
              </p>
            </a>
          </li>
          </ul>
          <li class="nav-item menu-open">
          <a  class="nav-link active">
              <p>
                 Report
                <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="reportBuku.php" class="nav-link">
                <p>
                  Buku
                </p>
              </a>
            </li>
          </li>
          <li class="nav-item">
           <a href="reportBarang.php" class="nav-link">
              <p>
               Barang 
              </p>
            </a>
          </li>
          <li class="nav-item">
           <a href="pdf2.php" class="nav-link">
              <p>
               Semua Periode
              </p>
            </a>
          </li>
          <li class="nav-item">
           <a href="report.php" class="nav-link">
              <p>
               Buku & Barang 
              </p>
            </a>
          </li>
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

            <h1 class="m-0">Dashboard</h1><br>
           <!-- Search form -->
           <div class="input-group">
              <form action="student.php"  class="d-flex" method="get">
                <div class="form-outline" data-mdb-input-init>
                <input type="text" name="cari" class="form-control me 2" id="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}  ?>" />
                </div>
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init id="tombol-cari">
                  <i class="fas fa-search"></i>
                </button>
            </form>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php if(!empty($statusMsg)){?>
      <div class="col-xs-12 p-3">
        <div class="alert <?= $statusType;?>"><?= $statusMsg; ?></div>
      </div>

    <?php } ?>
    <!-- Main content -->
      <div class="container  ">
        <div class="card">
          <div class="card-body">
            <table border="1" cellpadding="10" class="table table-bordered table-hover" id="table">
              <tr>
                <td><b>No</b></td>
                <td><b>No Induk</b></td>
                <td><b>Nama</b></td>
                <td><b>Kelas</b></td>
                <td><b>Aksi</b></td>
              </tr>
              <tr>
              <?php $i=1; ?>
              <?php
                  $result1= mysqli_query($conn,"SELECT * FROM siswa ");
                  $jumlahData=mysqli_num_rows($result1);
                  $jumlahDataPerHalaman=10;
                  $jumlahHalaman= ceil( $jumlahData/$jumlahDataPerHalaman);
                  $halamanAktif= (isset($_GET['halaman']) ? $_GET['halaman']: 1);
                  $awalData= ($jumlahDataPerHalaman * $halamanAktif)-$jumlahDataPerHalaman; 
                 if(isset($_GET['cari'])){
                  $pencarian= $_GET['cari'];
                  $query="SELECT * FROM siswa WHERE
                  noInduk LIKE '%$pencarian%' OR
                  nama LIKE '%$pencarian%' OR
                  kelas LIKE '%$pencarian%'  ";
                }else{  
                  $query= "SELECT * FROM siswa LIMIT $awalData,$jumlahDataPerHalaman";
                }
                $result=mysqli_query($conn,$query);
              while($row = mysqli_fetch_assoc($result)): ?>
                <td><?= $i; ?></td>
                <td><?= $row['noInduk'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['kelas'] ?></td>
              <td>
                <a href="ustudent.php?id=<?=  $row['idSiswa']?>" class="nav-link">Update</a>
                <a href="dstudent.php?id=<?=  $row['idSiswa']?>" onclick="return confirm('Yakin mau hapus data ini?')" class="nav-link">Delete</a>

              </td>
              </tr>
              <?php $i++; ?>
              <?php endwhile; ?>

            </table>
          </div>
         
        </div>
        <div class="text-center">
          <?php if($halamanAktif>1):?>
            <a href="?halaman=<?= $halamanAktif-1?>">&laquo;</a>
          <?php endif ?>
           <?php for($i=1;$i<=$jumlahHalaman;$i++):?>
               <?php if($i == $halamanAktif):?>
              <a href="?halaman=<?= $i?>" style="font-weight:bold; color:red; text-decoration:none"><?= $i ?></a>
              <?php else:?>
                <a href="?halaman=<?= $i?>" ><?= $i ?></a>
              <?php endif;?>
            <?php endfor?>
          <?php if($halamanAktif<1):?>
            <a href="?halaman=<?= $halamanAktif+1?>">&raquo;</a>
          <?php endif ?>
        </div>
        </div>

       
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
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
