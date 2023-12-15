<?php 

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = Siswa.xlsx");

include 'connect.php'
?>
<table border = 1>
  <tr>
    <td>No</td>
    <td>No Induk</td>
    <td>Nama Siswa</td>
    <td>Kelas</td>
  </tr>
  <?php
    $i=1;
    $query= "SELECT * FROM siswa ";
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)): ?>
      <td><?= $i++; ?></td>
      <td><?= $row['noInduk'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['kelas'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
