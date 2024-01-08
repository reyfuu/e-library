<?php 

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = login.xlsx");

include 'connect.php'
?>
<table border = 1>
  <tr>
    <td>No</td>
    <td>Username</td>
    <td>Password</td>
  </tr>
  <?php
    $i=1;
    $query= "SELECT * FROM login ";
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)): ?>
      <td><?= $i++; ?></td>
      <td><?= $row['username'] ?></td>
      <td><?= $row['password'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
