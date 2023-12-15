<?php 

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = Buku.xlsx");

include 'connect.php'
?>
<table border = 1>
  <tr>
    <td>No</td>
    <td>Judul Buku</td>
    <td>Nama Penulis</td>
    <td>Publikasi</td>
    <td>Edisi</td>
    <td>Stok</td>
  </tr>
  <?php
    $i=1;
    $query= "SELECT * FROM buku ";
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)): ?>
      <td><?= $i++; ?></td>
      <td><?= $row['judul'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['publikasi'] ?></td>
      <td><?= $row['edisi'] ?></td>
      <td><?= $row['stok'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
