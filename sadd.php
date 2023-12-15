<?php 

include 'connect.php';

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['submit'])){
  $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 

  if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)){

    if(is_uploaded_file($_FILES['file']['tmp_name'])){

      $reader= new  Xlsx();
      $spreadsheet= $reader->load($_FILES['file']['tmp_name']);
      $worksheet = $spreadsheet->getActiveSheet();
      
      $worksheet_arr= $worksheet->toArray();

      unset($worksheet_arr[0]);

      foreach($worksheet_arr as $row){
        $noInduk=$row[0];
        $nama=$row[1];
        $kelas=$row[2];

   

        $result1= mysqli_query($conn,"SELECT * FROM buku");
        $rowCount= mysqli_num_rows($result1);
        if($rowCount>0){
            $rowCount+=1;
            $idSiswa='BK'. strval($rowCount);
        }else{
            $idSiswa='BK1';
        }

        $prevQuery="SELECT idSiswa FROM siswa WHERE idSiswa='$idSiswa'";
        $prevResult= $conn->query($prevQuery);

        if($prevResult->num_rows>0){
          $conn->query("UPDATE siswa SET noInduk='$noInduk',nama='$nama',kelas='$kelas' 
          WHERE idSiswa='$idSiswa' ");
        }else{
          mysqli_query($conn,"INSERT INTO `siswa` (`idSiswa`,`noInduk`,`nama`,`kelas`) 
          VALUES ('$idSiswa','$noInduk','$nama','$kelas')");
        }
      }
      $qstring='?status=succ';
    }else{
      $qstring='?status=err';
    }
  }else{
    $qstring='?status=invalid_file';
  }

  header("Location: student.php".$qstring);
  

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Add Siswa</title>

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
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>



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
                  login
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
              <a href="ReportBuku.php" class="nav-link">
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
           <a href="reportSemua.php" class="nav-link">
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
            <h1 class="m-0">Add Siswa</h1>
            <br>
            <a href="asiswa.php"><button class="btn btn-primary">Tambah</button></a>
            <a href="nama siswa.xlsx" download><button class="btn btn-success" >Download Template</button></a>
            <a href="excelSiswa.php"><button class="btn btn-success" >Export to Excel</button></a>
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
            <form action="sadd.php" method="post" enctype="multipart/form-data">
            <label for="title">Import excel file</label>
            <input type="file" name="file" class="form-control " required>
            <div class="text-center">
            <button type="submit" name="submit" value="submit" class="btn btn-dark">Submit</button>
            </div>

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
