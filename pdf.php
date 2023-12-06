<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'connect.php';


if(isset($_POST['submit'])){
    $pencarian=$_POST['keyword'];
    $query="SELECT * FROM pinjam pj, pinjambuku pjbk 
    WHERE 

    pj.noInduk LIKE '%$pencarian%' OR
    pj.idbarang LIKE '%$pencarian%' OR
    pj.namaBarang LIKE '%$pencarian%' OR
    pj.namaSiswa LIKE '%$pencarian%' OR
    pjbk.idBuku LIKE '%$pencarian%' OR
    pjbk.noInduk LIKE '%$pencarian%' OR
    pjbk.namaSiswa LIKE '%$pencarian%' OR
    pjbk.namaBuku LIKE '%$pencarian%' 
    ";
    $query2="SELECT * FROM pinjam pj, pinjambuku pjbk ,siswa s
        WHERE 
    
        pj.noInduk LIKE '%$pencarian%' OR
        pj.idbarang LIKE '%$pencarian%' OR
        pj.namaBarang LIKE '%$pencarian%' OR
        pj.namaSiswa LIKE '%$pencarian%' OR
        pjbk.idBuku LIKE '%$pencarian%' OR
        pjbk.noInduk LIKE '%$pencarian%' OR
        pjbk.namaSiswa LIKE '%$pencarian%' OR
        pjbk.namaBuku LIKE '%$pencarian%' 
        ";
    $result=mysqli_query($conn,$query);
    $result1=mysqli_query($conn,$query2);
    while($row= mysqli_fetch_assoc($result1)){
        $html='

        <h3>Daftar Peminjaman Buku dan Barang </h3>

        <h3>Nama   :'.$row['namaSiswa'].'</h3>
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
        $count=0;
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
        $html.= '</table>';
        
  }
$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'pad']);
$mpdf->SetHeader('<img src="Header.png"/>');
$mpdf->WriteHTML($html);
$file="pdf.php";
$mpdf->Output($file,'I');
