<?php

include 'connect.php';

$id=$_GET['id'];
?>
echo "<script>
        let text='Apakah kamu yakin ingin menghapus barang ini ?'
        if(confirm(text) == true){
          text = 'OK'
          <?php

          $result= mysqli_query($conn,"DELETE FROM barang WHERE idbarang='$id'");

          ?>
        }
        else{
          text= 'cancel'
        }
      </script>";
<?php   

$check= mysqli_affected_rows($conn);
if($check> 0){
    
    header("Location:barang.php");
}
else{
    echo "<script>
        alert('data gagal dihapus');
    </script>";
}

?>
