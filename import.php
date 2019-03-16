<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php

// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';

	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';

	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO mahasiswa VALUES(:nim,:nama_mhs,:password,:kelas_mhs)");

		$numrow = 1;
		foreach($sheet as $row){
			// Ambil data pada excel sesuai Kolom
			$nim = $row['B']; // Ambil data NIS
			$nama = $row['C']; // Ambil data nama
			$pass = $row['D']; // Ambil data jenis kelamin
			$kelas = $row['E']; // Ambil data telepon

			$kls = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kelas WHERE kode_akses = '$kelas'"));

			// Cek jika semua data tidak diisi
			if(empty($nim) && empty($nama) && empty($pass))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Proses simpan ke Database
				$sql->bindParam(':nim', $nim);
				$sql->bindParam(':nama_mhs', $nama);
				$sql->bindParam(':password', $pass);
				$sql->bindParam(':kelas_mhs', $kls['id_kelas']);

				$sql->execute(); // Eksekusi query insert
			}

			$numrow++; // Tambah 1 setiap kali looping
		}
	}
	echo '<script language="javascript">swal("", "Import data sukses!", "success").then(() => { window.location="mahasiswa"; });</script>';
	?>
