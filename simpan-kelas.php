<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php
include('koneksi.php');
// include('session.php');

function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter_sql;
}

$nama = antiinjection($_POST['nama']);
$jurusan = antiinjection($_POST['jurusan']);
$kode = antiinjection($_POST['kode']);

	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM kelas WHERE nama_kelas = '$nama' AND jurusan = '$jurusan'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Kelas Sudah Ada!", "warning").then(() => { window.location="Kelas"; });</script>';
	}else{
	  $qy = mysqli_query($connect, "INSERT INTO kelas (nama_kelas, kode_akses, jurusan)
			VALUES ('$nama', '$kode', '$jurusan')");
	  if($qy){
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Kelas tersimpan", "success").then(() => { window.location="Kelas"; });</script>';
	  }else{
	// echo "Error: " . $qy . "<br>" . $connect->error;
	echo '<script language="javascript">swal("Simpan gagal!", "Data Kelas gagal tersimpan", "success").then(() => { window.location="Kelas"; });</script>';
	  }
	}
?>
