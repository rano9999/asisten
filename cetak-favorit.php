<?php

 /* include autoloader */
include 'koneksi.php';
include 'format-tanggal.php';
require 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
$dompdf = new Dompdf();
// Set options.
  $options = new \Dompdf\Options();
  $options->set('dpi', 100);
  $options->set('isPhpEnabled', TRUE);

$tahun  = $_GET['tahun'];
$smt    = $_GET['smt'];

$th = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tahun_ajar WHERE id_tahun = '$tahun'"));


$qy = mysqli_query($connect, "SELECT * FROM `nilai_akumulasi_favorit`
  JOIN asisten ON nilai_akumulasi_favorit.id_asisten = asisten.nim_asisten
  Join tahun_ajar ON nilai_akumulasi_favorit.tahun_ajar = tahun_ajar.id_tahun
  WHERE nilai_akumulasi_favorit.tahun_ajar = '$tahun'
  AND nilai_akumulasi_favorit.smt = '$smt'
  ORDER BY nilai_akumulasi_favorit.jml_pemilih DESC");
$html = '
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
      @page { margin: 55px 30px 55px 30px; }
    </style>
  </head>
  <body>
    <table class="table table-borderless">
      <tr style="text-align:center">
        <td> <img src="img/logo-amikom.png" alt="logo amikom" width="100px"> </td>
        <td width="60%">
          <h5>Laporan Hasil Penilaian Asisten Praktikum <br> Forum Asisten STMIK AMIKOM Purwokerto </h5>
          <h6>Tahun Akademik '.$th['tahun_ajar'].' Semester '.$smt.'</h6>
        </td>
        <td> <img src="img/logo-fa.png" alt="logo amikom" width="125px"> </td>
      </tr>
    </table>
    <center> <h5>Daftar Asisten Terfavorit</h5> </center>
    <table class="table table-sm table-bordered" style="font-size:14px">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Asisten</th>
        <th>Jumlah Pemilih</th>
      </tr>';
      $no = 1;
      while ($q = mysqli_fetch_array($qy)) {
$html .=
      '<tr>
        <td> '.$no.' </td>
        <td> '.$q['nim_asisten'].' </td>
        <td> '.$q['nama_asisten'].' </td>
        <td> '.$q['jml_pemilih'].' </td>
      </tr>';
      $no++;
    }
    $html .=
    '</table>
    <table class="table table-borderless">
      <tr style="text-align:center">
        <td><br> Pembina Forum Asisten, <br><br><br> </td>
        <td>Purwokerto, '.date('d M Y').' <br> Ketua Forum Asisten, <br><br><br> </td>
      </tr>
      <tr style="text-align:center">
        <td> <u>Tri Astuti, S.Kom., M.Eng</u> <br> NIDN. 0625048302 </td>
        <td> <u>Fathurrohman</u> <br> NIM. 16.11.0249 </td>
      </tr>
    </table>
  </body>
</html>';

// echo $html;

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
$dompdf->getCanvas()->page_text(72, 18, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));
$dompdf->stream("Laporan-penilaian-asisten.pdf", array("Attachment" => false));
