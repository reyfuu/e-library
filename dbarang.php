<?php

include 'connect.php';

$id=$_GET['id'];
$result= mysqli_query($conn,"DELETE FROM barang WHERE idbarang='$id'");
$check= mysqli_affected_rows($conn);
if($check > 0){
    
    header("Location:barang.php");
}
else{
    echo "<script>
        alert('data gagal dihapus');
    </script>";
}
?>
