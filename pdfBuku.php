<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'connect.php';

if(isset($_POST['submit'])){
    $pencarian=$_POST['keyword'];
    $tanggalPinjam=$_POST['tanggalPinjam'];
    $tanggalKembali=$_POST['tanggalKembali'];
    $query="SELECT * FROM pinjamBuku  
    WHERE 

    tanggalKembali BETWEEN $tanggalPinjam and $tanggalKembali AND
    noInduk='$pencarian' OR
    idBuku ='$pencarian' OR
    namaBuku ='$pencarian' OR
    namaSiswa ='$pencarian' 

    ";
    $query2="SELECT * FROM siswa
        WHERE 
    
        noInduk LIKE '%$pencarian%' OR
        nama LIKE '%$pencarian%' 

        ";
    $result=mysqli_query($conn,$query);
    $result1=mysqli_query($conn,$query2);
    while($row= mysqli_fetch_assoc($result1)){
        $html='

        <h3>Daftar Peminjaman Buku </h3>

        <h3>Nama   :'.$row['nama'].'</h3>
        <h3>Kelas  :'.$row['kelas'].'</h3>
      ';
    }
    $html.='<table border="1" cellpadding="10" cellspasing="0" 
          style=
          "border-collapse:collapse;
          margin: 25px 0;
          font-size:0.9rem;
          min-width:400px;"
          >
        <tr>
          <th>No</th>
          <th>Id Pinjam Buku</th>
          <th>Id Buku</th>
          <th>Nama Buku</th>
          <th>No Induk</th>
          <th>Nama Siswa</th>
          <th>Tanggal Pinjam dan Kembali Barang</th>
          <th>Tanggal Pinjam dan Kembali Buku</th>    

        </tr>';
        $count=1;
        while($row= mysqli_fetch_assoc($result)){
        $html.='
        <tr>
        <td>'.$count++.'</td>
                 <td>'.$row['idPinjam']. '</td>
                 <td>'.$row['idBuku'].'</td>
                 <td>'. $row['namaBuku'].'</td>
                 <td>'.$row['noInduk'].'</td>
                 <td>'. $row['namaSiswa'].'</td>
                 <td>'. $row['tanggalpinjam'].'&' .$row['tanggalPinjam'].'</td>
                 <td>'.$row['tanggalkembali'].'&' .$row['tanggalKembali'].'</td>
               </tr>';
        }
        $html.= 
        '</table>
        <p style="text-align: right">mengetahui K3 Teknik komputer dan jaringan</p>';
      }     
$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'pad']);
$mpdf->SetHeader('<img src="Header.png"/>');
$mpdf->WriteHTML($html);
$mpdf->Output();

?>
