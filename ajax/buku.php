<?php 

require '../connect.php';



if(isset($_POST['input'])){
  $keyword = $_POST['input'];
  $query="SELECT * FROM buku 
        WHERE 
        judul LIKE '%$keyword%' OR
        nama LIKE '%$keyword%' OR
        publikasi LIKE '%$keyword%' OR
        edisi LIKE '%$keyword%' 

        ";

  $result= mysqli_query($conn,$query);

  if(mysqli_num_rows($result)){?>

            <table border="1" cellpadding="10" class="table table-bordered table-hover">
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
              <?php while($row = mysqli_fetch_assoc($result)): ?>
                <td><?= $i; ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['publikasi'] ?></td>
                <td><?= $row['edisi'] ?></td>
                <td><?= $row['status'] ?></td>
              <td>
                <a href="bupdate.php?id=<?=  $row['idBuku']?>" class="nav-link">Update</a>
                <a href="borrow.php?id=<?=  $row['idBuku']?>" class="nav-link">Pinjam</a>

              </td>
              <?php $i++; ?>
              <?php endwhile; ?>
              </tr>
            </table>

      <?php
  }
  else{
    echo "<h6 class='text-danger text-center mt-3'>Data tidak ditemukan</h6>";
  }
  
}
?>
 