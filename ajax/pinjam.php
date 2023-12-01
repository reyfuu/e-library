<?php 

require '../connect.php';



if(isset($_POST['input'])){
  $keyword = $_POST['input'];
  $query="SELECT * FROM pinjamBuku 
        WHERE 
        namaBuku LIKE '%$keyword%' OR
        noInduk LIKE '%$keyword%' OR
        tanggalPinjam LIKE '%$keyword%' OR
        tanggalKembali LIKE '%$keyword%' 

        ";

  $result= mysqli_query($conn,$query);

  if(mysqli_num_rows($result)){?>

<table border="1" cellpadding="10" class="table table-bordered table-hover" id="table2">
          <tr>
              <td>No</td>
              <td>Judul Buku</td>
              <td>No Induk</td>
              <td>Tanggal Pinjam</td>
              <td>Tanggal Kembali</td>
              <td>status</td>
              <td>Aksi</td>
            </tr>
            <?php $i=1; ?>
          <?php while($row = mysqli_fetch_assoc($result)): ?>

            <tr>
              <td><?= $i; ?></td>

              <td><?= $row['namaBuku']; ?></td>
              <td><?= $row['noInduk']; ?></td>
              <td><?= $row['tanggalPinjam']; ?></td>
              <td><?= $row['tanggalKembali']; ?></td>
              <td><?= $row['status']; ?></td>
              <td>
                <a href="update.php?id=<?=  $row['id']?>" class="nav-link">Update</a>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endwhile; ?>
            </table>
      <?php
  }
  else{
    echo "<h6 class='text-danger text-center mt-3'>Data tidak ditemukan</h6>";
  }
  
}
?>
 