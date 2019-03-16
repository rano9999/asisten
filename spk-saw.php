<?php
 // Koneksi
 include 'koneksi.php';

 //Buat array bobot { C1 = 35%; C2 = 25%; C3 = 25%; dan C4 = 15%.}
 $bobot = array(0.30,0.30,0.30,0.30,0.30);

 //Setelah bobot terbuat select semua di tabel Matrik
 $sql = mysqli_query($connect, "SELECT * FROM nilai_akumulasi_terbaik, asisten WHERE nilai_akumulasi_terbaik.id_asisten = asisten.nim_asisten");
 //Buat tabel untuk menampilkan hasil
 echo "<H3>Matrik Awal</H3>
 <table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
   <td>No</td>
   <td>Nama</td>
   <td>Kreatifitas</td>
   <td>Kedisiplinan</td>
   <td>Kerapihan</td>
   <td>Komunikasi</td>
   <td>Pemahaman Materi</td>
   <td>jumlah poin</td>
  </tr>
  ";
 $no = 1;
 while ($dt = mysqli_fetch_array($sql)) {
  $jumlah= ($dt['tot_kreatifias'])+($dt['tot_kedisiplinan'])+($dt['tot_kerapihan'])+($dt['tot_komunikasi'])+($dt['tot_pemahaman']);
  echo "<tr>
   <td>$no</td>
   <td>".$dt['nama_asisten']."</td>
   <td>$dt[tot_kreatifias]</td>
   <td>$dt[tot_kedisiplinan]</td>
   <td>$dt[tot_kerapihan]</td>
   <td>$dt[tot_komunikasi]</td>
   <td>$dt[tot_pemahaman]</td>
   <td>$jumlah</td>
  </tr>";
 $no++;
 }
 echo "</table>";

 //Lakukan Normalisasi dengan rumus pada langkah 2
 //Cari Max atau min dari tiap kolom Matrik
 $crMax = mysqli_query($connect, "SELECT max(tot_kreatifias) as maxK1,
      max(tot_kedisiplinan) as maxK2,
      max(tot_kerapihan) as maxK3,
      max(tot_komunikasi) as maxK4,
      max(tot_pemahaman) as maxK5
   FROM nilai_akumulasi_terbaik");
 $max = mysqli_fetch_array($crMax);

 //Hitung Normalisasi tiap Elemen
 $sql2 = mysqli_query($connect, "SELECT * FROM nilai_akumulasi_terbaik, asisten WHERE nilai_akumulasi_terbaik.id_asisten = asisten.nim_asisten");
 //Buat tabel untuk menampilkan hasil
 echo "<H3>Matrik Normalisasi</H3>
 <table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
    <td>No</td>
    <td>Nama</td>
    <td>Kreatifitas</td>
    <td>Kedisiplinan</td>
    <td>Kerapihan</td>
    <td>Komunikasi</td>
    <td>Pemahaman Materi</td>
  </tr>
  ";
 $no = 1;
 while ($dt2 = mysqli_fetch_array($sql2)) {
  echo "<tr>
   <td>$no</td>
   <td>".$dt2['nama_asisten']."</td>
   <td>".round($dt2['tot_kreatifias']/$max['maxK1'],2)."</td>
   <td>".round($dt2['tot_kedisiplinan']/$max['maxK2'],2)."</td>
   <td>".round($dt2['tot_kerapihan']/$max['maxK3'],2)."</td>
   <td>".round($dt2['tot_komunikasi']/$max['maxK4'],2)."</td>
   <td>".round($dt2['tot_pemahaman']/$max['maxK5'],2)."</td>
  </tr>";
 $no++;
 }
 echo "</table>";

 //Proses perangkingan dengan rumus langkah 3
 $sql3 = mysqli_query($connect, "SELECT * FROM nilai_akumulasi_terbaik, asisten WHERE nilai_akumulasi_terbaik.id_asisten = asisten.nim_asisten");
 //Buat tabel untuk menampilkan hasil
 echo "<H3>Perangkingan</H3>
 <table width=500 style='border:1px; #ddd; solid; border-collapse:collapse' border=1>
  <tr>
   <td>no</td>
   <td>Nama</td>
   <td>total poin</td>
   <td>SAW</td>
   <td>ket</td>
  </tr>
  ";

//Kita gunakan rumus (Normalisasi x bobot)
 while ($dt3 = mysqli_fetch_array($sql3)) {
  $jumlah= ($dt3['tot_kreatifias'])+($dt3['tot_kedisiplinan'])+($dt3['tot_kerapihan'])+($dt3['tot_komunikasi'])+($dt3['tot_pemahaman']);
  $poin= round(
   (($dt3['tot_kreatifias']/$max['maxK1'])*$bobot[0])+
   (($dt3['tot_kedisiplinan']/$max['maxK2'])*$bobot[1])+
   (($dt3['tot_kerapihan']/$max['maxK3'])*$bobot[2])+
   (($dt3['tot_komunikasi']/$max['maxK4'])*$bobot[3])+
   (($dt3['tot_pemahaman']/$max['maxK5'])*$bobot[3]),3);

  $data[]=array('nama'=>$dt3['nama_asisten'],
      'jumlah'=>$jumlah,
      'poin'=>$poin);

 }


//mengurutkan data
   foreach ($data as $key => $isi) {
    $nama[$key]=$isi['nama'];
    $jlh[$key]=$isi['jumlah'];
    $poin1[$key]=$isi['poin'];
   }
   array_multisort($poin1,SORT_DESC,$jlh,SORT_DESC,$data);
   $no=1;
   $h="juara";
   $juara=1;
   $hr=1;

   foreach ($data as $item) { ?>
   <tr>
   <td><?php echo $no ?></td>
   <td><?php echo$item['nama'] ?></td>
   <td><?php echo$item['jumlah'] ?></td>
   <td><?php echo$item['poin'] ?></td>
   <td><?php echo"$h $juara" ?></td>
   </tr>
   <?php
   $no++;
   if ($no>=4) {
    $h="  ";
    $juara=" ";
   }else{
    $juara++;
   }

   }
   echo "</table>";

?>
