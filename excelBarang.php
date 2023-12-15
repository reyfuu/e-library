<?php 

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = Barang.xlsx");

include 'connect.php'
?>
<table border = 1>
  <tr>
    <td>No</td>
    <td>Nama Barang</td>
    <td>Stok</td>
  </tr>
  <?php
    $i=1;
    $query= "SELECT * FROM barang ";
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)): ?>
      <td><?= $i++; ?></td>
      <td><?= $row['namabarang'] ?></td>
      <td><?= $row['stok'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
