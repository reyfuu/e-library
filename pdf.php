<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'connect.php';

if(isset($_POST['submit'])){
    $pencarian=$_POST['keyword'];
    $tanggalKembali=$_POST['tanggalKembali'];
    $tanggalPinjam=$_POST['tanggalPinjam'];
    $query="SELECT * FROM pinjam pj, pinjambuku pjbk 
    WHERE 
    pj.tanggalKembali BETWEEN $tanggalPinjam and $tanggalKembali AND
    pj.noInduk='$pencarian' AND
    pjbk.noInduk= '$pencarian' OR
    pj.idbarang ='$pencarian' OR
    pj.namaBarang ='$pencarian' OR
    pj.namaSiswa ='$pencarian' AND
    pjbk.namaSiswa='$pencarian' OR
    pjbk.idBuku = '$pencarian' OR
    pjbk.namaBuku= '$pencarian' 
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

        <h3>Daftar Peminjaman Buku dan Barang </h3>

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
          <th>Id Pinjam Buku dan Barang</th>
          <th>Id barang dan Buku</th>
          <th>Nama Barang</th>
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
        <td>'.$row['idPinjam'].'&' .$row['idpinjam']. '</td>
                 <td>'.$row['idbarang'].'&' .$row['idBuku']. '</td>
                 <td>'. $row['namaBarang'].'</td>
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
$mpdf->SetHeader('<img src="Header.jpg"/>');
$mpdf->WriteHTML($html);
$mpdf->Output();

?>
