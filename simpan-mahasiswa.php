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

$nim = antiinjection($_POST['nim']);
$nama = antiinjection($_POST['nama']);
$pass = antiinjection($_POST['password']);
$kelas = antiinjection($_POST['kelas']);
$password = md5("vieyama".$pass);

	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM mahasiswa WHERE nim = '$nim'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Sudah Ada!", "warning").then(() => { window.location="mahasiswa"; });</script>';
	}else{
		mysqli_query($connect, "INSERT INTO mahasiswa (nim, nama_mhs, password, kelas_mhs)
			VALUES ('$nim','$nama','$pass','$kelas')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data user tersimpan", "success").then(() => { window.location="mahasiswa"; });</script>';
	}

?>
