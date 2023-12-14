<?php

include 'connect.php';

$id=$_GET['id'];
$result= mysqli_query($conn,"DELETE FROM login WHERE username='$id'");
$check= mysqli_affected_rows($conn);
if($check > 0){
    
    header("Location:login.php");
}
else{
    echo "<script>
        alert('data gagal dihapus');
    </script>";
}
?>
