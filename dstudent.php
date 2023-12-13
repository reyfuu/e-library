<?php

include 'connect.php';

$id=$_GET['id'];
$result= mysqli_query($conn,"DELETE FROM siswa WHERE idSiswa='$id'");
$check= mysqli_affected_rows($conn);
if($check > 0){
    
    header("Location:student.php");
}
else{
    echo "<script>
        alert('data gagal dihapus');
    </script>";
}
?>
