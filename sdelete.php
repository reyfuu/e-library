<?php

include 'connect.php';

$id=$_GET['id'];
?>
echo "<script>
        let text='Are you sure you want to delete this ?'
        if(confirm(text) == true){
          text = 'OK'
          <?php

          $result= mysqli_query($conn,"DELETE FROM student WHERE noInduk='$id'");

          ?>
        }
        else{
          text= 'cancel'
        }
      </script>";

<?php



   

    $check= mysqli_affected_rows($conn);
    if($check> 0){
    
        header("Location:student.php");
    }
    else{
        echo "<script>
            alert('data gagal dihapus');
        </script>";
    }

?>



