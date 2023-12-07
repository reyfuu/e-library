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
                <td>No</td>
                <td>Judul Buku</td>
                <td>Nama Pengarang</td>
                <td>Publikasi</td>
                <td>Edisi</td>
                <td>status</td>
                <td>Aksi</td>
              </tr>
              <tr>
              <?php $i=1; ?>
              <?php 
              
              if(isset($_GET['cari'])){
                $pencarian=$_GET['cari'];
                $query= "SELECT * FROM buku 
                WHERE 
                judul LIKE '%$pencarian%' OR
                nama LIKE '%$pencarian%' OR
                publikasi LIKE '%$pencarian%' OR
                edisi LIKE '%$pencarian%' 
                ";
              }else{
                $query="SELECT * FROM buku WHERE status='available'";
              }
              
                

              $result1= mysqli_query($conn,$query);
              while($row = mysqli_fetch_assoc($result1)): ?>
                <td><?= $i; ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['publikasi'] ?></td>
                <td><?= $row['edisi'] ?></td>
                <td><?= $row['status'] ?></td>
              <td>
                <a href="bupdate.php?id=<?=  $row['idBuku']?>" class="nav-link">Update</a>


              </td>
              </tr>
              <?php $i++; ?>
              <?php endwhile; ?>

            </table>
          </div>
        </div>

        </div>